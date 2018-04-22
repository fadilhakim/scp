<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Admin extends Model
{
    protected $table = "admin_tbl";
    public $primaryKey = "admin_id";
    public $incrementing = TRUE;
    //protected $keyType = "";
    public $timestamps = TRUE;
    protected $fillable = ['username',"email",
    "role_id","status","name","ip_address","user_agent"];
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
    function get_admin()
    {
        return DB::table("admin_tbl")->get();
    }

    function insert_admin($arr)
    {
        return DB::table("admin_tbl")->insert([
            "name"=>$arr["name"],
            "username"=>$arr["username"],
            "photo"=>$arr["photo"],
            "role_id"=>$arr["role_id"],
            "status"=>$arr["status"],
            "password"=>$arr["password"],
            "email"=>$arr["email"],
            "created_at"=>$arr["created_at"],
            "ip_address"=>$arr["ip_address"],
            "user_agent"=>$arr["user_agent"]
        ]);
    }

    function update_admin_photo($arr)
    {
        
        DB::table('admin_tbl')->where('admin_id',$arr['admin_id'])->update([ 
            'photo' => $arr['admin_photo']
        ]);
    }

    function check_activation($email,$activation)
    {
        // $str = "SELECT * FROM users WHERE email = '$email' AND activation = '$activation' ";
        return $q = DB::table("admin_tbl")->where("email",$email)->where("status",$activation)->first();
    }

    function activate($email)
    {
        return DB::table("admin_tbl")->where("email",$email)->update(["status"=>"ACTIVE"]);
    }

  
}
