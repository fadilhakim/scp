<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $table = "brand_tbl";
    public $primaryKey = "brand_id";
    public $incrementing = TRUE;
    //protected $keyType = "";
    public $timestamps = TRUE;
    protected $fillable = [
        "brand_name","brand_image",
        "created_at","ip_address","user_agent"
    ];
    
    function __construct()
    {
        
    }
    //
    static function all_brand()
    {
       
        $brand = DB::table("brand_tbl")->get();
        return $brand;
    }
    
    function detail_brand($brand_id)
    {
        $brand = DB::table($this->table)->where($this->primaryKey,$brand_id)->first();
        return $brand;
    }

    public function insert_brand($arr)
    {
        return DB::table("brand_tbl")->insert([
            "brand_name"=>$arr["brand_name"],
            "brand_image"=>$arr["brand_image"],
            "created_at"=>$arr["created_at"],
            "ip_address"=>$arr["ip_address"],
            "user_agent"=>$arr["user_agent"]
        ]);
    }

    public function update_brand($arr)
    {
        $brand_id = $arr["brand_id"];
        return DB::table("brand_tbl")->where('brand_id', $brand_id)->update([
            "brand_name"=>$arr["brand_name"],
            "brand_image"=>$arr["brand_image"],
            "created_at"=>$arr["created_at"],
            "ip_address"=>$arr["ip_address"],
            "user_agent"=>$arr["user_agent"]
        ]);
    }

    function delete_brand($brand_id)
    {
        DB::table($this->table)->where($this->primaryKey, $brand_id)->delete();
    }
}
