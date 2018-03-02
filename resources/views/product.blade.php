@include('template/header')
        <script>
            function add_cart()
            {

            }

        </script>
        <div class="container">
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="breadcrumbs">
                <a href="{{url('/')}}">Home</a>
                <a href="{{url('product')}}">Product</a>
            </div>
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="slider-wrapper">
                        <div class="swiper-container arrows-align-top" data-breakpoints="1" data-xs-slides="1" data-sm-slides="3" data-md-slides="4" data-lt-slides="4" data-slides-per-view="5">
                            <div class="h4 swiper-title">popular products</div>
                            <div class="empty-space col-xs-b20"></div>
                            <div class="swiper-button-prev style-1"></div>
                            <div class="swiper-button-next style-1"></div>
                            <div class="swiper-wrapper">
                            <?php $i=1; foreach ($product as $row){ 

                                    $slug = str_slug($row->product_title, '-');
                                    $id   = $row->product_id;
                                ?>
                                <div class="swiper-slide">
                                    <div class="product-shortcode style-1 small">
                                        <div class="title">
                                            <div class="simple-article size-1 color col-xs-b5"><a href="<?=url("product/detail/$id/$slug")?>">Phone</a></div>
                                            <div class="h6 animate-to-green"><a href="<?=url("product/detail/id")?>">{{$row->product_title}}</a></div>
                                        </div>
                                        <div class="preview">
                                            <img src="{{URL::asset('/public/products/product-125.jpg')}}" alt="">
                                            <div class="preview-buttons valign-middle">
                                                <div class="valign-middle-content">
                                                    <a class="button size-2 style-2" href="<?=url("product/detail/{$row->product_id}/{$row->product_category}/{$slug}")?>">
                                                        <span class="button-wrapper">
                                                            <span class="icon"><img src="{{URL::asset('/public/img/icon-1.png')}}" alt=""></span>
                                                            <span class="text">Learn More</span>
                                                        </span>
                                                    </a>
                                                    <a class="button size-2 style-3" href="<?=url("cart/add/$id/$slug")?>">
                                                        <span class="button-wrapper">
                                                            <span class="icon"><img src="{{URL::asset('/public/img/icon-3.png')}}" alt=""></span>
                                                            <span class="text">Add To Cart</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price">
                                            <div class="simple-article size-4 dark">Rp.{{ number_format($row->price) }}</div>
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
                        <div class="h4">Smart Phone</div>
                    </div>
                    <div class="align-inline spacing-1">
                        <div class="simple-article size-1">SHOWING <b class="grey">15</b> OF <b class="grey">2 358</b> RESULTS</div>
                    </div>
                    <!-- <div class="align-inline spacing-1 hidden-xs">
                        <a class="pagination toggle-products-view active"><img src="img/icon-14.png" alt="" /><img src="img/icon-15.png" alt="" /></a>
                        <a class="pagination toggle-products-view"><img src="img/icon-16.png" alt="" /><img src="img/icon-17.png" alt="" /></a>
                    </div> -->
                    <div class="align-inline spacing-1 filtration-cell-width-1">
                        <select class="SlectBox small">
                            <option disabled="disabled" selected="selected">Most popular products</option>
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                            <option value="mercedes">Mercedes</option>
                            <option value="audi">Audi</option>
                        </select>
                    </div>
                    <div class="align-inline spacing-1 filtration-cell-width-2">
                        <select class="SlectBox small">
                            <option disabled="disabled" selected="selected">Show 30</option>
                            <option value="volvo">30</option>
                            <option value="saab">50</option>
                            <option value="mercedes">100</option>
                            <option value="audi">200</option>
                        </select>
                    </div>


                    <div class="empty-space col-xs-b25 col-sm-b60"></div>

                    <div class="products-content">
                        <div class="products-wrapper">
                            <div class="row nopadding">
                            <?php for($i = 0; $i < 8; $i++) {?>
                                <div class="col-sm-4 col-md-3">
                                    <div class="product-shortcode style-1">
                                        <div class="title">
                                            <div class="simple-article size-1 color col-xs-b5"><a href="<?=url("product/detail/id")?>">SMART PHONES</a></div>
                                            <div class="h6 animate-to-green"><a href="<?=url("product/detail/id")?>">Smartphone vibe x2</a></div>
                                        </div>
                                        <div class="preview">
                                            <img src="{{URL::asset('public/products/product-127.jpg')}}" alt="">
                                            <div class="preview-buttons valign-middle">
                                                <div class="valign-middle-content">
                                                    <a class="button size-2 style-2" href="<?=url("product/detail/id")?>">
                                                        <span class="button-wrapper">
                                                            <span class="icon"><img src="{{URL::asset('public/img/icon-1.png')}}" alt=""></span>
                                                            <span class="text">Learn More</span>
                                                        </span>
                                                    </a>
                                                    <a class="button size-2 style-3" href="<?=url("product/detail/id")?>">
                                                        <span class="button-wrapper">
                                                            <span class="icon"><img src="{{URL::asset('public/img/icon-3.png')}}" alt=""></span>
                                                            <span class="text">Add To Cart</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price">
                                            <div class="simple-article size-4 dark">RP 100.630.00</div>
                                        </div>
                                        <div class="description">
                                            <div class="simple-article text size-2">Mollis nec consequat at In feugiat mole stie tortor a malesuada</div>
                                            <div class="icons">
                                                <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="empty-space col-xs-b35 col-sm-b0"></div>
                    <div class="row">
                        <div class="col-sm-3 hidden-xs">
                            <a class="button size-1 style-5" href="#">
                                <span class="button-wrapper">
                                    <span class="icon"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                                    <span class="text">prev page</span>
                                </span>
                            </a>
                        </div>
                        <div class="col-sm-6 text-center">
                        <style type="text/css">
                            .pagination {
                                display: inline-block;
                            }
                        </style>
                            <div class="pagination-wrapper">
                                <a class="pagination active">1</a>
                                <a class="pagination">2</a>
                                <a class="pagination">3</a>
                                <a class="pagination">4</a>
                                <span class="pagination">...</span>
                                <a class="pagination">23</a>
                            </div>
                        </div>
                        <div class="col-sm-3 hidden-xs text-right">
                            <a class="button size-1 style-5" href="#">
                                <span class="button-wrapper">
                                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                    <span class="text">prev page</span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="empty-space col-md-b70"></div>
                </div>

            </div>
        </div>
        <div class="footer-form-block">
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
        </div>
@include('template/footer')