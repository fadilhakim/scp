<script>
    function add_modal_role()
    {
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:"POST",
            url:"<?=url("admin/role/insert")?>",
            data:"_token="+_token,
            success:function(data)
            {
                $(".tmp-role").html(data)
            }

        })
    }

    function update_modal_role(role_id)
    {
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:"POST",
            url:"<?=url("admin/role/update")?>",
            data:"_token="+_token+"&role_id="+role_id,
            success:function(data)
            {
                $(".tmp-role").html(data)
            }

        })
    }

</script>

<div class="page-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="float-left">Admin Table</h5>
                    <button onClick="add_modal_role()" class="btn btn-primary btn-sm float-right"> Add Role  </button>
                    <span class="clearfix"></span>
                    
                </div>
                <div class="card-block table-border-style">
                   <div class="tmp-role"></div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role Name </th>
                                    <th>Privilege </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php $i=1; foreach ($role as $row){ ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td><?=$row->role_name?></td>
                                    <td><?=$row->privilege?></td>
                                   
                                    <td> 
                                        <?php if($row->role_id != 1){ ?>
                                        <button onclick="update_modal_role(<?=$row->role_id?>)" class="btn btn-primary btn-sm"> Edit </button>
                                        <?php } ?>
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