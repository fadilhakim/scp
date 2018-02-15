<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Slider;
use App\Models\Bank;

class PagesController extends Controller
{
    //
    function __construct()
    {

    }

    function about()
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

    public function bank()
    {
        $data["bank"] = Bank::all_bank();
        $data["title"]   = "Bank Account";
        $data['content'] = 'admin/bank_account';
        return view("/admin/index",$data);
    }
}
