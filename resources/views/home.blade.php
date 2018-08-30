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

        <div class="grey-background">
            <div class="empty-space col-xs-b30"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="banner-shortcode style-5 rounded-image" style="background-image: url({{ URL::asset('public/img/background-16.jpg')}});)">
                            <div class="valign-middle">
                                <div class="valign-middle-content">
                                    <div class="simple-article size-3 light transparent uppercase col-xs-b5">street collection</div>
                                    <h4 class="h4 light col-xs-b5"><a href="#">noise is not a problem</a></h4>
                                    <div class="simple-article size-5 light transparent uppercase">starting from <span class="color">$95.00</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="banner-shortcode style-5 rounded-image" style="background-image: url({{ URL::asset('public/img/background-16.jpg')}});)">
                            <div class="valign-middle">
                                <div class="valign-middle-content">
                                    <div class="simple-article size-3 light transparent uppercase col-xs-b5">street collection</div>
                                    <h4 class="h4 light col-xs-b5"><a href="#">noise is not a problem</a></h4>
                                    <div class="simple-article size-5 light transparent uppercase">starting from <span class="color">$95.00</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="banner-shortcode style-5 rounded-image" style="background-image: url({{ URL::asset('public/img/background-16.jpg')}});)">
                            <div class="valign-middle">
                                <div class="valign-middle-content">
                                    <div class="simple-article size-3 light transparent uppercase col-xs-b5">street collection</div>
                                    <h4 class="h4 light col-xs-b5"><a href="#">noise is not a problem</a></h4>
                                    <div class="simple-article size-5 light transparent uppercase">starting from <span class="color">$95.00</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="empty-space col-xs-b30"></div>
        </div>

    </div> 
@include('template/footer')


