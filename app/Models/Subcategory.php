<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    //
    protected $table = "subcategory_tbl";
    public $primaryKey = "subcategory_id";
    public $incrementing = TRUE;
    //protected $keyType = "";
    public $timestamps = TRUE;
    protected $fillable = [
        "subcategory_name","category_id","ip_address","user_agent"
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

    static function all_subcategory()
    {
        $subcategory = DB::table("subcategory_tbl")->get()->toArray();
        return $subcategory;
    }
}
