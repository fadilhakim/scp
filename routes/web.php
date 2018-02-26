<?php

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
//Auth::routes();// penting

Route::get('/', function () {
    return view('home');
});

Route::get('/home2', function () {
    return view('home2');
});


Route::get('/about', function () {
    return view('about');
});


Route::get('/product', 'ProductController@index');
Route::get('/product/detail/{id}/{product_category}/{product_title}', 'ProductController@detail');


Route::get('/services', function () {
    return view('services');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get("login",["as"=>"login","uses"=>'Auth\LoginController@showLoginForm']);
Route::get("register","Auth\RegisterController@register");
Route::post("auth/login_process","Auth\LoginController@login_process");
Route::post("auth/register_process","Auth\RegisterController@register_process");

Route::get("auth/logout","Auth\LoginController@logout");
    
Route::resource("order","OrderController@");

Route::get('cart',"CartController@index"); 
Route::get("cart/add/{product_id}/{product_title}","CartController@add");
Route::get("cart/update","CartController@update");
Route::get("cart/delete/{row_id}","CartController@delete");
Route::get("cart/content","CartController@content");
Route::get("cart/destroy","CartController@destroy");

Route::group(['middleware' => ['auth']], function () {
    //Route::get('cart',"CartController@index"); // untuk sementara di comment
});

include "admin_route.php";
include "web2.php";
