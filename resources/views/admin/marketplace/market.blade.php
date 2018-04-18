<script>
 function add_modal_market()
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/marketplace/insert")?>",
        data:"_token="+_token,
        success:function(data)
        {
            $(".tmp-slider").html(data)
        }
    });
    //console.log("Allahu Akbar")
}

function update_modal_slider(market_id)
{

    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/slider/update")?>",
        data:"_token="+_token+"&slider_id="+slider_id,
        success:function(data)
        {
            $(".tmp-slider").html(data)
        }
    });
}

function delete_modal_market(market_id)
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
        type:"POST",
        url:"<?=url("admin/marketplace/delete")?>",
        data:"_token="+_token+"&market_id="+market_id,
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
                    <h5 class="col-md-10 pull-left">Market Place</h5>
                    <button onclick="add_modal_market()" class="btn btn-primary btn-sm">
                        <i class="icofont icofont-plus"></i> Add Market Place </button>
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
                                        <th>Market Logo</th>
                                        <th>Market Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php $i = 0; foreach ($MarketPlace as $row) { $i++ ?>
                                    <tr>
                                        <th scope="row"><?php echo $i ?></th>
                                        <td> 
                                            <img class="img-fluid" src="{{URL::asset('/public/market_logo/'.$row->market_logo)}}">
                                        </td>
                                        <td><?php echo $row->market_name; ?></td>
                                        <td>
                                            <button class="btn btn-danger" onclick="delete_modal_market(<?=$row->id?>)">Delete</button>
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

