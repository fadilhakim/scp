<div class="container">
    
    <br>
    <h3> Address Book </h3><br>
    <div id="temp-address-book"></div>
    <button id="address-book-add-btn" class="btn btn-primary pull-right"> Add Address Book </button> <br>
    <div class="clearfix">  </div><br>
    <div class="table-responsive">
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>Address Name</th>
                    <th>Shipping Address</th>
                    <th>Billing Address</th>
                    <th>Contact Person</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($address as $addressRow) { ?>
                <tr>
                    <td><?php echo $addressRow->address_name ?></td>
                    <td><?php echo  $addressRow->shipping_address ?></td>
                    <td><?php echo  $addressRow->billing_address ?></td>
                    <td><?php echo  $addressRow->contact_person ?></td>
                    <td>
                        <a href-"#" class="btn btn-warning">Edit</a>
                        <a href-"#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $("#address-book-add-btn").click(function(){
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:"POST",
            url:"<?=url("account/address_book/add")?>",
            data:"_token="+_token,
            success:function(data)
            {
                $("#temp-address-book").html(data);
            }
        })
    })

</script>