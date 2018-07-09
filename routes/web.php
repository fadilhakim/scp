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

// Auth::routes();// penting

Route::get('/', function () {

    return view('home');

});
Route::get('/home2', function () {

    return view('home2');

});
Route::get('/about', 'PagesController@about');

Route::get("/foo",function(){
    
    echo "<h1> Hello Foo </h1>";
});


Route::get('/product', 'ProductController@index');
Route::get('/product/category/{category}', 'ProductController@getCategory');
Route::get('/product/brand/{brand}', 'ProductController@getBrand');
Route::get('/product/detail/{id}/{product_category}/{product_title}', 'ProductController@detail');

//product highlight // ringkasan product

Route::get('/product/highlight/{id}/{product_title}', 'RingkasanProductController@index');

Route::get('/services', function () {
    return view('services');
});

Route::get('/contact', function () {

    return view('contact');

});

Route::get("login",["as"=>"login","uses"=>'Auth\LoginController@login_form']);
Route::get("register","Auth\RegisterController@register")->name("register");
Route::get('auth/reset', [
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm',
    'as' => 'password.reset'
]);
Route::get('auth/request', [
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm',
    'as' => 'password.request'
]);
Route::post("auth/login_process","Auth\LoginController@login_process");
Route::post("auth/register_process","Auth\RegisterController@register_process");
Route::get("auth/activated","Auth\ActivateController@activation_process");
Route::get('/user_form_checkout', 'OrderController@user_form_checkout');

Route::get('cart',"CartController@index"); 
Route::get("cart/add/{product_id}/{product_title}","CartController@add");
Route::post("cart/update","CartController@update");
Route::get("cart/delete/{row_id}","CartController@delete");
Route::get("cart/content","CartController@content");
Route::get("cart/destroy","CartController@destroy");
Route::post("cart/update_coupon","CartController@update_coupon");

Route::post("midtrans/snap/finish","Midtrans\SnapController@finish");

Route::get("compare","CompareController@index");
Route::get("compare_view","CompareController@view_session");
Route::post("compare/modal","CompareController@compare_modal");
Route::get("compare/delete/{id}","CompareController@delete");
Route::post("compare/deleteAjax","CompareController@deleteAjax");
Route::post("compare/process","CompareController@compare_process");

// rajaongkir zone
Route::get("rajaongkir","RajaongkirController@index");
Route::post("rajaongkir/list_city","RajaongkirController@dt_city");
Route::post("rajaongkir/city_province","RajaongkirController@city_province");

Route::group(['middleware' => ['auth']], function () {
    //Route::get('cart',"CartController@index"); // untuk sementara di comment

    // members and order
    Route::get("checkout","OrderController@checkout");
    Route::get('/memberarea', 'Member\MemberController@index');
    Route::get('/memberarea/account', 'Member\MemberController@account');
    Route::get('/detail_order/{id}', 'Member\MemberController@detail_order');
    Route::get("auth/logout","Auth\LoginController@logout");

    Route::post("/account/profile_edit_process","Member\MemberController@profile_edit_process");
    Route::post("/account/change_password_process","Member\MemberController@change_password_process");
    Route::post("/account/add_address_book_process","Member\MemberController@add_address_book_process");
    Route::post("/account/delete_address_book_process","Member\MemberController@delete_address_book_process");

    Route::post("/account/address_book/add","Member\AddressBookController@add_address_book_modal");
    Route::post("/account/address_book/add_process","Member\AddressBookController@add_address_book_process");
    Route::post("/account/address_book/update","Member\AddressBookController@update_address_book_modal");
    Route::post("/account/address_book/update_process","Member\AddressBookController@update_address_book_process");

});

include "admin_route.php";
include "web2.php";

