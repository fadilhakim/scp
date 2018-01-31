<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //
    function __construct()
    {

    }

    function about()
    {
        $data['content'] = 'admin/about';
        return view('admin/index',$data);
    }
}
