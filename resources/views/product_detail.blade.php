@include('template/header')
<?php // $i=1; foreach ($product as $row){ 
     $product_title = $product->product_title;
     $price = $product->price;
     $desc = $product->product_description;
     $product_availability = $product->product_availability;
//} ?>
<div class="container">
    <div class="empty-space col-xs-b15 col-sm-b30"></div>
    <div class="breadcrumbs">
        <a href="{{url('/')}}">Home</a>
        <a href="{{url('product')}}">Product</a>
        <a href="#">{{$product_title}}</a>
    </div>
    <div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>
    <div class="row">
        <div class="col-md-9 col-md-push-3">
            <div class="row">
                <div class="col-sm-6 col-xs-b30 col-sm-b0">
                    
                    <div class="main-product-slider-wrapper swipers-couple-wrapper">
                        <div class="swiper-container swiper-control-top">
                           <div class="swiper-button-prev hidden"></div>
                           <div class="swiper-button-next hidden"></div>
                           <div class="swiper-wrapper">
                               <div class="swiper-slide">
                                    <div class="swiper-lazy-preloader"></div>
                                    <div class="product-big-preview-entry swiper-lazy" data-background="{{URL::asset('/public/img/product-125.jpg')}}"></div>
                               </div>
                               <div class="swiper-slide">
                                    <div class="swiper-lazy-preloader"></div>
                                    <div class="product-big-preview-entry swiper-lazy" data-background="{{URL::asset('/public/img/product-preview-5.jpg')}}"></div>
                               </div>
                               <div class="swiper-slide">
                                    <div class="swiper-lazy-preloader"></div>
                                    <div class="product-big-preview-entry swiper-lazy" data-background="{{URL::asset('/public/img/product-preview-6.jpg')}}"></div>
                               </div>
                               <div class="swiper-slide">
                                    <div class="swiper-lazy-preloader"></div>
                                    <div class="product-big-preview-entry swiper-lazy" data-background="{{URL::asset('/public/img/product-preview-7.jpg')}}"></div>
                               </div>
                               <div class="swiper-slide">
                                    <div class="swiper-lazy-preloader"></div>
                                    <div class="product-big-preview-entry swiper-lazy" data-background="{{URL::asset('/public/img/product-preview-8.jpg')}}"></div>
                               </div>
                               <div class="swiper-slide">
                                    <div class="swiper-lazy-preloader"></div>
                                    <div class="product-big-preview-entry swiper-lazy" data-background="{{URL::asset('/public/img/product-preview-9.jpg')}}"></div>
                               </div>
                               <div class="swiper-slide">
                                    <div class="swiper-lazy-preloader"></div>
                                    <div class="product-big-preview-entry swiper-lazy" data-background="{{URL::asset('/public/img/product-preview-10.jpg')}}"></div>
                               </div>
                           </div>
                        </div>

                        <div class="empty-space col-xs-b30 col-sm-b60"></div>

                        <div class="swiper-container swiper-control-bottom" data-breakpoints="1" data-xs-slides="3" data-sm-slides="3" data-md-slides="4" data-lt-slides="4" data-slides-per-view="5" data-center="1" data-click="1">
                           <div class="swiper-button-prev hidden"></div>
                           <div class="swiper-button-next hidden"></div>
                           <div class="swiper-wrapper">
                               <div class="swiper-slide">
                                    <div class="product-small-preview-entry">
                                        <img src="{{URL::asset('/public/img/product-preview-4_.jpg')}}" alt="" />
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-small-preview-entry">
                                        <img src="{{URL::asset('/public/img/product-preview-5_.jpg')}}" alt="" />
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-small-preview-entry">
                                        <img src="{{URL::asset('/public/img/product-preview-6_.jpg')}}" alt="" />
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-small-preview-entry">
                                        <img src="{{URL::asset('/public/img/product-preview-7_.jpg')}}" alt="" />
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-small-preview-entry">
                                        <img src="{{URL::asset('/public/img/product-preview-8_.jpg')}}" alt="" />
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-small-preview-entry">
                                        <img src="{{URL::asset('/public/img/product-preview-9_.jpg')}}" alt="" />
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-small-preview-entry">
                                        <img src="{{URL::asset('/public/img/product-preview-10_.jpg')}}" alt="" />
                                    </div>
                               </div>

                           </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="simple-article size-3 grey col-xs-b5">SMART WATCHES</div>
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
                            <div class="simple-article size-3 col-xs-b5">ITEM NO.: <span class="grey">127-#5238</span></div>
                        </div>
                        <div class="col-sm-6 col-sm-text-right">
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
                            <a class="button size-2 style-2 block" href="#">
                                <span class="button-wrapper">
                                    <span class="icon"><img src="img/icon-2.png" alt=""></span>
                                    <span class="text">add to cart</span>
                                </span>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="button size-2 style-1 block noshadow" href="#">
                            <span class="button-wrapper">
                                <span class="icon"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                                <span class="text">add to favourites</span>
                            </span>
                        </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="h6 detail-data-title size-2">share:</div>
                        </div>
                        <div class="col-sm-9">
                            <div class="follow light">
                                <a class="entry" href="#"><i class="fa fa-facebook"></i></a>
                                <a class="entry" href="#"><i class="fa fa-twitter"></i></a>
                                <a class="entry" href="#"><i class="fa fa-linkedin"></i></a>
                                <a class="entry" href="#"><i class="fa fa-google-plus"></i></a>
                                <a class="entry" href="#"><i class="fa fa-pinterest-p"></i></a>
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
                                <img class="rounded-image" src="{{URL::asset('/public/img/thumbnail-15.jpg')}}" alt="" />
                            </div>
                            <div class="empty-space col-xs-b25"></div>
                            <div class="h5">Nullam et massa nulla</div>
                            <div class="empty-space col-xs-b20"></div>
                            <div class="simple-article size-2">Sed sodales sed orci molestie tristique. Nunc dictum, erat id molestie vestibulum, ex leo vestibulum justo, luctus tempor erat sem quis diam. Lorem ipsum dolor sit amet.</div>
                        </div>
                        <div class="col-sm-6">
                            <div class="simple-article">
                                <img class="rounded-image" src="{{URL::asset('/public/img/thumbnail-16.jpg')}}" alt="" />
                            </div>
                            <div class="empty-space col-xs-b25"></div>
                            <div class="h5">Vivamus ut posuere nunc</div>
                            <div class="empty-space col-xs-b20"></div>
                            <div class="simple-article size-2">Sed sodales sed orci molestie tristique. Nunc dictum, erat id molestie vestibulum, ex leo vestibulum justo, luctus tempor erat sem quis diam. Lorem ipsum dolor sit amet.</div>
                        </div>
                    </div>

                    <div class="empty-space col-xs-b35 col-md-b70"></div>

                    <div class="left-right-entry clearfix align-right">
                        <div class="preview-wrapper">
                            <img class="preview" src="{{URL::asset('/public/img/thumbnail-17.jpg')}}" alt="" />
                        </div>
                        <div class="description">
                            <div class="h5">Aenean a tincidunt felis</div>
                            <div class="empty-space col-xs-b15"></div>
                            <div class="simple-article size-2">Sed sodales sed orci molestie tristique. Nunc dictum, erat id molestie vestibulum, ex leo vestibulum justo, luctus tempor erat sem quis diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur vulputate elit.</div>
                            <div class="empty-space col-xs-b30 col-sm-b45"></div>
                            <div class="h5">Nulla sed arcu ipsum</div>
                            <div class="empty-space col-xs-b15"></div>
                            <div class="simple-article size-2">Nullam et massa nulla. Quisque nec magna ornare tellus consequat lacinia a quis sem. Vivamus ut posuere nunc. Praesent porttitor vitae augue in semper. Vestibulum non leo et nisi facilisis consequat. Ut volutpat augue faucibus, fermentum turpis convallis, lobortis augue.</div>
                        </div>
                    </div>

                    <div class="empty-space col-xs-b35 col-md-b70"></div>

                    <div class="left-right-entry clearfix">
                        <div class="preview-wrapper">
                            <img class="preview" src="{{URL::asset('/public/img/thumbnail-18.jpg')}}" alt="" />
                        </div>
                        <div class="description">
                            <div class="h5">Aenean a tincidunt felis</div>
                            <div class="empty-space col-xs-b15"></div>
                            <div class="simple-article size-2">Sed sodales sed orci molestie tristique. Nunc dictum, erat id molestie vestibulum, ex leo vestibulum justo, luctus tempor erat sem quis diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur vulputate elit.</div>
                            <div class="empty-space col-xs-b30 col-sm-b45"></div>
                            <div class="h5">Nulla sed arcu ipsum</div>
                            <div class="empty-space col-xs-b15"></div>
                            <div class="simple-article size-2">Nullam et massa nulla. Quisque nec magna ornare tellus consequat lacinia a quis sem. Vivamus ut posuere nunc. Praesent porttitor vitae augue in semper. Vestibulum non leo et nisi facilisis consequat. Ut volutpat augue faucibus, fermentum turpis convallis, lobortis augue.</div>
                        </div>
                    </div>
                </div>

                <div class="tab-entry">
                    <div class="h5">watch 38mm</div>
                    <div class="empty-space col-xs-b15"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-description-entry row nopadding">
                                <div class="col-xs-6">
                                    <div class="h6">height:</div>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <div class="simple-article size-2">38.6mm</div>
                                </div>
                            </div>  
                        </div>
                        <div class="col-sm-6">
                            <div class="product-description-entry row nopadding">
                                <div class="col-xs-6">
                                    <div class="h6">width:</div>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <div class="simple-article size-2">33.3mm</div>
                                </div>
                            </div>  
                        </div>
                        <div class="col-sm-6">
                            <div class="product-description-entry row nopadding">
                                <div class="col-xs-6">
                                    <div class="h6">depth:</div>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <div class="simple-article size-2">10.5mm</div>
                                </div>
                            </div>  
                        </div>
                        <div class="col-sm-6">
                            <div class="product-description-entry row nopadding">
                                <div class="col-xs-6">
                                    <div class="h6">case:</div>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <div class="simple-article size-2">40g</div>
                                </div>
                            </div>  
                        </div>
                        <div class="col-sm-6">
                            <div class="product-description-entry row nopadding">
                                <div class="col-xs-6">
                                    <div class="h6">material:</div>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <div class="simple-article size-2">Stainless Steel</div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="empty-space col-xs-b30 col-sm-b60"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="simple-article size-2 text-center">
                                <img src="{{URL::asset('/public/img/thumbnail-19.jpg')}}" alt="" />
                                <p><br/>Stainless Steel</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="simple-article size-2 text-center">
                                <img src="{{URL::asset('/public/img/thumbnail-20.jpg')}}" alt="" />
                                <p><br/>Space Black Stainless Steel</p>
                            </div>
                        </div>
                    </div>
                    <div class="empty-space col-xs-b30 col-sm-b60"></div>
                    <div class="h5">watch 42mm</div>
                    <div class="empty-space col-xs-b15"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-description-entry row nopadding">
                                <div class="col-xs-6">
                                    <div class="h6">height:</div>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <div class="simple-article size-2">42.0mm</div>
                                </div>
                            </div>  
                        </div>
                        <div class="col-sm-6">
                            <div class="product-description-entry row nopadding">
                                <div class="col-xs-6">
                                    <div class="h6">width:</div>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <div class="simple-article size-2">35.9mm</div>
                                </div>
                            </div>  
                        </div>
                        <div class="col-sm-6">
                            <div class="product-description-entry row nopadding">
                                <div class="col-xs-6">
                                    <div class="h6">depth:</div>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <div class="simple-article size-2">10.5mm</div>
                                </div>
                            </div>  
                        </div>
                        <div class="col-sm-6">
                            <div class="product-description-entry row nopadding">
                                <div class="col-xs-6">
                                    <div class="h6">case:</div>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <div class="simple-article size-2">50g</div>
                                </div>
                            </div>  
                        </div>
                        <div class="col-sm-6">
                            <div class="product-description-entry row nopadding">
                                <div class="col-xs-6">
                                    <div class="h6">material:</div>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <div class="simple-article size-2">Space Black Stainless Steel</div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="empty-space col-xs-b30 col-sm-b60"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="simple-article size-2 text-center">
                                <img src="{{URL::asset('/public/img/thumbnail-21.jpg')}}" alt="" />
                                <p><br/>Stainless Steel</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="simple-article size-2 text-center">
                                <img src="{{URL::asset('/public/img/thumbnail-22.jpg')}}" alt="" />
                                <p><br/>Space Black Stainless Steel</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="empty-space col-xs-b35 col-md-b70"></div>

            <div class="swiper-container rounded">
                <div class="swiper-button-prev style-1 hidden"></div>
                <div class="swiper-button-next style-1 hidden"></div>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="banner-shortcode style-1">
                            <div class="background" style="background-image: url({{URL::asset('/public/img/thumbnail-14.jpg')}});"></div>
                            <div class="description valign-middle">
                                <div class="valign-middle-content">
                                    <div class="simple-article size-3 light fulltransparent">DON'T MISS!</div>
                                    <div class="banner-title color">UP TO 70%</div>
                                    <div class="h4 light">best android tv box</div>
                                    <div class="empty-space col-xs-b25"></div>
                                    <a class="button size-1 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="{{URL::asset('/public/img/icon-4.png')}}" alt=""></span>
                                            <span class="text">learn more</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="empty-space col-xs-b60 col-sm-b0"></div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="banner-shortcode style-1">
                            <div class="background" style="background-image: url({{URL::asset('/public/img/thumbnail-10.jpg')}});"></div>
                            <div class="description valign-middle">
                                <div class="valign-middle-content">
                                    <div class="simple-article size-3 light fulltransparent">DON'T MISS!</div>
                                    <div class="banner-title color">UP TO 70%</div>
                                    <div class="h4 light">best android tv box</div>
                                    <div class="empty-space col-xs-b25"></div>
                                    <a class="button size-1 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-4.png" alt=""></span>
                                            <span class="text">learn more</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="empty-space col-xs-b60 col-sm-b0"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <div class="empty-space col-xs-b35 col-md-b70"></div>
            <div class="empty-space col-md-b70"></div>

        </div>
        <div class="col-md-3 col-md-pull-9">
            <div class="h4 col-xs-b10">popular categories</div>
            <ul class="categories-menu transparent">
                <li>
                    <a href="#">laptops &amp; computers</a>
                    <div class="toggle"></div>
                    <ul>
                        <li>
                            <a href="#">laptops &amp; computers</a>
                            <div class="toggle"></div>
                            <ul>
                                <li>
                                    <a href="#">laptops &amp; computers</a>
                                </li>
                                <li>
                                    <a href="#">video &amp; photo cameras</a>
                                </li>
                                <li>
                                    <a href="#">smartphones</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">video &amp; photo cameras</a>
                            <div class="toggle"></div>
                            <ul>
                                <li>
                                    <a href="#">video &amp; photo cameras</a>
                                </li>
                                <li>
                                    <a href="#">smartphones</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">smartphones</a>
                        </li>
                        <li>
                            <a href="#">tv &amp; audio</a>
                        </li>
                        <li>
                            <a href="#">gadgets</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">video &amp; photo cameras</a>
                    <div class="toggle"></div>
                    <ul>
                        <li>
                            <a href="#">laptops &amp; computers</a>
                            <div class="toggle"></div>
                            <ul>
                                <li>
                                    <a href="#">laptops &amp; computers</a>
                                </li>
                                <li>
                                    <a href="#">video &amp; photo cameras</a>
                                </li>
                                <li>
                                    <a href="#">smartphones</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">video &amp; photo cameras</a>
                            <div class="toggle"></div>
                            <ul>
                                <li>
                                    <a href="#">laptops &amp; computers</a>
                                </li>
                                <li>
                                    <a href="#">smartphones</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">smartphones</a>
                        </li>
                        <li>
                            <a href="#">tv &amp; audio</a>
                        </li>
                        <li>
                            <a href="#">gadgets</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">smartphones</a>
                    <div class="toggle"></div>
                    <ul>
                        <li>
                            <a href="#">laptops &amp; computers</a>
                            <div class="toggle"></div>
                            <ul>
                                <li>
                                    <a href="#">laptops &amp; computers</a>
                                </li>
                                <li>
                                    <a href="#">video &amp; photo cameras</a>
                                </li>
                                <li>
                                    <a href="#">smartphones</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">video &amp; photo cameras</a>
                            <div class="toggle"></div>
                            <ul>
                                <li>
                                    <a href="#">video &amp; photo cameras</a>
                                </li>
                                <li>
                                    <a href="#">smartphones</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">smartphones</a>
                        </li>
                        <li>
                            <a href="#">tv &amp; audio</a>
                        </li>
                        <li>
                            <a href="#">gadgets</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">tv &amp; audio</a>
                    <div class="toggle"></div>
                    <ul>
                        <li>
                            <a href="#">laptops &amp; computers</a>
                            <div class="toggle"></div>
                            <ul>
                                <li>
                                    <a href="#">laptops &amp; computers</a>
                                </li>
                                <li>
                                    <a href="#">video &amp; photo cameras</a>
                                </li>
                                <li>
                                    <a href="#">smartphones</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">video &amp; photo cameras</a>
                            <div class="toggle"></div>
                            <ul>
                                <li>
                                    <a href="#">video &amp; photo cameras</a>
                                </li>
                                <li>
                                    <a href="#">smartphones</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">smartphones</a>
                        </li>
                        <li>
                            <a href="#">tv &amp; audio</a>
                        </li>
                        <li>
                            <a href="#">gadgets</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">gadgets</a>
                    <div class="toggle"></div>
                    <ul>
                        <li>
                            <a href="#">laptops &amp; computers</a>
                            <div class="toggle"></div>
                            <ul>
                                <li>
                                    <a href="#">laptops &amp; computers</a>
                                </li>
                                <li>
                                    <a href="#">video &amp; photo cameras</a>
                                </li>
                                <li>
                                    <a href="#">smartphones</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">video &amp; photo cameras</a>
                            <div class="toggle"></div>
                            <ul>
                                <li>
                                    <a href="#">video &amp; photo cameras</a>
                                </li>
                                <li>
                                    <a href="#">smartphones</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">smartphones</a>
                        </li>
                        <li>
                            <a href="#">tv &amp; audio</a>
                        </li>
                        <li>
                            <a href="#">gadgets</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">car electronics</a>
                    <div class="toggle"></div>
                    <ul>
                        <li>
                            <a href="#">laptops &amp; computers</a>
                            <div class="toggle"></div>
                            <ul>
                                <li>
                                    <a href="#">laptops &amp; computers</a>
                                </li>
                                <li>
                                    <a href="#">video &amp; photo cameras</a>
                                </li>
                                <li>
                                    <a href="#">smartphones</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">video &amp; photo cameras</a>
                            <div class="toggle"></div>
                            <ul>
                                <li>
                                    <a href="#">video &amp; photo cameras</a>
                                </li>
                                <li>
                                    <a href="#">smartphones</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">smartphones</a>
                        </li>
                        <li>
                            <a href="#">tv &amp; audio</a>
                        </li>
                        <li>
                            <a href="#">gadgets</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">accessories</a>
                </li>
            </ul>

            <div class="empty-space col-xs-b25 col-sm-b50"></div>

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

            <div class="empty-space col-xs-b25 col-sm-b50"></div>

            <div class="h4 col-xs-b25">Operation System</div>
            <label class="checkbox-entry">
                <input type="checkbox"><span>Android</span>
            </label>
            <div class="empty-space col-xs-b10"></div>
            <label class="checkbox-entry">
                <input type="checkbox"><span>IOS</span>
            </label>
            <div class="empty-space col-xs-b10"></div>
            <label class="checkbox-entry">
                <input type="checkbox"><span>Windows Phone</span>
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
        	<?php for($i = 0; $i <= 7; $i++){ ?>
            <div class="swiper-slide">
                <div class="product-shortcode style-1 small">
                    <div class="title">
                        <div class="simple-article size-1 color col-xs-b5"><a href="#">ACCESSORIES</a></div>
                        <div class="h6 animate-to-green"><a href="#">usb watch charger</a></div>
                    </div>
                    <div class="preview">
                        <img src="{{URL::asset('/public/img/product-49.jpg')}}" alt="">
                        <div class="preview-buttons valign-middle">
                            <div class="valign-middle-content">
                                <a class="button size-2 style-2" href="#">
                                    <span class="button-wrapper">
                                        <span class="icon"><img src="{{URL::asset('/public/img/icon-1.png')}}" alt=""></span>
                                        <span class="text">Learn More</span>
                                    </span>
                                </a>
                                <a class="button size-2 style-3" href="#">
                                    <span class="button-wrapper">
                                        <span class="icon"><img src="{{URL::asset('/public/img/icon-3.png')}}" alt=""></span>
                                        <span class="text">Add To Cart</span>
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