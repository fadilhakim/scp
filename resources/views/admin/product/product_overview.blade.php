<script>
 function add_modal_overview(product_id)
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/overview/insert/{id}")?>",
        data:"_token="+_token+"&product_id="+product_id,
        success:function(data)
        {
            $(".tmp-slider").html(data)
        }
    });
    //console.log("Allahu Akbar")
}

function update_modal_slider(product_id)
{

    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/slider/update")?>",
        data:"_token="+_token+"&product_id="+product_id,
        success:function(data)
        {
            $(".tmp-slider").html(data)
        }
    });
}

function delete_modal_slider(slider_id)
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
        type:"POST",
        url:"<?=url("admin/slider/delete")?>",
        data:"_token="+_token+"&slider_id="+slider_id,
        success:function(data)
        {
            $(".tmp-slider").html(data)
        }
    });
}   
</script>
<div class="page-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="col-md-10 pull-left">Product Image Over View</h5>
                    <button onclick="add_modal_overview(<?=$product->product_id?>)" class="btn btn-primary btn-sm"><i     class="icofont icofont-plus"></i> Add Product Overview </button>
                    <span class="clearfix"></span>
                </div>
                <div class="card-block table-border-style">
                    <div class="tmp-slider"></div>
                    <div class="">
                        <div class="table-responsive">
                            <table id="slider-tbl" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Overview Image <span style="color:red;">(Image size 1600x800)</span></th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php $i = 0; foreach ($product_overview as $row) { $i++ ?>
                                    <tr>
                                        <th scope="row"><?php echo $i ?></th>
                                        <td> 
                                            <img class="img-fluid" src="{{URL::asset('/public/product_highlight/'.$row->product_id.'/'.$row->image_name)}}">
                                        </td>
                                        <td><div class="dropdown show" data-container="body">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" role="button" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Setting
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu2" align="right">
                                              
                                                <button class="dropdown-item" type="button" onclick="update_modal_overview(<?=$row->ringkasan_id?>)"> Update</button>
                                                <button class="dropdown-item" type="button" onclick="delete_modal_overview(<?=$row->ringkasan_id?>)"> Delete </button>
                                                
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

