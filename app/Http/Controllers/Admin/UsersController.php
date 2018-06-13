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

    function user_delete_process(Request $request){
        
        $user_id = $request->input("user_id");
        $this->objUser->delete_user($user_id);

        echo Alert::success("You successfully Delete User");
        echo "<script> setTimeout(function(){ location.reload(); },2000); </script>";
    }


}
