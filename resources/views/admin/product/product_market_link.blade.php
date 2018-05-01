<script>
 function add_modal_market_link(product_id)
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/market_link/insert/{id}")?>",
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
                    <h5 class="col-md-10 pull-left">
                       Product name :  '<strong><?=$product->product_title?></strong>'
                    </h5>
                    <button onclick="add_modal_market_link(<?=$product->product_id?>)" class="btn btn-primary btn-sm"><i     class="icofont icofont-plus"></i> Add  </button>
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
                                        <th>Market Place</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php $i = 0; foreach ($product_overview as $row) { $i++ ?>
                                    <tr>
                                        <th scope="row"><?php echo $i ?></th>
                                        <td>
                                         
                                            <?php 
                                                 $getMarketName =  App\Models\MarketPlace::detail_MarketPlace($row->market_id) ;
                                            ?>
                                            <img class="img-fluid" src="{{URL::asset('/public/market_logo/'.$getMarketName->market_logo)}}">
                                            <?php echo $getMarketName->market_name ?>
                                            
                                        </td>
                                        <td>
                                            <a target="_blank" href=" <?php echo $row->product_link ?>"> <?php echo $row->product_link ?></a>
                                        </td>
                                        <td>
                                            <a href="{{url('admin/market_link/delete/'.$row->id).'/'.$product->product_id}}" class="btn btn-danger" style="color:white" >
                                                Delete
                                            </a>
                                        </td>
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

