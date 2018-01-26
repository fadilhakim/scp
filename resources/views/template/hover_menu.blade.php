<div class="nav-wrapper">
    <div class="nav-close-layer"></div>
    <nav>
        <ul>
        <?php 
            $route = Request::segment(1);
            $active_about = '' ;
            $active_home = '' ;
            $active_services = '' ;
            $active_contact = '' ;
            $active_product = '' ;

            if($route == 'about'){
                $active_about = 'active' ;
            }
            else if($route == 'product'){
                $active_product = 'active' ;
            }else if($route == 'services'){
                $active_services = 'active' ;
            }else if($route == 'contact'){
                $active_contact = 'active' ;
            }else{
                $active_home = 'active';
            }

        ?>
            <li class="{{ $active_home }}">
                <a href="{{url('')}}">Home</a>
                <div class="menu-toggle"></div>
                <ul>
                    <li class="active"><a href="{{url('')}}">Homepage 1</a></li>
                    <li><a href="{{url('home2')}}">Homepage 2</a></li>
                </ul>
            </li>
            <li class="">
                <a href="{{url('about')}}">about us</a>
            </li>
            <li class="megamenu-wrapper {{$active_product}}">
                <a href="{{url('product')}}">products</a>
                <div class="menu-toggle"></div>
                <div class="megamenu">
                    <div class="links">
                        <a class="active" href="products1.html">Products Landing 1</a>
                        <a href="products2.html">Products Landing 2</a>
                        <a href="products3.html">Products Landing 3</a>
                        <a href="product.html">Product Detail</a>
                    </div>
                    <div class="content">
                        <div class="row nopadding">
                            <div class="col-xs-6">
                                <div class="product-shortcode style-5">
                                    <div class="product-label green">best price</div>
                                    <div class="icons">
                                        <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                        <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="preview">
                                        <div class="swiper-container" data-loop="1">
                                            <div class="swiper-button-prev style-1"></div>
                                            <div class="swiper-button-next style-1"></div>
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="img/product-59.jpg" alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="img/product-61.jpg" alt="" />
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="content-animate">
                                        <div class="title">
                                            <div class="shortcode-rate-wrapper">
                                                <div class="rate-wrapper align-inline">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="h6 animate-to-green"><a href="product.html">modern beat nine</a></div>
                                        </div>
                                        <div class="description">
                                            <div class="simple-article text size-2">Mollis nec consequat at In feugiat molestie tortor a malesuada</div>
                                        </div>
                                        <div class="price">
                                            <div class="simple-article size-4 dark">Rp 630.00</div>
                                        </div>
                                    </div>
                                    <div class="preview-buttons">
                                        <div class="buttons-wrapper">
                                            <a class="button size-2 style-2" href="product.html">
                                                <span class="button-wrapper">
                                                    <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                                    <span class="text">Learn More</span>
                                                </span>
                                            </a>
                                            <a class="button size-2 style-3" href="#">
                                                <span class="button-wrapper">
                                                    <span class="icon"><img src="img/icon-3.png" alt=""></span>
                                                    <span class="text">Add To Cart</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="product-shortcode style-5">
                                    <div class="product-label green">best price</div>
                                    <div class="icons">
                                        <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                        <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                
                                    </div>
                                    <div class="preview">
                                        <div class="swiper-container" data-loop="1">
                                            <div class="swiper-button-prev style-1"></div>
                                            <div class="swiper-button-next style-1"></div>
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="{{URL::asset('public/img/product-61.jpg')}}" alt="" />
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{URL::asset('public/img/product-62.jpg')}}" alt="" />
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="content-animate">
                                        <div class="title">
                                            <div class="shortcode-rate-wrapper">
                                                <div class="rate-wrapper align-inline">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="h6 animate-to-green"><a href="product.html">modern beat nine</a></div>
                                        </div>
                                        <div class="description">
                                            <div class="simple-article text size-2">Mollis nec consequat at In feugiat molestie tortor a malesuada</div>
                                        </div>
                                        <div class="price">
                                            <div class="simple-article size-4 dark">Rp 630.00</div>
                                        </div>
                                    </div>
                                    <div class="preview-buttons">
                                        <div class="buttons-wrapper">
                                            <a class="button size-2 style-2" href="product.html">
                                                <span class="button-wrapper">
                                                    <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                                    <span class="text">Learn More</span>
                                                </span>
                                            </a>
                                            <a class="button size-2 style-3" href="#">
                                                <span class="button-wrapper">
                                                    <span class="icon"><img src="img/icon-3.png" alt=""></span>
                                                    <span class="text">Add To Cart</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="{{$active_services}}">
                <a href="{{url('services')}}">Services</a>
            </li>
            <li class="{{$active_contact}}"><a href="{{url('contact')}}">contact</a></li>
        </ul>
        <div class="navigation-title">
            Navigation
            <div class="hamburger-icon active">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>
</div>