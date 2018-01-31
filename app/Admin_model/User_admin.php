<?php

namespace App\Admin_model;

/* use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;*/

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User_admin extends Authenticatable
{
    use Notifiable;

    protected $table = "admin_tbl";
    public $primaryKey = "admin_id";
    public $incrementing = TRUE;
    //protected $keyType = "";
    public $timestamps = TRUE;
    protected $fillable = ['username',"password","email","role_id","status","name","ip_address","user_agent"];
    protected $hidden = [
        'password'
    ];
    protected $guard = 'admin';
    protected $guarded = [];
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
