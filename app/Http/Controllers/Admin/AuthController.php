<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;


use Auth;
use App\Admin_model\User_admin;
use App\User;

class AuthController extends Controller
{
   
    use AuthenticatesUsers;
    
    public function __construct()
    {
       
    }
    //
    function login()
    {
        //echo "ini halaman login";
        $data["title"] = "Login";
        return view ("admin/auth/login",$data);
    }

    function LoginProcess(Request $request)
    {
        
        $email    = $request->input("email");
        $password = $request->input("password");

        $validation = Validator::make($request->all(),  [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation)->withInput();
        }



        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password]))
        {
            $user = Auth::guard('admin')->user();
           
            return redirect("admin/dashboard");
        }else{
          
          
            return redirect("admin/login");         
        }

      

    }

    function test(Request $request)
    {
        $adminObj = new User();

        $arr = array(
            "username"=>"alhusna901",
            "email"=>"alhusna901@gmail.com",
            "password"=>bcrypt("999999"),
            "name"=>"Aries Dimas Yudhistira",
            "role"=>"customer",
            "status"=>"active",
            "ip_address"=> "127.0.0.0",
            "user_agent"=>"mozilla"
        );

        $adminObj->fill($arr);
        $adminObj->save();
        echo "done";
    }
}
