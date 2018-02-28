<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    //
    protected $table = "order_tbl";
    public $primaryKey = "order_id";
    public $incrementing = TRUE;
    //protected $keyType = "";
    public $timestamps = TRUE;
    // default column timestamp
    //const CREATED_AT = "created_at";
    //const UPDATE_AT = "update_at";
    // protected $connection = ""; // connection database name

    static function test()
    {
      echo "static function test active";
    }

    function test2()
    {
      echo "nonstatic function test activated";
    }

    function get_order()
    {
      $order = DB::table("order_tbl")->get();
      return $order;
    }

    function insert_order($arr)
    {
      return DB::table("order_tbl")->insert([
        "user_id"     =>$arr["user_id"],
        "grand_total" =>$arr["grand_total"], 
        "ongkir"      =>$arr["ongkir"],
        "subtotal"    =>$arr["subtotal"],
        "kurir"       =>$arr["kurir"],
        "total_berat" =>$arr["total_berat"],
        "kurir_service"=>$arr["kurir_service"],
        "tax"          =>$arr["tax"],
        "purpose_bank" =>$arr["purpose_bank"],
        "status"       =>$arr["status"], // pending, confirm, shipping, cancel
        "user_addtr_id"=>$arr["user_addtr_id"],

        "ip_address" =>$arr["ip_address"],
        "user_agent" =>$arr["user_agent"],
        "created_at" =>$arr["created_at"]
      ]);
    }

    function update_order($arr)
    {
      return DB::table("order_tbl")->where("order_id",$arr["order_id"])->update([
        "user_id"     =>$arr["user_id"],
        "grand_total" =>$arr["grand_total"], 
        "ongkir"      =>$arr["ongkir"],
        "subtotal"    =>$arr["subtotal"],
        "kurir"       =>$arr["kurir"],
        "total_berat" =>$arr["total_berat"],
        "kurir_service"=>$arr["kurir_service"],
        "tax"          =>$arr["tax"],
        "purpose_bank" =>$arr["purpose_bank"],
        "status"       =>$arr["status"], // pending, confirm, shipping, cancel
        "user_addtr_id"=>$arr["user_addtr_id"],

        "ip_address" =>$arr["ip_address"],
        "user_agent" =>$arr["user_agent"],
        "created_at" =>$arr["created_at"]
      ]);
    }

    function insert_order_detail($arr)
    {
      return DB::table("order_detail_tbl")->insert([
          
      ]);
    }

}
