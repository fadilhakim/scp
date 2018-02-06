<?php

// ADMIN 
//$admin_route = " \App\Http\Controllers\Admin\ "; 
Route::get("/admin","Admin\AuthController@login");
Route::get("/admin/login","Admin\AuthController@login");
Route::get("/admin/session","Admin\AuthController@session");
Route::post("/admin/login/process","Admin\AuthController@LoginProcess");

Route::group(['middleware' => ['admin']], function () {

    Route::get("/admin/dashboard","Admin\DashboardController@index");
   
    // Auth
    Route::get("/admin/logout","Admin\AuthController@logout");

    // Admin
    Route::get("/admin/users","Admin\UsersController@index");

    Route::get("/admin/slider","Admin\SliderController@index");
    // pages
    Route::get("/admin/about","Admin\PagesController@about");
    // product
    Route::get("/admin/product","Admin\ProductController@index");
    Route::get("/admin/product/detail","Admin\ProductController@detail");
    Route::get("/admin/product/category","Admin\CategoryController@index");
    Route::post("/admin/product/subcategory","Admin\CategoryController@subcategory");
    Route::post("/admin/product/insert","Admin\ProductController@modal_product_insert");
    Route::post("/admin/product/update","Admin\ProductController@modal_product_update");
    Route::post("/admin/product/delete","Admin\ProductController@modal_product_delete");
    Route::post("/admin/product/category/insert","Admin\CategoryController@insert_category_modal");
    Route::post("/admin/product/category/update","Admin\CategoryController@update_category_modal");
    Route::post("/admin/product/category/delete","Admin\CategoryController@delete_category_modal");
    Route::post("/admin/product/brand/insert","Admin\BrandController@insert_brand_modal");
    Route::post("/admin/product/brand/update","Admin\BrandController@update_brand_modal");
    Route::post("/admin/product/brand/delete","Admin\BrandController@delete_brand_modal");

    Route::post("/admin/product/insert_process","Admin\ProductController@product_insert_process");
    Route::post("/admin/product/update_process","Admin\ProductController@product_update_process");
    Route::post("/admin/product/delete_process","Admin\ProductController@product_delete_process");
    Route::post("/admin/product/category/insert_process","Admin\CategoryController@insert_category_process");
    Route::post("/admin/product/category/update_process","Admin\CategoryController@update_category_process");
    Route::post("/admin/product/category/delete_process","Admin\CategoryController@delete_category_process");

    Route::post("/admin/product/brand/insert_process","Admin\BrandController@insert_brand_process");
    Route::post("/admin/product/brand/update_process","Admin\BrandController@update_brand_process");
    Route::post("/admin/product/brand/delete_process","Admin\BrandController@delete_brand_process");
    Route::post("/admin/product/subcategory/insert_process","Admin\CategoryController@insert_subcategory_process");
    Route::post("/admin/product/subcategory/delete_process","Admin\CategoryController@delete_subcategory_process");
    
   // Route::get('admin/dashboard', ['as'=>'admin.dashboard','uses'=>'AdminController@dashboard']);
});

// default
Route::get("default/login","Auth\LoginController@showLoginForm");