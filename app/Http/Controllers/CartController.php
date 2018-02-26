<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

use App\Models\Product;

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

            redirect("cart");
            //return view("cart/modal_info");
            //dd($a);
        }
       
      
    }

    function update(Request $request)
    {
        dd($request->all());
    }

    function delete(Request $request)
    {
        $rowid = $request->segment(3);
        if(!empty($rowid))
        {
            Cart::remove($rowid);

            // pesan

            header("location:".url("cart"));
        }
        else
        {
            header("location:".url("cart"));
        }
    }

    function destroy()
    {
        Cart::destroy();
    }
}
