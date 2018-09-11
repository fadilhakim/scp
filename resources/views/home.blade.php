@include('template/header')
        
        <div class="slider-wrapper">
            <div class="swiper-button-prev visible-lg"></div>
            <div class="swiper-button-next visible-lg"></div>
            <style type="text/css">
                .swiper-slide {
                    cursor: pointer;
                }
            </style>
            <div class="swiper-container" data-parallax="1" data-auto-height="1">
               <div class="swiper-wrapper">

                <?php $slider = App\Models\Slider::all_slider(); 
                        foreach($slider as $rowSlider) {
                ?>
                    <div class="swiper-slide" style="background-image: url('{{ URL::asset('public/sliders/'.$rowSlider->image_name)}}'); height: 450px;">
                        <div class="container">
                           
                        </div>
                   </div>
                <?php } ?>

               </div>
               <div class="swiper-pagination swiper-pagination-white"></div>
            </div>
        </div>

        <style type="text/css">
            
            .banner-shortcode.style-5 .valign-middle {
               /* min-height: 135px;*/
            }
             @media only screen and (max-width: 1023px) {

                .banner-shortcode.style-5 .valign-middle {
                    margin-bottom: 30px;
                }
             }

        </style>
        <div class="grey-background">
            <!-- <div class="container">
                <div class="row">
                    
                        <div class="col-md-3">
                            <a href="http://yifang.id/product/detail/58/1/strawberry-armee">
                            <div class="banner-shortcode style-5" style="background-image: url({{ URL::asset('public/img/r1.jpg')}});)">
                                <div class="valign-middle">
                                    
                                </div>
                            </div>
                            </a>
                        </div>
                                 
                        <div class="col-md-3">
                            <a href="http://yifang.id/product/detail/57/1/fs-strawberry-piatto">
                            <div class="banner-shortcode style-5 " style="background-image: url({{ URL::asset('public/img/r2.jpg')}});)">
                                <div class="valign-middle">
                                    <div class="valign-middle-content">
                                        
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    
                   
                        <div class="col-md-3">
                            <a href="http://yifang.id/product/detail/55/7/banana">
                            <div class="banner-shortcode style-5 " style="background-image: url({{ URL::asset('public/img/r3.jpg')}});)">
                                <div class="valign-middle">
                                    <div class="valign-middle-content">
                                       
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    

                    
                        <div class="col-md-3">
                            <a href="http://yifang.id/product/detail/59/1/strawberry-blade">
                            <div class="banner-shortcode style-5" style="background-image: url({{ URL::asset('public/img/r4.jpg')}});)">
                                <div class="valign-middle">
                                    <div class="valign-middle-content">
                                        
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    
                </div>
            </div> -->
            <div class="empty-space col-xs-b30"></div>
        </div>

        <div class="grey-background">
            <div class="empty-space col-xs-b30"></div>
            <div class="text-center">
                <div class="simple-article size-3 grey uppercase col-xs-b5">Start Products</div>
                <div class="h2">something new for you</div>
                <div class="title-underline center"><span></span></div>
            </div>
            <div class="empty-space col-xs-b30"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-b30 col-md-b0">
                        <div class="banner-shortcode style-3 text-center" style="background-image: url({{ URL::asset('public/img/background-9.jpg')}});)">
                            <div class="valign-middle-cell">
                                <div class="valign-middle-content">
                                    <div class="simple-article size-3 light transparent uppercase col-xs-b5">relax collection</div>
                                    <h3 class="h3 light"><a href="#">your perfect sound</a></h3>
                                    <div class="title-underline center"><span></span></div>
                                    <div class="simple-article size-3 light transparent col-xs-b30">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesentir pulvinar ante et nisl scelerisque. Mauris dignissim metus mollis neque rhoncus in nunc sit amet </div>
                                    <a class="button size-2 style-1" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                            <span class="text">learn more</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="banner-shortcode style-5" style="background-image: url({{ URL::asset('public/img/background-16.jpg')}});)">
                            <div class="valign-middle">
                                <div class="valign-middle-content">
                                    <div class="simple-article size-3 light transparent uppercase col-xs-b5">street collection</div>
                                    <h4 class="h4 light col-xs-b5"><a href="#">noise is not a problem</a></h4>
                                    <div class="simple-article size-5 light transparent uppercase"><span class="color" style="color: #fff;">Rp 2.000.000</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="empty-space col-xs-b30"></div>

                        <div class="banner-shortcode style-5" style="background-image: url({{ URL::asset('public/img/background-16.jpg')}});)">
                            <div class="valign-middle">
                                <div class="valign-middle-content">
                                    <div class="simple-article size-3 light transparent uppercase col-xs-b5">street collection</div>
                                    <h4 class="h4 light col-xs-b5"><a href="#">noise is not a problem</a></h4>
                                    <div class="simple-article size-5 light transparent uppercase"> <span class="color" style="color:#fff">Rp. 800.000</span></div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="empty-space col-xs-b30"></div>
        </div>

        <style type="text/css">

            h3 a {
                color:#fff !important;
            }
            h4 a {
                color:#fff !important;
            }
            .embed-responsive-16by9 {
                padding-bottom: 56.25% !important;
            }
        </style>
        <div class="empty-space col-xs-b30"></div>

        <div class="text-center">
            <div class="simple-article size-3 grey uppercase col-xs-b5">Videos</div>
            <div class="h2">our featuring products</div>
            <div class="title-underline center"><span></span></div>
        </div>

        <div class="empty-space col-xs-b30"></div>

        <div class="row">

            <div class="col-md-4">                                      
                <div class="blog-shortcode style-2">
                    <a class="preview">
                        <img class="" style="margin: auto;" src="{{URL::asset('public/img/vid1.jpg')}}" alt="">
                        <span class="play-button open-video" data-src="https://www.youtube.com/embed/kQT2y3UiosQ?autoplay=1&amp;loop=1&amp;modestbranding=1&amp;rel=0&amp;showinfo=0&amp;color=white&amp;theme=light&amp;wmode=transparent"></span>
                    </a>
                </div>
            </div>
            <div class="col-md-4">                                      
                <div class="blog-shortcode style-2">
                    <a class="preview">
                        <img class="" style="margin: auto;" src="{{URL::asset('public/img/vid2.jpg')}}" alt="">
                        <span class="play-button open-video" data-src="https://www.youtube.com/embed/mSCN1AmiiEY?autoplay=1&amp;loop=1&amp;modestbranding=1&amp;rel=0&amp;showinfo=0&amp;color=white&amp;theme=light&amp;wmode=transparent"></span>
                    </a>
                </div>
            </div>
            <div class="col-md-4">                                      
                <div class="blog-shortcode style-2">
                    <a class="preview">
                        <img class="" style="margin: auto;" src="{{URL::asset('public/img/vid3.jpg')}}" alt="">
                        <span class="play-button open-video" data-src="https://www.youtube.com/embed/mSCN1AmiiEY?autoplay=1&amp;loop=1&amp;modestbranding=1&amp;rel=0&amp;showinfo=0&amp;color=white&amp;theme=light&amp;wmode=transparent"></span>
                    </a>
                </div>
            </div>

        </div>

        <div class="row nopadding">
            <div class="col-sm-6 col-lg-3">
                <div class="icon-description-shortcode style-4">
                    <img class="icon-image" src="{{URL::asset('public/img/icon-22.png')}}" alt="">
                    <div class="cell-view">
                        <div class="title h6">free delivery</div>
                        <div class="description simple-article size-2">Mollis nec consequat at In feugiat molestie tortor a malesuada etiam a venenatis </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="icon-description-shortcode style-4">
                    <img class="icon-image" src="{{URL::asset('public/img/icon-23.png')}}" alt="">
                    <div class="cell-view">
                        <div class="title h6">customers support</div>
                        <div class="description simple-article size-2">Mollis nec consequat at In feugiat molestie tortor a malesuada etiam a venenatis </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="icon-description-shortcode style-4">
                    <img class="icon-image" src="{{URL::asset('public/img/icon-24.png')}}" alt="">
                    <div class="cell-view">
                        <div class="title h6">payment security</div>
                        <div class="description simple-article size-2">Mollis nec consequat at In feugiat molestie tortor a malesuada etiam a venenatis </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="icon-description-shortcode style-4">
                    <img class="icon-image" src="{{URL::asset('public/img/icon-25.png')}}" alt="">
                    <div class="cell-view">
                        <div class="title h6">world wide store</div>
                        <div class="description simple-article size-2">Mollis nec consequat at In feugiat molestie tortor a malesuada etiam a venenatis </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@include('template/footer')


