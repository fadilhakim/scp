
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
                <div class="card-header">
                
                    <h5 class="col-md-10 pull-left"> Order List </h5>

                </div>
                <div class="card-block table-border-style">
                    <div class="tmp-order"></div>
                    <div class="">
                        <table id="order-tbl" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID Order</th>
                                    <th>Name</th>
                                    <th>Subtotal </th>
                                    <th>Tax</th>
                                    
                                    <th>Grand Total</th>
                                    <th>Status </th>
                                    <th>Create Date</th>
                                    <th> Detail </th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php foreach ($order as $row){ 
                                    $user_detail = $objUser->detail_user($row->user_id);   
                                ?>
                                <tr>
                                    
                                    <td> <a href="<?=url("admin/order/detail/".$row->order_id)?>">{{ $row->user_id }}  </a> </td>
                                    <td> {{ $user_detail->name }}</td>
                                    <td> Rp. {{ number_format($row->subtotal) }}</td>
                                    <td> Rp. {{ number_format($row->tax) }}</td>
                                    <td> Rp. {{ number_format($row->grand_total) }}</td>
                                    <td> 
                                       <?php
                                        $selected_unpaid = "";
                                        $selected_paid = "";
                                        $selected_shipping = "";
                                        $selected_cancel = "";
                                        $selected_done = "";

                                        if($row->status == "unpaid")
                                        {
                                            $selected_unpaid = "selected='selected'";
                                        }
                                        else if($row->status == "paid")
                                        {
                                            $selected_paid = "selected='selected'";
                                        }
                                        else if($row->status == "shipping")
                                        {
                                            $selected_shipping = "selected='selected'";
                                        }
                                        else if($row->status == "cancel")
                                        {
                                            $selected_cancel = "selected='selected'";
                                        }
                                        else{
                                            $selected_done = "selected='selected'";
                                        }
                                       
                                       ?>
                                       <select name="change_status" onChange="javascript:change_status({{ $row->order_id }} , this.value)" class="form-control">
                                            <option {{ $selected_unpaid }} value="unpaid"> Unpaid </option>
                                            <option {{ $selected_paid }} value="paid"> Paid </option>  
                                            <option {{ $selected_shipping }} value="shipping"> Shipping </option>  
                                            <option {{ $selected_cancel }} value="cancel"> Cancel </option> 
                                            <option {{ $selected_done }} value="done"> Done </option>
                                       </select>
                                    </td>
                                    <td> {{ $row->created_at}} </td>
                                    <td>
                                       
                                            <button class="btn btn-primary" type="button" id="" data-toggle="dropdown" >
                                                Detail
                                            </button>
                                           
                                        
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

<script>
    $("#order-tbl").DataTable({
    });
</script>