<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     /* Start Api Side Commons */
     public $response = array('message' => '', 'data' => null);
     public $status = 412;
     public $paginate = 10;
     public $statusArr = [
         'success' => 200,
         'not_found' => 404,
         'unauthorised' => 412,
         'already_exist' => 409,
         'validation' => 422,
         'disabled' => 423,
         'something_wrong' => 405,
         'forbidden' => 403,
         'unauthenticated' => 401,
     ];
 
     public function ApiValidator($fields, $rules)
     {
         $validator = Validator::make($fields, $rules);
 
         if ($validator->fails()) {
             $this->response['message'] = array_shift((array_values($validator->errors()->messages())[0]));
 
             return false;
         }
     }
 
 
 
     public function sendResponse($result, $message)
     {
         $response = [
             'success' => true,
             'message' => $message,
             'result'    => $result,
         ];
         return response()->json($response, 200);
     }
     /**
      * return error response.
      *
      * @return \Illuminate\Http\Response
      */
     public function sendError($error,  $code = 404)
     {
         $response = [
             'success' => false,
             'message' => $error,
             'data' => []
         ];
         return response()->json($response, $code);
     }
 
     public function return_response()
     {
         return response()->json($this->response, $this->status);
     }
     /* End Api Side Commons */
}
