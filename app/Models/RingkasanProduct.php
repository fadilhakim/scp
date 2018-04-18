<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RingkasanProduct extends Model
{
    protected $table = "ringkasan_image";
    public $primaryKey = "ringkasan_id";
    public $incrementing = TRUE;
    //protected $keyType = "";
    public $timestamps = TRUE;
    protected $fillable = [
        'ringkasan_id','product_id',"image_name","image_field"
    ];
    
    function __construct()
    {
        
    }
    //
    static function all_RingkasanProduct_by_product_id($id)
    {
       
        $RingkasanProduct = DB::table("ringkasan_image")->where('product_id',$id)->get();
        return $RingkasanProduct;
    }

    static function detail_RingkasanProduct($id)
    {
        $RingkasanProduct = DB::table('ringkasan_image')->where('ringkasan_id',$id)->first();
        return $RingkasanProduct;
    }

    public function insert_RingkasanProduct($data)
    {
        $image_RingkasanProduct      = $data["image_name"];
        $image_url      = $data["url_image"]; 
        return DB::table('RingkasanProducts')->insert([
            'image_name' => $image_RingkasanProduct, 
            'url_image' => $image_url,
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s") 
        ]);
    }

    public function update_RingkasanProduct($data)
    {
        $image_name        = $data["image_name"];
        $image_url         = $data["url_image"]; 
        return DB::table('RingkasanProducts')->where('id',$data['id'])->update([
            'image_name' => $image_name, 
            'url_image'  => $image_url,
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s") 
        ]);
    }

    function update_RingkasanProduct_image($arr){
        
        DB::table('RingkasanProducts')->where('id',$arr['id'])->update([ 
            'image_name' => $arr['image_name']
        ]);
    }

    function delete_RingkasanProduct($RingkasanProduct_id)
    {
        DB::table('RingkasanProducts')->where($this->primaryKey, $RingkasanProduct_id)->delete();
    }

}
