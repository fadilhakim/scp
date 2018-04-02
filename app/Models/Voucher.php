<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Voucher extends Model
{
    protected $table        = "voucher_tbl";
    public $primaryKey      = "voucher_id";
    public $incrementing    = TRUE;
    //protected $keyType = "";
    public $timestamps      = TRUE;
    protected $fillable = [
        'voucher_id',"voucher_code","type","discount","cashback",
        "description","issued_date","expired_date",
        "created_at","ip_address","user_agent"
    ];
    
    function __construct()
    {
        
    }
    //
    static function all_voucher()
    {
       
        $voucher = DB::table("voucher_tbl")->get();
        return $voucher;
    }
    
    static function detail_voucher($voucher_id)
    {
        $voucher = DB::table('voucher_tbl')->where('voucher_id',$voucher_id)
        ->orWhere('voucher_code', $voucher_id)->first();
        return $voucher;
    }

    public function insert_voucher($arr)
    {
        /*
              'voucher_id',"voucher_code","type","discount","cashback",
            "description","issued_date","expired_date",
            "created_at","ip_address","user_agent"
        */

        $voucher_code   = $arr["voucher_code"];
        $type           = $arr["type"]; 
        $discount       = $arr["discount"];
        $cashback       = $arr["cashback"];
        $description    = $arr["description"];
        $issued_date    = $arr["issued_date"];
        $expired_date   = $arr["expired_date"];
        $created_at     = $arr["created_at"];
        $ip_address     = $arr["ip_address"];
        $user_agent     = $arr["user_agent"];

       return DB::table('voucher_tbl')->insert([
            'voucher_code'  => $voucher_code, 
            'type'          => $type,
            "discount"      => $discount,
            "cashback"      => $cashback,
            "description"   => $description,
            "issued_date"   => $issued_date,
            "expired_date"  => $expired_date,
            "created_at"    => $created_at,
            "ip_address"    => $ip_address,
            "user_agent"    => $user_agent
        ]);
    }

    public function update_voucher($arr)
    {
       /*
              'voucher_id',"voucher_code","type","discount","cashback",
            "description","issued_date","expired_date",
            "created_at","ip_address","user_agent"
        */
        $voucher_id     = $arr["voucher_id"];
        $voucher_code   = $arr["voucher_code"];
        $type           = $arr["type"]; 
        $discount       = $arr["discount"];
        $cashback       = $arr["cashback"];
        $description    = $arr["description"];
        $issued_date    = $arr["issued_date"];
        $expired_date   = $arr["expired_date"];
        $created_at     = $arr["created_at"];
        $ip_address     = $arr["ip_address"];
        $user_agent     = $arr["user_agent"];

       return DB::table('voucher_tbl')->where("voucher_id",$voucher_id)->update([
            'voucher_code'  => $voucher_code, 
            'type'          => $type,
            "discount"      => $discount,
            "cashback"      => $cashback,
            "description"   => $description,
            "issued_date"   => $issued_date,
            "expired_date"  => $expired_date,
            "created_at"    => $created_at,
            "ip_address"    => $ip_address,
            "user_agent"    => $user_agent
        ]);
    }


    function delete_voucher($voucher_id)
    {
        DB::table($this->table)->where($this->primaryKey, $voucher_id)->delete();
    }

    function check_voucher($voucher_code)
    {
        $today = date("Y-m-d");

        $voucher = DB::table('voucher_tbl')->where('voucher_code',$voucher_code)
        ->where('expired_date', '>', $today)->first();
        return $voucher;
    }

   
}
