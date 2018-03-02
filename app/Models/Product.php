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

        'product_id','product_title',"product_availability","product_categoty",

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

    

    static function detail_product($id)

    {

        $product = DB::table('product_tbl')->where('product_id',$id)->first();

        return $product;

    }



    static function related_product($category)

    {

        $product = DB::table('product_tbl')->where('product_category',$category)->get();

        return $product;

    }



    public function insert_product_image($arr)

    {

        DB::table("product_image_tbl")->insert([

            "product_id"=>$arr["product_id"],

            "image_name"=>$arr["image_name"],

            "image_field"=>$arr["image_field"],

            "ip_address"=>$arr["ip_address"],

            "user_agent"=>$arr["user_agent"],

            "created_at"=>$arr["datetime"]

        ]);

    }



    function update_product_image($arr)

    {

        DB::table("product_image_tbl")

        ->where('product_id', $arr["product_id"])

        ->where('image_field', $arr["image_field"])

        ->update([

            "image_name"=>$arr["image_name"],

            "ip_address"=>$arr["ip_address"],

            "user_agent"=>$arr["user_agent"]

        ]);

    }



    public function list_photo_product($product_id)

    {

        return DB::table("product_image_tbl")->where("product_id",$product_id)->get();

    }



    public function detail_photo_product($product_id,$image_field)

    {

        return DB::table("product_image_tbl")

        ->where("product_id",$product_id)

        ->where("image_field",$image_field)

        ->first();

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

        $brand              = $arr["brand_id"];



        $datetime           = $arr["created_at"];

        $ip_address         = $arr["ip_address"];

        $user_agent         = $arr["user_agent"];



        return DB::table($this->table)->insertGetId([

            'product_title' => $product_title, 

            'product_description' => $product_description,

            "product_category"=>$category,

            "product_subcategory"=>$subcategory,

            "brand_id"=>$brand,

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



    public function update_product($arr)

    {

        $product_id         = $arr["product_id"];



        $product_title      = $arr["product_title"];

        $product_description= $arr["product_description"]; 

        $product_availability = $arr["product_availability"];

        $brand              = $arr["brand"];

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



        return DB::table('product_tbl') ->where('product_id', $product_id)->update([

            'product_title' => $product_title, 

            'product_description' => $product_description,

            "product_category"=>$category,

            "product_subcategory"=>$subcategory,

            "product_availability"=>$product_availability,

            "brand_id"=>$brand,

            "status"=>$status,

            "price"=>$price,

            "old_price"=>$old_price,

            "stock"=>$stock,

            "weight"=>$weight,

           

            "ip_address"=>$ip_address,

            "user_agent"=>$user_agent

        ]);

    }



    function delete_product($product_id)

    {

        DB::table($this->table)->where($this->primaryKey, $product_id)->delete();

    }



}

