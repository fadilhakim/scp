<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;

use App\Libraries\Alert;
use App\Libraries\FolderHelper;

class ProductController extends Controller
{
    private $objProduct;
    private $objBrand;

    function __construct()
    {
        $this->objProduct = new Product();
        $this->objBrand = new Brand();
    }
    //
    function index()
    {
        $data["product"] = Product::all_product();
        $data["title"]   = "Product";
        $data['content'] = 'admin/product/product';
        return view("admin/index",$data);
    }

    function detail($id)
    {
       
        $data["title"] = "Complete Product Information";
        $data["content"] = "admin/product/product_update";
        $data["category"] = Product::all_category();
        $data["product"] = Product::detail_product($id);
        $data["mini_slide"] = Product::get_product_mini_slide($id);
        $data["subcategory"] = $subcategory = Subcategory::all_subcategory();
        return view("admin/index",$data);
    }

    function modal_product_insert()
    {
       
        $data["category"] = $category = Category::all_category();
        $data["subcategory"] = $subcategory = Subcategory::all_subcategory();
        $data["brand"] = $brand = $this->objBrand->all_brand();
        return view("admin/product/modal_product_insert",$data);
    }

    function modal_product_update(Request $request)
    {
        $product_id = $request->input("product_id");

        $data["image1"] = $this->objProduct->detail_photo_product($product_id,"image1");
        $data["image2"] = $this->objProduct->detail_photo_product($product_id,"image2");
        $data["image3"] = $this->objProduct->detail_photo_product($product_id,"image3");
        $data["image4"] = $this->objProduct->detail_photo_product($product_id,"image4");

        

        $data["product"] = $product=  $this->objProduct->detail_product($product_id);
        $data["category"] = $category = Category::all_category();
        $data["subcategory"] = $subcategory = Subcategory::all_subcategory();
        $data["brand"] = $brand = $this->objBrand->all_brand();
        return view("admin/product/modal_product_update",$data);
    }

    function modal_product_delete(Request $request)
    {
        $product_id = $request->input("product_id");
        $data["product"] = $this->objProduct->detail_product($product_id);
        return view("admin/product/modal_product_delete",$data);
    }

