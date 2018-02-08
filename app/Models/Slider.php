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
        $slider = DB::table('sliders')->where('id',$id)->get();
        return $slider;
    }

}
