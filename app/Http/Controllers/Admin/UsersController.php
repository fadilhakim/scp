<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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


}
