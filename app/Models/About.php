<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class about extends Model
{
    protected $table = "about_tbl";
    public $primaryKey = "about_id";
    public $incrementing = TRUE;
    //protected $keyType = "";
    public $timestamps = TRUE;
    protected $fillable = [
        'about_id','about_title',"about_availability","about_categoty",
        "about_subcategory","status","price","old_price","stock",
        "weight","about_description","status",
        "created_at","ip_address","user_agent"
    ];
    
    function __construct()
    {
        
    }
    //
    static function detail_about($about_id)
    {
        $about = DB::table('about_tbl')->where('about_id',$about_id)->first();
        return $about;
    }

    public function insert_about($arr)
    {
        $about_name      = $arr["about_name"];
        $about_logo      = $arr["about_logo"]; 
        $about_acc_no    = $arr["about_acc_no"];
        $about_owner     = $arr["about_owner"];

       return DB::table('about_tbl')->insert([
            'about_name' => $about_name, 
            'about_logo' => $about_logo,
            "about_acc_no"=>$about_acc_no,
            "about_owner"=> $about_owner
        ]);
    }

    public function update_about($arr)
    {
        $head_title     =   $arr['head_title'];
        $head_subtitle  =   $arr['head_subtitle'];
        $right_desc     =   $arr['right_desc'];
        $left_desc      =   $arr['left_desc'];
        $left_title     =   $arr['left_title'];
        $head_pic       =   $arr['head_pic'];

       return DB::table('about_tbl')->where('about_id', 1)->update([
            'head_title'    => $head_title,
            'head_subtitle' => $head_subtitle,
            'left_title'    => $left_title,
            'left_desc'     => $left_desc,
            'right_desc'    => $right_desc, 
            'head_pic'      => $head_pic 
        ]);
    }

    function update_about_image($arr){
        
        DB::table('about_tbl')->where('about_id',$arr['about_id'])->update([ 
            'about_logo' => $arr['about_logo']
        ]);
    }

}
