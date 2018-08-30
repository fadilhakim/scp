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

                <div class="swiper-slide" style="background-image: url('{{ URL::asset('public/sliders/banana_slider.jpg')}}'); height: 450px;">
                        <div class="container">
                           
                        </div>
                   </div>

                   <div class="swiper-slide" style="background-image: url('{{ URL::asset('public/sliders/army_slider.jpg')}}'); height: 450px;">
                        <div class="container">
                           
                        </div>
                   </div>
                   
                   <div class="swiper-slide" style="background-image: url('{{ URL::asset('public/sliders/army_slider.jpg')}}'); height: 450px;">
                        <div class="container">
                           
                        </div>
                   </div>
               </div>
               <div class="swiper-pagination swiper-pagination-white"></div>
            </div>
        </div>

        <div class="grey-background">
            <div class="empty-space col-xs-b30"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-b30 col-md-b0">
                        <div class="banner-shortcode style-3 rounded-image text-center" style="background-image: url(img/background-9.jpg);">
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
                </div>
            </div>
        </div>

        <div class="slider-wrapper">
            <div class="swiper-button-prev hidden"></div>
            <div class="swiper-button-next hidden"></div>
            <div class="swiper-container page-height" data-direction="vertical" data-mousewheel="1">
                <div class="swiper-wrapper">
                    <?php $slider = App\Models\Slider::all_slider(); 
                        foreach($slider as $rowSlider) {
                    ?>
                        <div class="swiper-slide">
                            <img src="{{ URL::asset('public/sliders/'.$rowSlider->image_name)}}" alt="">
                        </div>
                    <?php } ?>
               </div>
               <div class="swiper-pagination"></div>
            </div>
        </div>
    </div> 
@include('template/footer')


