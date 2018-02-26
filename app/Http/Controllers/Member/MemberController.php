<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Slider;
use App\Models\Bank;

class MemberController extends Controller
{
    //
    function __construct()
    {

    }

    function index()
    {
    	$data["title"]   = "About";
        $data['content'] = 'admin/about';
        return view('admin/index',$data);
    }

    public function slider()
    {
        $data["slider"] = Slider::all_slider();
        $data["title"]   = "home content";
        $data['content'] = 'admin/home';
        return view("/admin/index",$data);
    }

}
