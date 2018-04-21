<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Role extends Model
{
    protected $table     = "role_tbl";
    public $primaryKey   = "role_id";
    public $incrementing = TRUE;
    //protected $keyType = "";
    public $timestamps = TRUE;
    protected $fillable = ['role_name',"email","privilege"];
    protected $guard = 'user';
    protected $guarded = [];
    // default column timestamp
    //const CREATED_AT = "created_at";
    //const UPDATE_AT = "update_at";
    // protected $connection = ""; // connection database name

    function get_role()
    {
        return DB::table("role_tbl")->get();
    }

    function detail_role($role_id)
    {
        return DB::table("role_tbl")->where("role_id",$role_id)->first();
    }
}
