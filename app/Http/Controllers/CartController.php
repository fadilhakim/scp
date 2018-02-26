<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Libraries\Alert;

class CartController extends Controller
{
    private $objCart;
    private $objProduct;
    //
    function __construct()
    {
        $this->objProduct = new Product();
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

    function modal(Request $request)
    {
        return view("cart/modal",$data);
    }

    function add(Request $request)
    {

        // data peoduct
        $product_id = $request->segment(3);
       
        $product = $this->objProduct->detail_product($product_id);

        if(!empty($product))
        {
            $c["id"] = $product->product_id;
            $c["name"] = $product->product_title;
            $c["qty"] = 1;
            $c["price"] = $product->price;
             //$a = Cart::instance('shopping')->add('192ao14', 'Product 14', 1, 9.99);
            $a = Cart::add($c);

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
            Cart::remove($rowid);

            // pesan

            redirect()->to("cart")->send();
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
