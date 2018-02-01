<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    protected $table = "product_tbl";
    public $primaryKey = "product_id";
    public $incrementing = TRUE;
    //protected $keyType = "";
    public $timestamps = TRUE;
    protected $fillable = [
        'product_title',"product_availability","product_categoty",
        "product_subcategory","status","price","old_price","stock",
        "weight","product_description","status",
        "created_at","ip_address","user_agent"
    ];
    
    function __construct()
    {
        
    }
    //
    static function all_product()
    {
       
        $product = DB::table("product_tbl")->get();
        return $product;
    }
    
    function detail_product($product_id)
    {

    }

    function test()
    {
        echo "test";
    }

    public function insert_product($arr)
    {
        $product_title      = $arr["product_title"];
        $product_description= $arr["product_description"]; 
        $product_availability = $arr["product_availability"];
        $status             = $arr["status"];
        $category           = $arr["category"];
        $subcategory        = $arr["subcategory"];
        $old_price          = $arr["stock"];
        $price              = $arr["price"];
        $stock              = $arr["stock"];
        $weight             = $arr["weight"];

        $datetime           = $arr["created_at"];
        $ip_address         = $arr["ip_address"];
        $user_agent         = $arr["user_agent"];

        DB::table('product_tbl')->insert([
            'product_title' => $product_title, 
            'product_description' => $product_description,
            "product_category"=>$category,
            "product_subcategory"=>$subcategory,
            "product_availability"=>$product_availability,
            "status"=>$status,
            "price"=>$price,
            "old_price"=>$old_price,
            "stock"=>$stock,
            "weight"=>$weight,
            "created_at"=>$datetime,
            "ip_address"=>$ip_address,
            "user_agent"=>$user_agent
        ]);
    }

}
