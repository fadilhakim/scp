<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin_model\User_admin;

class AuthController extends Controller
{
    //
    function login()
    {
        //echo "ini halaman login";
        $data["title"] = "Login";
        return view ("admin/auth/login",$data);
    }

    function LoginProcess(Request $request)
    {
        
        $email = $request->input("email");
        $password = $request->input("password");

        //dd(\Auth::attempt(["email"=>$email,"password"=>$password]));

    }

    function test(Request $request)
    {
        $adminObj = new User_admin();

        $arr = array(
            "username"=>"alhusna901",
            "email"=>"alhusna901@gmail.com",
            "password"=>md5("999999"),
            "nama"=>"Aries Dimas Yudhistira",
            "role_id"=>1,
            "status"=>"active",
            "ip_address"=> "127.0.0.0",
            "user_agent"=>"mozilla"
        );

        $adminObj->fill($arr);
        $adminObj->save();
        echo "done";
    }
}
