<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
  protected $table = "order_detail_tbl";
  public $primaryKey = "order_detail_id";
  public $incrementing = TRUE;
  //protected $keyType = "";
  public $timestamps = TRUE;
  // default column timestamp
  //const CREATED_AT = "created_at";
  //const UPDATE_AT = "update_at";
  // protected $connection = ""; // connection database name
}
