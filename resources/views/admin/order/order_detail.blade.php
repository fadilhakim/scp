
<?php $objUser = new App\Models\User(); ?>
<script>
    function change_status(order_id,status)
    {
        var confirm1 = confirm("Are You sure want to Change this status ? ");
        
        if(confirm1)
        {
            var _token = $('meta[name="csrf-token"]').attr('content');
        
            $.ajax({
                type:"POST",
                data:"status="+status+"&order_id="+order_id+"&_token="+_token,
                url:"<?=url("admin/order/change_status")?>",
                success:function(data)
                {
                    alert(data);
                }
            });
        }
       
    }
</script>
<div class="page-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="row invoice-contact">
                    <div class="col-md-8">
                        <div class="invoice-box row">
                            <div class="col-sm-12">
                                <table class="table table-responsive invoice-table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><img src="assets/images/logo-blue.png" class="m-b-10" alt="">
                                                <h3> Strawberry Cellphone</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>lorem Pvt ltd.</td>
                                        </tr>
                                        <tr>
                                            <td>2886 Fairfield Road, Brookfield, WI. (913) - 262-689-6253</td>
                                        </tr>
                                        <tr>
                                            <td><a href="mailto:demo@gmail.com" target="_top">demo@gmail.com</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>+91 919-91-91-919</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row text-center">
                            <div class="col-sm-12 invoice-btn-group">
                                <button type="button" class="btn btn-primary btn-print-invoice waves-effect waves-light m-r-20 m-b-10">Print Invoice
                                </button>
                                <button type="button" class="btn btn-danger waves-effect waves-light m-b-10">Cancel Invoice
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-block">
                    <div class="row invoive-info">
                        <div class="col-md-4 col-xs-12 invoice-client-info">
                            <h6>Client Information :</h6>
                            <h6 class="m-0">Josephin Villa</h6>
                            <p class="m-0 m-t-10">2886 Fairfield Road, Brookfield, WI.</p>
                            <p class="m-0">(913) - 262-689-6253</p>
                            <p>demo@gmail.com</p>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <h6>Order Information :</h6>
                            <table class="table table-responsive invoice-table invoice-order table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Date :</th>
                                        <td>November 14</td>
                                    </tr>
                                    <tr>
                                        <th>Status :</th>
                                        <td>
                                            <span class="label label-warning">Pending</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Id :</th>
                                        <td>
                                            #145698
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <h6 class="m-b-20">Invoice Number   <span>#12398521473</span></h6>
                            <h6 class="text-uppercase text-primary">Total Due :
                                <span>$900.00</span>
                            </h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table  invoice-detail-table">
                                    <thead>
                                        <tr class="thead-default">
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Amount</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h6>Logo Design</h6>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
                                            </td>
                                            <td>6</td>
                                            <td>$200.00</td>
                                            <td>$1200.00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6>template Design</h6>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
                                            </td>
                                            <td>7</td>
                                            <td>$100.00</td>
                                            <td>$700.00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6>rebuild Your Design</h6>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
                                            </td>
                                            <td>5</td>
                                            <td>$150.00</td>
                                            <td>$750.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="">
                                <table class="table invoice-table invoice-total table-responsive">
                                <tbody>
                                    <tr>
                                        <th>Sub Total :</th>
                                        <td>$4725.00</td>
                                    </tr>
                                    <tr>
                                        <th>Taxes (10%) :</th>
                                        <td>$57.00</td>
                                    </tr>
                                    <tr>
                                        <th>Discount (5%) :</th>
                                        <td>$45.00</td>
                                    </tr>
                                    <tr class="text-info">
                                        <td>
                                            <hr>
                                            <h5 class="text-primary">Total  :</h5>
                                        </td>
                                        <td>
                                            <hr>
                                            <h5 class="text-primary">$4827.00</h5>
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h6>Terms And Condition :</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    $("#order-tbl").DataTable({
    });
</script> -->