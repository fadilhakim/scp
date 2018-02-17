<script>
 function add_modal_bank()
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/bank/insert")?>",
        data:"_token="+_token,
        success:function(data)
        {
            $(".tmp-bank").html(data)
        }
    });
    //console.log("Allahu Akbar")
}

function update_modal_bank(bank_id)
{
    
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/bank/update")?>",
        data:"_token="+_token+"&bank_id="+bank_id,
        success:function(data)
        {
            $(".tmp-bank").html(data)
        }
    });
}

function delete_modal_bank(bank_id)
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
        type:"POST",
        url:"<?=url("admin/bank/delete")?>",
        data:"_token="+_token+"&bank_id="+bank_id,
        success:function(data)
        {
            $(".tmp-bank").html(data)
        }
    });
}   
</script>
<div class="page-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="col-md-10 pull-left">Bank List</h5>
                    <button onclick="add_modal_bank()" class="btn btn-primary btn-sm"><i     class="icofont icofont-plus"></i> Add New Bank Account </button>
                    <span class="clearfix"></span>
                </div>
                <div class="card-block table-border-style">
                    <div class="tmp-bank"></div>
                    <div class="">
                        <div class="table-responsive">
                            <table id="bank-tbl" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Bank Logo</th>
                                        <th>Bank Name</th>
                                        <th>Account Owner</th>
                                        <th>Account No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php $i = 0; foreach ($bank as $row) { $i++ ?>
                                    <tr>
                                        <th scope="row"><?php echo $i ?></th>
                                        <td> 
                                        <img class="img-responsive" src="{{URL::asset('/public/banks/'.$row->bank_logo)}}">
                                        </td>
                                        <td><?php echo $row->bank_name; ?></td>
                                        <td><?php echo $row->bank_owner; ?></td>
                                        <td><?php echo $row->bank_acc_no; ?></td>
                                        <td><div class="dropdown show" data-container="body">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    Setting
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu2" align="right">
                                              
                                                <button class="dropdown-item" type="button" onclick="update_modal_bank(<?=$row->bank_id?>)"> Update</button>
                                                <button class="dropdown-item" type="button" onclick="delete_modal_bank(<?=$row->bank_id?>)"> Delete </button>
                                                
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

