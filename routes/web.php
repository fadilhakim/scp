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
Route::get("/admin/dashboard","Admin\DashboardController@index");

<<<<<<< HEAD
include "web2.php";

=======
Route::get("/admin/users",function(){
	$data['content'] = 'admin/users';
	return view('admin/index',$data);
});

Route::get("/admin/about_us",function(){
	$data['content'] = 'admin/about';
	return view('admin/index',$data);
});

Route::get("/admin/slider",function(){
	$data['content'] = 'admin/slider';
	return view('admin/index',$data);
});
>>>>>>> de1304687d101e6b043054ba71192b933bee88c9
