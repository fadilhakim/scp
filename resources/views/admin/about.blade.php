<div class="page-body">
    <div class="row">
        <div class="col-lg-12">
        	<div class="card">
        		<div class="card-header">
                    <h5>About us content</h5>
                    <p>All this content will be automatic align center in front/user side</p>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    <h4 class="sub-title">Basic Inputs</h4>
                    
                    <form method="post" enctype="multipart/form-data" action="{{url('admin/about/update')}}">
                        <div class="form-group row">
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                            <label class="col-sm-2 col-form-label">Head Title About Page</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="head_title" value="<?php echo $about->head_title ?>" placeholder="About Page title" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Head subTitle About Page</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="<?php echo $about->head_subtitle ?>" name="head_subtitle" placeholder="About Page subtitle" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Left Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="<?php echo $about->left_title ?>" name="left_title" placeholder="About Page subtitle" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Left Description</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="left_desc" cols="5" class="form-control" placeholder="Content Text"><?php echo $about->left_desc ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Right Description</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="right_desc" cols="5" class="form-control" placeholder="Content Text"><?php echo $about->right_desc ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">About Head Pic</label>
                            <div class="col-sm-10">
                                <?php if(!empty($about->head_pic)){ ?>
                                    <img src="{{URL::asset('public/img/'.$about->head_pic)}}" class="img-fluid" alt="">
                                <?php } ?>
                                <input class="form-control" type="hidden" name="head_pic_hide" value="<?php echo $about->head_pic ?>">
                                <input class="form-control" type="file" name="head_pic">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
        	</div>
        </div>
    </div>
</div>