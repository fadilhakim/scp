<?php
namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libraries\Alert;
use Validator;

class ReviewController extends Controller
{
    private $objReview;
    function __construct()
    {
        $this->objReview = new Review();
    }

    function index()
    {
     	$data["review"] = Review::all_review()->get();
        $data["title"]   = "Product Review";
        $data['content'] = 'admin/review/review';
        return view("/admin/index",$data);
    }



}