@include('template/header')

        <div class="container">
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="breadcrumbs">
                <a href="{{url('/')}}">Home</a>
                <a href="{{url('product')}}">Product</a>
            </div>
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="row">
                <div class="col-md-12">
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
                            <?php foreach($product as $rowProduct) {?>
                                <?php 
                                
                                $slugProd = str_slug($rowProduct->product_title, '-'); 
                                $prodId = $rowProduct->product_id;
                                
                                ?>
                                <div class="col-sm-4 col-md-3">
                                    <div class="product-shortcode style-1">
                                        <div class="title">
                                            <div class="simple-article size-1 color col-xs-b5"><a href="<?=url("product/detail/{$rowProduct->product_id}/{$rowProduct->product_category}/{$slugProd}")?>">SMART PHONES</a></div>
                                            <div class="h6 animate-to-green"><a href="<?=url("product/detail/{$rowProduct->product_id}/{$rowProduct->product_category}/{$slugProd}")?>">{{$rowProduct->product_title}}</a></div>
                                        </div>
                                        <div class="preview">
                                        <?php 
                                        
                                        $firstImg =  App\Models\Product::get_first_image($prodId) ;
                                           
                                            if(!empty($firstImg))
                                            {
                                                $getImage = $firstImg->image_name;
                                            }
                                            else
                                            {
                                                $getImage = "";
                                            }
                                            ?>
                                            <img src="{{URL::asset('public/products/'.$prodId.'/'.$getImage )}}" alt="">
                                            
                                            <div class="preview-buttons valign-middle">
                                                <div class="valign-middle-content">
                                                    <a class="button size-2 style-2" href="<?=url("product/detail/{$rowProduct->product_id}/{$rowProduct->product_category}/{$slugProd}")?>">
                                                        <span class="button-wrapper">
                                                            <span class="icon"><img src="{{URL::asset('public/img/icon-1.png')}}" alt=""></span>
                                                            <span class="text">Learn More</span>
                                                        </span>
                                                    </a>
                                                    <a class="button size-2 style-3" href="<?=url("cart/add/$prodId/$slugProd")?>">
                                                        <span class="button-wrapper">
                                                            <span class="icon"><img src="{{URL::asset('public/img/icon-3.png')}}" alt=""></span>
                                                            <span class="text">Add To Cart</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price">
                                            <div class="simple-article size-4 dark">Rp {{$rowProduct->price}}</div>
                                        </div>
                                        <div class="description">
                                            <div class="simple-article text size-2"><?php echo $rowProduct->product_description ?></div>
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
                        {{$product->links()}}
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
