<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
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

    function get_role()
    {
        return DB::table("role_tbl")->get();
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

    function get_admin_by_id($admin_id){
          return $q = DB::table("admin_tbl")->where("admin_id",$admin_id)->first();
    }

    function admin_delete($admin_id)
    {
        DB::table("admin_tbl")->where("admin_id",$admin_id)->delete();

        //DB::table($this->table)->where($this->primaryKey, $bank_id)->delete();
    }

    function admin_update($arr){

        return DB::table("admin_tbl")->where("admin_id",$arr["admin_id"])->update([
           
            "name"          =>$arr["name"],
            "role_id"          =>$arr["role_id"],
            "status"          =>$arr["status"]

        ]);
    }

    function change_profile($data){

        $name       = $data["name"];
        $email      = $data["email"];
        $admin_id   = $data["admin_id"];
        
        return DB::table("admin_tbl")->where("admin_id",$admin_id)->update([
            //"admin_id"  =>$admin_id,
            "name"      =>$name,
            "email"     =>$email
        ]);
        
    }

    function change_password($data){
        $email          = $data["email"];
        $password       = $data["password"];
        //$hash_password = Hash::make($password);

        return DB::table("admin_tbl")->where("email",$email)->update([
            "password"  => $password,
        ]);

    }

    function check_admin_password($data){

        $email    = $data["email"];
        $password = $data["old_password"];

        $userData = DB::table("admin_tbl")->where(
        [
            "email"=>$email,

        ])->first();

        if(Hash::check($password,$userData->password)){
            return true;
        }
        else{
            return false;
        }

    }

  
}