    function product_insert_process(Request $request)
    {
        $product_title      = $request->input("product_title");
        $product_description= $request->input("product_description"); 
        $product_availability= $request->input("product_availability"); 
        $brand_id           = $request->input("brand");
        $status             = $request->input("status");
        $category           = $request->input("category");
        $subcategory        = $request->input("subcategory");
        $old_price          = $request->input("stock",0);
        $price              = $request->input("price",0);
        $stock              = $request->input("stock",0);
        $weight             = $request->input("weight",0);

        $datetime           = date("Y-m-d H:i:s");
        $ip_address         = $request->ip();
        $user_agent         = $request->header('User-Agent');
        
        $image1 = $request->file('image1');
        $image2 = $request->file('image2');
        $image3 = $request->file('image3');
        $image4 = $request->file('image4');
   
        /* //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';
     
        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';
     
        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';
     
        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';
     
        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();
        exit;
        //Move Uploaded File
        //$destinationPath = 'uploads';
        //$file->move($destinationPath,$file->getClientOriginalName());*/

        $validator = Validator::make($request->all(), [
            'product_title'         => 'required|unique:product_tbl|max:255',
            'product_description'   => 'required|min:10',
            'category'              => 'required',
            'subcategory'           => 'required',
            "brand"                 => "required",
            'price'                 => 'required|integer',
            'old_price'             => 'nullable|integer',
            'stock'                 => 'nullable|integer',
            "weight"                => "nullable|integer"
        ]);

        if(!$validator->fails())
        {
            $arr = array(
                'product_title' => $product_title, 
                'product_description' => $product_description,
                "product_availability"=>$product_availability,
                "status"=>$status,
                "category"=>$category,
                "subcategory"=>$subcategory,
                "brand_id"=>$brand_id,
                "price"=>$price,
                "old_price"=>$old_price,
                "stock"=>$stock,
                "weight"=>$weight,
                "created_at"=>$datetime,
                "ip_address"=>$ip_address,
                "user_agent"=>$user_agent
            );

            $q = $this->objProduct->insert_product($arr);

            $new_id = $q;
            $product_id = $new_id;
            $arr_image["product_id"] = $new_id;
           
            $arr_image["datetime"]   = $datetime;
            $arr_image["user_agent"] = $user_agent;
            $arr_image["ip_address"] = $ip_address;

            if($request->hasFile("image1"))
            {
                $arr_image["image_field"] = "image1";
                $new_image_name = str_replace(" ","-",strtolower($image1->getClientOriginalName()));
                $arr_image["image_name"] = $new_image_name;

                $this->objProduct->insert_product_image($arr_image);
                
                //Move Uploaded File
                $destinationPath = "public/products/$product_id";
                FolderHelper::create_folder_product($product_id);
                $request->file("image1")->move($destinationPath,$new_image_name);
                
            }
            if($request->hasFile("image2"))
            {
                $arr_image["image_field"] = "image2";
                $new_image_name = str_replace(" ","-",strtolower($image2->getClientOriginalName()));
                $arr_image["image_name"] = $new_image_name;
                
                $this->objProduct->insert_product_image($arr_image);

                //Move Uploaded File
                $destinationPath = "public/products/$product_id";
                FolderHelper::create_folder_product($product_id);
                $request->file("image2")->move($destinationPath,$new_image_name);
            }
            if($request->hasFile("image3"))
            {
                $arr_image["image_field"] = "image3";
                $new_image_name = str_replace(" ","-",strtolower($image3->getClientOriginalName()));
                $arr_image["image_name"] = $new_image_name;
                
                $this->objProduct->insert_product_image($arr_image);
                

                //Move Uploaded File
               //Move Uploaded File
               $destinationPath = "public/products/$product_id";
               FolderHelper::create_folder_product($product_id);
               $request->file("image3")->move($destinationPath,$new_image_name);
            }
            if($request->hasFile("image4"))
            {
                $arr_image["image_field"] = "image4";
                $new_image_name = str_replace(" ","-",strtolower($image4->getClientOriginalName()));
                $arr_image["image_name"] = $new_image_name;
                $this->objProduct->insert_product_image($arr_image);

                //Move Uploaded File
               //Move Uploaded File
               $destinationPath = "public/products/$product_id";
               FolderHelper::create_folder_product($product_id);
               $request->file("image4")->move($destinationPath,$new_image_name);
            }

            echo Alert::success("You successfully Insert new Product");
            
            //echo "<script> setTimeout(function(){ location.reload(); },2000); </script>";
            //return redirect('admin/bank_account');
            $url  = url('/admin/product/update/'.$product_id);
            echo '
                <script>
                    setTimeout(function(){ window.location.href = "'.$url.'"; },2000);
                </script>
            ';

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

    function product_update_process(Request $request)
    {
        $product_id         = $request->input("product_id");
        $product_title      = $request->input("product_title");
        $product_description= $request->input("product_description"); 
        $product_availability= $request->input("product_availability"); 
        $status             = $request->input("status");
        $category           = $request->input("category");
        $subcategory        = $request->input("subcategory");
        $brand_id           = $request->input("brand");
        $old_price          = $request->input("stock",0);
        $price              = $request->input("price",0);
        $stock              = $request->input("stock",0);
        $weight             = $request->input("weight",0);

        $datetime           = date("Y-m-d H:i:s");
        $ip_address         = $request->ip();
        $user_agent         = $request->header('User-Agent');
       
        $image1 = $request->file('image1');
        $image2 = $request->file('image2');
        $image3 = $request->file('image3');
        $image4 = $request->file('image4');

        $validator = Validator::make($request->all(), [
            "product_id"            => "required|integer",
            'product_title'         => 'required|max:255',
            'product_description'   => 'required|min:10',
            'category'              => 'required',
            'subcategory'           => 'required',
            "brand"                 => "required",
            'price'                 => 'required|integer',
            'old_price'             => 'nullable|integer',
            'stock'                 => 'nullable|integer',
            "weight"                => "nullable|integer"
        ]);

        if(!$validator->fails())
        {
            $arr = array(
                "product_id"    => $product_id,
                'product_title' => $product_title, 
                'product_description' => $product_description,
                "product_availability"=>$product_availability,
                "status"=>$status,
                "category"=>$category,
                "subcategory"=>$subcategory,
                "brand"=>$brand_id, 
                "price"=>$price,
                "old_price"=>$old_price,
                "stock"=>$stock,
                "weight"=>$weight,
                "created_at"=>$datetime,
                "ip_address"=>$ip_address,
                "user_agent"=>$user_agent
            );

            $this->objProduct->update_product($arr);

            $arr_image["product_id"] = $product_id;

            $arr_image["datetime"]   = $datetime;
            $arr_image["user_agent"] = $user_agent;
            $arr_image["ip_address"] = $ip_address;

            if($request->hasFile("image1"))
            {
                $arr_image["image_field"] = "image1";
                $new_image_name = str_replace(" ","-",strtolower($image1->getClientOriginalName()));
                $arr_image["image_name"] = $new_image_name;
                $check_photo1 = $this->objProduct->detail_photo_product($product_id,"image1");
                if(!empty($check_photo1))
                {
                    $this->objProduct->update_product_image($arr_image);
                }
                else
                {
                    $this->objProduct->insert_product_image($arr_image);
                }

                //Move Uploaded File
                $destinationPath = "public/products/$product_id";
                FolderHelper::create_folder_product($product_id);
                $request->file("image1")->move($destinationPath,$new_image_name);
                
            }
            if($request->hasFile("image2"))
            {
                $arr_image["image_field"] = "image2";
                $new_image_name = str_replace(" ","-",strtolower($image2->getClientOriginalName()));
                $arr_image["image_name"] = $new_image_name;
                $check_photo2 = $this->objProduct->detail_photo_product($product_id,"image2");
                if(!empty($check_photo1))
                {
                    $this->objProduct->update_product_image($arr_image);
                }
                else
                {
                    $this->objProduct->insert_product_image($arr_image);
                }

                //Move Uploaded File
                $destinationPath = "public/products/$product_id";
                FolderHelper::create_folder_product($product_id);
                $request->file("image2")->move($destinationPath,$new_image_name);
            }
            if($request->hasFile("image3"))
            {
                $arr_image["image_field"] = "image3";
                $new_image_name = str_replace(" ","-",strtolower($image3->getClientOriginalName()));
                $arr_image["image_name"] = $new_image_name;
                $check_photo3 = $this->objProduct->detail_photo_product($product_id,"image3");
                if(!empty($check_photo3))
                {
                    $this->objProduct->update_product_image($arr_image);
                }
                else
                {
                    $this->objProduct->insert_product_image($arr_image);
                }

                //Move Uploaded File
               //Move Uploaded File
               $destinationPath = "public/products/$product_id";
               FolderHelper::create_folder_product($product_id);
               $request->file("image3")->move($destinationPath,$new_image_name);
            }
            if($request->hasFile("image4"))
            {
                $arr_image["image_field"] = "image4";
                $new_image_name = str_replace(" ","-",strtolower($image4->getClientOriginalName()));
                $arr_image["image_name"] = $new_image_name;
                $check_photo4 = $this->objProduct->detail_photo_product($product_id,"image4");
                if(!empty($check_photo4))
                {
                    $this->objProduct->update_product_image($arr_image);
                }
                else
                {
                    $this->objProduct->insert_product_image($arr_image);
                }

                //Move Uploaded File
               //Move Uploaded File
               $destinationPath = "public/products/$product_id";
               FolderHelper::create_folder_product($product_id);
               $request->file("image4")->move($destinationPath,$new_image_name);
            }

            echo Alert::success("You successfully Update new Product");
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

    function product_delete_process(Request $request)
    {
        $product_id         = $request->input("product_id");

        $this->objProduct->delete_product($product_id);

        echo Alert::success("You successfully Delete Product");
        echo "<script> setTimeout(function(){ location.reload(); },3000); </script>";
    }


}
