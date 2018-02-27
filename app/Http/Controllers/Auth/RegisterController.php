<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Libraries\Alert;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use Redirect;
use Sentinel;
use Session;
use Activation;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    private $objUser;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->objUser = new User();

    }

   

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function register_process(Request $request)
    {
        //dd($request->all());
        $name               = $request->input("name");
        $email              = $request->input("email");
        $username           = strstr($email, '@', true);
        $password           = bcrypt($request->input("password"));
        $datetime           = date("Y-m-d H:i:s");
        $ip_address         = $request->ip();
        $user_agent         = $request->header('User-Agent');

        $validation = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|confirmed',
        ]);

        if ($validation->fails()) {
            //return Redirect::back()->withErrors($validation)->withInput();
            $errors = $validation->errors();
            
             $err_text = "";
             foreach($errors->all() as $err) 
             {
                 $err_text .=  "<li> $err </li>";
             }
 
             echo Alert::danger($err_text);
        }else
        {
            $arr["name"]       = $name;
            $arr["email"]      = $email;
            $arr["username"]   = $username;
            $arr["password"]   = $password;
            $arr["datetime"]   = $datetime;
            $arr["ip_address"] = $ip_address;
            $arr["user_agent"] = $user_agent;

            $this->objUser->register_user($arr);

            echo Alert::success("You successfully Register");
        }
    }

    function register()
    {
        return view("auth.register");
    }

    /* public function showRegistrationForm()
    {
        return view('auth.register');
    }*/

    /* public function register(Request $request){

        $validation = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);

          if ($validation->fails()) {
                return Redirect::back()->withErrors($validation)->withInput();
         }

         $user = Sentinel::register($request->all());
        //Activate the user ** 
         $activation = Activation::create($user);
         $activation = Activation::complete($user, $activation->code);
        //End activation

        if($user){
            $user->roles()->sync([2]); // 2 = client
            Session::flash('message', 'Registration is completed');
            Session::flash('status', 'success');
           return redirect('/'); 
        }
         Session::flash('message', 'There was an error with the registration' );
         Session::flash('status', 'error');
         return Redirect::back();
    }*/



}
