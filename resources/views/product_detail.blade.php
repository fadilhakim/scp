@include('template/header')
<?php // $i=1; foreach ($product as $row){ 
     $product_title = $product->product_title;
     $price = $product->price;
     $desc = $product->product_description;
     $product_availability = $product->product_availability;
     $id =  $product->product_id;
     $slug = str_slug($product->product_title, '-');
     
     $title_left = $product->product_title_left;
     $detail_left = $product->product_detail_left;
     $left_img = $product->product_detail_left_img;
//} ?>
<div class="container">
    <div class="empty-space col-md-b30"></div>
    <div class="row">
        <div class="col-md-9">
            <div class="breadcrumbs">
                <a href="{{url('/')}}">Home</a>
                <a href="{{url('product')}}">Product</a>
                <a href="#">{{$category->category_name}}</a>
            </div>
        </div>
        <style>
            .opt li {
                display:inline-block;
            }
            
            .opt>li>a  {
                border: 1px solid #b8cd06;
                -webkit-box-shadow: 1px 1px 2px rgba(0,0,0,.1);
                box-shadow: 1px 1px 2px rgba(0,0,0,.1);
                color: #000;
                display:block;
                padding: 5px 20px 7px 20px;
                border-radius: 16px;
                -webkit-border-radius: 16px;
                margin-top: -20px;
                font-size: 14px;
            }


            .opt .actived {
                background-color: #b8cd06 !important;
                -webkit-box-shadow: 1px 1px 2px rgba(0,0,0,.1);
                box-shadow: 1px 1px 2px rgba(0,0,0,.1);
                color: #fff;
                display:block;
                padding: 5px 20px 7px 20px;
                border-radius: 16px;
                -webkit-border-radius: 16px;
                margin-top: -20px;
                font-size: 14px;
            }
        </style>
        <?php 
          
            $route = Request::segment(2);

            $opt = '' ;
            if($route == 'detail'){
                $opt = 'actived' ;
            }
        ?>
        <?php if(count($ringkasan_product)!== 0) {   
        ?>
        <div class="col-md-3 text-right">
            <ul class="opt">
                <li><a class="{{$opt}}" href="">Specs</a></li>
                <li><a class=""  href="{{url('product/highlight/'.$id.'/'.$slug)}}">Overview</a></li>
                
            </ul>
        </div>
        <?php } ?>
    </div>
    
    <div class="empty-space col-xs-b15 col-sm-b30"></div>
    <div class="row">
        <div class="col-md-9 col-md-push-3">
            <div class="row">
                <div class="col-sm-6 col-xs-b30 col-sm-b0">
                    
                    <div class="main-product-slider-wrapper swipers-couple-wrapper">
                        <div class="swiper-container swiper-control-top">
                           <div class="swiper-button-prev hidden"></div>
                           <div class="swiper-button-next hidden"></div>
                           <div class="swiper-wrapper">
                           <?php foreach ($image as $rowImage) { ?>
                               <div class="swiper-slide">
                                    <div class="swiper-lazy-preloader"></div>
                                    <div class="product-big-preview-entry swiper-lazy" data-background="{{URL::asset('/public/products/'.$rowImage->product_id.'/'.$rowImage->image_name)}}"></div>
                               </div> 
                          <?php } ?>
                           </div>
                        </div>

                        <div class="empty-space col-xs-b30 col-sm-b60"></div>

                        <div class="swiper-container swiper-control-bottom" data-breakpoints="1" data-xs-slides="3" data-sm-slides="3" data-md-slides="4" data-lt-slides="4" data-slides-per-view="5" data-center="1" data-click="1">
                           <div class="swiper-button-prev hidden"></div>
                           <div class="swiper-button-next hidden"></div>
                           <div class="swiper-wrapper">

                           <?php foreach ($image as $rowImage) { ?>

                               <div class="swiper-slide">
                                    <div class="product-small-preview-entry">
                                        <img class="img-responsive" src="{{URL::asset('/public/products/'.$rowImage->product_id.'/'.$rowImage->image_name)}}" alt="" />
                                    </div>
                                </div>
                            <?php } ?>
                           </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="simple-article size-3 grey col-xs-b5">{{$category->category_name}}</div>
                    <div class="h3 col-xs-b25">{{$product_title}}</div>
                    <div class="row col-xs-b25">
                        <div class="col-sm-6">
                            <div class="simple-article size-5 grey">PRICE: <span class="color">Rp. {{$price}}</span></div>        
                        </div>
                        <!-- <div class="col-sm-6 col-sm-text-right">
                            <div class="rate-wrapper align-inline">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                            <div class="simple-article size-2 align-inline">128 Reviews</div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="simple-article size-3 col-xs-b20">AVAILABLE.: <span class="grey">{{$product_availability}}</span></div>
                        </div>
                    </div>
                    <div class="simple-article size-3 col-xs-b30">{{$desc}}</div>
                    <div class="row col-xs-b40">
                        <div class="col-sm-3">
                            <div class="h6 detail-data-title size-1">quantity:</div>
                        </div>
                        <div class="col-sm-9">
                            <div class="quantity-select">
                                <span class="minus"></span>
                                <span class="number">1</span>
                                <span class="plus"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row m5 col-xs-b40">
                        <div class="col-sm-6 col-xs-b10 col-sm-b0">
                            <a class="button size-2 style-2 block" href="<?=url("cart/add/$id/$slug")?>">
                                <span class="button-wrapper">
                                    <span class="icon"><img src="img/icon-2.png" alt=""></span>
                                    <span class="text">add to cart</span>
                                </span>
                            </a>
                        </div>
                        <div class="col-sm-6">
                    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="h6 detail-data-title size-2">Find This Product In :</div>
                        </div>
                        <div class="col-sm-9">
                            <style>
                                .market {
                                    height:35px; width:35px;
                                    border-radius:35px;
                                    display:inline-block;
                                    margin-right:15px;
                                    margin-top:15px;
                                }
                                .lazada {
                                    background-image : url("{{URL::asset('/public/market_logo/lazada.png')}}")
                                }

                                .tokopedia {
                                    background-image : url("{{URL::asset('/public/market_logo/tokopedia.png')}}")
                                }
                                .jdid {
                                    background-image : url("{{URL::asset('/public/market_logo/jd_id.png')}}")
                                }
                                .blibli{
                                    background-image : url("{{URL::asset('/public/market_logo/blibli.png')}}")
                                }
                                .bukalapak{
                                    background-image : url("{{URL::asset('/public/market_logo/bukalapak.png')}}")
                                }
                                .shopee{
                                    background-image : url("{{URL::asset('/public/market_logo/shopee.png')}}")
                                }
                            </style>
                            <div class="follow light">
                                <?php foreach($market as $rowMarket) { ?>

                                     <?php 
                                        $getMarketName =  App\Models\MarketPlace::all_MarketPlace_by_market_id($rowMarket->market_id) ;     
                                        $title = str_slug($getMarketName->market_name,"");
                                     ?>
                                       
                                        <a class="market <?php echo $title; ?>" href="<?php echo $rowMarket->product_link ?>" title="<?php echo $title; ?>"> </a>
                               
                                <?php }  ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="empty-space col-xs-b35 col-md-b70"></div>

            <div class="tabs-block">
                <div class="tabulation-menu-wrapper text-center">
                    <div class="tabulation-title simple-input">description</div>
                    <ul class="tabulation-toggle">
                        <li><a class="tab-menu active">description</a></li>
                        <li><a class="tab-menu">technical specs</a></li>
                    </ul>
                </div>
                <div class="empty-space col-xs-b30 col-sm-b60"></div>

                <div class="tab-entry visible">
                    <div class="row">
                        <div class="col-sm-6 col-xs-b30 col-sm-b0">
                            <div class="simple-article">
                                <img class="rounded-image" src="{{URL::asset('/public/products/'.$id.'/'.$left_img)}}" alt="" />
                            </div>
                            <div class="empty-space col-xs-b25"></div>
                            <div class="h5"><?= $title_left ?></div>
                            <div class="empty-space col-xs-b20"></div>
                            <div class="simple-article size-2"><?= $detail_left ?></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="simple-article">
                                <img class="rounded-image" src="{{URL::asset('/public/products/'.$id.'/'.$product->product_detail_right_img)}}" alt="" />
                            </div>
                            <div class="empty-space col-xs-b25"></div>
                            <div class="h5"><?= $product->product_title_right ?></div>
                            <div class="empty-space col-xs-b20"></div>
                            <div class="simple-article size-2"><?= $product->product_detail_right ?></div>
                        </div>
                    </div>

                    <div class="empty-space col-xs-b35 col-md-b70"></div>

                    <div class="left-right-entry clearfix align-right">
                        <div class="preview-wrapper">
                            <img class="preview" src="{{URL::asset('/public/products/'.$id.'/'.$product->product_detail_btm_img)}}" alt="" />
                        </div>
                        <div class="description">
                            <div class="h5"><?= $product->product_title_btm ?></div>
                            <div class="empty-space col-xs-b15"></div>
                            <div class="simple-article size-2"><?= $product->product_detail_btm ?></div>
                        </div>
                    </div>

                    <div class="empty-space col-xs-b35 col-md-b70"></div>
                </div>

                <div class="tab-entry">
            
                   <?php echo $product->technical_specs ?>
                </div>
            </div>

            <div class="empty-space col-xs-b35 col-md-b70"></div>

            <div class="swiper-container rounded">
                <div class="swiper-button-prev style-1 hidden"></div>
                <div class="swiper-button-next style-1 hidden"></div>
                <div class="swiper-wrapper">
                    <?php foreach($mini_slide as $rowMini) { ?>
                    <div class="swiper-slide">
                        <div class="banner-shortcode style-1">
                            <div class="background" style="background-image: url({{URL::asset('/public/products/'.$rowMini->product_id.'/'.$rowMini->image_name)}});"></div>
                         
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <div class="empty-space col-xs-b35 col-md-b70"></div>
            <div class="empty-space col-md-b70"></div>

        </div>
        <div class="col-md-3 col-md-pull-9">
            <div class="h4 col-xs-b10">categories</div>
            <?php 
                 $getCategory =  App\Models\Product::all_category() ;
            ?>
            <ul class="categories-menu transparent">
            <?php foreach($getCategory as $rowCategory) { ?>
                <li>
                    <a href="#">{{ $rowCategory->category_name}}</a>
                    <?php 
                    $getSubCategory =  App\Models\Product::get_subCategory_by_category_id($rowCategory->category_id) ;
                    if(!empty($getSubCategory)){ 
                    ?>
                        <div class="toggle"></div>
                        <ul>
                            <?php foreach($getSubCategory as $rowSubCategory) { ?>
                            <li>
                                <a href="#">{{$rowSubCategory->subcategory_name}}</a>
                            </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                    
                </li>
            <?php } ?>
            </ul>

            <div class="empty-space col-xs-b25 col-sm-b50"></div>

            <div class="h4 col-xs-b25">Brands</div>
            <label class="checkbox-entry">
                <input type="checkbox"><span>LG</span>
            </label>
            <div class="empty-space col-xs-b10"></div>
            <label class="checkbox-entry">
                <input type="checkbox"><span>SAMSUNG</span>
            </label>
            <div class="empty-space col-xs-b10"></div>
            <label class="checkbox-entry">
                <input type="checkbox"><span>Apple</span>
            </label>
            <div class="empty-space col-xs-b10"></div>
            <label class="checkbox-entry">
                <input type="checkbox"><span>HTC</span>
            </label>
            <div class="empty-space col-xs-b10"></div>
            <label class="checkbox-entry">
                <input type="checkbox"><span>Google</span>
            </label>

            <div class="empty-space col-xs-b10"></div>
            <label class="checkbox-entry">
                <input type="checkbox"><span>Symbian</span>
            </label>
            <div class="empty-space col-xs-b10"></div>
            <label class="checkbox-entry">
                <input type="checkbox"><span>Blackberry OS</span>
            </label>

            <div class="empty-space col-xs-b25 col-sm-b50"></div>

            <div class="h4 col-xs-b25">Popular Tags</div>
            <div class="tags light clearfix">
                <a class="tag">headphoness</a>
                <a class="tag">accessories</a>
                <a class="tag">new</a>
                <a class="tag">cables</a>
                <a class="tag">professional</a>
            </div>

            <div class="empty-space col-xs-b25 col-sm-b60"></div>


        </div>
    </div>

    <div class="swiper-container arrows-align-top" data-breakpoints="1" data-xs-slides="1" data-sm-slides="3" data-md-slides="4" data-lt-slides="4" data-slides-per-view="5">
        <div class="h4 swiper-title">Recommended Product</div>
        <div class="empty-space col-xs-b20"></div>
        <div class="swiper-button-prev style-1"></div>
        <div class="swiper-button-next style-1"></div>
        <div class="swiper-wrapper">
        	<?php foreach ($related_product as $rt) { ?>
                <?php 
                                        
                    $firstImg =  App\Models\Product::get_first_image($rt->product_id) ;
                    
                    if(!empty($firstImg))
                    {
                        $getImage = $firstImg->image_name;
                    }
                    else
                    {
                        $getImage = "";
                    }
                ?>
                <div class="swiper-slide">
                <div class="product-shortcode style-1 small">
                    <div class="title">
                        <div class="h6 animate-to-green"><a href="#"><?= $rt->product_title ?></a></div>
                    </div>
                    <div class="preview">
                        <img src="{{URL::asset('/public/products/'.$rt->product_id.'/'.$getImage)}}" alt="">
                        <div class="preview-buttons valign-middle">
                            <div class="valign-middle-content">
                                <a class="button size-2 style-2" href="#">
                                    <span class="button-wrapper">
                                        <span class="icon"><img src="{{URL::asset('/public/img/icon-1.png')}}" alt=""></span>
                                        <span class="text">Learn More</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="price">
                        <div class="simple-article size-4 dark">Rp 10.630.00</div>
                    </div>
                </div>
                </div>
            <?php } ?>
        </div>
        <div class="swiper-pagination relative-pagination visible-xs"></div>
    </div>

    <div class="empty-space col-xs-b35 col-md-b70"></div>
    <div class="empty-space col-md-b70"></div>

</div>

@include('template/footer')