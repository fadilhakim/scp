<?php
    namespace App\Http\Controllers\Auth;
    use App\Http\Controllers\Controller;

    use Illuminate\Http\Request;
    use App\Models\User;

    class ActivateController extends Controller{
        
        private $objUser;

        function __construct()
        {
            $this->objUser = new User();
        }

        function activation_process(Request $request)
        {
            $activation = $request->input("a");
            $email      = $request->input("e");

            $check_activation = $this->objUser->check_activation($email,$activation);

            // check activation code
            if(!empty($check_activation))
            {
                // activate 
                $request->session()->flash('message', "<div class='alert alert-success'> 
                    <b> Your Account is Activated <b><br>
                    Congratulation ! , you already activated your account. now , please login
                    to buy some product.
                </div>");
                $this->objUser->activate($email);
            }
            
            return redirect('login');

        }


    }