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
            $active_warranty = '' ;

            if($route == 'about'){
                $active_about = 'active' ;
            }
            else if($route == 'product'){
                $active_product = 'active' ;
            }else if($route == 'services'){
                $active_services = 'active' ;
            }else if($route == 'contact'){
                $active_contact = 'active' ;
            }else if($route == 'warranty'){
                $active_warranty = 'active' ;
            }
            else{
                $active_home = 'active';
            }

        ?>
            <li class="{{ $active_home }}">
                <a href="{{url('')}}">Home</a>
            </li>
            <li class="">
                <a href="{{url('about')}}">about us</a>
            </li>
            <li class="megamenu-wrapper {{$active_product}}">
                <a href="{{url('product')}}">products</a>
                <!-- <div class="menu-toggle"></div> -->
                <div class="megamenu">
                    <div class="links">
                        <p>Categories</p>
                            <?php $category = App\Models\Product::all_category();
                                foreach($category as $rowCat){ 
                            ?>
                            <a class="" href="{{url('/product/category/'.$rowCat->category_id)}}"><?php echo $rowCat->category_name; ?></a>
                        <?php } ?>

                    </div>
                    <div class="content">
                        <div class="row nopadding">
                            <?php $popular = App\Models\Product::get_popular_product_limit(); 
                                 foreach($popular as $rowPopular){ 
                                 $slug = str_slug($rowPopular->product_title, '-');
                            ?>
                            <div class="col-xs-6">
                                <div class="product-shortcode style-5">
                                <?php 
                                    $catName = App\Models\Product::get_product_category($rowPopular->product_category);
                                ?>
                                
                                    <div class="product-label green">{{$catName->category_name}}</div>
                                    <div class="preview">
                                        <div class="swiper-container" data-loop="1">
                                            <div class="swiper-button-prev style-1"></div>
                                            <div class="swiper-button-next style-1"></div>
                                            <div class="swiper-wrapper">
                                            <?php $allImg = App\Models\Product::find_product_img($rowPopular->product_id); 
                                                foreach($allImg as $rowImg) {
                                            ?>

                                                <div class="swiper-slide">
                                                    <img src="{{URL::asset('public/products/'.$rowImg->product_id.'/'.$rowImg->image_name)}}" alt="" />
                                                </div>
                                            <?php } ?>        
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="content-animate">
                                        <div class="title">
                                            <div class="h6 animate-to-green"><a href="{{url('product/detail/'.$rowPopular->product_id.'/'.$rowPopular->product_category.'/'.$rowPopular->product_title) }}"><?php echo $rowPopular->product_title ?></a></div>
                                        </div>
                                        <div class="price">
                                            <div class="simple-article size-4 dark">Rp. <?php echo number_format($rowPopular->price) ?></div>
                                        </div>
                                    </div>
                                    <div class="preview-buttons">
                                        <div class="buttons-wrapper">
                                            <a class="button size-2 style-2" href="<?=url("product/detail/{$rowPopular->product_id}/{$rowPopular->product_category}/{$slug}")?>">
                                                <span class="button-wrapper">
                                                    <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                                    <span class="text">See Detail</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </li>
            <li class="{{$active_services}}">
                <a href="{{url('services')}}">Services</a>
            </li>
            <li class="{{$active_warranty}}">
                <a href="{{url('warranty')}}">Warranty</a>
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