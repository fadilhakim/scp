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



Route::get("login","Auth\LoginController@login");
Route::get("register","Auth\RegisterController@register");
Route::post("auth/login_process","Auth\LoginController@login_process");
Route::post("auth/register_process","Auth\RegisterController@register_process");

Route::group(['middleware' => ['auth']], function () {
    Route::get("auth/logout","Auth\LoginController@logout");
    
    Route::resource("order","OrderController");
    Route::get('/cart', function () {
        return view('cart');
    });
});

include "admin_route.php";
include "web2.php";
