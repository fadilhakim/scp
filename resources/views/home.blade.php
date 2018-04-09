@include('template/header')

        <div class="slider-wrapper">
            <div class="swiper-button-prev hidden"></div>
            <div class="swiper-button-next hidden"></div>
            <div class="swiper-container page-height" data-direction="vertical" data-mousewheel="1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                         <div class="container">
                             <div class="row">
                                 <div class="col-sm-6 col-sm-offset-6 text-center">
                                     <div class="cell-view page-height">
                                         <div class="col-xs-b40 col-sm-b80"></div>
                                             <div class="simple-article size-3 uppercase grey">professional edition</div>
                                             <div class="col-xs-b5"></div>
                                             <h2 class="h2">eco beat unite</h2>
                                             <div class="col-xs-b15"></div>
                                             <div class="simple-article grey size-5">BEST PRICE <span class="color">Rp 175.00</span></div>
                                             <div class="col-xs-b30"></div>
                                             <div class="buttons-wrapper">
                                                 <a class="button size-2 style-2" href="#">
                                                     <span class="button-wrapper">
                                                         <span class="icon"><img src="{{ URL::asset('public/img/icon-1.png')}}" alt=""></span>
                                                         <span class="text">Learn More</span>
                                                     </span>
                                                 </a>
                                                 <a class="button size-2 style-3" href="#">
                                                     <span class="button-wrapper">
                                                         <span class="icon"><img src="{{ URL::asset('public/img/icon-3.png')}}" alt=""></span>
                                                         <span class="text">Add To Cart</span>
                                                     </span>
                                                 </a>
                                             </div>
                                         <div class="col-xs-b40 col-sm-b80"></div>
                                     </div>
                                 </div>
                             </div>
                             <div class="slider-product-preview align-left">
                                 <div class="product-preview-shortcode">
                                     <div class="preview">
                                         <div class="swiper-lazy-preloader"></div>
                                         <div class="entry full-size swiper-lazy active" data-background="{{ URL::asset('public/img/product-preview-20.png')}}"></div>
                                         <div class="entry full-size swiper-lazy" data-background="{{ URL::asset('public/img/product-preview-17.png')}}"></div>
                                         <div class="entry full-size swiper-lazy" data-background="{{ URL::asset('public/img/product-preview-18.png')}}"></div>
                                         <div class="entry full-size swiper-lazy" data-background="{{ URL::asset('public/img/product-preview-19.png')}}"></div>
                                     </div>
                                     <div class="sidebar valign-middle">
                                         <div class="valign-middle-content">
                                             <div class="entry active"><img src="{{ URL::asset('public/img/product-105.png')}}" alt="" /></div>
                                             <div class="entry"><img src="{{ URL::asset('public/img/product-106.png')}}" alt="" /></div>
                                             <div class="entry"><img src="{{ URL::asset('public/img/product-107.png')}}" alt="" /></div>
                                             <div class="entry"><img src="{{ URL::asset('public/img/product-108.png')}}" alt="" /></div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="empty-space col-xs-b40 col-sm-b0"></div>
                         </div>
                    </div>
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


