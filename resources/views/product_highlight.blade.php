@include('template/header')
<?php foreach($RingkasanProduct as $rowImage){ ?>

    <div  class="block-entry" style="background-image:url({{URL::asset('public/product_highlight/'.$rowImage->product_id.'/'.$rowImage->image_name)}})">
        <div class="container" style="height:500px;">
            <!-- <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="cell-view simple-banner-height text-center">
                        <div class="empty-space col-xs-b35 col-sm-b70"></div>
                        <h1 class="h1 light">Image1</h1>
                        <div class="title-underline center"><span></span></div>
                        <div class="simple-article light transparent size-4">In feugiat molestie tortor a malesuada. Etiam a venenatis ipsum. Proin pharetra elit at feugiat commodo vel placerat tincidunt sapien nec</div>
                        <div class="empty-space col-xs-b35 col-sm-b70"></div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

<?php } ?>
	


<!-- <div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-6">
            <div class="cell-view simple-banner-height big">
                <div class="empty-space col-sm-b35"></div>
                <div class="simple-article size-3 grey uppercase col-xs-b5">real sound</div>
                <div class="h2">feel perfect beat</div>
                <div class="title-underline left"><span></span></div>
                <div class="simple-article size-4 grey">In feugiat molestie tortor a malesuada. Etiam a venenatis ipsum. Proin pharetra elit at feugiat commodo vel placerat tincidunt sapien nec</div>
                <div class="empty-space col-xs-b30 col-sm-b70"></div>
                <div class="icon-description-shortcode style-3">
                    <div class="image-icon">
                        <img class="image-thumbnail rounded-image" src="img/thumbnail-38.jpg" alt="" />
                    </div>
                    <div class="content">
                        <div class="cell-view">
                            <h6 class="title h6">Phasellus rhoncus in nunc sit</h6>
                            <div class="description simple-article size-2">Etiam mollis tristique mi ac ultrices. Morbi vel neque eget lacus sollicitudin facilisis. Lorem ipsum dolor sit amet semper ante vehicula</div>
                        </div>
                    </div>
                </div>
                <div class="empty-space col-xs-b30"></div>
                <div class="icon-description-shortcode style-3">
                    <div class="image-icon">
                        <img class="image-thumbnail rounded-image" src="img/thumbnail-39.jpg" alt="" />
                    </div>
                    <div class="content">
                        <div class="cell-view">
                            <h6 class="title h6">Phasellus rhoncus in nunc sit</h6>
                            <div class="description simple-article size-2">Etiam mollis tristique mi ac ultrices. Morbi vel neque eget lacus sollicitudin facilisis. Lorem ipsum dolor sit amet semper ante vehicula</div>
                        </div>
                    </div>
                </div>
                <div class="empty-space col-xs-b35"></div>
            </div>
        </div>
    </div>
    <div class="row-background left hidden-xs hidden-sm">
        <img src="{{URL::asset('public/product_highlight/mia1-phone01.png')}}" alt="" />
    </div>
</div>
<div class="empty-space col-xs-b35 col-md-b70"></div>
<div class="block-entry" style="background-image:url({{URL::asset('public/sliders/index-bg.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="cell-view simple-banner-height text-left">
                    <div class="empty-space col-xs-b35 col-sm-b70"></div>
                    <h1 class="h1 light">image 2</h1>
                    <div class="title-underline center"><span></span></div>
                    <div class="simple-article light transparent size-4">In feugiat molestie tortor a malesuada. <br> Etiam a venenatis ipsum. Proin pharetra elit at feugiat commodo vel placerat tincidunt sapien nec</div>
                    <div class="empty-space col-xs-b35 col-sm-b70"></div>
                </div>
            </div>
        </div>
    </div>
</div>

 -->



@include('template/footer')