<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Models\Slider;

use App\Libraries\Alert;
use App\Libraries\FolderHelper;

class SliderController extends Controller
{

    private $objslider;
    
    function __construct()
    {
        $this->objslider = new Slider();
    }

    function index()
    {
        $data["slider"] = Slider::all_slider();
        $data["title"]   = "Slider Image";
        $data['content'] = 'admin/slider/slider';
        return view("/admin/index",$data);
    }

    function modal_slider_insert()
    {
        return view("admin/slider/modal_slider_insert");
    }


    function slider_insert_process(Request $request)
    {
        // dd($request->file('slider_logo')->getClientOriginalName());
        $slider_url          = $request->input("url_image");
        $slider_image         = $request->file('image_name');
        $new_image_name = str_replace(" ","-",strtolower($slider_image->getClientOriginalName()));


        $validator = Validator::make($request->all(), [
            'image_name'  => 'required|unique:sliders'
        ]);

        if(!$validator->fails())
        {
            if(!empty($slider_url)){
                $arr = array(
                    'image_name' => $new_image_name, 
                    'url_image' => $slider_url
                );    
            }else {

                  $arr = array(
                    'image_name' => $new_image_name, 
                    'url_image' => " "
                ); 
            }
            

            $q = $this->objslider->insert_slider($arr);

            $new_id = $q;
            $slider_id = $new_id;
            $data["id"] = $new_id;
            if($request->hasFile("image_name"))
            {
                
                $data["image_name"] = $new_image_name;

                $this->objslider->update_slider_image($data);
                //dd($new_image_name);
                //Move Uploaded File
                $destinationPath = "public/sliders";
                //FolderHelper::create_folder_slider($slider_id);

                $request->file("image_name")->move($destinationPath,$new_image_name);
                
            }
            echo Alert::success("You successfully Insert New Slider");
            echo "<script> setTimeout(function(){ location.reload(); },3000); </script>";


        }else
        {
            $errors = $validator->errors();
           
            $err_text = "";
            foreach($errors->all() as $err) 
            {
                $err_text .=  "<li> $err </li>";
            }

            echo Alert::danger($err_text);
        }

    }

    function modal_slider_update(Request $request)
    {
        $slider_id = $request->input("slider_id");
        $data["slider"] = $slider =  $this->objslider->detail_slider($slider_id);
        return view("admin/slider/modal_slider_update",$data);
        //return "res";
  
    }

    function slider_update_process(Request $request)
    {
        $slider_id            = $request->input("id");
        $old_image            = $request->input("old_image");
        $image_name           = $request->file("image_name");
        $image_url            = $request->input("url_image");
        
        $validator = Validator::make($request->all(), [
            'id'               => "required|integer",
        ]);

        if(!empty($image_name)){
            $new_image_name = str_replace(" ","-",strtolower($image_name->getClientOriginalName()));
        }
        else {
            $new_image_name = $old_image;
        }
        
        if(!$validator->fails())
        {   
            if(!empty($image_url)){

                $arr = array(
                    "id"             => $slider_id,
                    'image_name'     => $new_image_name,
                    'url_image'      => $image_url
                );   
            }else {
                $arr = array(
                    "id"             => $slider_id,
                    'image_name'     => $new_image_name
                );
            }

            $q = $this->objslider->update_slider($arr);

            if($request->hasFile("image_name"))
            {
                $data["image_name"] = $new_image_name;
                $data["id"] = $slider_id ;
                $this->objslider->update_slider_image($data);
                
                //Move Uploaded File
                $destinationPath = "public/sliders";
                //FolderHelper::create_folder_slider($slider_id);
                $request->file("image_name")->move($destinationPath,$new_image_name);
                
            }
            echo Alert::success("You successfully Update Slider Image");
            echo "<script> setTimeout(function(){ location.reload(); },2000); </script>";


        }else
        {
            $errors = $validator->errors();
            $err_text = "";
            foreach($errors->all() as $err) 
            {
                $err_text .=  "<li> $err </li>";
            }

            echo Alert::danger($err_text);
        }
    }

    function modal_slider_delete(Request $request)
    {
        $slider_id = $request->input("slider_id");
        $data["slider"] = $this->objslider->detail_slider($slider_id);
        return view("admin/slider/modal_slider_delete",$data);
    }

    function slider_delete_process(Request $request){
        
        $slider_id = $request->input("slider_id");

        $this->objslider->delete_slider($slider_id);

        echo Alert::success("You successfully Delete Product");
        echo "<script> setTimeout(function(){ location.reload(); },2000); </script>";
    }


}
