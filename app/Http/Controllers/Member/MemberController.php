<?php

namespace App\Http\Controllers\Member;

use App\Models\Order;
use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    private $objOrder;
    //
    function __construct()
    {
        $this->objOrder = new Order();
    }

    function index()
    {
        $user = Auth::guard("user")->user();
       

        $data["order"]   = $this->objOrder->get_order_user($user["id"]);
    	$data["title"]   = "Member Area";
        return view('members/generalinfo',$data);
    }

    function detail_order()
    {
        $data["title"]   = "Order Detail";
        return view('members/orderdetail',$data);
    }
}
