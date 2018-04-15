@include('template/header')
        <?php 
            
                $aboutId        = $about->about_id;
                $headPic        = $about->head_pic;
                $headTitle      = $about->head_title;
                $head_subtitle  = $about->head_subtitle;
                $left_subtitle  = $about->left_title;
                $left_desc      = $about->left_desc;
                $right_desc      = $about->right_desc;
         
        ?>
        <?php echo $aboutId ?>
        <div class="block-entry fixed-background" style="background-image: url({{URL::asset('/public/img/'.$headPic)}})">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="cell-view simple-banner-height text-center" style="height:300px;">
                            <div class="empty-space col-xs-b35 col-sm-b70"></div>
                            <h1 class="h1 light"><?php echo $headTitle ?></h1>
                            <div class="title-underline center"><span></span></div>
                            <div class="simple-article light transparent size-4"><?php echo $head_subtitle ?> </div>
                            <div class="empty-space col-xs-b35 col-sm-b70"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>
      

        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <div class="simple-article size-3 grey uppercase col-xs-b5">about us</div>
                    <div class="h2"><?php echo  $left_subtitle ?></div>
                    <div class="title-underline left"><span></span></div>
                    <div class="simple-article size-4 grey"><?php echo $left_desc ?></div>
                </div>
                <div class="col-sm-7">
                    <div class="simple-article size-3">
                        <p><?php echo $right_desc ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>
@include('template/footer')