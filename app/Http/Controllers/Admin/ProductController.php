<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\RingkasanProduct;
use App\Models\MarketPlace;

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
        $this->objRingkasanProduct = new RingkasanProduct();
        $this->objMarketPlace = new MarketPlace();
   
    }
    //
    function index()
    {
        $data["product"] = Product::all_product();
        $data["title"]   = "Product's";
        $data['content'] = 'admin/product/product';
        return view("admin/index",$data);
    }

    function detail($id)
    {
       
        $data["title"] = "Complete Product Information";
        $data["content"] = "admin/product/product_update";
        $data["category"] = Product::all_category();
        $data["product"] = Product::detail_product($id);
        $data["specification"] = $this->objProduct->get_specification($id);

        $data["brand"] =  $this->objBrand->all_brand();
        /* foreach($data["brand"] as $rw)
        {
            echo $rw->brand_name." <br>";
        }*/
        //exit;
        $data["subcategory"] = $subcategory = Subcategory::all_subcategory();
        return view("admin/index",$data);
    }

    function detail_images($id)
    {
       
        $data["title"] = "Complete Product Information ";
        $data["content"] = "admin/product/product_update_images";
        $data["rowImg"] = Product::find_product_img($id);
        $data["prodId"] = $id;
        $data["mini_slide"] = Product::get_product_mini_slide($id);
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

        //basic information 
        $product_title      = $request->input("product_title");
        $product_description = $request->input("product_description"); 
        $product_availability= $request->input("product_availability"); 
        $brand_id           = $request->input("brand");
        
        $category           = $request->input("category");
        $subcategory        = $request->input("subcategory");
       
        $price              = $request->input("price",0);
        $stock              = $request->input("stock",0);

        //$weight             = $request->input("weight",0);
        //$old_price          = $request->input("stock",0);
        //$status             = $request->input("status");

        // $type               = $request->input("type");
        // $color              = $request->input("color");
        // $dimensions         = $request->input("dimensions");
        // $bandwith           = $request->input("bandwith");
        // $display            = $request->input("display");
        // $sim_card           = $request->input("sim_card");
        // $radio              = $request->input("radio");
        // $micro_sd           = $request->input("micro_sd");
        // $bluetooth          = $request->input("bluetooth");
        // $battery            = $request->input("battery");
        // $charger            = $request->input("charger");
        // $handsfree          = $request->input("handsfree");

        //data info
        $datetime           = date("Y-m-d H:i:s");
        $ip_address         = $request->ip();
        $user_agent         = $request->header('User-Agent');

        // $image1 = $request->file('image1');
        // $image2 = $request->file('image2');
        // $image3 = $request->file('image3');
        // $image4 = $request->file('image4');
   
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
            'product_description'   => 'min:10',
            'category'              => 'required',
            'subcategory'           => 'required',
            'brand'                 => "required",
            'price'                 => 'required|integer',
            'stock'                 => 'nullable|integer'
        ]);

        if(!$validator->fails())
        {
            $arr = array(

                'product_title' => $product_title, 
                'product_description' => $product_description,
                "product_availability"=>$product_availability,
                "category"=>$category,
                "subcategory"=>$subcategory,
                "brand_id"=>$brand_id,
                "price"=>$price,
                "stock"=>$stock,


                "created_at"=>$datetime,
                "ip_address"=>$ip_address,
                "user_agent"=>$user_agent
            );

            // $arr2 = array(
            //     'type'      => $type, 
            //     'color'     => $color,
            //     "dimensions"=>$dimensions,
            //     "bandwith"  =>$bandwith,
            //     "display"   =>$display,
            //     "sim_card"  =>$sim_card,
            //     "radio"     =>$radio,
            //     "micro_sd"  =>$micro_sd,
            //     "bluetooth" =>$bluetooth,
            //     "battery"   =>$battery,
            //     "charger"   =>$charger,
            //     "handsfree" =>$handsfree,
            // );
            
            $q = $this->objProduct->insert_product($arr);
           

            // disini tadi posisi insert images
            $new_id = $q;
            $product_id = $new_id;
            $arr2["product_id"] = $product_id;
            // $q2 = $this->objProduct->insert_specification($arr2);
            $arr_image["product_id"] = $new_id;
            FolderHelper::create_folder_product($product_id);

            echo Alert::success("You successfully Insert new Product");
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

    function product_update_image_process(Request $request){


        $product_id         = $request->input('product_id');
        $datetime           = date("Y-m-d H:i:s");
        $ip_address         = $request->ip();
        $user_agent         = $request->header('User-Agent');
        
        !empty($request->hasFile('image1')) ?  $image1 = $request->file('image1') :  $image1 = $request->input('image1_hide');
        !empty($request->hasFile('image2')) ?  $image2 = $request->file('image2') :  $image2 = $request->input('image2_hide');
        !empty($request->hasFile('image3')) ?  $image3 = $request->file('image3') :  $image3 = $request->input('image3_hide');
        !empty($request->hasFile('image4')) ?  $image4 = $request->file('image4') :  $image4 = $request->input('image4_hide');
        

        $arr = array(
            "product_id"  => $product_id,
            "ip_address"  => $ip_address,
            "user_agent"  => $user_agent,
            "created_at"  => $datetime
        );
        
        
        if(!empty($request->hasFile('image1')))
        {
            
            $new_image1 = str_replace(" ","-",strtolower($image1->getClientOriginalName()));
            $check_photo1 = $this->objProduct->detail_photo_product($product_id,"image1");
            
            if(!empty($check_photo1))
            {
                $this->objProduct->update_product_image($product_id,$new_image1,"image1");
            }
            else
            {
                $this->objProduct->insert_product_image($arr,"image1",$new_image1);
            }
            
            $destinationPath = "public/products/$product_id";
            $request->file("image1")->move($destinationPath,$new_image1);
            
        }

        if(!empty($request->hasFile('image2')))
        {
            
            $new_image2 = str_replace(" ","-",strtolower($image2->getClientOriginalName()));
            $check_photo1 = $this->objProduct->detail_photo_product($product_id,"image2");
            
            if(!empty($check_photo1))
            {
                $this->objProduct->update_product_image($product_id,$new_image2,"image2");
            }
            else
            {
                $this->objProduct->insert_product_image($arr,"image2",$new_image2);
            }
            
            $destinationPath = "public/products/$product_id";
            $request->file("image2")->move($destinationPath,$new_image2);
        }

        if(!empty($request->hasFile('image3')))
        {
            
            $new_image3 = str_replace(" ","-",strtolower($image3->getClientOriginalName()));
            $check_photo1 = $this->objProduct->detail_photo_product($product_id,"image3");
            
            if(!empty($check_photo1))
            {
                $this->objProduct->update_product_image($product_id,$new_image3,"image3");
            }
            else
            {
                $this->objProduct->insert_product_image($arr,"image3",$new_image3);
            }
            
            $destinationPath = "public/products/$product_id";
            $request->file("image3")->move($destinationPath,$new_image3);
        }

        if(!empty($request->hasFile('image4')))
        {
            
            $new_image4 = str_replace(" ","-",strtolower($image4->getClientOriginalName()));
            $check_photo1 = $this->objProduct->detail_photo_product($product_id,"image4");
            
            if(!empty($check_photo1))
            {
                $this->objProduct->update_product_image($product_id,$new_image4,"image4");
            }
            else
            {
                $this->objProduct->insert_product_image($arr,"image4",$new_image4);
            }
            
            $destinationPath = "public/products/$product_id";
            $request->file("image4")->move($destinationPath,$new_image4);
        }

        $url  = url('/admin/product/update/images/'.$product_id);
        echo '
            <script>
                setTimeout(function(){ window.location.href = "'.$url.'"; },500);
            </script>
        ';
        

    }
    
    function product_insert_mini_slide(Request $request){

        if(!empty($request->hasFile('image_slide')))
        {
            $product_id = $request->input('product_id');
            $image = $request->file('image_slide');
            $new_name = str_replace(" ","-",strtolower($image->getClientOriginalName()));
            $this->objProduct->insert_mini_slide($new_name,$product_id);
            
            $destinationPath = "public/products/$product_id";
            $request->file("image_slide")->move($destinationPath,$new_name);
            
        }

        $url  = url('/admin/product/update/images/'.$product_id);
        echo '
            <script>
                setTimeout(function(){ window.location.href = "'.$url.'"; },500);
            </script>
        ';
    }
    function product_update_process(Request $request)
    {
    
      $product_id         = $request->input("product_id");
      $product_availability  = $request->input("product_availability");
      $product_title      = $request->input("product_title");
      $price              = $request->input("price",0);
      $stock              = $request->input("stock",0);
      $weight             = $request->input("weight",0);  
      $product_description= $request->input("product_description");
      $category           = $request->input("category");
      $subcategory        = $request->input("subcategory");
      $brand              = $request->input("brand");
      
      // specification_tbl
      $type               = $request->input("type");
      $color              = $request->input("color");
      $dimensions         = $request->input("dimensions");
      $bandwith           = $request->input("bandwith");
      $display            = $request->input("display");
      $sim_card           = $request->input("sim_card");
      $radio              = $request->input("radio");
      $micro_sd           = $request->input("micro_sd");
      $bluetooth          = $request->input("bluetooth");
      $battery            = $request->input("battery");
      $charger            = $request->input("charger");
      $handsfree          = $request->input("handsfree");

      $datetime           = date("Y-m-d H:i:s");
      $ip_address         = $request->ip();
      $user_agent         = $request->header('User-Agent');

      //detail description and technical
      $sub_title_left    = $request->input("sub_title_left");
      $desc_left         = $request->input("desc_left");

      if(!empty($request->file('image_left'))){
            
        $image_left     = $request->file('image_left');
        $image_left     = str_replace(" ","-",strtolower($image_left->getClientOriginalName()));
            
            //Move Uploaded File
        $destinationPath = "public/products/$product_id";
        $request->file("image_left")->move($destinationPath,$image_left);

      }else {
         $image_left     = $request->input('image_left_hide');
      }

      $sub_title_right    = $request->input("sub_title_right");
      $desc_right         = $request->input("desc_right");

      if(!empty($request->file('image_right'))){
         $image_right     = $request->file('image_right');
         $image_right     = str_replace(" ","-",strtolower($image_right->getClientOriginalName()));
         
         //Move Uploaded File
         $destinationPath = "public/products/$product_id";
         $request->file("image_right")->move($destinationPath,$image_right);
      }else {
         $image_right     = $request->input('image_right_hide');
      }

      $sub_title_btm    = $request->input("sub_title_btm");
      $desc_btm         = $request->input("desc_btm");

      if(!empty($request->file('image_btm'))){
        $image_btm     = $request->file('image_btm');
        $image_btm = str_replace(" ","-",strtolower($image_btm->getClientOriginalName()));
        
        //Move Uploaded File
        $destinationPath = "public/products/$product_id";
        $request->file("image_btm")->move($destinationPath,$image_btm);
      }else {
         $image_btm     = $request->input('image_btm_hide');
      }

      $product_tech        = $request->input("product_tech");
     
      $validator = Validator::make($request->all(), [
        "product_id"            => "required|integer",
        'product_availability'  => 'required',
        'product_title'         => 'required|max:255',
        'price'                 => 'required|integer',
        'price.integer'         => "Numbers only",
        'stock'                 => 'nullable|integer',
        "weight"                => "nullable|integer",
        'product_description'   => 'nullable|min:10',
        'category'              => 'required',
        'subcategory'           => 'required',
        "brand"                 => "required"
      ]);

        if($validator->fails()){
            return back()->with('error', 'Whoops somethings wrong!')->withErrors($validator);
        }
        else {
            $arr = array(
                
                "product_id"    => $product_id,
                'product_title' => $product_title,
                'product_availability' => $product_availability,
                "price"         => $price,
                'stock'         => $stock,
                "weight"        => $weight,
                'product_description' => $product_description,
                "category"      => $category,
                'subcategory'   => $subcategory,
                "brand"         => $brand,
                "created_at"    => $datetime,
                "ip_address"    => $ip_address,
                "user_agent"    => $user_agent,

                'product_title_left'      => $sub_title_left,
                'product_detail_left'     => $desc_left,
                'product_detail_left_img' => $image_left,

                'product_title_right'      => $sub_title_right,
                'product_detail_right'     => $desc_right,
                'product_detail_right_img' => $image_right,

                'product_title_btm'      => $sub_title_btm,
                'product_detail_btm'     => $desc_btm,
                'product_detail_btm_img' => $image_btm,
                // 'technical_specs'        => $product_tech
               
            );


            $validator_spec = Validator::make($request->all(), [
                "type"                  => "nullable",
                'color'                 => 'nullable',
                'dimensions'            => 'nullable',
                'bandwith'              => 'nullable',
                'display'               => "nullable",
                'sim_card'              => 'nullable',
                "radio"                 => "nullable",
                'micro_sd'              => 'nullable',
                'bluetooth'             => 'nullable',
                'charger'               => 'nullable',
                "handsfree"             => "nullable"
              ]);

            if($validator_spec->fails()){
                return back()->with('error', 'Whoops somethings wrong!')->withErrors($validator_spec);
            } else {

                $arr2 = array(
                'type'      => $type, 
                'color'     => $color,
                "dimensions"=>$dimensions,
                "bandwith"  =>$bandwith,
                "display"   =>$display,
                "sim_card"  =>$sim_card,
                "radio"     =>$radio,
                "micro_sd"  =>$micro_sd,
                "bluetooth" =>$bluetooth,
                "battery"   =>$battery,
                "charger"   =>$charger,
                "handsfree" =>$handsfree,
                );
            }

            

          // dd($arr);
            $this->objProduct->update_product($arr);
            $arr2["product_id"] = $product_id;

            // check kalau ada product spec
            $check_spec = $this->objProduct->get_specification($product_id);
            if(!empty($check_spec))
            {
                $q2 = $this->objProduct->update_specification($arr2);
            }else 
            {
                $q2 = $this->objProduct->insert_specification($arr2);
            }

            return back()->with('success', 'You Sucessfully updated one product');
        }


    }

    function product_delete_process(Request $request)
    {
        $product_id         = $request->input("product_id");

        $this->objProduct->delete_product($product_id);

        echo Alert::success("You successfully Delete Product");
        echo "<script> setTimeout(function(){ location.reload(); },3000); </script>";
    }


    //ringkasan product

    function ringkasan_product($id)
    {
        $data["title"] = "Product Overview";
        $data["content"] = "admin/product/product_overview";
        $data["product"] = $this->objProduct->detail_product($id);
        $data["product_overview"] = RingkasanProduct::all_RingkasanProduct_by_product_id($id);
        return view("admin/index",$data);
    }

    function modal_ringkasan_product_insert(Request $request)
    {
        $product_id      = $request->input('product_id');
        $data["product"] = $this->objProduct->detail_product($product_id);
        return view("admin/product/modal_overview_insert",$data);
    }

    function modal_ringkasan_product_insert_process(Request $request){

        

        if(!empty($request->hasFile('product_image_overview')))
        {
            $product_id = $request->input('product_id');
            $image = $request->file('product_image_overview');
            $new_name = str_replace(" ","-",strtolower($image->getClientOriginalName()));
            $this->objRingkasanProduct->insert_RingkasanProduct($new_name,$product_id);
            
            $destinationPath = "public/product_highlight/$product_id";
            $request->file("product_image_overview")->move($destinationPath,$new_name);
            
        }

        $url  = url('/admin/product/product_overview/'.$product_id);
        echo '
            <script>
                setTimeout(function(){ window.location.href = "'.$url.'"; },500);
            </script>
        ';
    }


    function market_link($id)
    {
        $data["title"] = "Market Link's";
        $data["content"] = "admin/product/product_market_link";
        $data["product"] = $this->objProduct->detail_product($id);
        $data["product_overview"] = Product::get_product_market_id_by_product_id($id);
        return view("admin/index",$data);
    }

    function modal_market_link_insert(Request $request)
    {
        $product_id      = $request->input('product_id');
        $data["product"] = $this->objProduct->detail_product($product_id);
        $data["market_place"] = $this->objMarketPlace->all_MarketPlace();
        return view("admin/product/modal_market_link_insert",$data);
    }

    function modal_market_link_insert_process(Request $request)
    {
        $product_id         = $request->input('product_id');
        $market_place       = $request->input('market_place_id');
        $market_link        = $request->input('market_link');
        
        $arr = array(
            "product_id"        => $product_id,
            "market_place_id"   => $market_place,
            "market_link"       => $market_link,
       
        );

        $this->objMarketPlace->insert_market_place_link($arr);

        
        $url  = url('/admin/product/market_link/'.$product_id);
        echo '
            <script>
                setTimeout(function(){ window.location.href = "'.$url.'"; },500);
            </script>
        ';

    }

    function market_link_delete_process($id,$prod_id)
    {
     
        $this->objMarketPlace->delete_detail_market($id);

        $url  = url('/admin/product/market_link/'.$prod_id);
        echo '
            <script>
                setTimeout(function(){ window.location.href = "'.$url.'"; },500);
            </script>
        ';
    }


}
