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


Route::get('/product', function () {
    return view('product');
});

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
Route::get("/test/dimas","TestController@dimas"); // HARUS DITAMBAHKAN SEBELUM RESOURCE
Route::resource("test","TestController");
//Route::get("/dimas","TestController@dimas");

// ADMIN 
//$admin_route = " \App\Http\Controllers\Admin\ "; 
Route::get("/admin","Admin\AuthController@login");
Route::get("/admin/login","Admin\AuthController@login");
Route::post("/admin/login/process","Admin\AuthController@LoginProcess");

Route::group(['middleware' => ['admin']], function () {

    Route::get("/admin/dashboard","Admin\DashboardController@index");
    Route::get("/admin/product","Admin\ProductController@index");
    Route::get("/admin/users","Admin\UsersController@index");
    Route::get("/admin/slider","Admin\SliderController@index");
    // pages
    Route::get("/admin/about","Admin\PagesController@about");
   
   // Route::get('admin/dashboard', ['as'=>'admin.dashboard','uses'=>'AdminController@dashboard']);
});

// default
Route::get("default/login","Auth\LoginController@showLoginForm");

include "web2.php";
