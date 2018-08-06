<?php
namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libraries\Alert;
use Validator;

class VoucherController extends Controller
{
    private $objReview;
    function __construct()
    {
        $this->objReview = new Review();
    }

    function index()
    {
     	$data["review"] = Product::get_all();
        return view("product",$data);
    }



}