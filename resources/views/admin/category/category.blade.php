<script>
function add_modal_category()
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/product/category/insert")?>",
        data:"_token="+_token,
        success:function(data)
        {
            $(".tmp-category").html(data)
        }
    });
}

function update_modal_category(category_id)
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/product/category/update")?>",
        data:"_token="+_token+"&category_id="+category_id,
        success:function(data)
        {
            $(".tmp-category").html(data)
        }
    });
}

function delete_modal_category(category_id)
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
        type:"POST",
        url:"<?=url("admin/product/category/delete")?>",
        data:"_token="+_token+"&category_id="+category_id,
        success:function(data)
        {
            $(".tmp-category").html(data)
        }
    });
}

function list_subcategory(category_id)
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
        type:"POST",
        url:"<?=url("admin/product/subcategory")?>",
        data:"_token="+_token+"&category_id="+category_id,
        success:function(data)
        {
            $(".tmp-category").html(data)
        }
    });
}
</script>
<div class="page-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                
                    <h5 class="col-md-10 pull-left"> category List </h5>
                  
                        <button onclick="add_modal_category()" class="btn btn-primary btn-sm"><i class="icofont icofont-plus"></i> Add </button>
                    <span class="clearfix"></span>
                  
                </div>
                <div class="card-block table-border-style">
                    <div class="tmp-category"></div>
                    <div class="">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                   
                                   
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $i=1; 
                               if(!empty($category)){
                               foreach ($category as $row){ ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td> {{ $row->category_name }} </td>
                                    
                                    
                                    <td>
                                        <div class="dropdown float-left"  data-container="body" >
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu2"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Setting
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <button class="dropdown-item" type="button" onclick="list_subcategory(<?=$row->category_id?>)"> Subcategory</button>
                                            <button class="dropdown-item" type="button" onclick="update_modal_category(<?=$row->category_id?>)"> Update</button>
                                            <button class="dropdown-item" type="button" onclick="delete_modal_category(<?=$row->category_id?>)"> Delete </button>
                                            
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