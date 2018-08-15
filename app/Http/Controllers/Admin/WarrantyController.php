<?php
namespace App\Http\Controllers\Admin;

use App\Models\Warranty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Libraries\Alert;
use Validator;

class WarrantyController extends Controller
{
    private $objWarranty;
    function __construct()
    {
        $this->objWarranty = new Warranty();
    }

    function index()
    {
     	$data["warranty"] = Warranty::all_warranty()->get();
        $data["title"]   = "Product Warranty";
        $data['content'] = 'admin/warranty/warranty';
        return view("/admin/index",$data);
    }

    function modal_warranty_update(Request $request)
    {
        
        $warranty_id = $request->input("warranty_id");
        //dd($warranty_id);
        $data["warranty"] = Warranty::detail_warranty($warranty_id);
        return view("admin/warranty/modal_detail_warranty",$data);
        //return "res";
    }

    function modal_warranty_update_process(Request $request)
    {
        $warranty_id            = $request->input("warranty_id");
        $status               = $request->input("status");
   
        $arr = array(
                    "warranty_id"     => $warranty_id,
                    'status'        => $status
                );
        $this->objWarranty->update_warranty($arr);

        echo Alert::success("You successfully Update Warranty");
        echo "<script> setTimeout(function(){ location.reload(); },2000); </script>";
        
    }

    function modal_warranty_delete(Request $request)
    {
        $warranty_id = $request->input("warranty_id");
        $data["warranty"] = Warranty::detail_warranty($warranty_id);
        return view("admin/warranty/modal_warranty_delete",$data);
    }

    function warranty_delete_process(Request $request)
    {
        $warranty_id         = $request->input("warranty_id");

        $this->objWarranty->delete_warranty($warranty_id);

        echo Alert::success("You successfully Delete Warranty Product");
        echo "<script> setTimeout(function(){ location.reload(); },3000); </script>";
    }

    function warranty_submit_process(Request $request)
    {
        $product_id           = $request->input("product_id");
        $user_id              = $request->input("user_id");
        $warranty_text          = $request->input("warranty_text");
        $status               = 0;

        $arr = array(
                    "product_id"    => $product_id,
                    "warranty_text"   => $warranty_text,
                    'status'        => $status,
                    "user_id"       => $user_id
                );
        $this->objWarranty->insert_warranty_user($arr);

        return Redirect::back();
        
    }

}