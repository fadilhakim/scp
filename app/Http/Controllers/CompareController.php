<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompareController extends Controller
{
    //
    function __contruct()
    {

    }

    function index()
    {
        $data = array();
        return view("compare/compare",$data);
    }

    function compare_modal(Request $request)
    {
        // masukkan product ke session
        $product_id = $request->input("product_id");
        //https://laravel.com/docs/5.6/session
        
        if(!$request->session()->has('product_compare'))
        {
            session(["product_compare"=>array()]);
            $request->session()->push("product_compare",$product_id);
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
                }
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
