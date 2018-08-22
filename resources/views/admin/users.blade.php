<div class="page-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Costumers Table</h5>
               
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>User Type</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php for ($i = 0 ; $i < 9; $i++){ ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td>John Doe</td>
                                    <td>john@gmail.com</td>
                                    <td><a href="#">Address 1</a></td>
                                    <td>092381231</td>
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