<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Models\MarketPlace;

use App\Libraries\Alert;
use App\Libraries\FolderHelper;

class MarketPlaceController extends Controller
{

    private $objMarketPlace;
    
    function __construct()
    {
        $this->objMarketPlace = new MarketPlace();
    }

    function index()
    {
        $data["MarketPlace"] = MarketPlace::all_MarketPlace();
        $data["title"]   = "Market Place Product";
        $data['content'] = 'admin/marketplace/market';
        return view("/admin/index",$data);
    }

    function modal_MarketPlace_insert()
    {
        return view("admin/marketplace/modal_market_insert");
    }


    function MarketPlace_insert_process(Request $request)
    {
        // dd($request->file('MarketPlace_logo')->getClientOriginalName());
        $market_name          = $request->input("market_name");
        $market_logo          = $request->file('market_logo');
        $market_logo_new      = str_replace(" ","-",strtolower($market_logo->getClientOriginalName()));


        $validator = Validator::make($request->all(), [
            'market_name'  => 'required|max:255',
            'market_logo' => 'required'
        ]);

        if(!$validator->fails())
        {
            $arr = array(
                'market_name' => $market_name, 
                'market_logo' => $market_logo_new 
            ); 

            $q = $this->objMarketPlace->insert_MarketPlace($arr);

            $destinationPath = "public/market_logo";
            $request->file("market_logo")->move($destinationPath,$market_logo_new);

            echo Alert::success("You successfully Insert New Market Place");
            echo "<script> setTimeout(function(){ location.reload(); },1000); </script>";

        }

        else
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

    function modal_MarketPlace_update(Request $request)
    {
        $MarketPlace_id = $request->input("MarketPlace_id");
        $data["MarketPlace"] = $MarketPlace =  $this->objMarketPlace->detail_MarketPlace($MarketPlace_id);
        return view("admin/marketplace/modal_MarketPlace_update",$data);
        //return "res";
  
    }

    function MarketPlace_update_process(Request $request)
    {
        $MarketPlace_id            = $request->input("id");
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
                    "id"             => $MarketPlace_id,
                    'image_name'     => $new_image_name,
                    'url_image'      => $image_url
                );   
            }else {
                $arr = array(
                    "id"             => $MarketPlace_id,
                    'image_name'     => $new_image_name
                );
            }

            $q = $this->objMarketPlace->update_MarketPlace($arr);

            if($request->hasFile("image_name"))
            {
                $data["image_name"] = $new_image_name;
                $data["id"] = $MarketPlace_id ;
                $this->objMarketPlace->update_MarketPlace_image($data);
                
                //Move Uploaded File
                $destinationPath = "public/MarketPlaces";
                //FolderHelper::create_folder_MarketPlace($MarketPlace_id);
                $request->file("image_name")->move($destinationPath,$new_image_name);
                
            }
            echo Alert::success("You successfully Update MarketPlace Image");
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

    function modal_MarketPlace_delete(Request $request)
    {
        $MarketPlace_id = $request->input("market_id");
        $data["MarketPlace"] = $this->objMarketPlace->detail_MarketPlace($MarketPlace_id);
        return view("admin/marketplace/modal_market_delete",$data);
    }

    function MarketPlace_delete_process(Request $request){
        
        $MarketPlace_id = $request->input("market_id");

        $this->objMarketPlace->delete_MarketPlace($MarketPlace_id);

        echo Alert::success("You successfully Delete MarketPlace");
        echo "<script> setTimeout(function(){ location.reload(); },2000); </script>";
    }


}
