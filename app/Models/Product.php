<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    protected $table = "product_tbl";
    public $primaryKey = "product_id";
    public $incrementing = TRUE;
    //protected $keyType = "";
    public $timestamps = TRUE;
    protected $fillable = [
        'product_title',"product_availability","product_categoty",
        "product_subcategory","status","price","old_price","stock",
        "weight","product_description",
        "ip_address","user_agent"
    ];
  
    //
    static function all_product()
    {
        $product = DB::table("product_tbl")->get()->toArray();
        return $product;
    }

}
