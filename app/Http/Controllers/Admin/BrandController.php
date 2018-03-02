<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Validator;
use App\Libraries\Alert;
use App\Http\Controllers\Controller;
use App\Models\Brand;

class BrandController extends Controller
{
    private $objBrand;

    function __construct()
    {
        $this->objBrand = new Brand();
    }

    function index()
    {
        $data["brand"] = Brand::all_brand();
        $data["title"]   = "Brand";
        $data['content'] = 'admin/brand/brand';
        return view("admin/index",$data);
    }

    function insert_brand_modal()
    {
      
      
        return view("admin/brand/modal_brand_insert");
    }

    function update_brand_modal(Request $request)
    {
        $brand_id = $request->input("brand_id");
        $data["brand"]    = $this->objBrand->detail_brand($brand_id);
        return view("admin/brand/modal_brand_update",$data);
    }

    function delete_brand_modal(Request $request)
    {
        $brand_id = $request->input("brand_id");
        $data["brand"] = $this->objBrand->detail_brand($brand_id);
        return view("admin/brand/modal_brand_delete",$data);
    }

    function insert_brand_process(Request $request)
    {
        $datetime           = date("Y-m-d H:i:s");
        $ip_address         = $request->ip();
        $user_agent         = $request->header('User-Agent');

        $validator = Validator::make($request->all(),[
            "brand_name"=>"required|unique:brand_tbl|max:100"
        ]);

        if($validator)
        {
            $brand_image = "";
            if(!empty($request->input("brand_image")))
            {
                $brand_image = $request->input("brand_image");
            }

            $arr = array(
                "brand_name"=>$request->input("brand_name"),
                "brand_image"=>$brand_image,
                "created_at"=>$datetime,
                "ip_address"=>$ip_address,
                "user_agent"=>$user_agent
            );

            $this->objBrand->insert_brand($arr);

            echo Alert::success("You successfully Insert new brand");
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

    function update_brand_process(Request $request)
    {
        $datetime           = date("Y-m-d H:i:s");
        $ip_address         = $request->ip();
        $user_agent         = $request->header('User-Agent');
        $brand_id           = $request->input("brand_id");

        $brand = $this->objBrand->detail_brand($brand_id);

        $validator = Validator::make($request->all(),[
            "brand_name"=>"required|unique:brand_tbl|max:100"
        ]);

        if($validator)
        {
            $arr = array(
                "brand_id"=>$request->input("brand_id"),
                "brand_name"=>$request->input("brand_name"),
                "created_at"=>$datetime,
                "ip_address"=>$ip_address,
                "user_agent"=>$user_agent
            );

            $this->objBrand->update_brand($arr);

            echo Alert::success("You successfully Update new brand");
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

    function delete_brand_process(Request $request)
    {
        $brand_id         = $request->input("brand_id");
        
        $this->objBrand->delete_brand($brand_id);

        echo Alert::success("You successfully Delete brand");
        echo "<script> setTimeout(function(){ location.reload(); },3000); </script>";
    }
}
