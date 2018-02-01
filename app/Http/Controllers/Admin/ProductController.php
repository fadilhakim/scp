<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

use App\Libraries\Alert;

class ProductController extends Controller
{
    private $objProduct;

    function __construct()
    {
        $this->objProduct = new Product();
    }
    //
    function index()
    {
        $data["product"] = Product::all_product();
        $data["title"]   = "Product";
        $data['content'] = 'admin/product/product';
        return view("admin/index",$data);
    }

    function detail()
    {
        $data["title"] = "";
        $data["content"] = "admin/product/detail";
        
        return view("admin/index",$data);
    }

    function modal_product_insert()
    {
       
        $data["category"] = $category = Category::all_category();
        $data["subcategory"] = $subcategory = Subcategory::all_subcategory();
      
        return view("admin/product/modal_product_insert",$data);
    }

    function modal_product_update(Request $request)
    {
        $product_id = $request->input("product_id");

        $data["category"] = array();
        $data["subcategory"] = array();
        return view("admin/product/modal_product_update",$data);
    }

    function modal_product_delete()
    {
        return view("admin/product/modal_product_delete",$data);
    }

    function product_insert_process(Request $request)
    {
        $product_title      = $request->input("product_title");
        $product_description= $request->input("product_description"); 
        $product_availability= $request->input("product_availability"); 
        $status             = $request->input("status");
        $category           = $request->input("category");
        $subcategory        = $request->input("subcategory");
        $old_price          = $request->input("stock",0);
        $price              = $request->input("price",0);
        $stock              = $request->input("stock",0);
        $weight             = $request->input("weight",0);

        $datetime           = date("Y-m-d H:i:s");
        $ip_address         = $request->ip();
        $user_agent         = $request->header('User-Agent');
       

        $validator = Validator::make($request->all(), [
            'product_title'         => 'required|unique:product_tbl|max:255',
            'product_description'   => 'required|min:10',
            'category'              => 'required',
            'subcategory'           => 'required',
            'price'                 => 'required|integer',
            'old_price'             => 'nullable|integer',
            'stock'                 => 'nullable|integer',
            "weight"                => "nullable|integer"
        ]);

        if(!$validator->fails())
        {
            $arr = array(
                'product_title' => $product_title, 
                'product_description' => $product_description,
                "product_availability"=>$product_availability,
                "status"=>$status,
                "category"=>$category,
                "subcategory"=>$subcategory,
                "price"=>$price,
                "old_price"=>$old_price,
                "stock"=>$stock,
                "weight"=>$weight,
                "created_at"=>$datetime,
                "ip_address"=>$ip_address,
                "user_agent"=>$user_agent
            );

            $this->objProduct->insert_product($arr);

            echo Alert::success("You successfully Insert new Product");
            echo "<script> alert('hei'); setTimeout(function(){ location.reload(); },3000); </script>";


        }else
        {
            $errors = $validator->errors();
           
            $err_text = "";
            foreach($errors->all() as $err) 
            {
                $err_text .=  "<li> $err </li>";
            }

            echo Alert::danger($err_text);
        }

    }


}
