<script>
    function add_modal_admin()
    {
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:"POST",
            url:"<?=url("admin/admin_list/insert")?>",
            data:"_token="+_token,
            success:function(data)
            {
                $(".tmp-admin").html(data)
            }

        })
    }

</script>

<div class="page-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="col-md-10 pull-left">Admin Table</h5>
                    <button onclick="add_modal_admin()" class="btn btn-primary btn-sm"><i class="icofont icofont-plus"></i> Add New Admin</button>
                    <span class="clearfix"></span>
                    <!-- <div class="card-header-right">
                        <
                    </div> -->
                </div>
                <div class="card-block table-border-style">
                <div class="tmp-admin"></div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php $i=1; 
                             $objRole = new App\Models\Role();
                             foreach ($admin as $row){ 
                                
                                $role_detail = $objRole->detail_role($row->role_id); 

                             ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td><?=$row->name?></td>
                                    <td><?=$row->email?></td>
                                    <td>
                                        <?=$role_detail->role_name?>
                                    </td>
                                    <td>
                                       
                                    </td>
                                    <td>

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