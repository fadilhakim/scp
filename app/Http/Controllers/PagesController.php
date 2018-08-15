<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Slider;
use App\Models\Bank;
use App\Models\About;

class PagesController extends Controller
{
    //
    function __construct()
    {

    }

    function about()
    {
        $data['about'] = About::detail_about(1);
        return view('about',$data);
    }

     function warranty()
    {
        
        return view('warranty');
    }

}
