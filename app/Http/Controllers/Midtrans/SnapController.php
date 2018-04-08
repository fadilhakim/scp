<?php

namespace App\Http\Controllers\Midtrans;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Libraries\Alert;

class SnapController extends Controller
{
    private $objOrder;

    function __construct()
    {
        $this->objOrder = new Order();
    }
    //
    function finish(Request $request)
    {
        $response_text = $request->input("response_text");

        if($response_text == "success")
        {
            // ubah status order menjadi onprocess
            $this->objOrder->change_status("onprocess");
            // redirect ke http://localhost/scp/memberarea
            return json_encode(array(
                "redirect"=>"http://localhost/scp/memberarea",
                "response"=>"payment on process"
            ));
        }
        else if($response_text == "waiting") 
        {

        }
        else if($response_text == "error")
        {

        }


    }
}
