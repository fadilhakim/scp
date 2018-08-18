<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Warranty extends Model
{
    
    function __construct()
    {
        
    }

    static function all_warranty(){
    	$warranty = DB::table('product_warranty');
        return $warranty;
    }

    static function get_all($product_id){
    	$warranty = DB::table('product_warranty')->where('product_id',$product_id)->where('status',1)->get();
        return $warranty;
    }

    static function detail_warranty($id)
    {
        $warranty = DB::table('product_warranty')->where('id',$id)->first();
        return $warranty;
    }

    static function update_warranty($arr)
    {
        return DB::table("product_warranty")->where("id",$arr["id"])->update([
            "status"  =>$arr["status"]
        ]);
    }

    static function delete_warranty($warranty_id)
    {
        DB::table("product_warranty")->where("id", $warranty_id)->delete();
    }

    static function insert_warranty_user($arr){
        DB::table("product_warranty")->insert([
            "model"   => $arr["model"],
            "buy_date"        => $arr["buy_date"],
            "customer_name"   => $arr["customer_name"],
            "customer_phone"  => $arr["customer_phone"],
            "customer_address"  => $arr["customer_address"],
            "customer_email"  => $arr["customer_email"],
            "no_imei_1"       => $arr["no_imei_1"],
            "no_imei_2"       => $arr["no_imei_2"],
            "status"          => $arr["status"]
        ]);
    }


}