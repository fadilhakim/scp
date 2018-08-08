<div class="page-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="col-md-10 pull-left"> Product Image's List </h5>
                    <span class="clearfix"></span>
                  
                </div>

                @if (\Session::get('success'))
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <button class="btn btn-success"><i class="icofont icofont-check-circled"></i>{{ \Session::get('success') }}</button>
                        </div>
                    </div>
                    @endif

                     @if (\Session::get('error'))
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <button class="btn btn-danger"><i class="icofont icofont-warning-alt"></i>{{ \Session::get('error') }}</button>
                        </div>
                    </div>
                    @endif
                <div class="card-block">
                    <?php foreach($rowImg as $img){ 

                            $firstImg = App\Models\Product::get_image_by_field($prodId,1) ;
                            $secImg = App\Models\Product::get_image_by_field($prodId,2) ;
                            $thirdImg = App\Models\Product::get_image_by_field($prodId,3) ;
                            $fourthImg = App\Models\Product::get_image_by_field($prodId,4) ;
                    }?>

                    <form action="{{ url('admin/product/update_image_process') }}" method="post" enctype="multipart/form-data">
                    <div class="row form-group">
                       
                        <input type="hidden" name="product_id" value="<?php echo $prodId ?>">
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                        <div class="col-lg-6 p-20">
                            
                            <div class="p-20 z-depth-bottom-0 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-top-0">
                                <label for="">First Image <strong>(Thumbnail) : 
                                    <span style="color:red;">Image size 500x500 px</span></strong></label><br>
                                
                                <?php if(!empty($firstImg)){ ?>
                                    <img class="img-fluid" src="{{URL::asset('public/products/'.$prodId.'/'.$firstImg->image_name)}}" alt="">
                                    <input type="hidden" name="image1_hide" class="form-control form-bg-primary" value="{{ $firstImg->image_name}}">   
                                <?php } else { ?>
                                    <img class="img-fluid" src="{{URL::asset('public/products/no-image.png')}}" alt="">  
                                <?php } ?>
                                      
                                <input type="file" name="image1" class="form-control form-bg-primary">
                            </div>

                        </div>

                        <div class="col-lg-6 p-20">
                            <div class="p-20 z-depth-bottom-0 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-top-0">

                                <label for="">Second Image :<span style="color:red;">Image size 500x500 px</span></label><br>
                                <?php if(!empty($secImg)){ ?>
                                    <img class="img-fluid" src="{{URL::asset('public/products/'.$prodId.'/'.$secImg->image_name)}}" alt="">
                                    <input type="hidden" name="image2_hide" class="form-control form-bg-primary" value="{{ $secImg->image_name}}">   
                                <?php } else { ?>
                                    <img class="img-fluid" src="{{URL::asset('public/products/no-image.png')}}" alt="">  
                                <?php } ?>
                                
                                <input type="file" name="image2" class="form-control form-bg-primary">

                            </div>
                        </div>

                        <div class="col-lg-6 p-20">
                            <div class="p-20 z-depth-bottom-0 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-top-0">

                                <label for="">Third Image :<span style="color:red;">Image size 500x500 px</span></label><br>
                                <?php if(!empty($thirdImg)){ ?>
                                    <img class="img-fluid" src="{{URL::asset('public/products/'.$prodId.'/'.$thirdImg->image_name)}}" alt="">
                                    <input type="hidden" name="image3_hide" class="form-control form-bg-primary" value="{{ $thirdImg->image_name}}">   
                                <?php } else { ?>
                                    <img class="img-fluid" src="{{URL::asset('public/products/no-image.png')}}" alt="">  
                                <?php } ?>
                                
                                <input type="file" name="image3" class="form-control form-bg-primary">

                            </div>
                        </div>

                        <div class="col-lg-6 p-20">
                            <div class="p-20 z-depth-bottom-0 waves-effect" data-toggle="tooltip" data-placement="top" title=".z-depth-top-0">

                                <label for="">Fourth Image :<span style="color:red;">Image size 500x500 px</span></label><br>
                                <?php if(!empty($fourthImg)){ ?>
                                    <img class="img-fluid" src="{{URL::asset('public/products/'.$prodId.'/'.$fourthImg->image_name)}}" alt="">
                                    <input type="hidden" name="image4_hide" class="form-control form-bg-primary" value="{{ $fourthImg->image_name}}">   
                                <?php } else { ?>
                                    <img class="img-fluid" src="{{URL::asset('public/products/no-image.png')}}" alt="">
                                      
                                <?php } ?>
                                
                                <input type="file" name="image4" class="form-control form-bg-primary">

                            </div>
                        </div>

                        <div class="col-lg-12 p-20" style="text-align:right;">
                            <button class="btn btn-primary"><i class="icofont icofont-check-circled"></i> Submit Product Image's</button>
                        </div>
                        
                    </div>
                    </form>                       
                    <div class="row form-group">
                        <div class="col-lg-12 p-20">
                            <h4 class="sub-title" style="padding-top:40px;">Product Mini Slide :</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image Display <span style="color:red;">(Image size 870x320)</span></th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($mini_slide as $rowSlide) {?>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>
                                                    <img class="img-fluid" src="{{URL::asset('public/products/'.$prodId.'/'.$rowSlide->image_name)}}" alt="">
                                                </td>
                                                <td>
                                                    <a href="" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-12 p-20" style="text-align:left">
                                    <form action="{{ url('admin/product/insert_mini_slide') }}" method="post" enctype="multipart/form-data">
                                        <label for="">Add Mini Slide <span style="color:red;">(Image size 870x320)</span></label><br>
                                        <input type="hidden" name="product_id" value="<?php echo $prodId ?>">
                                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                                        <input type="file" style="width:50%" class="form-control form-bg-primary" name="image_slide" id="">
                                        <button class="btn btn-primary"><i class="icofont icofont-check-circled"></i> Add Mini Slide</button>
                                    </form>
                                </div>
                            </div>         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
