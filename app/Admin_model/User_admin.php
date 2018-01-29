<?php

namespace App\admin_model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User_admin extends Model
{
    protected $table = "admin_tbl";
    public $primaryKey = "admin_id";
    public $incrementing = TRUE;
    //protected $keyType = "";
    public $timestamps = TRUE;
    protected $fillable = ['username',"password","email","role_id","status","nama","ip_adrress","user_agent"];
    //protected $guarded = [];
    // default column timestamp
    //const CREATED_AT = "created_at";
    //const UPDATE_AT = "update_at";
    // protected $connection = ""; // connection database name

    //
    function get_admin()
    {
        return array();
    }
}
