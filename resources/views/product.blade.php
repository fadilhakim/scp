@include('template/header')
        
        <div class="container">
            <div id="compareTemp" class="row"></div>
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="breadcrumbs">
                <a href="{{url('/')}}">Home</a>
                <a href="{{url('product')}}">All Products</a>
            </div>
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="row">
                <div class="col-md-9 col-md-push-3">
                    <div class="slider-wrapper">
                        <div class="swiper-container arrows-align-top" data-breakpoints="1" data-xs-slides="1" data-sm-slides="3" data-md-slides="4" data-lt-slides="4" data-slides-per-view="5">
                            <div class="h4 swiper-title">popular products</div>
                            <div class="empty-space col-xs-b20"></div>
                            <div class="swiper-button-prev style-1"></div>
                            <div class="swiper-button-next style-1"></div>
                            <div class="swiper-wrapper">
                            <?php $i=1; foreach ($popular as $rowPopular){ 

                                    $slug = str_slug($rowPopular->product_title, '-');
                                    $id   = $rowPopular->product_id;
                                ?>
                                <div class="swiper-slide">
                                    <div class="product-shortcode style-1 small">
                                        <div class="title">
                                        <?php 
                                                $catName =  App\Models\Product::get_product_category($rowPopular->product_category) ;
                                            ?>
                                            <div class="simple-article size-1 color col-xs-b5"><a href="<?=url("product/category/{$rowPopular->product_category}")?>">{{$catName->category_name}}</a></div>
                                            <div class="h6 animate-to-green"><a href="<?=url("product/detail/{$rowPopular->product_id}/{$rowPopular->product_category}/{$slug}")?>">{{$rowPopular->product_title}}</a></div>
                                        </div>
                                        <div class="preview">
                                            <?php 
                                        
                                                $popularFirstImg =  App\Models\Product::get_first_image($id) ;
                                                
                                                    if(!empty($popularFirstImg))
                                                    {
                                                        $getImagePop = $popularFirstImg->image_name;
                                                        $getImagePop = URL::asset('public/products/'.$id.'/'.$getImagePop );
                                                        
                                                    }
                                                    else
                                                    {
                                                        $getImagePop = url("public/products/default-image.png");
                                                    }
                                            ?>
                                            <img src="{{ $getImagePop }}" alt="">
                                            
                                            <div class="preview-buttons valign-middle">
                                                <div class="valign-middle-content">
                                                    <a class="button size-2 style-2" href="<?=url("product/detail/{$rowPopular->product_id}/{$rowPopular->product_category}/{$slug}")?>">
                                                        <span class="button-wrapper">
                                                            <span class="icon"><img src="{{URL::asset('/public/img/icon-1.png')}}" alt=""></span>
                                                            <span class="text">See Detail</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price">
                                            <div class="simple-article size-4 dark">Rp.{{ number_format($rowPopular->price) }}</div>
                                        </div>
                                        
                                        <div class="price">
                                            <label class="checkbox-entry">
                                                <input type="checkbox"><span>Compare</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
              
                            <div class="swiper-pagination relative-pagination visible-xs"></div>
                        </div>
                    </div>

                    <div class="empty-space col-xs-b20 col-sm-b35 col-md-b70"></div>

                    <div class="align-inline spacing-1">
                        <div class="h4">All Products</div>
                    </div>
                    <div class="align-inline spacing-1">
                        <div class="simple-article size-1">SHOWING <b class="grey">16 </b>RESULTS</div>
                    </div>
                    <!-- <div class="align-inline spacing-1 hidden-xs">
                        <a class="pagination toggle-products-view active"><img src="img/icon-14.png" alt="" /><img src="img/icon-15.png" alt="" /></a>
                        <a class="pagination toggle-products-view"><img src="img/icon-16.png" alt="" /><img src="img/icon-17.png" alt="" /></a>
                    </div> -->
                    <div class="align-inline spacing-1 filtration-cell-width-1">
                        <select class="SlectBox small" onchange="if (this[this.selectedIndex].value !== '0') document.location.href=this.value;">
                            <option disabled="disabled" selected="selected">Most popular products</option>
                            <?php foreach($category as $ct){ ?>
                                
                                <option value="{{url('/product/category/'.$ct->category_id)}}">
                                   {{$ct->category_name}}
                               </option>
                                 
                            <?php } ?>
                        </select>
                    </div>

                    <div class="empty-space col-xs-b25 col-sm-b60"></div>

                    <div class="products-content">
                        <div class="products-wrapper">
                            <div class="row nopadding">
                            <?php 
                            $product_compare = session("product_compare");
                            
                            foreach($product as $rowProduct) {?>
                                <?php 
                                $checked = ""; // refresh
                                $slugProd = str_slug($rowProduct->product_title, '-'); 
                                $prodId = $rowProduct->product_id;

                                if(!empty($product_compare))
                                {
                                    if(in_array($prodId,$product_compare))
                                    {
                                        $checked = "checked=true";
                                        //echo "<script> alert('hello there : ".$rowProduct->product_title."') </script>";
                                    }
                                }                                
                                ?>
                                <div class="col-sm-4 col-md-3">
                                    <div class="product-shortcode style-1">
                                        <div class="title">
                                            <?php 
                                                $catName =  App\Models\Product::get_product_category($rowProduct->product_category) ;
                                            ?>
                                            <div class="simple-article size-1 color col-xs-b5"><a href="<?=url("product/category/{$rowProduct->product_category}")?>">{{$catName->category_name}}</a></div>
                                            <div class="h6 animate-to-green"><a href="<?=url("product/detail/{$rowProduct->product_id}/{$rowProduct->product_category}/{$slugProd}")?>">{{$rowProduct->product_title}}</a></div>
                                        </div>
                                        <div class="preview">
                                        <?php 
                                            if(!empty($prodId)){
                                                $firstImg =  App\Models\Product::get_first_image($prodId) ;
                                            
                                                if(!empty($firstImg))
                                                {
                                                    $getImage = $firstImg->image_name;
                                                    $getImage = URL::asset('public/products/'.$prodId.'/'.$getImage );
                                                
                                                }
                                                else
                                                {
                                                    $getImage = url("public/products/default-image.png");
                                                }

                                            }
                                      
                                            ?>
                                            <img src="{{ $getImage }}" alt="">
                                            
                                            <div class="preview-buttons valign-middle">
                                                <div class="valign-middle-content">
                                                    <a class="button size-2 style-2" href="<?=url("product/detail/{$rowProduct->product_id}/{$rowProduct->product_category}/{$slugProd}")?>">
                                                        <span class="button-wrapper">
                                                            <span class="icon"><img src="{{URL::asset('public/img/icon-1.png')}}" alt=""></span>
                                                            <span class="text">See Detail</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price">
                                            <div class="simple-article size-4 dark">Rp {{number_format($rowProduct->price)}}</div>
                                        </div>
                                        <div class="description">
                                            <div class="simple-article text size-2"><p><?php echo $rowProduct->product_description ?></p></div>
                                            <!-- <div class="icons">
                                                <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                            </div> -->
                                        </div>

                                        <div class="price">
                                            <label class="checkbox-entry">
                                                <input <?=$checked?> onclick="isCompareChecked(this,<?=$prodId?>)" name="compare[]" type="checkbox" ><span>Compare</span>
                                            </label>
                                        </div>
                            
                                    </div>  
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="empty-space col-xs-b35 col-sm-b0"></div>
                    <div class="row">
                        {{$product->links()}}
                    </div>
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
                            <a href="{{url('/product/category/'.$rowCategory->category_id)}}">{{ $rowCategory->category_name}}</a>
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
                        <?php foreach($brands as $br) { ?>
                            <ul class="categories-menu transparent">
                                 <li>
                                    <a href="{{url('/product/brand/'.$br->brand_id)}}"><?php echo $br->brand_name ?></a>   <div class="toggle"></div>
                                </li>
                            </ul>  
                        </label>
                    <?php } ?>

                </div>
            </div>
        </div>
       <!-- <div class="footer-form-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-xs-b10 col-lg-b0">
                        <div class="cell-view empty-space col-lg-b50">
                            <h3 class="h3 light">dont miss your chance</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-b10 col-lg-b0">
                        <div class="cell-view empty-space col-lg-b50">
                            <div class="simple-article size-3 light transparent">ONLY 200 PROMO CODES ON DISCOUNT!</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-line-form">
                            <input class="simple-input light" type="text" value="" placeholder="Your email">
                            <div class="button size-2 style-1">
                                <span class="button-wrapper">
                                    <span class="icon"><img src="{{URL::asset('public/img/icon-1.png')}}" alt=""></span>
                                    <span class="text">submit</span>
                                </span>
                                <input type="submit" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
@include('template/footer')
