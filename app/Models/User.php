<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";
    public $primaryKey = "id";
    public $incrementing = TRUE;
    //protected $keyType = "";
    public $timestamps = TRUE;
    protected $fillable = ['username',"password","email","role","status","name","ip_address","user_agent"];
    protected $hidden = [
        'password', 'remember_token'
    ];
    protected $guard = 'user';
    protected $guarded = [];
    // default column timestamp
    //const CREATED_AT = "created_at";
    //const UPDATE_AT = "update_at";
    // protected $connection = ""; // connection database name

    //
    function list_user()
    {
        return DB::table("users")->get(); 
    }

    function detail_user($user_id)
    {
        return DB::table("users")->where("id",$user_id)->first();
    }

    function register_user($arr)
    {
        return DB::table("users")->insert([

            "name"      =>$arr["name"],
            "email"     =>$arr["email"],
            "username"  =>$arr["username"],
            "password"  =>$arr["password"],
            "no_telp"   =>$arr["no_telp"],
            "remember_token"=>$arr["remember_token"],
            "status"    =>$arr["status"],
            "created_at"=>$arr["created_at"],
            "ip_address"=>$arr["ip_address"],
            "user_agent"=>$arr["user_agent"]

        ]);
    }
   
}
