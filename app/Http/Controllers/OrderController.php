<?php

namespace App\Http\Controllers;

use App\Mail\OrderEmail;
use App\Models\Order;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $objOrder;
    function __construct()
    {
        $this->objOrder = new Order();
    }

    public function index()
    {
        //
      
      $this->$objOrder->test2();
      echo "<hr>";
      Order::test();
    }

    function checkout(Request $request)
    {
        //return view("checkout");
      
        if(!empty(Cart::content()))
        {
            if(!empty(Cart::content()))
            {
                $user               = Auth::guard("user")->user();

                $datetime           = date("Y-m-d H:i:s");
                $ip_address         = $request->ip();
                $user_agent         = $request->header('User-Agent');

                $total      = Cart::total();
                $subtotal   = Cart::subtotal();
                $tax        = Cart::tax();

                $arr["created_at"]  = $datetime;
                $arr["ip_address"]  = $ip_address;
                $arr["user_agent"]  = $user_agent;

                $arr["user_id"]     = $user->id;
                $arr["grand_total"] = floor($total);
                $arr["subtotal"]    = $subtotal;
                //$arr["kurir"]       = "jne";
                $arr["total_berat"] = 0;
                $arr["kurir_service"] = "";
                $arr["tax"]           = $tax;
                $arr["purpose_bank"]  = "";
                $arr["status"]        = "unpaid";
                $arr["user_addtr_id"] = 0;
                $arr["ongkir"]        = 0;

                $q = $this->objOrder->insert_order($arr);
                $order_id = $q;

                foreach(Cart::content() as $row)
                {
                    // and order detail
                    $arr["qty"]         = $row->qty;
                    $arr["price"]       = $row->price;
                    $arr["subtotal"]    = $row->qty * $row->qty;
                    $arr["order_id"]    = $order_id;
                    $arr["user_id"]     = $user->id;
                    $arr["product_id"]  = $row->id;
                    
                    $this->objOrder->insert_order_detail($arr);
                }
            }

            redirect()->to("memberarea")->send();

            $objDemo = new \stdClass();
            /* $objDemo->demo_one = 'Demo One Value';
            $objDemo->demo_two = 'Demo Two Value';
            $objDemo->sender   = 'SenderUserName';
            $objDemo->receiver = 'ReceiverUserName';*/
             // send email 
            Mail::to(["fadil.nylon@gmail.com","ariesdimasy@gmail.com"])->send(new OrderEmail($objDemo));
            
            // clear cart 
            Cart::destroy();

            // untuk sementara redirect ke memberarea
            redirect()->to("memberarea")->send();
        }
        else
        {
            // untuk sementara redirect ke memberarea
            redirect()->to("cart")->send();
        }
       
    }

    function insert(Request $request)
    {

        /* if(!empty(Cart::content()))
        {
            $user               = Auth::guard("user")->user();

            $datetime           = date("Y-m-d H:i:s");
            $ip_address         = $request->ip();
            $user_agent         = $request->header('User-Agent');

            $arr["datetime"]    = $datetime;
            $arr["ip_address"]  = $ip_address;
            $arr["user_agent"]  = $user_agent;

            $arr["user_id"]     = $user->id;
            $arr["grand_total"] = Cart::total();
            $arr["subtotal"]    = Cart::subtotal();
            $arr["kurir"]       = "";
            $arr["total_berat"] = "";
            $arr["kurir_service"] = "";
            $arr["tax"]         = Cart::tax();
            $arr["purpose_bank"] = "";
            $arr["status"]      = "unpaid";
            $arr["user_addtr_id"] = "";

            $q = $this->$objOrder->insert_order($arr);
            $order_id = $q;

            foreach(Cart::content() as $row)
            {
                // and order detail
                $arr["qty"]         = $row->qty;
                $arr["price"]       = $row->price;
                $arr["subtotal"]    = $row->qty * $row->qty;
                $arr["order_id"]    = $order_id;
                $arr["user_id"]     = $user->id;
                $arr["product_id"]  = $row->id;
                
                $this->$objOrder->insert_order_detail($arr);
            }
        }*/
    }

    function user_form_checkout()
    {
        $data["title"]   = "Login Checkout";
        return view('auth/user_form_checkout',$data);
    }
}
