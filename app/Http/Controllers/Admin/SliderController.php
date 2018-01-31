<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;

use App\Admin_model\User_admin;

class SliderController extends Controller
{
    //
    use AuthenticatesUsers;
    protected $redirectTo = '/admin/login';

    function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    function index()
    {
        $data['content'] = 'admin/slider';
        return view('admin/index',$data);
    }
}
