<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Activation;
use Redirect;
use Session;
use Illuminate\Support\Facades\Input;
use Mail;
use Carbon\Carbon;
use Mailchimp;
use App\ZipCode;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        //echo "<h1>  Login Page </h1> <hr>";
    }

    function login_form()
    {
        return view('auth/login');
    }
    
    public function modal_login()
    {
        return view("auth/modal_login");
    }

    public function login_process(Request $request)
    {
        $objUser  = new User();
        $email    = $request->input("email");
        $password = $request->input("password");

        $validation = Validator::make($request->all(),  [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if ($validation->fails()) {
            //("harusnya bisa loh");
            return redirect("login")->withErrors($validation)->withInput();
        }

        if (Auth::guard('user')->attempt(['email' => $email, 'password' => $password,"activation"=>"ACTIVE"]))
        {
           //dd("bisa gak sih ?");
            $user = Auth::guard('user')->user();// define session
           
            return redirect('/');
            //header("location:".base_url(""));
        }else{

            $check_user = $objUser->detail_user_email($email);

            if(!empty($check_user))
            {
                if($check_user->activation != "ACTIVE")
                {
                    $request->session()->flash('message', "<div class='alert alert-danger'> Your Account is not Activated yet. 
                    Please Activate your account with click activation button that we already sent to your email </div> ");   
                }
            }
            else
            {
                $request->session()->flash('message', "<div class='alert alert-danger'> Username or Password are invalid </div> ");
            }

            return redirect('login');
            //header("location:".url("login"));
          
        }
    }

    protected function login(Request $request)
    {
        try {
            // Validation
            $validation = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if ($validation->fails()) {
                return Redirect::back()->withErrors($validation)->withInput();
            }
            $remember = (Input::get('remember') == 'on') ? true : false;
            if ($user = Sentinel::authenticate($request->all(), $remember)) {
                return redirect('dashboard');
            }

            return Redirect::back()->withErrors(['global' => 'Invalid password or this user does not exist' ]);

        } catch (NotActivatedException $e) {
            return Redirect::back()->withErrors(['global' => 'This user is not activated','activate_contact'=>1]);

        }
        catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            return Redirect::back()->withErrors(['global' => 'You are temporary susspended' .' '. $delay .' seconds','activate_contact'=>1]);
        }

        return Redirect::back()->withErrors(['global' => 'Login problem please contact the administrator']);

        
    }
    

    protected function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    protected function activate($id){
        /*$user = Sentinel::findById($id);

        $activation = Activation::create($user);
        $activation = Activation::complete($user, $activation->code);*/
        //Session::flash('message', trans('messages.activation'));
        Session::flash('status', 'success');
        return redirect('login');
    }

}
