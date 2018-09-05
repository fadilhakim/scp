<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

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

    static function detail_user($user_id)
    {
        $kalong =  DB::table("users")->where("id",$user_id)->first();
        return $kalong;
    }

    static function detail_user_email($email)
    {
        return DB::table("users")->where("email",$email)->first();
    }

    function check_activation($email,$activation)
    {
        // $str = "SELECT * FROM users WHERE email = '$email' AND activation = '$activation' ";
        return $q = DB::table("users")->where("email",$email)->where("activation",$activation)->first();
    }

    function activate($email)
    {
        return DB::table("users")->where("email",$email)->update(["activation"=>"ACTIVE"]);
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
            "birthday"  =>$arr["birthday"],
            "activation"=>$arr["activation"],
            "status"    =>$arr["status"],
            "created_at"=>$arr["created_at"],
            "ip_address"=>$arr["ip_address"],
            "user_agent"=>$arr["user_agent"]

        ]);
    }

    function delete_user($id)
    {
        DB::table('users')->where("id", $id)->delete();
    }

    function change_status_user($user_id,$status)
    {
        DB::table("users")->where("id",$user_id)->update([
           "status"=>$status 
        ]);
    }

    function change_activation_user($user_id,$activation)
    {
        DB::table("users")->where("id",$user_id)->update([
            "activation"=>$activation 
         ]);
    }

    function change_profile($data){

        $name       = $data["name"];
        $email      = $data["email"];
        $phone_no   = $data["phone_no"];
        
        return DB::table("users")->where("email",$email)->update([
            "name"      =>$name,
            "email"     =>$email,
            "no_telp"   =>$phone_no
        ]);
        
    }

    function change_password($data){
        $email          = $data["email"];
        $password       = $data["password"];
        //$hash_password = Hash::make($password);

        return DB::table("users")->where("email",$email)->update([
            "password"  => $password,
        ]);

    }

    function check_user_password($data){

        $email    = $data["email"];
        $password = $data["old_password"];

        $userData = DB::table("users")->where(
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
