@include('template/header')

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


