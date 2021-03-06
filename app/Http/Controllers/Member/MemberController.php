<?php

namespace App\Http\Controllers\Member;
//require_once "app/Libraries/Midtrans/Veritrans.php";

use App\Models\Order;
use App\Models\Product;
use App\Models\AddressBook;
use App\Models\User;
use Auth;
use Validator;


use App\Libraries\Alert;
use App\Libraries\Midtrans\Veritrans\Veritrans_config;
use App\Libraries\Midtrans\Veritrans\Veritrans_Snap;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class MemberController extends Controller
{
    private $objOrder;
    //
    function __construct()
    {
        $this->objOrder = new Order();
        $this->objProduct = new Product();
        $this->objAddress = new AddressBook();
        $this->objUser = new User();
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
        $session =  Auth::guard("user")->user();
        if(!empty($session))
        {
            $name_session = $session->name;
            $userId = $session->id;
        }

        $data["title"]   = "Account";
        $data['user_id'] = "";

        $data["address"] = $this->objAddress->get_address_by_user_id($userId);
        $data["user"] = $this->objUser->detail_user($userId);
        return view('members/account',$data);
    }
     
    function detail_order(Request $request)
    {
        $order_id = $request->segment(2);

        //Set Your server key
        Veritrans_config::$serverKey = "SB-Mid-server-Dm1CF_T9nindmKVXLmzp4kou";
      
        // Uncomment for production environment
        //Veritrans_Config::$isProduction = true;

        // Enable sanitization
        Veritrans_config::$isSanitized = true;

        // Enable 3D-Secure
        Veritrans_config::$is3ds = true;

        $order_dt           = $this->objOrder-> get_order_byid($order_id); 
        $order_detail_dt    = $this->objOrder->get_order_detail($order_id);

        //dd($order_detail_dt);

        // Required
        $transaction_details = array(
            'order_id'      => $order_dt->order_code,
            'gross_amount'  => $order_dt->grand_total, // no decimal allowed for creditcard
        );

        foreach($order_detail_dt as $order_detail)
        {
            $product_dt = $this->objProduct->detail_product($order_detail->product_id);
            //dd($product_dt);
            if($product_dt !== null)
            {
                $item_details[] =  array(
                    'id' => $order_detail->product_id,
                    'price' => $order_detail->price,
                    'quantity' => $order_detail->qty,
                    'name' => $product_dt->product_title
                );
            }else
            {
                $item_details[] =  array(
                    'id' => "",
                    'price' => "",
                    'quantity' => "",
                    'name' => ""
                );
            }
           
        }    

        if(!empty($order_dt->voucher_nominal))
        {
            $dtid = $order_dt->voucher_code.date("Ymd").$order_dt->order_id;
            $item_details[] =  array(
                'id' => $dtid,
                'price' => $order_dt->voucher_nominal * -1,
                'quantity' => 1,
                'name' => $order_dt->voucher_type
            ); 
        }

        if(!empty($order_dt->tax))
        {
            $dtid = "TAX".date("Ymd").$order_dt->order_id;
            $item_details[] =  array(
                'id' => $dtid,
                'price' => $order_dt->tax,
                'quantity' => 1,
                'name' => "TAX"
            ); 
        }

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

        try {
            // Validate the value...
            $snapToken = Veritrans_Snap::getSnapToken($transaction);
        } catch (Exception $e) {
            report($e);
    
            return false;
        }
     

        
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
        // print_r($request->all());
        /*
            Array ( [name] => Aries Dimas Yudhistira 
            [_token] => dprilMj9JBbWCwfzrT3Za8oAnxNiW4DLDINTux7V 
            [email] => alhusna901@gmail.com 
            [phone_no] => ) 
        */
        $name     = $request->input("name",true);
        $email    = $request->input("email",true);
        $phone_no = $request->input("phone_no",true);

        $validator = Validator::make($request->all(), [
            'name'     => 'required|max:255',
            'email'    => 'required|email',
            'phone_no' => 'required' 
        ]);

        if ($validator->fails()) {
            // return redirect('post/create')
            //             ->withErrors($validator)
            //             ->withInput();
            //print("fail");
            $errors = $validator->errors();
            $err_text = "";
            foreach($errors->all() as $err) 
            {
                $err_text .=  "<li> $err </li>";
            }

            echo Alert::danger($err_text);
        }else{

            $data["name"] = $name;
            $data["email"] = $email;
            $data["phone_no"] = $phone_no; 

            session(["user"=>["name" => $name]]);
            session(["user"=>["email" => $email]]);
            session(["user"=>["phone_no" => $phone_no]]);

            $this->objUser->change_profile($data);
            echo Alert::success("You Successfully update your profile");

        }

    }

    function change_password_process(Request $request)
    {
        $session =  Auth::guard("user")->user();
        $email = $session->email;

        $old_password = $request->input("old_password");
        $new_password = $request->input("new_password");
        $new_password_confirmation = $request->input("new_password_confirmation");

        $validator = Validator::make($request->all(), [
            'old_password'               => 'required',
            'new_password'               => 'required|confirmed',
            'new_password_confirmation'  => 'required' 
        ]);

        if ($validator->fails()) {
            // return redirect('post/create')
            //             ->withErrors($validator)
            //             ->withInput();
            //print("fail");
            $errors = $validator->errors();
            $err_text = "";
            foreach($errors->all() as $err) 
            {
                $err_text .=  "<li> $err </li>";
            }

            echo Alert::danger($err_text);
        }else{
            // jika password dari database salah 
            $data["email"]        = $email;
            $data["password"]     = Hash::make($new_password);
            $data["old_password"] = $old_password; //Hash::make($old_password);

            //dd(Hash::make($old_password));

            $checkPass = $this->objUser->check_user_password($data); 

            if($checkPass){
                $this->objUser->change_password($data);
                echo Alert::success("You Successfully update your Password");
            }else{

                echo Alert::danger("Your password is wrong");
            }

        }


    }

    function change_email_process(Request $request)
    {
       
    }

}
