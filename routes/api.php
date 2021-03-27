<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Route::post('sendOtp', 'UserController@sendOtp');
Route::post('login', 'HomeController@login');
Route::post('register', 'HomeController@register');
Route::post('forgotPassword', 'HomeController@forgotPassword');
Route::get('getList', 'HomeController@getList');
Route::get('placeOrder', 'HomeController@placeOrder');
Route::get('userOrder', 'HomeController@userOrder');

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 */

Route::group(['middleware' => ['auth:api']], function() {
    
});