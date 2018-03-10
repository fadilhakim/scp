<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $objOrder;
    private $objUser;

    function __construct()
    {
      $this->objOrder = new Order();
      $this->objUser = new User();
    }

    public function index()
    {
      $data["order"]   = $this->objOrder->get_order();
      $data["title"]   = "Order";
      $data["content"] = "admin/order/order";
      
      return view("admin/index",$data);
    }

    function detail(Request $request)
    {
      $order_id = $request->segment(4);

      $data["order"]          = $this->objOrder->get_order_byid($order_id);
      $data["order_detail"]   = $this->objOrder->get_order_detail($order_id);
      $data["title"]   = "Order";
      $data["content"] = "admin/order/order_detail";
      
      return view("admin/index",$data);
    }

    function change_status(Request $request)
    {
      $arr["order_id"] = $request->input("order_id");
      $arr["status"]   = $request->input("status");

      $this->objOrder->change_status($arr);

      return "You Successfully update this Order into '$arr[status]' ";

      
    }

   
}
