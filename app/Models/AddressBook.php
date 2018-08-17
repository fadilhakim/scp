<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AddressBook extends Model
{
    protected $table = "user_address_tr";
    public $primaryKey = "user_addtr_id";
    public $incrementing = TRUE;
    //protected $keyType = "";
    public $timestamps = TRUE;
    protected $fillable = [
        "user_id",
        "contact_person",
        "no_hp",
        "provinsi",
        "kecamatan",
        "kota",
        "kode_pos",
        "shipping_address",
        "billing_address"
    ];
    //

    function last_address_book($userId){
        $address_book = DB::table($this->table)->where("user_id",$userId)->where("view",1)->orderBy("user_addtr_id","desc")->first();
        //echo "aaaa";
        return $address_book;
    }

    function address_book_list()
    {
        $address_book = DB::table($this->table)->where("view",1)->get();
        return $address_book;
    }

    function get_address_by_user_id($userId)
    {
        $address_book = DB::table($this->table)->where('user_id',$userId)
        ->where("view",1)->get();
        return $address_book;
    }

    function address_book_detail($user_addtr_id)
    {
        $address_book = DB::table($this->table)->where('user_addtr_id',$user_addtr_id)
        ->where("view",1)->first();
        return $address_book;
    }

    function insert_address($arr)
    {
        return DB::table($this->table)->insert([
            "user_id"           =>$arr["user_id"],
            "address_name"      =>$arr["address_name"],
            "contact_person"    =>$arr["contact_person"],
            "no_hp"             =>$arr["no_hp"],
            "provinsi"          =>$arr["provinsi"],
            "kecamatan"         =>$arr["kecamatan"],
            "kota"              =>$arr["kota"],
            "kode_pos"          =>$arr["kode_pos"],
            "shipping_address"  =>$arr["shipping_address"],
            "billing_address"   =>$arr["billing_address"],
            "updated_at"        =>$arr["created_at"],
            "view"              =>1,
            "created_at"        =>$arr["created_at"],
            "user_agent"        =>$arr["user_agent"],
            "ip_address"        =>$arr["ip_address"]
        ]);
    }

    function address_book_update($arr)
    {
        return DB::table($this->table)->where("user_addtr_id",$arr["user_addtr_id"])->update([
            "user_id"           =>$arr["user_id"],
            "contact_person"    =>$arr["contact_person"],
            "no_hp"             =>$arr["no_hp"],
            "provinsi"          =>$arr["provinsi"],
            "kecamatan"         =>$arr["kecamatan"],
            "kota"              =>$arr["kota"],
            "kode_pos"          =>$arr["kode_pos"],
            "shipping_address"  =>$arr["shipping_address"],
            "billing_address"   =>$arr["billing_address"]
        ]);
    }

    function address_book_delete($user_addtr_id)
    {
        DB::table($this->table)->where($this->primaryKey, $user_addtr_id)->update(["view"=>0]);
    }
}
