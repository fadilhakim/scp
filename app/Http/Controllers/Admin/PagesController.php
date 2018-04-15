<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Slider;
use App\Models\Bank;
use App\Models\About;

use App\Libraries\Alert;
use App\Libraries\FolderHelper;

class PagesController extends Controller
{
    //
    function __construct()
    {
        $this->objAbout = new About();
    }

    function about()
    {
    	$data["title"]   = "About";
        $data['content'] = 'admin/about';
        $data['about'] = About::detail_about(1);
        return view('admin/index',$data);
    }

    function about_update(Request $request){
        //dd("go to this sds");
        $head_title = $request->input('head_title');
        $head_subtitle = $request->input('head_subtitle');
        $left_title = $request->input('left_title');
        $left_desc = $request->input('left_desc');
        $right_desc = $request->input('right_desc');

        if(!empty($request->file('head_pic'))){
            $head_pic = $request->file('head_pic');
            $head_pic = str_replace(" ","-",strtolower($head_pic->getClientOriginalName()));
            $destinationPath = "public/img/";
            $request->file("head_pic")->move($destinationPath,$head_pic);

        }else {
            $head_pic = $request->input('head_pic_hide');
        }   

        $arrAbout =  array(
            'about_id'      => 1,
            'head_title'    => $head_title,
            'head_subtitle' => $head_subtitle,
            'left_title'    => $left_title,
            'left_desc'     => $left_desc,
            'right_desc'    => $right_desc,
            'head_pic'      => $head_pic 
        );

        $this->objAbout->update_about($arrAbout);

        $url  = url('/admin/about');
        echo '
            <script>
                setTimeout(function(){ window.location.href = "'.$url.'"; },500);
            </script>
        ';
    }

    public function slider()
    {
        $data["slider"] = Slider::all_slider();
        $data["title"]   = "home content";
        $data['content'] = 'admin/home';
        return view("/admin/index",$data);
    }

}
