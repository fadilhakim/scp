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
        $id            = $request->input("id");
        $status               = $request->input("status");
   
        $arr = array(
                    "id"     => $id,
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
        $model                = $request->input("model");
        $buy_date             = $request->input("buy_date");
        $no_imei_1            = $request->input("no_imei_1");
        $no_imei_2            = $request->input("no_imei_2");
        $customer_email       = $request->input("customer_email");
        $customer_name        = $request->input("customer_name");
        $customer_phone       = $request->input("customer_phone");
        $customer_address       = $request->input("customer_address");
        $status               = "on progress";

        $arr = array(
            "model"      => $model,
            "buy_date"   => $buy_date,
            'no_imei_1'  => $no_imei_1,
            "no_imei_2"  => $no_imei_2,
            "customer_email"  => $customer_email,
            "customer_name"  => $customer_name,
            "customer_phone"  => $customer_phone,
            "customer_address"  => $customer_address,
            "status"  => $status,
        );

        $this->objWarranty->insert_warranty_user($arr);
        echo "<script> confirm('thank you for you submit'); </script>";
        return Redirect::back();
        
    }

}