<script>
function add_modal_voucher()
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/voucher/insert")?>",
        data:"_token="+_token,
        success:function(data)
        {
            $(".tmp-voucher").html(data)
        }
    });
}

function update_modal_voucher(voucher_id)
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/voucher/update")?>",
        data:"_token="+_token+"&voucher_id="+voucher_id,
        success:function(data)
        {
            $(".tmp-voucher").html(data)
        }
    });
}

function delete_modal_voucher(voucher_id)
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
        type:"POST",
        url:"<?=url("admin/voucher/delete")?>",
        data:"_token="+_token+"&voucher_id="+voucher_id,
        success:function(data)
        {
            $(".tmp-voucher").html(data)
        }
    });
}

</script>
<div class="page-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                
                    <h5 class="col-md-10 pull-left"> voucher List </h5>
                  
                        <button onclick="add_modal_voucher()" class="btn btn-primary btn-sm"><i class="icofont icofont-plus"></i> Add </button>
                    <span class="clearfix"></span>
                  
                </div>
                <div class="card-block table-border-style">
                    <div class="tmp-voucher"></div>
                    <div class="">
                        <table id="voucher-tbl" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Voucher Code</th>
                                    <th> Discount </th>
                                    <th> Cashback </th>
                                    <th> Issued Date </th>
                                    <th> Expired Date </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $i=1; 
                               if(!empty($voucher)){
                               foreach ($voucher as $row){ ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td> {{ $row->voucher_code }} </td>
                                    <td> {{ $row->discount }} </td>
                                    <td> {{ $row->cashback }} </td>
                                    <td> {{ $row->issued_date }} </td>
                                    <td> {{ $row->expired_date }} </td>
                                    <td>
                                        <div class="dropdown float-left"  data-container="body" >
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu2"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Setting
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            
                                            <button class="dropdown-item" type="button" onclick="update_modal_voucher(<?=$row->voucher_id?>)"> Update</button>
                                            <button class="dropdown-item" type="button" onclick="delete_modal_voucher(<?=$row->voucher_id?>)"> Delete </button>
                                            
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
    $("#voucher-tbl").DataTable({

    });
</script>