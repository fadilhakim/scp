<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;

use App\Libraries\Alert;
use App\Libraries\FolderHelper;


class UsersController extends Controller
{
    //
    private $objUser;
    function __construct()
    {
        $this->objUser = new User();
    }

    function index()
    {
        $data["user"]    = $this->objUser->list_user();
        
    	$data["title"]   = "Costumers";
        $data['content'] = 'admin/users/users';
        return view('admin/index',$data);
    }

    function modal_user_delete(Request $request)
    {
        $user_id = $request->input("user_id");
        $data["user"] = $this->objUser->detail_user($user_id);
        return view("admin/users/modal_user_delete",$data);
    }

    function modal_user_change_status(Request $request)
    {
        $data["user_id"] = $request->input("user_id");
        $data["status"]  = $request->input("status");
        return view("admin/users/modal_user_change_status",$data);
    }

    function modal_user_change_activation(Request $request)
    {
        $data["user_id"] = $request->input("user_id");
        $data["activation"]  = $request->input("activation");
        return view("admin/users/modal_user_change_activation",$data);
    }

    function change_activation_process(Request $request)
    {   
        $user_id = $request->input("user_id");
        $activation = $request->input("activation");

        if(!empty($user_id))
        {
            $this->objUser->change_activation_user($user_id,$activation);
            echo Alert::success("You successfully Change Activation User");
            echo "<script> setTimeout(function(){ location.reload(); },2000); </script>";
        }
    }

    function change_status_process(Request $request)
    {
        $user_id = $request->input("user_id");
        $status = $request->input("status");

        if(!empty($user_id))
        {
            $this->objUser->change_status_user($user_id,$status);
            echo Alert::success("You successfully Change Status User");
            echo "<script> setTimeout(function(){ location.reload(); },2000); </script>";
        }
    }   

    function user_delete_process(Request $request){
        
        $user_id = $request->input("user_id");
        $this->objUser->delete_user($user_id);

        echo Alert::success("You successfully Delete User");
        echo "<script> setTimeout(function(){ location.reload(); },2000); </script>";
    }


}
