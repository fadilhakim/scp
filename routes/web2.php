<?php

    //Route::get("admin/test","Admin\AuthController@test");
    Route::get("test/session","TestController@session");
    Route::get("test/sess_destroy","TestController@sess_destroy");
    Route::get("test/send_email","TestController@send_email");
    Route::get("test/invoice","TestController@invoice");



?>