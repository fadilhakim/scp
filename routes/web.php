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
Route::get('/about', function () {

    return view('about');

});
Route::get('/product', 'ProductController@index');
Route::get('/product/detail/{id}/{product_category}/{product_title}', 'ProductController@detail');

Route::get('/detail_order/{id}', 'Member\MemberController@detail_order');

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
Route::get("auth/logout","Auth\LoginController@logout");

Route::get('cart',"CartController@index"); 
Route::get("cart/add/{product_id}/{product_title}","CartController@add");
Route::post("cart/update","CartController@update");
Route::get("cart/delete/{row_id}","CartController@delete");
Route::get("cart/content","CartController@content");
Route::get("cart/destroy","CartController@destroy");

Route::get("auth/logout","Auth\LoginController@logout");
    
Route::resource("order","OrderController@");

Route::get('cart',"CartController@index"); 
Route::get("cart/add/{product_id}/{product_title}","CartController@add");
Route::post("cart/update","CartController@update");
Route::get("cart/delete/{row_id}","CartController@delete");
Route::get("cart/content","CartController@content");
Route::get("cart/destroy","CartController@destroy");

Route::group(['middleware' => ['auth']], function () {
    //Route::get('cart',"CartController@index"); // untuk sementara di comment

// members and order
Route::get("checkout","OrderController@checkout");
Route::get('/memberarea', 'Member\MemberController@index');
Route::get('/detail_order/{id}', 'Member\MemberController@detail_order');

});



include "admin_route.php";

include "web2.php";

