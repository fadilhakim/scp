<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;

// model
use App\Admin_model\user_admin;

class DashboardController extends Controller
{
    //
    //
    use AuthenticatesUsers;
    protected $redirectTo = '/admin/login';
    function __construct()
    {
        //$this->middleware('auth:admin', ['except' => 'logout']);
    }

    function index()
    {
        $data["title"] = "Dashboard";
        $data["content"] = "admin/dashboard/content";
        $data["mobil"] = array("Toyota","Fiat","Honda");

        return view("admin.index",$data);
    }
}
