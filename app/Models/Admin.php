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

    function get_menu()
    {

    }
}
