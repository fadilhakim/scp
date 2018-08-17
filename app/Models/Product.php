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

    static function all_product()
    {
        $product = DB::table("product_tbl")->paginate(16);
        return $product;
    }

    static function get_product_by_popluar()
    {
        $product = DB::table("product_tbl")->where('popular','1')->get();
        return $product;
    }

    static function detail_product($id)
    {
        $product = DB::table('product_tbl')->where('product_id',$id)->first();
        return $product;
    }

    function detail_product2($id)
    {
        $product = DB::table('product_tbl')->where('product_id',$id)->first();
        
      
        return $product;
    }


    static function related_product($category)
    {
        $product = DB::table('product_tbl')->where('product_category',$category)->get();
        return $product;
    }

    static function find_product_img($id)
    {
        $image = DB::table('product_image_tbl')->where('product_id',$id)->get();
        return $image;
    }


    static function get_first_image($id)
    {
        $image = DB::table('product_image_tbl')->where('product_id',$id)->first();
        return $image;
    }


    static function get_image_by_field($product_id,$image_field)
    {
        $image = DB::table('product_image_tbl')
        ->where('product_id',$product_id)
        ->where('image_field',$image_field)
        ->first();
        return $image;
    }

    static function get_product_mini_slide($product_id)
    {
        $image = DB::table('product_mini_slide')
        ->where('product_id',$product_id)
        ->get();
        return $image;
    }

    static function product_result($product_title)
    {
        $product = DB::table('product_tbl')->where('product_title',$product_title)->get();
        return $product;
    }

    static function all_category()
    {
        $category = DB::table("category_tbl")->get();
        return $category;
    }

    static function get_brands()
    {
        $category = DB::table("brand_tbl")->get();
        return $category;
    }


    static function get_category_by_id($category_id)
    {
        $category = DB::table('category_tbl')->where('category_id',$category_id)->first();
        return $category;
    }

    static function get_subCategory_by_id($subCategory_id)
    {
        $subcategory = DB::table('subcategory_tbl')->where('subcategory_id',$subCategory_id)->first();
        return $subcategory;
    }

    static function get_subCategory_by_category_id($category_id)
    {
        $subcategory = DB::table('subcategory_tbl')->where('category_id',$category_id)->get();
        return $subcategory;
    }


    static function get_brand_by_id($brand_id)
    {
        $subcategory = DB::table('brand_tbl')->where('brand_id',$brand_id)->first();
        return $subcategory;
    }

    static function get_product_category($category)
    {
        $category = DB::table('category_tbl')->where('category_id',$category)->first();
        return $category;
    }

    static function get_product_brand($category)
    {
        $category = DB::table('brand_tbl')->where('brand_id',$category)->first();
        return $category;
    }

    static function get_product_by_category($category)
    {
        $product = DB::table('product_tbl')->where('product_category',$category)->paginate(16);
        //dd($category);
        return $product;
    }

    static function get_product_by_brand($brand)
    {
        $product = DB::table('product_tbl')->where('brand_id',$brand)->paginate(16);
        //dd($category);
        return $product;
    }

    static function get_popular_product()
    {
        $popular = DB::table('product_tbl')->where('popular','1')->get();
        return $popular;
    }

    static function get_popular_product_limit()
    {
        $popular = DB::table('product_tbl')->where('popular','1')->take(2)->get();
        return $popular;
    }

    static function get_mini_slide($id)
    {
        $slide = DB::table('product_mini_slide')->where('product_id',$id)->get();
        return $slide;
    }

    static function get_product_market_id_by_product_id($product_id)
    {
        $market = DB::table('detail_product_market_palce_tbl')->where('product_id',$product_id)->get();
        return $market;
    }

    
    function update_product_image($product_id,$image_name,$image_field)
    {

        DB::table("product_image_tbl")
        ->where('product_id', $product_id)
        ->where('image_field', $image_field)
        ->update([
            "image_name"=> $image_name
        ]);

    }

    public function insert_product_image($arr,$image_field,$image_name)
    {
        DB::table("product_image_tbl")->insert([
            "product_id"=>$arr["product_id"],
            "image_name"=> $image_name,
            "image_field"=>$image_field,
            "ip_address"=>$arr["ip_address"],
            "user_agent"=>$arr["user_agent"],
            "created_at"=>$arr["created_at"]
        ]);
    }

    public function insert_mini_slide($image,$product_id){
        DB::table("product_mini_slide")->insert([
            "product_id" => $product_id,
            "image_name" => $image
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
        $product_title        = $arr["product_title"];
        $product_description  = $arr["product_description"]; 
        $product_availability = $arr["product_availability"];
        $category             = $arr["category"];
        $subcategory          = $arr["subcategory"];
        $price                = $arr["price"];
        $stock                = $arr["stock"];
        $brand                = $arr["brand_id"];
        $datetime             = $arr["created_at"];
        $ip_address           = $arr["ip_address"];
        $user_agent           = $arr["user_agent"];

        return DB::table($this->table)->insertGetId([
            'product_title' => $product_title, 
            'product_description' => $product_description,
            "product_category"=>$category,
            "product_subcategory"=>$subcategory,
            "brand_id"=>$brand,
            "product_availability"=>$product_availability,
            "price"=>$price,
            "stock"=>$stock,
            "created_at"=>$datetime,
            "ip_address"=>$ip_address,
            "user_agent"=>$user_agent
        ]);

    }

    function get_specification($product_id)
    {
       
        return DB::table("specification_tbl")->where("product_id",$product_id)->first();
    }
    
    function insert_specification($arr)
    {
        return DB::table("specification_tbl")->insert([
            "product_id"    =>$arr["product_id"],
            "type"          =>$arr["type"],
            "color"         =>$arr["color"],
            "dimensions"    =>$arr["dimensions"],
            "bandwith"      =>$arr["bandwith"],
            "display"       =>$arr["display"],
            "sim_card"      =>$arr["sim_card"],
            "radio"         =>$arr["radio"],
            "micro_sd"      =>$arr["micro_sd"],
            "bluetooth"     =>$arr["bluetooth"],
            "battery"       =>$arr["battery"],
            "charger"       =>$arr["charger"],
            "handsfree"     =>$arr["handsfree"]
        ]);
    }

    function update_specification($arr)
    {
        return DB::table("specification_tbl")->where("product_id",$arr["product_id"])->update([
           
            "type"          =>$arr["type"],
            "color"         =>$arr["color"],
            "dimensions"    =>$arr["dimensions"],
            "bandwith"      =>$arr["bandwith"],
            "display"       =>$arr["display"],
            "sim_card"      =>$arr["sim_card"],
            "radio"         =>$arr["radio"],
            "micro_sd"      =>$arr["micro_sd"],
            "bluetooth"     =>$arr["bluetooth"],
            "battery"       =>$arr["battery"],
            "charger"       =>$arr["charger"],
            "handsfree"     =>$arr["handsfree"]
        ]);
    }

    public function update_product($arr)
    {

        $product_id           = $arr["product_id"];
        $product_title        = $arr["product_title"];
        $product_description  = $arr["product_description"]; 
        $product_availability = $arr["product_availability"];
        $brand                = $arr["brand"];

        $category           = $arr["category"];
        $subcategory        = $arr["subcategory"];
        $price              = $arr["price"];
        $stock              = $arr["stock"];
        $weight             = $arr["weight"];
        $product_total_free_ongkir = $arr["product_total_free_ongkir"];

        $datetime           = $arr["created_at"];
        $ip_address         = $arr["ip_address"];
        $user_agent         = $arr["user_agent"];

        $sub_title_left     = $arr["product_title_left"];
        $desc_left          = $arr["product_detail_left"];
        $image_left         = $arr["product_detail_left_img"];

        $sub_title_right     = $arr["product_title_right"];
        $desc_right          = $arr["product_detail_right"];
        $image_right         = $arr["product_detail_right_img"];

        $sub_title_btm       = $arr["product_title_btm"];
        $desc_btm            = $arr["product_detail_btm"];
        $image_btm           = $arr["product_detail_btm_img"];

        /*DB::table("specification_tbl")->where("product_id",$product_id)->update([
            "type"          =>$arr["type"],
            "color"         =>$arr["color"],
            "dimensions"    =>$arr["dimensions"],
            "bandwith"      =>$arr["bandwith"],
            "display"       =>$arr["display"],
            "sim_card"      =>$arr["sim_card"],
            "radio"         =>$arr["radio"],
            "micro_sd"      =>$arr["micro_sd"],
            "bluetooth"     =>$arr["bluetooth"],
            "battery"       =>$arr["battery"],
            "charger"       =>$arr["charger"],
            "handsfree"     =>$arr["handsfree"]

        ]);*/

        //$product_tech        = $arr["technical_specs"];
        return DB::table('product_tbl') ->where('product_id', $product_id)->update([

            'product_title' => $product_title, 
            'product_description' => $product_description,
            "product_category"=>$category,
            "product_subcategory"=>$subcategory,
            "product_availability"=>$product_availability,
            "brand_id"=>$brand,
            "price"=>$price,
            "stock"=>$stock,
            "weight"=>$weight,
            "product_total_free_ongkir"=>$product_total_free_ongkir,
            "ip_address"=>$ip_address,
            "user_agent"=>$user_agent,

            "product_title_left"=>$sub_title_left,
            "product_detail_left"=>$desc_left,
            "product_detail_left_img"=>$image_left,

            "product_title_right"=>$sub_title_right,
            "product_detail_right"=>$desc_right,
            "product_detail_right_img"=>$image_right,

            "product_title_btm"=>$sub_title_btm,
            "product_detail_btm"=>$desc_btm,
            "product_detail_btm_img"=>$image_btm
            //"technical_specs"=>$product_tech
        ]);

    }


    public function update_product_test($arr){
        $product_id         = $arr["product_id"];
        $product_title      = $arr["product_title"];

        return DB::table('product_tbl') ->where('product_id', $product_id)->update([
            'product_title' => $product_title
        ]);

    }



    function delete_product($product_id)

    {

        DB::table($this->table)->where($this->primaryKey, $product_id)->delete();

    }



}

