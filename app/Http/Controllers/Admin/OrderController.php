<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {

    }

    public function index()
    {
      $data["order"]   = array();
      $data["title"]   = "order";
      $data["content"] = "admin/order/order";
      return view("admin/index",$data);
    }

   
}
