
<div class="page-body">
    <div class="row">

        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3">
                    <!-- widget primary card start -->
                    <div class="card table-card widget-primary-card">
                        <div class="">
                            <div class="row-table">
                                <div class="col-sm-3 card-block-big">
                                    <i class="icofont icofont-ui-cart"></i>
                                </div>
                                <div class="col-sm-9">
                                    
                                    <h4><?php echo $order->count() ?></h4>
                                    <h6>Total Order's</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- widget primary card end -->
                </div>

                <div class="col-lg-3">
                    <!-- widget primary card start -->
                    <div class="card table-card widget-success-card">
                        <div class="">
                            <div class="row-table">
                                <div class="col-sm-3 card-block-big">
                                    <i class="icofont icofont-boy"></i>
                                </div>
                                <div class="col-sm-9">
                                    
                                    <h4><?php echo $user->count() ?></h4>
                                    <h6>Registered User</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- widget primary card end -->
                </div>

                <div class="col-lg-3">
                    <!-- widget primary card start -->
                    <div class="card table-card widget-success-card">
                        <div class="">
                            <div class="row-table">
                                <div class="col-sm-3 card-block-big">
                                    <i class="icofont icofont-iphone"></i>
                                </div>
                                <div class="col-sm-9">
                                    
                                    <h4><?php echo $product->count() ?></h4>
                                    <h6>Total Product</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- widget primary card end -->
                </div>

                <div class="col-lg-3">
                    <!-- widget primary card start -->
                    <div class="card table-card widget-primary-card">
                        <div class="">
                            <div class="row-table">
                                <div class="col-sm-3 card-block-big">
                                    <i class="icofont icofont-penalty-card"></i>
                                </div>
                                <div class="col-sm-9">
                                    
                                    <h4><?php echo $voucher->count() ?></h4>
                                    <h6>Total Voucher's</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- widget primary card end -->
                </div>
            </div>
            
        </div>

        <div class="col-lg-12">
            <div class="row">
            <?php foreach($order as $orderRow){ ?>
                <div class="col-lg-4">
                    
                    <div class="card card-border-primary">
                        <div class="card-header">
                            <h5><?php echo $orderRow->order_code ?></h5>
                            <!-- <span class="label label-default f-right"> 28 January, 2015 </span> -->
                            <div class="f-right">
                                <button class="btn btn-primary btn-mini dropdown-toggle waves-effect waves-light" type="button" id="dropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $orderRow->status ?></button>
                                <!-- end of dropdown menu -->
                                <span class="f-left m-r-5 text-inverse">Status : </span>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list list-unstyled">
                                        <?php $costumer_name = App\Models\User::detail_user($orderRow->user_id)  ?>
                                        <li>Costumer Name #: <?php echo $costumer_name->name ?></li>
                                        <li>Issued on: <span class="text-semibold"><?php echo $orderRow->created_at ?></span></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list list-unstyled text-right">
                                        <li>Total : Rp. <?php echo number_format($orderRow->grand_total) ?></li>
                                        <li>Courier: <span class="text-semibold"><?php echo $orderRow->kurir ?></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="task-list-table">
                                <p class="task-due"><strong> Due : </strong><strong class="label label-success">23 hours</strong></p>
                            </div>
                            <div class="task-board m-0">
                                <a href="{{url('admin/order/detail/'.$orderRow->order_id)}}" class="btn btn-info btn-mini b-none"><i class="icofont icofont-eye-alt m-0"></i></a>
                            </div>
                            <!-- end of pull-right class -->
                        </div>
                        <!-- end of card-footer -->
                    </div>
                    
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</div>