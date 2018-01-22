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

Route::get('/about', function () {
    return view('welcome');
});


Route::get('/product', function () {
    return view('product');
});

Route::resource("order","OrderController");
Route::get("/test/dimas","TestController@dimas"); // HARUS DITAMBAHKAN SEBELUM RESOURCE
Route::resource("test","TestController");
//Route::get("/dimas","TestController@dimas");

// ADMIN 
//$admin_route = " \App\Http\Controllers\Admin\ "; 
Route::get("/admin/dashboard","Admin\DashboardController@index");

