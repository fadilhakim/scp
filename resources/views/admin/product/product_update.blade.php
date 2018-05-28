<?php 
    $product_id = $product->product_id;
    $product_title = $product->product_title;
    $price = $product->price;

    $stock = $product->stock;
    $weight = $product->weight;

    $desc = $product->product_description;
    $product_availability = $product->product_availability;
    $category_id = $product->product_category;
    $subCategory_id = $product->product_subcategory;
    $brand_id = $product->brand_id;
    
    $rowCategory =  App\Models\Product::get_category_by_id($category_id) ;
    $rowSubCategory =  App\Models\Product::get_subCategory_by_id($subCategory_id) ;
    $rowBrand =  App\Models\Product::get_brand_by_id($brand_id) ;
    $rowImg = App\Models\Product::find_product_img($product_id) ;

    $spec_type      = isset($specification->type) ? $specification->type : "";
    $spec_color     = isset($specification->color) ? $specification->color : "";
    $spec_dimensions= isset($specification->dimensions) ? $specification->dimensions : "";
    $spec_bandwith  = isset($specification->bandwith) ? $specification->bandwith : "";
    $spec_display   = isset($specification->display) ? $specification->display : "";
    $spec_sim_card  = isset($specification->sim_card) ? $specification->sim_card : "";
    $spec_radio     = isset($specification->radio) ? $specification->radio : "";
    $spec_micro_sd  = isset($specification->micro_sd) ? $specification->micro_sd : "";
    $spec_bluetooth = isset($specification->bluetooth) ? $specification->bluetooth : "";
    $spec_battery   = isset($specification->battery) ? $specification->battery : "";
    $spec_charger   = isset($specification->charger) ? $specification->charger : "";
    $spec_handsfree = isset($specification->handsfree) ? $specification->handsfree : "";
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
                            <a class="nav-link" target="_blank" href="{{url('admin/product/update/images/'.$product_id)}}" aria-expanded="false">Images</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="{{url('admin/product/product_overview/'.$product_id)}}" aria-expanded="false">Product Overview (Image's)</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="{{url('admin/product/market_link/'.$product_id)}}" aria-expanded="false">Market Link's</a>
                        </li>
                    </ul>
                    
                    <form action="{{ url('admin/product/update_process') }}" method="post" enctype="multipart/form-data">
                        <div class="tab-content tabs card-block">
                            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="product_id" value="{{ $product->product_id}}">
                            
                            <div class="tab-pane active" id="basicInformation" role="tabpanel" aria-expanded="true">
                                @if (\Session::get('success'))
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">
                                    </label>
                                    <div class="col-sm-9">
                                        <button class="btn btn-success"><i class="icofont icofont-check-circled"></i>{{ \Session::get('success') }}</button>
                                    </div>
                                </div>
                                @endif

                                 @if (\Session::get('error'))
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">
                                    </label>
                                    <div class="col-sm-9">
                                        <button class="btn btn-danger"><i class="icofont icofont-warning-alt"></i>{{ \Session::get('error') }}</button>
                                    </div>
                                </div>
                                @endif

                                @if ($errors->any())
                                  
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                     
                                @endif    
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Product Availability : </label>
                                    <div class="col-sm-9">
                                        <select name="product_availability" class="form-control">
                                            <option selected value="<?php echo $product_availability ?>"><?php echo $product_availability ?></option>
                                            <option value="Ready Stock"> Ready Stock </option>
                                            <option value="Pre Order"> Pre Order </option>
                                            <option value="Sales Stock"> Sales Stock </option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row {{ $errors->has('product_title') ? 'has-danger' : ''}}">
                                    <label class="col-sm-3 col-form-label">Product Name : </label>
                                    <div class="col-sm-9">
                                        <input require class="form-control {{ $errors->has('product_title') ? 'form-control-danger' : ''}}" name="product_title" value="<?php echo $product_title ?>" type="text">
                                        {!! $errors->first('product_title', '<div class="col-form-label">:message</div>') !!}
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('price') ? 'has-danger' : ''}}">
                                    <label class="col-sm-3 col-form-label">Product Price (IDR) : </label>
                                    <div class="col-sm-9">
                                        <input class="form-control  {{ $errors->has('product_title') ? 'form-control-danger' : ''}}" name="price" value="<?php echo $price ?>" type="number">
                                        {!! $errors->first('price', '<div class="col-form-label">:message</div>') !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Stock : </label>
                                    <div class="col-sm-3">
                                        <input class="form-control" name="stock" value="<?php echo $stock ?>" type="number">
                                    </div>
                                    <label class="col-sm-3 col-form-label">Weight (<strong>In Gram</strong>) : </label>
                                    <div class="col-sm-3">
                                        <input class="form-control" name="weight" value="<?php echo $weight ?>" type="number">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Product Short Description :</label>
                                    <div class="col-sm-9">
                                        <textarea rows="5" cols="5" class="form-control" name="product_description" placeholder=""><?php echo $desc ?></textarea>
                                    </div>
                                </div>

                                <h4 class="sub-title" style="padding-top:40px;">Product Category & Brand</h4>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Product Category :</label>
                                    <div class="col-sm-9">
                                        <select name="category" class="form-control">
                                        
                                            <option value="<?php echo $rowCategory->category_id ?>" selected><?php echo $rowCategory->category_name ?></option>
                                            <?php if(!empty($category)){foreach($category as $row){ ?>
                                            <option value="<?=$row->category_id?>"> <?=$row->category_name?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"> Subcategory :</label>
                                    <div class="col-sm-9">
                                        <select name="subcategory" class="form-control" selected>
                                            <option value="<?php echo $rowSubCategory->subcategory_id ?>"><?php echo $rowSubCategory->subcategory_name ?></option>
                                            <?php if(!empty($subcategory)){foreach($subcategory as $row){ ?>
                                                <option value="<?=$row->subcategory_id?>"><?=$row->subcategory_name?></option>
                                            <?php }} ?>
                                        </select>             
                                    </div>
                                </div>
                                <?php /* var_dump($brand); 
                                foreach($brand as $rww)
                                {
                                    echo $rww->brand_name."<br>";
                                }
                                exit;*/ ?>                      
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label"> Brand :</label>
                                    <div class="col-sm-9">
                                        <select name="brand" class="form-control">
                                            <?php /* <option value="<?php echo $rowBrand->brand_id ?>" selected><?php echo $rowBrand->brand_name ?></option> */ ?>
                                            <?php 

                                            if(!empty($brand)){
                                                foreach($brand as $row22){ ?>
                                                <option value="<?=$row22->brand_id?>"><?=$row22->brand_name?></option>
                                            <?php } }?>
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
                                                <img class="img-fluid" src="{{URL::asset('public/products/'.$product_id.'/'.$product->product_detail_left_img)}}" alt="">  
                                            <?php } else { ?>
                                                <img src="{{URL::asset('public/products/no-image.png')}}" alt="">  
                                            <?php } ?>
                                            <input type="hidden" name="image_left_hide" value="<?php echo $product->product_detail_left_img ?>" class="form-control form-bg-primary">
                                            <input type="file" name="image_left" class="form-control form-bg-primary">
                                        </div>

                                    </div>
                                
                                    <div class="col-sm-6 mobile-inputs">
                                        
                                        <div class="form-group">
                                            <h4 class="sub-title">Product Detail Right</h4>
                                            <label>Subtitle Right :</label>
                                            <input class="form-control" name="sub_title_right" value="<?php echo $product->product_title_right ?>" type="text">
                                        </div>

                                        <div class="form-group">
                                            <label>Description Right :</label>
                                            <textarea rows="5" cols="5" class="form-control" name="desc_right" placeholder=""><?php echo $product->product_detail_right ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Right Image :</label><br>
                                            <?php if(!empty($product->product_detail_right_img)){ ?>
                                                <img class="img-fluid" src="{{URL::asset('public/products/'.$product_id.'/'.$product->product_detail_right_img)}}" alt="">  
                                            <?php } else { ?>
                                                <img src="{{URL::asset('public/products/no-image.png')}}" alt="">  
                                            <?php } ?>
                                            <input type="hidden" name="image_right_hide" value="<?php echo $product->product_detail_right_img ?>" class="form-control form-bg-primary">
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
                                            <textarea class="form-control" name="desc_btm" id=""><?php echo $product->product_detail_btm ?></textarea>
                                            <label for="">Bottom Image :</label><br>
                                            <?php if(!empty($product->product_detail_btm_img)){ ?>
                                                <img src="{{URL::asset('public/products/'.$product_id.'/'.$product->product_detail_btm_img)}}" alt="">  
                                            <?php } else { ?>
                                                <img src="{{URL::asset('public/products/no-image.png')}}" alt="">  
                                            <?php } ?>
                                            <input type="hidden" name="image_btm_hide" value="<?php echo $product->product_detail_btm_img ?>" class="form-control form-bg-primary">
                                            <input style="width:50%" type="file" name="image_btm" class="form-control form-bg-primary">
                                        </div>
                                    </div>
                                </div>                  

                            </div>
                            
                            <div class="tab-pane" id="tech" role="tabpanel" aria-expanded="false">
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label> Type </label>
                                        <input type="text" name="type" class="form-control" value="<?=$spec_type?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label> Color </label>
                                        <input type="text" name="color" class="form-control" value="<?=$spec_color?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label> Dimensions </label>
                                        <input type="text" name="dimensions" class="form-control" value="<?=$spec_dimensions?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label> Bandwith </label>
                                        <input type="text" name="bandwith" class="form-control" value="<?=$spec_bandwith?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label> Display </label>
                                        <input type="text" name="display" class="form-control" value="<?=$spec_display?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label> Sim Card </label>
                                        <input type="text" name="sim_card" class="form-control" value="<?=$spec_sim_card?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label> Radio </label>
                                        <input type="text" name="radio" class="form-control" value="<?=$spec_radio?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label> Micro SD </label>
                                        <input type="text" name="micro_sd" class="form-control" value="<?=$spec_micro_sd?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label> Bluetooth </label><br>
                                        <?php
                                            $byes_selected = "";
                                            $bno_selected = "";
                                            if($spec_bluetooth == "yes")
                                            {
                                                $byes_selected = "checked='checked'";
                                            }else
                                            {
                                                $bno_selected = "checked='checked'";
                                            }
                                        ?>
                                        <label><input type="radio" name="bluetooth" value="yes" <?=$byes_selected?>> Yes </label>
                                        &nbsp;
                                        <label><input type="radio" name="bluetooth" value="no" <?=$bno_selected?>> No </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label> Battery </label>
                                        <input type="text" name="battery" class="form-control" value="<?=$spec_battery?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label> Charger </label>
                                        <input type="text" name="charger" class="form-control" value="<?=$spec_charger?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label> Handsfree </label>
                                        <input type="text" name="handsfree" class="form-control" value="<?=$spec_handsfree?>">
                                    </div>
                                </div>

                            </div>

                             <div class="row">
                                <div class="col-sm-12" style="text-align:right;">
                                    <button class="btn btn-primary">SUBMIT</button>                
                                <div>
                                                
                            </div>                     
                        </div>
                    </form>                       
                        
                                           
                     
                </div>
            </div>
        </div>
    </div>
</div>