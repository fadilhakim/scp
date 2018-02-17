<div class="page-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Costumers Table</h5>
                    <div class="card-header-right">
                        <i class="icofont icofont-rounded-down"></i>
                        <i class="icofont icofont-refresh"></i>
                        <i class="icofont icofont-close-circled"></i>
                    </div>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                   
                                    <th>Phone Number</th>
                                    <th>User Type</th>
                                    <th>Status</th>
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
                                        <select class="form-control">
                                            <option>Regular</option>
                                            <option>Distributor</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control">
                                            <option>Active</option>
                                            <option>unActive</option>
                                        </select>
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