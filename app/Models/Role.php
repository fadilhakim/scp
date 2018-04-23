<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Role extends Model
{
    protected $table     = "role_tbl";
    public $primaryKey   = "role_id";
    public $incrementing = TRUE;
    //protected $keyType = "";
    public $timestamps = TRUE;
    protected $fillable = ['role_name',"email","privilege"];
    protected $guard = 'user';
    protected $guarded = [];
    // default column timestamp
    //const CREATED_AT = "created_at";
    //const UPDATE_AT = "update_at";
    // protected $connection = ""; // connection database name

    function get_role()
    {
        return DB::table("role_tbl")->get();
    }

    function get_all_menu()
    {
        return array(
            "admin","role","marketplace","customer",
            "order","voucher","midtrans","bank","slider"
        );
    }

    function get_role_except()
    {
        return DB::table("role_tbl")->where("role_id","<>",1)->get();
    }

    function detail_role($role_id)
    {
        return DB::table("role_tbl")->where("role_id",$role_id)->first();
    }

    function insert_role($arr)
    {
        return DB::table("role_tbl")->insert([
            "role_name"=>$arr["role_name"],
            "privilege"=>$arr["privilege"]
        ]); 
    }

    function update_role($arr)
    {
        return DB::table("role_tbl")->where("role_id",$arr["role_id"])->update([
            "role_name"=>$arr["role_name"],
            "privilege"=>$arr["privilege"]
        ]); 
    }
}
