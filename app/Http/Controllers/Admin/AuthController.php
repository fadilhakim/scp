<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //
    function Login()
    {
        //echo "ini halaman login";
        $data["title"] = "Login";
        return view ("admin/auth/login",$data);
    }
}
