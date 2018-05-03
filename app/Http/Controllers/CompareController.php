<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CompareController extends Controller
{
    private $objProduct;
    //
    function __construct()
    {
        $this->objProduct = new Product();
    }

    function index()
    {
        
        $compares = session("product_compare");
       
        if(!empty($compares))
        {
            if(!empty($compares[0]))
            {
                //echo $compares[0]; exit;
                $data["compare1"] = $this->objProduct->get_specification($compares[0]);
                $data["product1"] = $this->objProduct-> detail_product($compares[0]);
                //var_dump($data["compare1"]);exit;
            }
            if(!empty($compares[1]))
            {
                $data["compare2"] = $this->objProduct->get_specification($compares[1]);
            }
            if(!empty($compares[2]))
            {
                $data["compare3"] = $this->objProduct->get_specification($compares[2]);
            }
        }
        else
        {
            $data["compare1"] = "";
            $data["compare2"] = "";
            $data["compare3"] = "";
        }
        
        
        return view("compare/compare",$data);
    }

    function compare_modal(Request $request)
    {
        // masukkan product ke session
        $msg = "";
        $product_id = $request->input("product_id");
        //https://laravel.com/docs/5.6/session
        
        if(!$request->session()->has('product_compare'))
        {
            session(["product_compare"=>array()]);
            $request->session()->push("product_compare",$product_id);
            $msg = "You successfully added new product to compare";
        }
        else
        {
            $product_compare = $request->session()->get('product_compare');
            $is_push = true;
            if(count($product_compare) < 3)
            {
                foreach($product_compare as $row)
                {
                    if($row === $product_id)
                    {
                        $is_push = false;
                        break;
                    }
                    
                }

                if($is_push)
                {
                    $request->session()->push("product_compare",$product_id);
                    $msg = "You successfully added new product to compare";
                }
            }
            else
            {
                $msg = "<div class='alert alert-danger'> You already have 3 products to compare </div>";
            }
        }
       
       
        //print_r($product_compare);
        // passing data ke view 
        $data = array();
        return view("compare/compare_modal",$data);
    }

    function view_session(Request $request)
    {
        echo "hei";
        $product_compare = $request->session()->get('product_compare');
        print_r($product_compare);
    }

    function compare_process(Request $request)
    {   
       
        // masukan data kedalam view 
        // spesification1, spesification2,  spesification3

        header("location:".base_url("compare"));
    }
}
