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

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::resource("order","OrderController");

include "admin_route.php";
include "web2.php";
