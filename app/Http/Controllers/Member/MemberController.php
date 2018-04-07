<?php

namespace App\Http\Controllers\Member;
//require_once "app/Libraries/Midtrans/Veritrans.php";

use App\Models\Order;
use Auth;

use App\Libraries\Midtrans\Veritrans\Veritrans_config;
use App\Libraries\Midtrans\Veritrans\Veritrans_snap;

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
        

        //Set Your server key
        Veritrans_config::$serverKey = "SB-Mid-server-Dm1CF_T9nindmKVXLmzp4kou";
      
        // Uncomment for production environment
        // Veritrans_Config::$isProduction = true;

        // Enable sanitization
        Veritrans_config::$isSanitized = true;

        // Enable 3D-Secure
        Veritrans_config::$is3ds = true;

        // Required
        $transaction_details = array(
        'order_id' => rand(),
        'gross_amount' => 94000, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
        'id' => 'a1',
        'price' => 18000,
        'quantity' => 3,
        'name' => "Apple"
        );

        // Optional
        $item2_details = array(
        'id' => 'a2',
        'price' => 20000,
        'quantity' => 2,
        'name' => "Orange"
        );

        // Optional
        $item_details = array ($item1_details, $item2_details);

        // Optional
        $billing_address = array(
        'first_name'    => "Andri",
        'last_name'     => "Litani",
        'address'       => "Mangga 20",
        'city'          => "Jakarta",
        'postal_code'   => "16602",
        'phone'         => "081122334455",
        'country_code'  => 'IDN'
        );

        // Optional
        $shipping_address = array(
        'first_name'    => "Obet",
        'last_name'     => "Supriadi",
        'address'       => "Manggis 90",
        'city'          => "Jakarta",
        'postal_code'   => "16601",
        'phone'         => "08113366345",
        'country_code'  => 'IDN'
        );

        // Optional
        $customer_details = array(
        'first_name'    => "Andri",
        'last_name'     => "Litani",
        'email'         => "andri@litani.com",
        'phone'         => "081122334455",
        'billing_address'  => $billing_address,
        'shipping_address' => $shipping_address
        );

        // Optional, remove this to display all available payment methods
        $enable_payments = array('credit_card','cimb_clicks','mandiri_clickpay','echannel');

        // Fill transaction details
        $transaction = array(
        'enabled_payments' => $enable_payments,
        'transaction_details' => $transaction_details,
        'customer_details' => $customer_details,
        'item_details' => $item_details,
        );
        
        $snapToken = Veritrans_Snap::getSnapToken($transaction);
       // echo "snapToken = ".$snapToken;

        $order_id = $request->segment(2);
        $data["order"]        = $this->objOrder->get_order_byid($order_id);
        $data["order_detail"] = $this->objOrder->get_order_detail($order_id);
        $data["title"]   = "Order Detail";
        $data["snap_token"] = $snapToken;
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
