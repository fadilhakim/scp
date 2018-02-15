<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;

class SliderController extends Controller
{
    

    function __construct()
    {
        
    }

    function index()
    {
        $data['content'] = 'admin/slider';
        return view('admin/index',$data);
    }
}
