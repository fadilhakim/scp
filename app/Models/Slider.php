<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Slider extends Model
{
    protected $table = "sliders";
    public $primaryKey = "id";
    public $incrementing = TRUE;
    //protected $keyType = "";
    public $timestamps = TRUE;
    protected $fillable = [
        'id','image_name',"url_image","updated_at","created_at",
    ];
    
    function __construct()
    {
        
    }
    //
    static function all_slider()
    {
       
        $slider = DB::table("sliders")->get();
        return $slider;
    }

    static function detail_slider($id)
    {
        $slider = DB::table('sliders')->where('id',$id)->first();
        return $slider;
    }

    public function insert_slider($data)
    {
        $image_slider      = $data["image_name"];
        $image_url      = $data["url_image"]; 
        return DB::table('sliders')->insert([
            'image_name' => $image_slider, 
            'url_image' => $image_url,
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s") 
        ]);
    }

    public function update_slider($data)
    {
        $image_name        = $data["image_name"];
        $image_url         = $data["url_image"]; 
        return DB::table('sliders')->where('id',$data['id'])->update([
            'image_name' => $image_name, 
            'url_image'  => $image_url,
            'updated_at' => date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s") 
        ]);
    }

    function update_slider_image($arr){
        
        DB::table('sliders')->where('id',$arr['id'])->update([ 
            'image_name' => $arr['image_name']
        ]);
    }

    function delete_slider($slider_id)
    {
        DB::table('sliders')->where($this->primaryKey, $slider_id)->delete();
    }

}
