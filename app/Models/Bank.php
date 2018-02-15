<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class bank extends Model
{
    protected $table = "bank_tbl";
    public $primaryKey = "bank_id";
    public $incrementing = TRUE;
    //protected $keyType = "";
    public $timestamps = TRUE;
    protected $fillable = [
        'bank_id','bank_title',"bank_availability","bank_categoty",
        "bank_subcategory","status","price","old_price","stock",
        "weight","bank_description","status",
        "created_at","ip_address","user_agent"
    ];
    
    function __construct()
    {
        
    }
    //
    static function all_bank()
    {
       
        $bank = DB::table("bank_tbl")->get();
        return $bank;
    }
    
    static function detail_bank($id)
    {
        $bank = DB::table('bank_tbl')->where('bank_id',$id)->get();
        return $bank;
    }

    static function related_bank($category)
    {
        $bank = DB::table('bank_tbl')->where('bank_category',$category)->get();
        return $bank;
    }

    function test()
    {
        echo "test";
    }

    public function insert_bank($arr)
    {
        $bank_title      = $arr["bank_title"];
        $bank_description= $arr["bank_description"]; 
        $bank_availability = $arr["bank_availability"];
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

        DB::table($this->table)->insert([
            'bank_title' => $bank_title, 
            'bank_description' => $bank_description,
            "bank_category"=>$category,
            "bank_subcategory"=>$subcategory,
            "brand_id"=>$brand,
            "bank_availability"=>$bank_availability,
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

    public function update_bank($arr)
    {
        $bank_id         = $arr["bank_id"];

        $bank_title      = $arr["bank_title"];
        $bank_description= $arr["bank_description"]; 
        $bank_availability = $arr["bank_availability"];
        $brand              = $arr["brand_id"];
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

        DB::table('bank_tbl') ->where('bank_id', $bank_id)->update([
            'bank_title' => $bank_title, 
            'bank_description' => $bank_description,
            "bank_category"=>$category,
            "user_agent"=>$user_agent
        ]);
    }

    function delete_bank($bank_id)
    {
        DB::table($this->table)->where($this->primaryKey, $bank_id)->delete();
    }

}
