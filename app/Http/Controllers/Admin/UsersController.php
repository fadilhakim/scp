<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    //
    function __construct()
    {

    }

    function index()
    {
        $data['content'] = 'admin/users';
        return view('admin/index',$data);
    }
}
