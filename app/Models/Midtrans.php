<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Midtrans extends Model
{
    
    protected $table        = "midtrans_setting_tbl";
    public $primaryKey      = "midtrans_id";
    public $incrementing    = TRUE;
    //protected $keyType = "";
    public $timestamps      = TRUE;
    protected $fillable = [
        "midtrans_id",
        "production_server_key",
        "production_client_key",
        "sandbox_server_key",
        "sandbox_client_key",
        "production_javascript_link",
        "sandbox_javascript_link",
        "payment_method",
        "active_production_version",
        "active_midtrans"
    ];

    function update_process($arr)
    {
        return DB::table($this->table)->where("midtrans_id",$arr["midtrans_id"])->update([
           
            "production_server_key"=>$arr["production_server_key"],
            "production_client_key"=>$arr["production_client_key"],
            "sandbox_server_key"=>$arr["sandbox_server_key"],
            "sandbox_client_key"=>$arr["sandbox_client_key"],
            "production_javascript_link"=>$arr["production_javascript_link"],
            "sandbox_javascript_link"=>$arr["sandbox_javascript_link"],
            "payment_method"=>$arr["payment_method"],
            "active_production_version"=>$arr["active_production_version"],
            "active_midtrans"=>$arr["active_midtrans"]
        ]);
    }

    function insert_process($arr)
    {
        return DB::table($this->table)->insert([
            
            "production_server_key"=>$arr["production_server_key"],
            "production_client_key"=>$arr["production_client_key"],
            "sandbox_server_key"=>$arr["sandbox_server_key"],
            "sandbox_client_key"=>$arr["sandbox_client_key"],
            "production_javascript_link"=>$arr["production_javascript_link"],
            "sandbox_javascript_link"=>$arr["sandbox_javascript_link"],
            "payment_method"=>$arr["payment_method"],
            "active_production_version"=>$arr["active_production_version"],
            "active_midtrans"=>$arr["active_midtrans"]
        ]);
    }

    function check_midtrans()
    {
        $midtrans = DB::table($this->table)->first();
        return $midtrans;
    }
}
