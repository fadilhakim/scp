<script>
function modal_update_slider(slide_id)
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/product/update")?>",
        data:"_token="+_token+"&product_id="+product_id,
        success:function(data)
        {
            $(".tmp-product").html(data)
        }
    });
}


</script>
<div class="page-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
 <!--                    <h5>Home Page content</h5> -->
                    <p>All this content will be automatic align center in front/user side</p>
                
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
                             <?php foreach($slider as $row){ ?>
                                <tr>
                                    <th scope="row"><?php echo $row->id ?></th>
                                    <td> <img src="{{URL::asset('/public/sliders/product-8.jpg')}}">
                                    </td>
                                    <td>Promo Heboh</td>
                                    <td> http://www.strawberycell.com/promo_heboh </td>
                                    <td><div class="dropdown show" data-container="body">
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                Setting
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu2" align="right">
                                          
                                            <button class="dropdown-item" type="button" onclick="modal_update_slider(1)"> Update</button>
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