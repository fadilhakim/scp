<?php 
    $product_id = $product->product_id;
    $product_title = $product->product_title;
    $price = $product->price;
    $desc = $product->product_description;
    $product_availability = $product->product_availability;
    $category_id = $product->product_category;
    $subCategory_id = $product->product_subcategory;
    $brand_id = $product->brand_id;
    
    $rowCategory =  App\Models\Product::get_category_by_id($category_id) ;
    $rowSubCategory =  App\Models\Product::get_subCategory_by_id($subCategory_id) ;
    $rowBrand =  App\Models\Product::get_brand_by_id($brand_id) ;
    $rowImg = App\Models\Product::find_product_img($product_id) ;
?>


<div class="page-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-left">
                        <h5 class=""><?php echo $product_title ?></h5>
                        <span>Please complete product information before you show to the costumer</span>
                    </div>
                </div>
                <div class="card-block">

                    <ul class="nav nav-tabs  tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#basicInformation" role="tab" aria-expanded="true">Basic Information</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#desc" role="tab" aria-expanded="false">Detail Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tech" role="tab" aria-expanded="false">Technical Specs</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" target="_blabk" href="#" aria-expanded="false">Images</a>
                        </li>
                    </ul>
                    
                    <form action="{{ url('admin/product/insert_process') }}" method="post">
                        <div class="tab-content tabs card-block">
                            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                            <div class="tab-pane active" id="basicInformation" role="tabpanel" aria-expanded="true">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Product Name : </label>
                                    <div class="col-sm-10">
                                        <input require class="form-control" name="product_title" value="<?php echo $product_title ?>" type="text">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Product Price (IDR) : </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="price" placeholder="Rp. <?php echo $price ?>" type="number">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Product Short Description :</label>
                                    <div class="col-sm-10">
                                        <textarea rows="5" cols="5" class="form-control" name="product_description" placeholder="<?php echo $desc ?>"></textarea>
                                    </div>
                                </div>

                                <h4 class="sub-title" style="padding-top:40px;">Product Category & Brand</h4>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Product Category :</label>
                                    <div class="col-sm-9">
                                        <select name="category" class="form-control">
                                        
                                            <option value="<?php $rowCategory->category_id ?>" selected><?php echo $rowCategory->category_name ?></option>
                                            <?php if(!empty($category)){foreach($category as $row){ ?>
                                            <option value="<?=$row->category_id?>"> <?=$row->category_name?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"> Subcategory :</label>
                                    <div class="col-sm-9">
                                        <select name="subcategory" class="form-control">
                                            <option value="<?php $rowSubCategory->subcategory_id ?>" selected><?php echo $rowSubCategory->subcategory_name ?></option>
                                            <?php if(!empty($subcategory)){foreach($subcategory as $row){ ?>
                                                <option value="<?=$row->subcategory_id?>"><?=$row->subcategory_name?></option>
                                            <?php }} ?>
                                        </select>             
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"> Brand :</label>
                                    <div class="col-sm-9">
                                        <select name="brand" class="form-control">
                                            <option value="<?php $rowBrand->brand_id ?>" selected><?php echo $rowBrand->brand_name ?></option>
                                            <?php if(!empty($brand)){foreach($brand as $row){ ?>
                                                <option value="<?=$row->brand_id?>"><?=$row->brand_name?></option>
                                            <?php }} ?>
                                        </select>
                                        </div>
                                </div>
                                                
                            </div>

                            <div class="tab-pane" id="desc" role="tabpanel" aria-expanded="false">
                                <div class="row" style="padding-top:20px;">
                                    <div class="col-sm-6 mobile-inputs">
                                        <h4 class="sub-title">Product Detail Left</h4>
                                        <div class="form-group">
                                            <label>Subtitle Left :</label>
                                            <input class="form-control" name="sub_title_left" value="<?php echo $product->product_title_left ?>" type="text">
                                        </div>

                                        <div class="form-group">
                                            <label>Description Left :</label>
                                            <textarea rows="5" cols="5" class="form-control" name="desc_left" placeholder=""><?php echo $product->product_detail_left ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Left Image</label><br>
                                            <?php if(!empty($product->product_detail_left_img)){ ?>
                                                <img src="{{URL::asset('public/products/'.$product_id.'/'.$product->product_detail_left_img)}}" alt="">  
                                            <?php } else { ?>
                                                <img src="{{URL::asset('public/products/no-image.png')}}" alt="">  
                                            <?php } ?>
                                            
                                            <input type="file" name="image_left" class="form-control form-bg-primary">
                                        </div>

                                    </div>
                                
                                    <div class="col-sm-6 mobile-inputs">
                                        
                                        <div class="form-group">
                                            <h4 class="sub-title">Product Detail Right</h4>
                                            <label>Subtitle Left :</label>
                                            <input class="form-control" name="sub_title_right" value="<?php echo $product->product_title_right ?>" type="text">
                                        </div>

                                        <div class="form-group">
                                            <label>Description Left :</label>
                                            <textarea rows="5" cols="5" class="form-control" name="desc_right" placeholder=""><?php echo $product->product_detail_right ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Left Image :</label><br>
                                            <?php if(!empty($product->product_detail_right_img)){ ?>
                                                <img src="{{URL::asset('public/products/'.$product_id.'/'.$product->product_detail_right_img)}}" alt="">  
                                            <?php } else { ?>
                                                <img src="{{URL::asset('public/products/no-image.png')}}" alt="">  
                                            <?php } ?>
                                            <input type="file" name="image_right" class="form-control form-bg-primary">
                                        </div>

                                    </div>
                                </div>
                            

                                <div class="row" style="padding-top:40px;">
                                    <div class="col-sm-12 mobile-inputs">
                                        <h4 class="sub-title">Bottom Description Detail</h4>
                                        <div class="form-group">
                                            <label>Product Title Bottom  :</label>
                                            <input class="form-control" name="sub_title_btm" value="<?php echo $product->product_title_btm ?>" type="text">
                                            <label>Product Description Bottom :</label><br>
                                            <textarea class="form-control" name="sub_detail_btm" id=""><?php echo $product->product_detail_btm ?></textarea>
                                            <label for="">Bottom Image :</label><br>
                                            <?php if(!empty($product->product_detail_btm_img)){ ?>
                                                <img src="{{URL::asset('public/products/'.$product_id.'/'.$product->product_detail_btm_img)}}" alt="">  
                                            <?php } else { ?>
                                                <img src="{{URL::asset('public/products/no-image.png')}}" alt="">  
                                            <?php } ?>
                                            <input type="file" name="image_right" class="form-control form-bg-primary">
                                        </div>
                                    </div>
                                </div>                  

                            </div>
                            
                            <div class="tab-pane" id="tech" role="tabpanel" aria-expanded="false">

                                <div class="form-group col-sm-12">
                                    <label for="">Technical Specs</label>
                                    <textarea id="editor2" name="product_tech" class="form-control"><?php echo $product->technical_specs ?></textarea>
                                </div>               
                                <script>
                                    CKEDITOR.replace( 'editor2' );                           
                                </script>               
                            </div>

                             <div class="row">
                                <div class="col-sm-12" style="text-align:right;">
                                    <button class="btn btn-primary">SUBMIT</button>                
                                <div>
                                                
                            </div>                     
                        </div>
                    </form>                       
                        
                        <div class="tab-content tabs card-block">                       

                            <div class="tab-pane" id="images" role="tabpanel" aria-expanded="false">
                                <?php foreach($rowImg as $img){ 

                                    $firstImg = App\Models\Product::get_image_by_field($product_id,1) ;
                                    $secImg = App\Models\Product::get_image_by_field($product_id,2) ;
                                    $thirdImg = App\Models\Product::get_image_by_field($product_id,3) ;
                                    $fourthImg = App\Models\Product::get_image_by_field($product_id,4) ;
                                }?>

                                <div class="row form-group">
                                    <div class="col-lg-6 p-20">

                                        <div class="p-20 z-depth-bottom-0 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-top-0">
                                            <label for="">First Image <strong>(Thumbnail) :</strong></label><br>
                                            
                                            <?php if(!empty($firstImg)){ ?>
                                                <img src="{{URL::asset('public/products/'.$product_id.'/'.$firstImg->image_name)}}" alt="">   
                                            <?php } else { ?>
                                                <img src="{{URL::asset('public/products/no-image.png')}}" alt="">  
                                            <?php } ?>

                                            <input type="file" name="image1" class="form-control form-bg-primary">
                                        </div>

                                    </div>

                                    <div class="col-lg-6 p-20">
                                        <div class="p-20 z-depth-bottom-0 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-top-0">

                                            <label for="">Second Image :</label><br>
                                            <?php if(!empty($secImg)){ ?>
                                                <img src="{{URL::asset('public/products/'.$product_id.'/'.$secImg->image_name)}}" alt="">   
                                            <?php } else { ?>
                                                <img src="{{URL::asset('public/products/no-image.png')}}" alt="">  
                                            <?php } ?>
                                            
                                            <input type="file" name="image2" class="form-control form-bg-primary">

                                        </div>
                                    </div>

                                    <div class="col-lg-6 p-20">
                                        <div class="p-20 z-depth-bottom-0 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-top-0">

                                            <label for="">Third Image :</label><br>
                                            <?php if(!empty($thirdImg)){ ?>
                                                <img src="{{URL::asset('public/products/'.$product_id.'/'.$thirdImg->image_name)}}" alt="">   
                                            <?php } else { ?>
                                                <img src="{{URL::asset('public/products/no-image.png')}}" alt="">  
                                            <?php } ?>
                                            
                                            <input type="file" name="image3" class="form-control form-bg-primary">

                                        </div>
                                    </div>

                                    <div class="col-lg-6 p-20">
                                        <div class="p-20 z-depth-bottom-0 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-top-0">

                                            <label for="">Fourth Image :</label><br>
                                            <?php if(!empty($fourthImg)){ ?>
                                                <img src="{{URL::asset('public/products/'.$product_id.'/'.$fourthImg->image_name)}}" alt="">   
                                            <?php } else { ?>
                                                <img src="{{URL::asset('public/products/no-image.png')}}" alt="">  
                                            <?php } ?>
                                            
                                            <input type="file" name="image4" class="form-control form-bg-primary">

                                        </div>
                                    </div>

                                    <div class="col-lg-12 p-20">
                                    <h4 class="sub-title" style="padding-top:40px;">Product Mini Slide :</h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Image Display</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($mini_slide as $rowSlide) {?>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>
                                                                <img src="{{URL::asset('public/products_mini_slide/'.$rowSlide->image_name)}}" alt="">
                                                            </td>
                                                            <td>
                                                                <a href="" class="btn btn-danger">Delete</a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>         
                                    </div>

                                </div>
                            </div>

                        </div>                               
                     
                </div>
            </div>
        </div>
    </div>
</div>