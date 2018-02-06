<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "category_tbl";
    public $primaryKey = "category_id";
    public $incrementing = TRUE;
    //protected $keyType = "";
    public $timestamps = TRUE;
    protected $fillable = [
        "category_name","ip_address","user_agent","created_at"
    ];
    /* protected $hidden = [
        'password'
    ];*/
    //protected $guard = 'admin';
    //protected $guarded = [];
    // default column timestamp
    //const CREATED_AT = "created_at";
    //const UPDATE_AT = "update_at";
    // protected $connection = ""; // connection database name

    function __construct()
    {
       
    }

    static function all_category()
    {
        $category = DB::table("category_tbl")->get();
        return $category;
    }

    static function list_subcategory($category_id)
    {
        $subcategory = DB::table("subcategory_tbl")->where("category_id",$category_id)->get();
        return $subcategory;
    }

    static function category_detail($category_id)
    {
        $category = DB::table("category_tbl")->where("category_id",$category_id)->first();
        return $category;
    }

    static function insert_category($arr)
    {
        
        return DB::table("category_tbl")->insert([
            "category_name"=>$arr["category_name"],
            "created_at"=>$arr["created_at"],
            "ip_address"=>$arr["ip_address"],
            "user_agent"=>$arr["user_agent"]
        ]);
    }

    static function insert_subcategory($arr)
    {
        return DB::table("subcategory_tbl")->insert([
            "category_id"=>$arr["category_id"],
            "subcategory_name"=>$arr["subcategory_name"],
            "created_at"=>$arr["created_at"],
            "ip_address"=>$arr["ip_address"],
            "user_agent"=>$arr["user_agent"]
        ]);
    }

    static function update_category($arr)
    {
        $category_id = $arr["category_id"];
        return DB::table("category_tbl")->where('category_id', $category_id)->update([
            "category_name"=>$arr["category_name"],
            "created_at"=>$arr["created_at"],
            "ip_address"=>$arr["ip_address"],
            "user_agent"=>$arr["user_agent"]
        ]);
    }

    static function delete_category($category_id)
    {
        return DB::table("category_tbl")->where("category_id", $category_id)->delete();
    }

}
