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
                    <div class="table-responsive">
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
                               <?php for ($i = 0 ; $i < 9; $i++){ ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td> <a href="<?=url("admin/product/detail/id")?>"> Product1 </a> </td>
                                    <td><?=number_format(5000000)?></td>
                                    <td> 50 </td>
                                    <td> 100 g</td>
                                    <td> Category 1</td>
                                    <td> Pre Order </td>
                                    <td> Show </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Setting
                                            </button>
                                            <div align="right" class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu2">
                                          
                                            <button class="dropdown-item" type="button"> Update</button>
                                            <button class="dropdown-item" type="button"> Delete </button>
                                            
                                            </div>
                                        </div>
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