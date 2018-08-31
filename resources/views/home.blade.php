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
                min-height: 135px;
            }
             @media only screen and (max-width: 1023px) {

                .banner-shortcode.style-5 .valign-middle {
                    margin-bottom: 30px;
                }
             }

        </style>
        <div class="grey-background">
            <div class="empty-space col-xs-b30"></div>
            <div class="container">
                <div class="row">
                    
                        <div class="col-md-3">
                            <a href="http://yifang.id/product/detail/58/1/strawberry-armee">
                            <div class="banner-shortcode style-5 rounded-image" style="background-image: url({{ URL::asset('public/img/r1.jpg')}});)">
                                <div class="valign-middle">
                                    
                                </div>
                            </div>
                            </a>
                        </div>
                    

                   
                        <div class="col-md-3">
                            <a href="http://yifang.id/product/detail/57/1/fs-strawberry-piatto">
                            <div class="banner-shortcode style-5 rounded-image" style="background-image: url({{ URL::asset('public/img/r2.jpg')}});)">
                                <div class="valign-middle">
                                    <div class="valign-middle-content">
                                        
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    
                   
                        <div class="col-md-3">
                            <a href="http://yifang.id/product/detail/55/7/banana">
                            <div class="banner-shortcode style-5 rounded-image" style="background-image: url({{ URL::asset('public/img/r3.jpg')}});)">
                                <div class="valign-middle">
                                    <div class="valign-middle-content">
                                       
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    

                    
                        <div class="col-md-3">
                            <a href="http://yifang.id/product/detail/59/1/strawberry-blade">
                            <div class="banner-shortcode style-5 rounded-image" style="background-image: url({{ URL::asset('public/img/r4.jpg')}});)">
                                <div class="valign-middle">
                                    <div class="valign-middle-content">
                                        
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    
                </div>
            </div>
            <div class="empty-space col-xs-b30"></div>
        </div>

    </div> 
@include('template/footer')


