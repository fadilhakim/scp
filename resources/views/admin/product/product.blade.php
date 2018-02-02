<script>
function add_modal_product()
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/product/insert")?>",
        data:"_token="+_token,
        success:function(data)
        {
            $(".tmp-product").html(data)
        }
    });
}

function update_modal_product(product_id)
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

function delete_modal_product(product_id)
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
        type:"POST",
        url:"<?=url("admin/product/delete")?>",
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
                
                    <h5 class="col-md-10 pull-left"> Product List </h5>
                  
                        <button onclick="add_modal_product()" class="btn btn-primary btn-sm"><i class="icofont icofont-plus"></i> Add </button>
                    <span class="clearfix"></span>
                  
                </div>
                <div class="card-block table-border-style">
                    <div class="tmp-product"></div>
                    <div class="">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Title</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Weight</th>
                                    <th>Category</th>
                                    <th>Availability </th>
                                    <th>Status</th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $i=1; foreach ($product as $row){ ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td> <a href="<?=url("admin/product/detail/".$row->product_id)?>"> {{ $row->product_title }} </a> </td>
                                    <td><?=number_format($row->price)?></td>
                                    <td> {{ $row->stock }} </td>
                                    <td> {{ $row->weight }} g</td>
                                    <td> {{ $row->product_category }}</td>
                                    <td> {{ $row->product_availability }} </td>
                                    <td> {{ $row->status }} </td>
                                    <td>
                                        <div class="dropdown"  data-container="body" >
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu2"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Setting
                                            </button>
                                            <div align="right" class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu2">
                                          
                                            <button class="dropdown-item" type="button" onclick="update_modal_product(<?=$row->product_id?>)"> Update</button>
                                            <button class="dropdown-item" type="button" onclick="delete_modal_product(<?=$row->product_id?>)"> Delete </button>
                                            
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>