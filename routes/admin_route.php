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

    //order
    Route::get("/admin/order","Admin\OrderController@index");
    Route::get("/admin/order/detail/{order_id}","Admin\OrderController@detail");
    Route::post("/admin/order/change_status","Admin\OrderController@change_status");

    // product
    Route::get("/admin/product","Admin\ProductController@index");
    Route::get("/admin/product/update/{id}","Admin\ProductController@detail");
    Route::get("/admin/product/category","Admin\CategoryController@index");
    Route::get("/admin/product/brand","Admin\BrandController@index");
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

    //Bank
    Route::get("/admin/bank_account","Admin\BankController@index");

    Route::post("/admin/bank/insert","Admin\BankController@modal_bank_insert");
    Route::post("/admin/bank/update","Admin\BankController@modal_bank_update");
    Route::post("/admin/bank/delete","Admin\BankController@modal_bank_delete");

    Route::post("/admin/bank/insert_process","Admin\BankController@bank_insert_process");
    Route::post("/admin/bank/update_process","Admin\BankController@bank_update_process");
    Route::post("/admin/bank/delete_process","Admin\BankController@bank_delete_process");

     //Voucher
     Route::get("/admin/voucher","Admin\VoucherController@index");

     Route::post("/admin/voucher/insert","Admin\VoucherController@modal_voucher_insert");
     Route::post("/admin/voucher/update","Admin\VoucherController@modal_voucher_update");
     Route::post("/admin/voucher/delete","Admin\VoucherController@modal_voucher_delete");
 
     Route::post("/admin/voucher/insert_process","Admin\VoucherController@voucher_insert_process");
     Route::post("/admin/voucher/update_process","Admin\VoucherController@voucher_update_process");
     Route::post("/admin/voucher/delete_process","Admin\VoucherController@voucher_delete_process");

    //Midtrans Setting 
    Route::get("/admin/midtrans_setting","Admin\MidtransController@index");
    Route::post("/admin/midtrans_setting/update","Admin\MidtransController@update_process");

    // Slider
    Route::get("/admin/slider","Admin\SliderController@index");

    Route::post("/admin/slider/insert","Admin\SliderController@modal_slider_insert");
    Route::post("/admin/slider/update","Admin\SliderController@modal_slider_update");
    Route::post("/admin/slider/delete","Admin\SliderController@modal_slider_delete");

    Route::post("/admin/slider/insert_process","Admin\SliderController@slider_insert_process");
    Route::post("/admin/slider/update_process","Admin\SliderController@slider_update_process");
    Route::post("/admin/slider/delete_process","Admin\SliderController@slider_delete_process");
// Route::get('admin/dashboard', ['as'=>'admin.dashboard','uses'=>'AdminController@dashboard']);
});

