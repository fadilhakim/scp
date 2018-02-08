<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Slider;


class HomeController extends Controller
{
    public function home($value='')
    {
    	return view('welcome');
    }
    public function YourhomePage($value='')
    {
    	return view('home');
    }
    public function dashboard($value='')
    {
    	return view('backEnd.dashboard');
    }

   
}
