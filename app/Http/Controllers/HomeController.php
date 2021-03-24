<?php

namespace App\Http\Controllers;

use App\Food;
use App\User;
use App\FoodOrder;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lists = Food::where('user_id',Auth::user()->id)->get();
        return view('restaurant.index',compact('lists'));
    }

    public function customer_registration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'mobile' => 'required|integer',
            'address'   => 'required|min:5|max:250',
            'foodtype'  => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('customer_registration')
                ->withErrors($validator)
                ->withInput();
        }
        $user = new User();
        $user->role_id = 1;
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->food_type = $request->foodtype;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('message','Customer Successfully Register');
    }
    
    public function allMenus()
    {
        $vegFoods = Food::with('restaurant_details')->where('food_type',1)->get();
        $nonvegFoods = Food::with('restaurant_details')->where('food_type',2)->get();

        return view('welcome',compact('vegFoods','nonvegFoods'));
    }

    public function order_food(Request $request)
    {
       if(Auth::user()){
           $user_id = Auth::user()->id;
           $role_id = User::where(['id'=>$user_id, 'role_id'=>1])->get();
           if(count($role_id) >0){
              $newfood =new FoodOrder;
              $newfood->user_id = $user_id;
              $newfood->food_id = $request->food_id;
              $newfood->restaurant_id = $request->restaurant_id;
              $newfood->save();

               return redirect()->back()->with('message','Order Book Successfully');
           }else{
               return redirect()->back()->with('error','Dear Restaurant, Please logout from customer and login');
           }
      }else{
       return Redirect::to('login');
      }
    }

    public function newfood_add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required|max:100',
            'price' => 'required|integer',
            'food_type'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('restaurant/add')
                ->withErrors($validator)
                ->withInput();
        }
       if(Auth::user()){
           $role_id = Auth::user()->role_id;
    
           if($role_id == 2 ){
                if($request->file('image'))
                { 
                  $file = $request->file('image');  
                  $destinationPath = public_path(). '/images/';
                  $image = time().$file->getClientOriginalName();
                  $file->move($destinationPath, $image);
                  $imgpath = 'images/'.$image;
                }else{
                    $imgpath = null;
                }
                  $newfood_add =new Food;
                  $newfood_add->user_id = Auth::user()->id;
                  $newfood_add->name = $request->name;
                  $newfood_add->description = $request->description;
                  $newfood_add->price = $request->price;
                  $newfood_add->image = $imgpath;
                  $newfood_add->food_type = $request->food_type;
                  $newfood_add->save();

               return redirect('/restaurant')->with('message','Food Added Successfully');
           }else{
               return redirect()->back()->with('error','Customer can not add food');
           }
      }else{
       return Redirect::to('login');
      }
    }
    public function food_edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required|max:100',
            'price' => 'required|integer',
            'food_type'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

         if($request->file('image'))
         { 
           $file = $request->file('image');  
           $destinationPath = public_path(). '/images/';
           $image = time().$file->getClientOriginalName();
           $file->move($destinationPath, $image);
           $imgpath = 'images/'.$image;
         }else{
            $imgpath = $request->oldimage;
         }
           $food = Food::find($id);
           $food->user_id = Auth::user()->id;
           $food->name = $request->name;
           $food->description = $request->description;
           $food->price = $request->price;
           $food->image = $imgpath;
           $food->food_type = $request->food_type;
           $food->save();

        return redirect('/restaurant')->with('message','Food Edit Successfully'); 
    }

    public function food_find($id)
    {
         $food = Food::find($id);  
         return view('restaurant.edit',compact('food'));    
    }

    public function food_delete($id)
    {
         $food = Food::find($id);
         $food_order = FoodOrder::where('food_id',$food->id)->delete();
         $food->delete();
         return redirect()->back()->with('message','Food Deleted Successfully');    
    }

    public function orders()
    {
       if(Auth::user()){
           $user_id = Auth::user()->id;
    
           if($user_id){
               $customers = DB::table('food_order')
                           ->join('foods', 'food_order.food_id', '=', 'foods.id')
                           ->join('users', 'users.id', '=', 'food_order.user_id')
                           ->where('restaurant_id', $user_id)
                           ->select('users.name as customername','users.address as address','users.mobile as customerphone','foods.id as foodid','foods.name as foodname','foods.description as fooddesc','foods.price as foodprice','food_order.created_at as time')
                           ->get();
         
               return view('restaurant.orders',compact('customers'));
           }else{
               return redirect()->back()->with('error','Customer can not add food');
           }
      }else{
       return Redirect::to('login');
      }
    }

    ///API

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }

        $user = User::where('mobile', $request->mobile)->first();
       
        if (is_null($user)) {
            return response()->json(['success' => false, 'message' => 'Login Fail, Please Check Mobile Number']);
        }else{
            if (Auth::attempt(['mobile'=> $request->mobile, 'password'=> $request->password])) {
                return response()->json(['success' => true, 'message' => 'success', 'data' => $user]);
            }else{    
                return response()->json(['success' => false, 'message' => 'Login Fail, pls check password']);
            }  
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'mobile' => 'required|integer|unique:users,mobile',
            'address'   => 'required|min:5|max:250',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }

        $user = new User();
        $user->role_id = 1;
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->food_type = 1;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['success' => true, 'message' => 'User Successfully Register', 'data' => $user]);
    }

    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'mobile' => 'required|integer',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }

        $user = User::where('email',$request->email)->where('mobile',$request->mobile)->update(['password' => Hash::make($request->password)]);
        if($user){
            return response()->json(['success' => true, 'message' => 'User Password Changed Successfully', 'data' => $user]);
        }else{
            return response()->json(['success' => false, 'message' => 'Something Wrong, Pls Check Email or Number']);
        }
    }

}
