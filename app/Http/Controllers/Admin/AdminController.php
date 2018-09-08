<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;
use App\Models\Role;

use App\Libraries\Alert;
use App\Libraries\FolderHelper;
use Validator;
use Auth;

use App\Mail\AdminActivateEmail;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    private $objAdmin; 
    private $objRole;

    function __construct()
    {
        $this->objAdmin = new Admin();
        $this->objRole  = new Role();
    }
    //
    function index()
    {
        $data["admin"]   = $this->objAdmin->get_admin();
        
    	$data["title"]   = "Admin";
        $data['content'] = 'admin/admin/admin';
        return view('admin/index',$data);
    }

    function insert_modal()
    {
        $data["role"]    = $this->objRole->get_role_except();
        return view("admin/admin/modal_admin_insert",$data);
    }

    function insert_process(Request $request)
    {
       $objEmail = new \stdClass();
       // dikasih validasi
       $name        = $request->input("name");
       $email       = $request->input("email");
       $username    = strstr($email, '@', true);
       $role        = $request->input("role_id");
       $admin_photo = $request->file('admin_photo');
       $activation  = str_random(60);
       $password    = str_random(8);
       $datetime    = date("Y-m-d H:i:s");
       $ip_address  = $request->ip();
       $user_agent  = $request->header('User-Agent');

       $new_image_name     = str_replace(" ","-",strtolower($name));

       $validator = Validator::make($request->all(), [
            'name'             => 'required|unique:admin_tbl|max:255',
            'role_id'          => 'required',
            "email"            => "required|email"
       ]);

       if(!$validator->fails())
       {
            $arr = array(
                "name"=>$name,
                "username"=>$username,
                "role_id"=>$role,
                "photo"=>"",
                "status"=>$activation,
                "password"=>Hash::make($password),
                "email"=>$email
            );
            $arr["created_at"] = $datetime;
            $arr["ip_address"] = $ip_address;
            $arr["user_agent"] = $user_agent;

            $q = $this->objAdmin->insert_admin($arr);
            $admin_id = $q;
            $arr_image["admin_id"] = $admin_id;
            if($request->hasFile("admin_photo"))
            {
                $arr_image["admin_photo"] = $new_image_name;
                $this->objAdmin->update_admin_photo($arr_image);
                //dd($new_image_name);
                //Move Uploaded File
                $destinationPath = "public/admin";
                FolderHelper::create_folder_admin();
                $request->file("admin_photo")->move($destinationPath,$new_image_name);
            }

            //get role_name,
            $role = $this->objRole->detail_role($role);

            $objEmail->activation_code = $activation;
            $objEmail->name            = $name;
            $objEmail->email           = $email;
            $objEmail->password        = $password;
            $objEmail->role_name       = $role->role_name;
            $objEmail->url             = url("admin/activation/?a=$activation&e=$email");

            Mail::to($email)->send(new AdminActivateEmail($objEmail));

            echo Alert::success("You successfully Insert new Admin");
            echo "<script> setTimeout(function(){ location.reload(); },3000); </script>";
       }
       else
       {
            $errors = $validator->errors();
            $err_text = "";

            foreach($errors->all() as $err) 
            {
                $err_text .=  "<li> $err </li>";
            }

            echo Alert::danger($err_text);
       }
    }
    function modal_admin_delete(Request $request){

        $admin_id = $request->input("admin_id");
        $data["admin"] = $this->objAdmin->get_admin_by_id($admin_id);
        return view("admin/admin/modal_admin_delete",$data);

    }

    

    function admin_delete_process (Request $request){

        $admin_id = $request->input("admin_id");

        $this->objAdmin->admin_delete($admin_id);
        echo Alert::success("You successfully Delete Admin");
        echo "<script> setTimeout(function(){ location.reload(); },3000); </script>";
    }

    function modal_admin_update(Request $request){

        $admin_id = $request->input("admin_id");
        $data["admin"] = $this->objAdmin->get_admin_by_id($admin_id);
        $data["role"] = $this->objAdmin->get_role();
        return view("admin/admin/modal_admin_update",$data);

    }

    function admin_update_process(Request $request){

        $admin_id = $request->input("admin_id");
        $admin_name = $request->input("admin_name");
        $role_id = $request->input("role_id");
        $status = $request->input("status");

        $arr = array(
          "admin_id"       => $admin_id,
          "name"           => $admin_name,
          "role_id"        => $role_id,
          "status"         => $status
        );

        $this->objAdmin->admin_update($arr);
        echo Alert::success("You successfully update Admin");
        echo "<script> setTimeout(function(){ location.reload(); },3000); </script>";
    }

    // method post 
    function profile(){
        // this active admin 
        //echo "iam here"; 
        $data["title"]   = "Admin";
        $data['content'] = 'admin/admin/admin_profile';
        return view('admin/index',$data);
    }

    function profile_process(Request $request)
    {
        // print_r($request->all()); 
        $admin_id = $request->input("admin_id",true);
        $name     = $request->input("name",true);
        $email    = $request->input("email",true);
        //$phone_no = $request->input("phone_no",true);

        $validator = Validator::make($request->all(), [
            'admin_id' => 'required',
            'name'     => 'required|max:255',
            'email'    => 'required|email',
            //'phone_no' => 'required' 
        ]);

        if ($validator->fails()) {
            // return redirect('post/create')
            //             ->withErrors($validator)
            //             ->withInput();
            //print("fail");
            $errors = $validator->errors();
            $err_text = "";
            foreach($errors->all() as $err) 
            {
                $err_text .=  "<li> $err </li>";
            }

            echo Alert::danger($err_text);
        }else{

            $data["admin_id"] = $admin_id;
            $data["name"]     = $name;
            $data["email"]    = $email;

            session(["admin"=>["name" => $name]]);
            session(["admin"=>["email" => $email]]);
            //session(["admin"=>["phone_no" => $phone_no]]);
            //$data["phone_no"] = $phone_no; 

            $this->objAdmin->change_profile($data);
            echo Alert::success("You Successfully update your profile");

        }

    }

    function change_password_process(Request $request)
    {
        $session =  Auth::guard("admin")->user();
        $email = $session->email;

        $old_password = $request->input("old_password");
        $new_password = $request->input("new_password");
        $new_password_confirmation = $request->input("new_password_confirmation");

        $validator = Validator::make($request->all(), [
            'old_password'               => 'required',
            'new_password'               => 'required|confirmed',
            'new_password_confirmation'  => 'required' 
        ]);

        if ($validator->fails()) {
            // return redirect('post/create')
            //             ->withErrors($validator)
            //             ->withInput();
            //print("fail");
            $errors = $validator->errors();
            $err_text = "";
            foreach($errors->all() as $err) 
            {
                $err_text .=  "<li> $err </li>";
            }

            echo Alert::danger($err_text);
        }else{
            // jika password dari database salah 
            $data["email"]        = $email;
            $data["password"]     = Hash::make($new_password);
            $data["old_password"] = $old_password; //Hash::make($old_password);

            //dd(Hash::make($old_password));

            $checkPass = $this->objAdmin->check_admin_password($data); 

            if($checkPass){
                $this->objAdmin->change_password($data);
                echo Alert::success("You Successfully update your Password");
            }else{

                echo Alert::danger("Your password is wrong");
            }

        }


    }

    /*
    

    
    */
}
