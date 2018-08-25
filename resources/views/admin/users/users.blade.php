<script>

function delete_modal_user(user_id)
{

   // console.log("Allahu Akbar")
    var _token = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
        type:"POST",
        url:"<?=url("admin/users/delete")?>",
        data:"_token="+_token+"&user_id="+user_id,
        success:function(data)
        {
            $(".tmp-slider").html(data)
        }
    });
}

function change_status_modal(status,user_id)
{
   
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/users/change_status_modal")?>",
        data:"_token="+_token+"&status="+status+"&user_id="+user_id,
        success:function(data)
        {
            $(".tmp-slider").html(data)
        }
    });
}

function change_activation(activation,user_id)
{
   
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/users/change_activation_modal")?>",
        data:"_token="+_token+"&activation="+activation+"&user_id="+user_id,
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
                    <h5>Costumers Table</h5>
                </div>
                <div class="card-block table-border-style">
                <div class="tmp-slider"></div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                   
                                    <th>Phone Number</th>
                                    <th>User Type</th>
                                    <th>User Status</th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php $i=1; foreach ($user as $row){ ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td><?=$row->name?></td>
                                    <td><?=$row->email?></td>
                                   
                                    <td><?=$row->no_telp?></td>
                                    <td>
                                        <select class="form-control" onChange="change_status_modal(this.value,<?=$row->id?>)">
                                            <option value="<?= $row->status ?>" selected>
                                                <?= $row->status ?>
                                            </option>
                                            <option value='regular'>regular</option>
                                            <option value='reseller'>reseller</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" onChange="change_activation(this.value,<?=$row->id?>)">
                                            <?php if($row->activation == 'ACTIVE'){?>
                                            <option disabled selected style="color:green; font-weight: bold;" value="<?php echo $row->activation ?>">
                                                <?php echo $row->activation ?>
                                                
                                            </option>
                                            <?php } else {?>
                                                <option disabled selected style="color:red; font-weight: bold;" value="<?php echo $row->activation ?>">
                                                UnActive
                                                </option>
                                            <?php } ?>
                                            <option style="color:green; font-weight: bold;" value="ACTIVE">ACTIVE</option>
                                            <option style="color:red; font-weight: bold;" value='unactive'>unACTIVE</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger" onclick="delete_modal_user(<?=$row->id?>)">Delete</button>
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

