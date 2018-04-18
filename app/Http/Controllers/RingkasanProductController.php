<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Models\RingkasanProduct;

use App\Libraries\Alert;
use App\Libraries\FolderHelper;

class RingkasanProductController extends Controller
{

    private $objRingkasanProduct;
    
    function __construct()
    {
        $this->objRingkasanProduct = new RingkasanProduct();
    }

    function index($id)
    {

        $data["RingkasanProduct"] = RingkasanProduct::all_RingkasanProduct_by_product_id($id);
        return view("product_highlight",$data);
    }

    function modal_RingkasanProduct_insert()
    {
        return view("admin/RingkasanProduct/modal_RingkasanProduct_insert");
    }


    function RingkasanProduct_insert_process(Request $request)
    {
        // dd($request->file('RingkasanProduct_logo')->getClientOriginalName());
        $RingkasanProduct_url          = $request->input("url_image");
        $RingkasanProduct_image         = $request->file('image_name');
        $new_image_name = str_replace(" ","-",strtolower($RingkasanProduct_image->getClientOriginalName()));


        $validator = Validator::make($request->all(), [
            'image_name'  => 'required|unique:RingkasanProducts|max:255'
        ]);

        if(!$validator->fails())
        {
            if(!empty($RingkasanProduct_url)){
                $arr = array(
                    'image_name' => $new_image_name, 
                    'url_image' => $RingkasanProduct_url
                );    
            }else {

                  $arr = array(
                    'image_name' => $new_image_name, 
                    'url_image' => " "
                ); 
            }
            

            $q = $this->objRingkasanProduct->insert_RingkasanProduct($arr);

            $new_id = $q;
            $RingkasanProduct_id = $new_id;
            $data["id"] = $new_id;
            if($request->hasFile("image_name"))
            {
                
                $data["image_name"] = $new_image_name;

                $this->objRingkasanProduct->update_RingkasanProduct_image($data);
                //dd($new_image_name);
                //Move Uploaded File
                $destinationPath = "public/RingkasanProducts";
                //FolderHelper::create_folder_RingkasanProduct($RingkasanProduct_id);

                $request->file("image_name")->move($destinationPath,$new_image_name);
                
            }
            echo Alert::success("You successfully Insert New RingkasanProduct");
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

    function modal_RingkasanProduct_update(Request $request)
    {
        $RingkasanProduct_id = $request->input("RingkasanProduct_id");
        $data["RingkasanProduct"] = $RingkasanProduct =  $this->objRingkasanProduct->detail_RingkasanProduct($RingkasanProduct_id);
        return view("admin/RingkasanProduct/modal_RingkasanProduct_update",$data);
        //return "res";
  
    }

    function RingkasanProduct_update_process(Request $request)
    {
        $RingkasanProduct_id            = $request->input("id");
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
                    "id"             => $RingkasanProduct_id,
                    'image_name'     => $new_image_name,
                    'url_image'      => $image_url
                );   
            }else {
                $arr = array(
                    "id"             => $RingkasanProduct_id,
                    'image_name'     => $new_image_name
                );
            }

            $q = $this->objRingkasanProduct->update_RingkasanProduct($arr);

            if($request->hasFile("image_name"))
            {
                $data["image_name"] = $new_image_name;
                $data["id"] = $RingkasanProduct_id ;
                $this->objRingkasanProduct->update_RingkasanProduct_image($data);
                
                //Move Uploaded File
                $destinationPath = "public/RingkasanProducts";
                //FolderHelper::create_folder_RingkasanProduct($RingkasanProduct_id);
                $request->file("image_name")->move($destinationPath,$new_image_name);
                
            }
            echo Alert::success("You successfully Update RingkasanProduct Image");
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

    function modal_RingkasanProduct_delete(Request $request)
    {
        $RingkasanProduct_id = $request->input("RingkasanProduct_id");
        $data["RingkasanProduct"] = $this->objRingkasanProduct->detail_RingkasanProduct($RingkasanProduct_id);
        return view("admin/RingkasanProduct/modal_RingkasanProduct_delete",$data);
    }

    function RingkasanProduct_delete_process(Request $request){
        
        $RingkasanProduct_id = $request->input("RingkasanProduct_id");

        $this->objRingkasanProduct->delete_RingkasanProduct($RingkasanProduct_id);

        echo Alert::success("You successfully Delete Product");
        echo "<script> setTimeout(function(){ location.reload(); },2000); </script>";
    }


}
