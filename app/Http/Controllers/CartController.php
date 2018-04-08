<?php
namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Voucher; // coupon
use App\Models\Order;
use App\Libraries\Alert;
use Auth;
use Validator;

class CartController extends Controller
{
    private $objCart;
    private $objProduct;
    //
    function __construct()
    {
        $this->objProduct = new Product();
        $this->objVoucher = new Voucher();
    }

    function index()
    {
        return view('cart');
    }

    function content()
    {
        $aa = Cart::content();
        dd($aa);
        //$a = Cart::instance('shopping')->content();
        //dd($a);
      
    }

    function update_coupon(Request $request)
    {
        $this->objOrder = new Order();

        $coupon_code = $request->input("coupon_code");

        // $aa = Cart::content();
        // dd($aa);

        $validator = Validator::make($request->all(), [
            'coupon_code'   => 'required',
        ]);
        
        $user = Auth::guard("user")->user();
            
        // check coupon
        $check_voucher = $this->objVoucher->check_voucher($coupon_code);
        $check_voucher_user = $this->objOrder->check_voucher_user($coupon_code,$user["user_id"]);
        $cart_count = Cart::count();

        if(!$validator->fails() && !empty($check_voucher) && empty($check_voucher_user) && !empty($user) && $cart_count > 0)
        {
           //fetch array coupon
           $voucher_detail = $this->objVoucher->detail_voucher($coupon_code);

            $grand_total = Cart::total();
            //insert coupon on session
            session(['voucher_code' => $coupon_code]);
            session(["voucher_type"=>$voucher_detail->type]);
           
            if($voucher_detail->type == "discount")
            {
                $final_total = $grand_total - ($grand_total * ( $voucher_detail->discount / 100 ));
                session(["voucher_nominal"=>$grand_total * ( $voucher_detail->discount / 100)]);
                
            }
            else if($voucher_detail->type == "cashback")
            {
                $final_total = $grand_total - $voucher_detail->cashback;
                session(["voucher_nominal"=> $grand_total - $voucher_detail->cashback]);
            }

            //dd($grand_total." <br> ".$grand_total * ( $voucher_detail->discount / 100) ."<br>".$final_total);

            // insert final total
            session(["final_total" => $final_total]);

            echo Alert::success("You successfully Add Coupon");
            echo "<script> setTimeout(function(){ location.reload(); },3000); </script>";
        }
        else
        {
            $errors = $validator->errors();
           
            $err_text = "";
            if(empty($check_voucher))
            {
                $err_text .= "<li> No Valid Coupon Code </li>";
            }
            if(!empty($check_voucher_user))
            {
                $err_text .= "<li> Coupon Code already used </li>";
            }
            if(empty($user))
            {
                $err_text .= "<li> You Must Login to used Coupon Code </li>";
            }
            if($cart_count <= 0)
            {
                $err_text .= "<li> You Must Order product first </li>";
            }
            foreach($errors->all() as $err) 
            {
                $err_text .=  "<li> $err </li>";
            }

            echo Alert::danger($err_text);
        }

        //dd($request->all());
    }

    function modal(Request $request)
    {
        return view("cart/modal",$data);
    }

    function add(Request $request)
    {

        // data peoduct
        $product_id = $request->segment(3);
       
        $product = $this->objProduct->detail_product($product_id);
        $firstImg = $this->objProduct->get_first_image($product_id);
        //dd($firstImg->image_name);
        $img = $firstImg->image_name;
        if(!empty($product))
        {
            $c["id"] = $product->product_id;
            $c["name"] = $product->product_title;
            $c["qty"] = 1;

            $c["price"] = $product->price;
            $c["options"] = ['image' => $img];
            //$a = Cart::instance('shopping')->add('192ao14', 'Product 14', 1, 9.99);
            $a = Cart::add($c);
            //Cart::add($product->product_id,$product->product_title,1,$product->price);
            // final_total
            session(["final_total"=>Cart::total()]); // kok ::subtotal() ? 

            redirect()->to("cart")->send();
            //return view("cart/modal_info");
            //dd($a);
        }
       
      
    }

    function update(Request $request)
    {
       
        $rowId = $request->input("rowid-input");
        $qty   = $request->input("qty-input");

        $count = count($rowId);
        
        if(!empty($rowId))
        {
            for($i=0; $i<=$count-1; $i++)
            {
                $rowid1 = $rowId[$i];

                Cart::update($rowid1, $qty[$i]); // Will update the quantity
            }

            // final_total
            session(["final_total"=>Cart::subtotal()]);

            echo "<div class='alert alert-success'> You sucessfully updated cart </div>";
            echo "<script> setTimeout(function(){ location.reload(); },3000); </script>";
        }
        else
        {
            echo "<div  class='alert alert-danger'> You cart is empty </div>";
            echo "<script> setTimeout(function(){ location.reload(); },3000); </script>";
        }
        //redirect()->to("cart")->send();

        
    }

    function delete(Request $request)
    {
        $rowid = $request->segment(3);
        if(!empty($rowid))
        {
           
            $find =  Cart::get($rowid);

            if(!empty($find))
            {
                Cart::remove($rowid);

                // final_total
                session(["final_total"=>Cart::subtotal()]);

                redirect()->to("cart")->send();
            }
            else
            {
                redirect()->to("cart")->send();
            }
        }
        else
        {
            redirect()->to("cart")->send();
        }
    }

    function destroy()
    {
        Cart::destroy();
    }
}
