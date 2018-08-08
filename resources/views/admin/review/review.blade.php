<script>
function add_modal_review()
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/review/insert")?>",
        data:"_token="+_token,
        success:function(data)
        {
            $(".tmp-review").html(data)
        }
    });
}

function update_modal_review(review_id)
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/review/update")?>",
        data:"_token="+_token+"&review_id="+review_id,
        success:function(data)
        {
            $(".tmp-review").html(data)
        }
    });
}

function delete_modal_review(review_id)
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
        type:"POST",
        url:"<?=url("admin/review/delete")?>",
        data:"_token="+_token+"&review_id="+review_id,
        success:function(data)
        {
            $(".tmp-review").html(data)
        }
    });
}
</script>
<div class="page-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-8">
                            <h5 class="pull-left"> review List </h5>
                        </div>
                        <div class="col-lg-4" style="text-align:right">
                        </div>
                    </div>
      
                </div>
                <div class="card-block">
                    <div class="tmp-review"></div>
                    <div class="">
                        <table id="review-tbl" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Product Name</th>
                                    <th>Review</th>
                                    <th>Status</th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $i=1; foreach ($review as $row){ 
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td>
                                        <?php echo $row->user_id; ?>
                                    </td>
                                    <td>  
                                        <?php echo $row->product_id; ?>
                                    </td>
                                    <td>
                                        {{ str_limit($row->review_text, $limit = 30, $end = '...') }}
                                    </td>

                                    <td>
                                        <?php echo $row->status; ?>
                                    </td>
                                    <td>
                                        <div class="dropdown"  data-container="body" >
                                            <a href="" class="btn btn-primary btn-sm dropdown-toggle" >
                                                Show
                                            </a>
                                            <div align="right" class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu2">
                                          
                                            <a href="<?=url("admin/review/update/".$row->review_id)?>" class="dropdown-item"> Detail</a>

                                            <button class="dropdown-item" type="button" onclick="delete_modal_review(<?=$row->review_id?>)"> Delete </button>
                                            
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
    $("#review-tbl").DataTable({

    });
</script>