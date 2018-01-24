<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    //
    protected $table = "Order_tbl";
    public $primaryKey = "order_id";
    public $incrementing = TRUE;
    //protected $keyType = "";
    public $timestamps = TRUE;
    // default column timestamp
    //const CREATED_AT = "created_at";
    //const UPDATE_AT = "update_at";
    // protected $connection = ""; // connection database name

    static function test()
    {
      echo "static function test active";
    }

    function test2()
    {
      echo "nonstatic function test activated";
    }

    function get_order()
    {
      $order = DB::table("order_tbl")->get();
      return $order;
    }

}
