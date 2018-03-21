<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Midtrans;
use App\Libraries\Alert;
use Validator;

class MidtransController extends Controller
{
    private $objMidtrans;

    function __construct()
    {
        $this->objMidtrans = new Midtrans();
    }
    //
    function index()
    {
        $data["midtrans"] = $this->objMidtrans->check_midtrans();
        $data["title"]   = "Midtrans";
        $data['content'] = 'admin/midtrans/midtrans';
        return view("/admin/index",$data);
    }

    function update_process(Request $request)
    {
        //dd($request->all());
        /* array:11 [
        "midtrans_id" => null
        "production_server_key" => null
        "production_client_key" => null
        "sandbox_server_key" => null
        "sandbox_client_key" => null
        "production_javascript_link" => null
        "sandbox_javascript_link" => null
        "_token" => "6hPpw2D8YCrnwxOp4VBaV3IVuJmBtUjdKwseF9Fe"
        "payment_method" => null
        "active_production_version" => "on"
        "active_midtrans" => "on"
        ]*/

        $midtrans_id            = $request->input("midtrans_id");
        $production_server_key  = $request->input("production_server_key");
        $production_client_key  = $request->input("production_client_key");
        $sandbox_server_key     = $request->input("sandbox_server_key");
        $sandbox_client_key     = $request->input("sandbox_client_key");
        $production_javascript_link = $request->input("production_javascript_link");
        $sandbox_javascript_link = $request->input("sandbox_javascript_link");
        $payment_method         = $request->input("payment_method");
        $active_production_version = $request->input("active_production_version");
        $active_midtrans        = $request->input("active_midtrans");
        
        $midtrans_id               = !empty($midtrans_id) ? $midtrans_id : 0;   
        $active_production_version = !empty($active_production_version) ? 1 : 0;
        $active_midtrans           = !empty($active_midtrans) ? 1 : 0;

        $validator = Validator::make($request->all(), [
            'production_server_key'      => 'required',
            'production_client_key'      => 'required',
            'sandbox_server_key'         => 'required',
            "sandbox_client_key"         => "required",
            "production_javascript_link" => "required",
            "sandbox_javascript_link"    => "required",
            "payment_method"             => "required"
        ]);

        if(!$validator->fails())
        {
            $arr["midtrans_id"] = $midtrans_id;
            $arr["production_server_key"] = $production_server_key;
            $arr["production_client_key"] = $production_client_key;
            $arr["sandbox_server_key"]    = $sandbox_server_key;
            $arr["sandbox_client_key"]    = $sandbox_client_key;
            $arr["production_javascript_link"] = $production_javascript_link;
            $arr["sandbox_javascript_link"] = $sandbox_javascript_link;
            $arr["payment_method"]          = $payment_method;
            $arr["active_production_version"] = $active_production_version;
            $arr["active_midtrans"]         = $active_midtrans;

            if(!empty($midtrans_id))
            {
                $this->objMidtrans->update_process($arr);
            }
            else
            {
                $this->objMidtrans->insert_process($arr);
            }

            Alert::success("You Successfully Updated Midtrans Setting");

        }
        else
        {
            $errors = $validator->errors();
           
            $err_text = "";
         
            foreach($errors->all() as $err) 
            {
                $err_text .=  "<li> $err </li>";
            }

            echo Alert::danger($err_text);
        }

    }
}
