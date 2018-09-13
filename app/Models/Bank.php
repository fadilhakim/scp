<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Bank extends Model
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

    static function first_bank()
    {
       
        $bank = DB::table("bank_tbl")->first();
        return $bank;
    }
    
    static function detail_bank($bank_id)
    {
        $bank = DB::table('bank_tbl')->where('bank_id',$bank_id)->first();
        return $bank;
    }

    static function related_bank($category)
    {
        $bank = DB::table('bank_tbl')->where('bank_category',$category)->get();
        return $bank;
    }

    public function insert_bank($arr)
    {
        $bank_name      = $arr["bank_name"];
        $bank_logo      = $arr["bank_logo"]; 
        $bank_acc_no    = $arr["bank_acc_no"];
        $bank_owner     = $arr["bank_owner"];

       return DB::table('bank_tbl')->insert([
            'bank_name' => $bank_name, 
            'bank_logo' => $bank_logo,
            "bank_acc_no"=>$bank_acc_no,
            "bank_owner"=> $bank_owner
        ]);
    }

    public function update_bank($arr)
    {
        $bank_id        = $arr["bank_id"];
        $bank_name      = $arr["bank_name"];
        $old_logo       =  $arr["old_logo"];
        $bank_logo      =  $arr['bank_logo'];
        if(!empty($bank_logo)){
            $bank_logo      = $arr["bank_logo"]; 
        }else {
            $bank_logo      = $old_logo ;
        }
        
        $bank_acc_no    = $arr["bank_acc_no"];
        $bank_owner     = $arr["bank_owner"];

       return DB::table('bank_tbl')->where('bank_id', $bank_id)->update([
            'bank_name' => $bank_name, 
            'bank_logo' => $bank_logo,
            "bank_acc_no"=>$bank_acc_no,
            "bank_owner"=> $bank_owner
        ]);
    }


    function delete_bank($bank_id)
    {
        DB::table($this->table)->where($this->primaryKey, $bank_id)->delete();
    }

    function update_bank_image($arr){
        
        DB::table('bank_tbl')->where('bank_id',$arr['bank_id'])->update([ 
            'bank_logo' => $arr['bank_logo']
        ]);
    }

}
