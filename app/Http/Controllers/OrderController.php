<?php

namespace App\Http\Controllers;

use App\Order;
use Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
      $objOrder = new Order;
      $objOrder->test2();
      echo "<hr>";
      Order::test();
    }

    function checkout()
    {
        return view("checkout");
    }

    function insert()
    {
        if(!empty(Cart::content()))
        {
            foreach(Cart::content() as $row)
            {
                
            }
        }
    }
}
