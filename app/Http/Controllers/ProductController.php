<?php

namespace App\Http\Controllers;

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
        $data["title"]   = "Product List";
        $data['content'] = 'admin/product/product';
        return view("product",$data);
    }

    function detail($id,$category,$product_title)
    {
       
       	$data["product"] = Product::detail_product($id);
       	$data["related_product"] = Product::related_product($catagory);
        $data["title"] = "Our Product";
        $data["content"] = "Product";
        return view("product_detail",$data);
    }
}