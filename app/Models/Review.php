<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Review extends Model
{
    
    function __construct()
    {
        
    }

    static function all_review(){
    	$review = DB::table('product_review');
        return $review;
    }

    static function get_all($product_id){
    	$review = DB::table('product_review')->where('product_id',$product_id)->get();
        return $review;
    }


}