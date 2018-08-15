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
    	$review = DB::table('product_review')->where('product_id',$product_id)->where('status',1)->get();
        return $review;
    }

    static function detail_review($review_id)
    {
        $review = DB::table('product_review')->where('review_id',$review_id)->first();
        return $review;
    }

    static function update_review($arr)
    {
        return DB::table("product_review")->where("review_id",$arr["review_id"])->update([
            "status"  =>$arr["status"]
        ]);
    }

    static function delete_review($review_id)
    {
        DB::table("product_review")->where("review_id", $review_id)->delete();
    }

    static function insert_review_user($arr){
        DB::table("product_review")->insert([
            "user_id"   => $arr["user_id"],
            "product_id" => $arr["product_id"],
            "review_text" => $arr["review_text"],
            "status" => $arr["status"]
        ]);
    }


}