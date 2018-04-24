<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

use App\Libraries\Alert;
use Auth;
use App\Admin_model\User_admin;
use App\Models\Role; 
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

        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password,"status"=>"ACTIVE"]))
        {
            $user = Auth::guard('admin')->user();// define session


            
            // Via the global helper...
            session(['key' => 'value']);
           
            return redirect("admin/dashboard");
        }else{
            $request->session()->flash('message', "Username or Password are invalid");
           
            return redirect("admin/login");         
        }
    }

    function activation()
    {
        $adminObj = new Admin();
        
        $activation = $request->input("a");
        $email      = $request->input("e");

        $check_activation = $this->adminObj->check_activation($email,$activation);

        // check activation code
        if(!empty($check_activation))
        {
            // activate 
            $request->session()->flash('message', "<div class='alert alert-success'> 
                <b> Your Account is Activated <b><br>
                Congratulation ! , you already activated your account. now , please login
                to access Admin Dashboard
            </div>");
            $this->adminObj->activate($email);
        }
        
        return redirect('admin/login');
    }

    function session()
    {
        echo "<h1> Session </h1><hr>";
        $user = Auth::guard("admin")->user();
        $user = Auth::guard('admin')->user();// define session
        //$user["key1"] = "val2";
        //echo $user->key1;

        dd($user);
        //print_r($user->original);
    }

    function test(Request $request)
    {
        $adminObj = new User_admin();

        $arr = array(
            "username"=>"alhusna901",
            "email"=>"alhusna901@gmail.com",
            "password"=>bcrypt("999999"),
            "name"=>"Aries Dimas Yudhistira",
            "role_id"=>1,
            "status"=>"active",
            "ip_address"=> "127.0.0.0",
            "user_agent"=>"mozilla"
        );

        $adminObj->fill($arr);
        $adminObj->save();
        echo "done";
    }

    function logout()
    {
        Auth::guard("admin")->logout();
        
        return redirect('/admin');
    }
}
