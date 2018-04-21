<div class="page-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Admin Table</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block table-border-style">
                    <a href="#" class="btn btn-"></a>
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