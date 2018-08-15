<?php
namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

    function modal_review_update(Request $request)
    {
        
        $review_id = $request->input("review_id");
        //dd($review_id);
        $data["review"] = Review::detail_review($review_id);
        return view("admin/review/modal_detail_review",$data);
        //return "res";
    }

    function modal_review_update_process(Request $request)
    {
        $review_id            = $request->input("review_id");
        $status               = $request->input("status");
   
        $arr = array(
                    "review_id"     => $review_id,
                    'status'        => $status
                );
        $this->objReview->update_review($arr);

        echo Alert::success("You successfully Update Review");
        echo "<script> setTimeout(function(){ location.reload(); },2000); </script>";
        
    }

    function modal_review_delete(Request $request)
    {
        $review_id = $request->input("review_id");
        $data["review"] = Review::detail_review($review_id);
        return view("admin/review/modal_review_delete",$data);
    }

    function review_delete_process(Request $request)
    {
        $review_id         = $request->input("review_id");

        $this->objReview->delete_review($review_id);

        echo Alert::success("You successfully Delete Review Product");
        echo "<script> setTimeout(function(){ location.reload(); },3000); </script>";
    }

    function review_submit_process(Request $request)
    {
        $product_id           = $request->input("product_id");
        $user_id              = $request->input("user_id");
        $review_text          = $request->input("review_text");
        $status               = 0;

        $arr = array(
                    "product_id"    => $product_id,
                    "review_text"   => $review_text,
                    'status'        => $status,
                    "user_id"       => $user_id
                );
        $this->objReview->insert_review_user($arr);

        return Redirect::back();
        
    }

}