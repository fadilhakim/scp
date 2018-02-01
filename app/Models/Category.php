<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "category_tbl";
    public $primaryKey = "category_id";
    public $incrementing = TRUE;
    //protected $keyType = "";
    public $timestamps = TRUE;
    protected $fillable = [
        "category_name","ip_address","user_agent"
    ];
    /* protected $hidden = [
        'password'
    ];*/
    //protected $guard = 'admin';
    //protected $guarded = [];
    // default column timestamp
    //const CREATED_AT = "created_at";
    //const UPDATE_AT = "update_at";
    // protected $connection = ""; // connection database name

    static function all_category()
    {
        $category = DB::table("category_tbl")->get()->toArray();
        return $category;
    }

}
