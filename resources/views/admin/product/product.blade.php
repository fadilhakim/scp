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
                  
                    <button onclick="add_modal_product()" class="btn btn-primary btn-sm"><i     class="icofont icofont-plus"></i> Add </button>
                    <span class="clearfix"></span>
                  
                </div>
                <div class="card-block">
                    <div class="tmp-product"></div>
                    <div class="">
               `    
                        <table id="product-tbl" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Image</th>
                                    <th>Product Title</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Category</th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $i=1; foreach ($product as $row){ 
                                     $id = $row->product_id;
                                     $category_id = $row->product_category;
                                     $rowImg =  App\Models\Product::get_first_image($id) ;
                                     $rowCategory =  App\Models\Product::get_category_by_id($category_id) ;
                                     $popularFirstImg =  App\Models\Product::get_first_image($id) ;
                                     if(!empty($rowImg)){
                                         $firstImg = $rowImg->image_name;
                                     }  
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td>
                                     <?php if(!empty($rowImg)) { ?>
                                        <img style="width:100%" src="{{URL::asset('public/products/'.$row->product_id.'/'.$firstImg)}}" alt="">
                                    <?php } else { ?>
                                        <img style="width:100%" src="{{URL::asset('public/products/no-image.png')}}" alt="">    
                                    <?php } ?>
                                    </td>
                                    <td> <a href="<?=url("admin/product/update/".$row->product_id)?>"> {{ $row->product_title }} </a> </td>
                                    <td>Rp. <?=number_format($row->price)?></td>
                                    <td> {{ $row->stock }} </td>
                                    <td> {{ $rowCategory->category_name}}</td>
                                    <td>
                                        <div class="dropdown"  data-container="body" >
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu2"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Setting
                                            </button>
                                            <div align="right" class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu2">
                                          
                                            <a href="<?=url("admin/product/update/".$row->product_id)?>" class="dropdown-item"> Update</a>
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

<script>
    $("#product-tbl").DataTable({

    });
</script>