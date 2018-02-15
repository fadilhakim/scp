<script>
function add_modal_brand()
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/product/brand/insert")?>",
        data:"_token="+_token,
        success:function(data)
        {
            $(".tmp-brand").html(data)
        }
    });
}

function update_modal_brand(brand_id)
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/product/brand/update")?>",
        data:"_token="+_token+"&brand_id="+brand_id,
        success:function(data)
        {
            $(".tmp-brand").html(data)
        }
    });
}

function delete_modal_brand(brand_id)
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
        type:"POST",
        url:"<?=url("admin/product/brand/delete")?>",
        data:"_token="+_token+"&brand_id="+brand_id,
        success:function(data)
        {
            $(".tmp-brand").html(data)
        }
    });
}

</script>
<div class="page-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                
                    <h5 class="col-md-10 pull-left"> brand List </h5>
                  
                        <button onclick="add_modal_brand()" class="btn btn-primary btn-sm"><i class="icofont icofont-plus"></i> Add </button>
                    <span class="clearfix"></span>
                  
                </div>
                <div class="card-block table-border-style">
                    <div class="tmp-brand"></div>
                    <div class="">
                        <table id="brand-tbl" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>brand</th>
                                   
                                   
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $i=1; 
                               if(!empty($brand)){
                               foreach ($brand as $row){ ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td> {{ $row->brand_name }} </td>
                                    
                                    
                                    <td>
                                        <div class="dropdown float-left"  data-container="body" >
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu2"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Setting
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            
                                            <button class="dropdown-item" type="button" onclick="update_modal_brand(<?=$row->brand_id?>)"> Update</button>
                                            <button class="dropdown-item" type="button" onclick="delete_modal_brand(<?=$row->brand_id?>)"> Delete </button>
                                            
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <?php $i++; }} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#brand-tbl").DataTable({

    });
</script>