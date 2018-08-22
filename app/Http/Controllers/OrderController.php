<?php

namespace App\Http\Controllers;

use App\Mail\OrderEmail;
use App\Models\Order;
use App\Models\AddressBook;
use App\Models\Product;

use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;
use Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $objOrder;
    private $objUserAddress;
    private $objProduct;

    function __construct()
    {
        $this->objOrder = new Order();
        $this->objProduct = new Product();
    }

    public function index()
    {
        //
      
      $this->$objOrder->test2();
      echo "<hr>";
      Order::test();
    }

    function shipping(){

        if( Cart::count() === 0){
            return redirect('cart')->with('error', 'Your Cart is empty');
        }
        // data cart
        $user_id = Auth::id();
        $this->objUserAddress = new AddressBook();
        //$product  = Product::detail_product(28);
        //$this->objOrder->test2();
        $data["user_address"] = $this->objUserAddress->get_address_by_user_id($user_id);
        $data["choose_address_book"] = $this->objUserAddress->last_address_book($user_id);
        //$data["Product"] = Product;
        //dd($data);
        //dd($product);
        return view("shipping",$data);

    }

    function shipping_update(Request $request){
        // print_r($request->all());
        // dd();
        /*
            Array
            (
                [_token] => r6hfkVDM7pyS8nBJejSQ9XfbZDgWLmjoc67kFJ6k
                [weight] => 2
                [destination] => 154
                [origin] => 154
                [user_address] => 2
                [coureer] => jne
                [delivery_type] => -- Type of delivery --
            )   

            $rowProduct = ["qty" => $qty[$i],  "options" => ["weight" => $weight, "shipping" => $dtRowCart->options->shipping ] ];
                Cart::update($rowid1, $rowProduct);
        */
            $weight        = $request->input("weight");
            $destination   = $request->input("destination"); // berubah 
            $origin        = $request->input("origin");
            $user_address  = $request->input("user_address");
            $coureer       = $request->input("coureer");  // berubah 
            $delivery_type = $request->input("delivery_type"); //berubah
            $dt = explode("&",$delivery_type);
            $delivery_type = $dt[0];
            $shipping_cost = $dt[1];
            // validasi 
            $validator = Validator::make($request->all(), [
                'weight'        => 'required',
                'destination'   => "required",
                'origin'        => 'required',
                'user_address'  => 'required',
                'coureer'       => 'required',
                'delivery_type' => 'required'
            ]);
    
            if(!$validator->fails())
            {
                 // ubah session('shipping_cost') dengan detail_cost() rajaongkir
                 $final_total = session("final_total") + $shipping_cost; 
                 session(["delivery_type"=>$delivery_type]);
                 session(["shipping_cost"=>$shipping_cost]);
                 session(["final_total"=>$final_total]);
                 session(["coureer"=>$coureer]);
                 session(["user_address"=>$user_address]);
                
                 echo "<div class='alert alert-success'> You Successfully Updated Shipping Cost </div>";
                 echo "<script> setTimeout(function(){ location.reload(); },3000); </script>";

            }else{
                
                 

            }
           
    }

    function checkout(Request $request)
    {
        /*$validator = Validator::make($request->all(), [
            'weight'        => 'required',
            'destination'   => "required",
            'origin'        => 'required',
            'user_address'  => 'required',
            'coureer'       => 'required',
            'delivery_type' => 'required'
        ]);*/
        $valid = false;

        $delivery_type = session("delivery_type");
        //$shipping_cost = session("shipping_cost");
        //echo $shipping_cost;
        $final_total   = session("final_total");
        $coureer       = session("coureer");
        $user_address  = session("user_address");
       
        if(!empty($delivery_type) && 
        !empty($final_total) && !empty($coureer) && 
        !empty($user_address)){
            $valid = true;
        }

        // check destination , coureer , delivery type terpilih atau tidak
        if(!empty(Cart::content()) && $valid)
        {
            // INSERT KE Order_tbl
            $order_id = $this->insert($request); 

            //redirect()->to("memberarea")->send();
            $user              = Auth::guard("user")->user();

            //$objDemo = new \stdClass();
            /* $objDemo->demo_one = 'Demo One Value';
            $objDemo->demo_two = 'Demo Two Value';
            $objDemo->sender   = 'SenderUserName';
            $objDemo->receiver = 'ReceiverUserName';*/
             // send email 
            //Mail::to([$user->email])->send(new OrderEmail($objDemo));
            // clear cart 
            Cart::destroy();

            session()->forget('voucher_code');
            session()->forget('voucher_nominal');
            session()->forget('voucher_type');
            session()->forget("total_weight");
            session()->forget("shipping_cost");
            session()->forget("final_total");

            // hapus semua bentuk session
            //$request->session()->flush();

            // untuk sementara redirect ke memberarea
            //redirect()->to("memberarea")->send();
            return redirect("detail_order/$order_id");
            //echo "success";
        }
        else
        {
            $err_text = "";
            if(empty($user_address)){
                $err_text .= " You must choose User Address ,";
            }
            if(empty($delivery_type)){
                $err_text .= " You must choose Type of Delivery ,";
            }
            if(empty($coureer)){
                $err_text .= " You must choose Coureer ,";
            }
            if(empty(Cart::content())){
                $err_text .= " You must choose the Product ,";
            }
        
            //echo "error";
            // untuk sementara redirect ke cart
            $err_el = " $err_text ";
            return redirect("shipping")->with("msg_shipping",$err_el);
            //return abort(404);
        }
       
    }

    private function insert($request)
    {
        if(!empty(Cart::content()))
        {
            $coureer            = session("coureer");


            $last_order_id      = $this->objOrder->get_last_order();
            $user               = Auth::guard("user")->user();

            $datetime           = date("Y-m-d H:i:s");
            $ip_address         = $request->ip();
            $user_agent         = $request->header('User-Agent');

            $total      = session("final_total");//Cart::total();
            $subtotal   = Cart::subtotal();
            $tax        = Cart::tax();

            $arr["created_at"]  = $datetime;
            $arr["ip_address"]  = $ip_address;
            $arr["user_agent"]  = $user_agent;

            $arr["voucher_code"] = !empty(session("voucher_code")) ? session("voucher_code") : "";
            $arr["voucher_type"] = !empty(session("voucher_type")) ? session("voucher_type") : "";
            $arr["voucher_nominal"] = !empty(session("voucher_nominal")) ? session("voucher_nominal") : 0;

            $arr["user_id"]     = $user->id;
            $arr["order_code"]  = $this->objOrder->generate_no_order($last_order_id);
            $arr["grand_total"] = floor($total);
            $arr["ongkir"]      = session("shipping_cost"); 
            $arr["subtotal"]    = $subtotal;
            //$arr["kurir"]       = "jne";
            $arr["total_berat"]   = session("total_weight");
            $arr["kurir_service"] = session("delivery_type"); // post
            $arr["tax"]           = $tax;
            $arr["purpose_bank"]  = "";
            $arr["status"]        = "unpaid";
            $arr["user_addtr_id"] = session("user_address");

            $q = $this->objOrder->insert_order($arr);
            $order_id = $q;

            foreach(Cart::content() as $row)
            {
                // and order detail
                $arr["qty"]         = $row->qty;
                $arr["price"]       = $row->price;
                $arr["subtotal"]    = $row->qty * $row->price;
                $arr["order_id"]    = $order_id;
                $arr["user_id"]     = $user->id;
                $arr["product_id"]  = $row->id;
                
                $this->objOrder->insert_order_detail($arr);
            }
            
            return $order_id;
            //echo "<div class='alert alert-success'> You Successfully Chec </div>";
            //echo "<script> setTimeout(function(){ location.reload(); },3000); </script>";
        }
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
