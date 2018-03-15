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

    function account()
    {
        $data["title"]   = "Account";
        return view('members/account',$data);
    }
     
    function detail_order(Request $request)
    {
        $order_id = $request->segment(2);
        $data["order"]        = $this->objOrder->get_order_byid($order_id);
        $data["order_detail"] = $this->objOrder->get_order_detail($order_id);
        $data["title"]   = "Order Detail";
        return view('members/orderdetail',$data);
    }

    function profile_edit_process(Request $request)
    {
        
    }

    function change_password_process()
    {

    }

    function change_email_process()
    {

    }

    function add_address_book_process()
    {

    }

    function delete_address_book_process()
    {
        
    }
}
