
<div class="page-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                
                    <h5 class="col-md-10 pull-left"> Order List </h5>
                  
                        <button onclick="add_modal_order()" class="btn btn-primary btn-sm"><i class="icofont icofont-plus"></i> Add </button>
                    <span class="clearfix"></span>
                  
                </div>
                <div class="card-block table-border-style">
                    <div class="tmp-order"></div>
                    <div class="">
                        <table id="order-tbl" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID Order</th>
                                    <th>Name</th>
                                    <th>Grand Total</th>

                                    <th>Status </th>
                                    <th>Create Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php foreach ($order as $row){ ?>
                                <tr>
                                    
                                    <td> <a href="<?=url("admin/order/detail/".$row->order_id)?>"> {{ $row->order_title }} </a> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td> </td>
                                    <td>
                                        <div class="dropdown"  data-container="body" >
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu2"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Setting
                                            </button>
                                            <div align="right" class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu2">
                                          
                                            <button class="dropdown-item" type="button" onclick="update_modal_order(<?=$row->order_id?>)"> Update</button>
                                            <button class="dropdown-item" type="button" onclick="delete_modal_order(<?=$row->order_id?>)"> Delete </button>
                                            
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
    $("#order-tbl").DataTable({

    });
</script>