<?php

namespace App\Models;

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
    protected $fillable = [

      'product_id','user_id',"ongkir","subtotal",
      "kurir","total_berat","kurir_service","tax","purpose_bank",
      "user_addtr_id","status",
      "created_at","ip_address","user_agent"

    ];

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
        $user_id     = $arr["user_id"];
        $grand_total = $arr["grand_total"]; 
        $ongkir      = $arr["ongkir"];
        $subtotal    = $arr["subtotal"];
        //$kurir      = $arr["kurir"];
        $total_berat = $arr["total_berat"];
        $kurir_service = $arr["kurir_service"];
        $tax          = $arr["tax"];
        $purpose_bank = $arr["purpose_bank"];
        $status       = $arr["status"]; // pending, confirm, shipping, cancel
        $user_addtr_id = $arr["user_addtr_id"];

        $ip_address  = $arr["ip_address"];
        $user_agent = $arr["user_agent"];
        $created_at  = $arr["created_at"];

      return DB::table("order_tbl")->insertGetId([
        "user_id"     => $user_id,
        "grand_total" => $grand_total, 
        "ongkir"      => $ongkir ,
        "subtotal"    => $subtotal,
        //"kurir"       => $kurir,
        "total_berat" => $total_berat,
        "kurir_service"=> $kurir_service,
        "tax"          => $tax,
        "purpose_bank" => $purpose_bank,
        "status"       => $status, // pending, confirm, shipping, cancel
        "user_addtr_id"=> $user_addtr_id,

        "ip_address" => $ip_address,
        "user_agent" => $user_agent,
        "created_at" => $created_at
      ]);
    }

    function insert_order_detail($arr)
    {
      $qty           = $arr["qty"];
      $subtotal      = $arr["subtotal"];
      $order_id      = $arr["order_id"];
      $product_id    = $arr["product_id"];
      $price         = $arr["price"];
      $user_id       = $arr["user_id"];
      $ip_address    = $arr["ip_address"];
      $user_agent    = $arr["user_agent"];
      $created_at    = $arr["created_at"];

      return DB::table("order_detail_tbl")->insert([
          "qty"           => $qty,
          "sub_total"      => $subtotal,
          "order_id"      => $order_id,
          "product_id"    => $product_id,
          "price"         => $price,
          "user_id"       => $user_id,
          "ip_address"    => $ip_address,
          "user_agent"    => $user_agent,
          "created_at"    => $created_at
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
}
