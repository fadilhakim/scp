<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use App\Libraries\Alert;
use App\Models\Spesification;

class SpesificationController extends Controller
{
    //

    function index()
    {
        $data["category"] = Category::all_category();
        $data["title"]   = "Product Category";
        $data['content'] = 'admin/category/category';
        return view("admin/index",$data);
    }

    function subcategory(Request $request)
    {
        $category_id = $request->input("category_id");
        $data["category"]    = Category::category_detail($category_id);
        $data["subcategory"] = Category::list_subcategory($category_id);      
       
        return view("admin/category/modal_subcategory",$data);
    }

    function insert_category_modal(Request $request)
    {
       

        
        $data=array();
      
        return view("admin/category/modal_category_insert",$data);
    }

    function update_category_modal(Request $request)
    {
      
        $category_id = $request->input("category_id");
        $data["category"] = Category::category_detail($category_id);
        return view("admin/category/modal_category_update",$data);
    }

    function insert_category_process(Request $request)
    {
        $datetime           = date("Y-m-d H:i:s");
        $ip_address         = $request->ip();
        $user_agent         = $request->header('User-Agent');

        $validator = Validator::make($request->all(),[
            "category_name"=>"required|unique:category_tbl|max:100"
        ]);

        if($validator)
        {
            $arr = array(
                "category_name"=>$request->input("category_name"),
                "created_at"=>$datetime,
                "ip_address"=>$ip_address,
                "user_agent"=>$user_agent
            );

            Category::insert_category($arr);

            echo Alert::success("You successfully Insert new Category");
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

    function insert_subcategory_process(Request $request)
    {
        $datetime           = date("Y-m-d H:i:s");
        $ip_address         = $request->ip();
        $user_agent         = $request->header('User-Agent');

        $validator = Validator::make($request->all(),[
            "subcategory_name"=>"required|unique:subcategory_tbl|max:100",
            "category_id"=>"required"
        ]);

        if($validator)
        {
            $arr = array(
                "category_id"=>$request->input("category_id"),
                "subcategory_name"=>$request->input("subcategory_name"),
                "created_at"=>$datetime,
                "ip_address"=>$ip_address,
                "user_agent"=>$user_agent
            );

            Category::insert_subcategory($arr);

            echo Alert::success("You successfully Insert new Subcategory");
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

    function update_category_process(Request $request)
    {
      
        $datetime           = date("Y-m-d H:i:s");
        $ip_address         = $request->ip();
        $user_agent         = $request->header('User-Agent');

        $validator = Validator::make($request->all(),[
            "category_name"=>"required|unique:category_tbl|max:100"
        ]);

        if($validator)
        {
            $arr = array(
                "category_id"=>$request->input("category_id"),
                "category_name"=>$request->input("category_name"),
                "created_at"=>$datetime,
                "ip_address"=>$ip_address,
                "user_agent"=>$user_agent
            );

            Category::update_category($arr);

            echo Alert::success("You successfully Update new Category");
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

    function delete_category_modal(Request $request)
    {
        $category_id = $request->input("category_id");
        $data["category"] = Category::category_detail($category_id);
        return view("admin/category/modal_category_delete",$data);
    }

    function delete_category_process(Request $request)
    {
        $category_id         = $request->input("category_id");
        
        Category::delete_category($category_id);

        echo Alert::success("You successfully Delete Category");
        echo "<script> setTimeout(function(){ location.reload(); },3000); </script>";
    }

    function delete_subcategory_modal(Request $request)
    {
       
    }
}
