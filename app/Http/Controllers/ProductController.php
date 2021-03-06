<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\MarketPlace;
use App\Models\RingkasanProduct;
use App\Models\Review;

use App\Libraries\Alert;

class ProductController extends Controller
{
    private $objProduct;
    private $objMarket;


    function __construct()
    {
        $this->objProduct = new Product();
        $this->objMarket = new MarketPlace();
    }
    //
    function index()
    {
     	$data["product"] = Product::all_product();
        $data["popular"] = Product::get_popular_product();
        $data["category"] = Product::all_category();
        $data["brands"] = Product::get_brands();
        $data["title"]   = "Product List";
        $data['content'] = 'admin/product/product';
        return view("product",$data);
    }

    function detail($id,$category,$product_title)
    {
       
       	$data["product"] = Product::detail_product($id);
       	$data["related_product"] = Product::related_product($category);
        $data["image"] = Product::find_product_img($id);
        $data["category"] = Product::get_product_category($category);
        $data["brands"] = Product::get_brands();
        $data["mini_slide"] = Product::get_mini_slide($id);
        $data["market"] = MarketPlace::get_market_by_id_product($id);
        $data['ringkasan_product'] = RingkasanProduct::all_RingkasanProduct_by_product_id($id);
        $data['product_review'] = Review::get_all($id);
        $data["title"] = "Our Product";
        $data["content"] = "Product";
        return view("product_detail",$data);
    }

    function getCategory($category)
    {
       
        $data["category_product"] = Product::get_product_by_category($category);
        $data["category_name"] = Product::get_product_category($category);
        $data["category"] = Product::all_category();
        $data["popular"] = Product::get_popular_product();
        $data["brands"] = Product::get_brands();
        // dd($category);
        $data["title"]   = "Product List";
        $data['content'] = 'Product By Category';
        return view("product_by_category",$data);
    }

    function getBrand($brand)
    {
       
        $data["brand_product"] = Product::get_product_by_brand($brand);
        $data["brand_name"] = Product::get_product_brand($brand);
        $data["category"] = Product::all_category();
        $data["popular"] = Product::get_popular_product();
        $data["brands"] = Product::get_brands();
        // dd($category);
        $data["title"]   = "Product List";
        $data['content'] = 'Product By Brand';
        return view("product_by_brand",$data);
    }

    function product_highlight($product_title,$id)
    {

        return view("product_highlight");

    }
}