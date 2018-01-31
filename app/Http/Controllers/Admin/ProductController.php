<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    function index()
    {
        $data['content'] = 'admin/product';
        return view("admin/index",$data);
    }
}
