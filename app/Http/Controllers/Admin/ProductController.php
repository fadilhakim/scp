<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;

class ProductController extends Controller
{
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
       
        $data["category"] = Category::all_category();
        $data["subcategory"] = Subcategory::all_subcategory();
        //echo "iam here";
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
        return view("admin/product/modal_product_update",$data);
    }
}
