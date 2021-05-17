<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//URL::forceScheme('http');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/', 'HomeController@allMenus')->name('home');
Route::post('order_food', 'HomeController@order_food')->name('order_food');

Auth::routes();

Route::get('customer_registration',function () {
    return view('auth.customer_register');
    })->name('customer_registration');

Route::post('customer_registration','HomeController@customer_registration');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/restaurant','HomeController@index')->name('restaurant');

Route::get('restaurant/add', function () {
    return view('restaurant.add');
    })->name('food.add');
    
Route::get('restaurant/orders', 'HomeController@orders')->name('restaurant.orders');
Route::post('restaurant/add', 'HomeController@newfood_add')->name('newfood.add');
Route::get('restaurant/feedbacks', 'HomeController@feedbacks')->name('restaurant.feedbacks');
Route::get('restaurant/edit/{id?}', 'HomeController@food_find')->name('food.find');
Route::put('restaurant/edit/{id?}', 'HomeController@food_edit')->name('food.edit');
Route::get('restaurant/delete/{id?}', 'HomeController@food_delete')->name('food.delete');

