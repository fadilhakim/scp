<div class="page-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
 <!--                    <h5>Home Page content</h5> -->
                    <p>All this content will be automatic align center in front/user side</p>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block">
                    <h4 class="sub-title">Add New Image Slider</h4>
                    <form method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Slider Title</label>
                            <div class="col-sm-10">
                                <input name="slider_title" class="form-control" placeholder="Slider title" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Slider Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="slider_image">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Slider URL</label>
                            <div class="col-sm-10">
                                <input name="slider_url" class="form-control" placeholder="Slider URL" type="text">
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>

                <div class="card">
                <div class="card-header">
                    <h5>Costumers Table</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Slider Image</th>
                                    <th>Slider Name</th>
                                    <th>Slider Url</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php for ($i = 1 ; $i <= 3; $i++){ ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td> <img src="{{URL::asset('/public/sliders/product-8.jpg')}}">
                                    </td>
                                    <td>Promo Heboh</td>
                                    <td> http://www.strawberycell.com/promo_heboh </td>
                                    <td><div class="dropdown show" data-container="body">
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                Setting
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu2" align="right">
                                          
                                            <button class="dropdown-item" type="button" onclick="update_modal_product(1)"> Update</button>
                                            <button class="dropdown-item" type="button" onclick="delete_modal_product(1)"> Delete </button>
                                            
                                            </div>
                                        </div></td>
                                </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>