<div id="add-address-book-modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white"> Add Address Book </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-address-book-add">
               
                <div class="modal-body">

                    <div id="ab-temp"></div>
                    <input type="hidden" name="user_id" value="">
                    <div class="form-group">
                        <label> Contact Person </label>
                        <input type="text" name="contact_person" id="contact_person" class="form-control">
                    </div>
                    <div class="form-group">
                        <label> No Handphone </label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control">
                    </div>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label> Province </label>
                            <select name="provinsi" class="form-control">
                                <option> -- select province -- </option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label> Kecamatan </label>
                            <select name="kecamatan" class="form-control">
                                <option> -- select kecamatan --</option>
                            </select> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label> City </label>
                            <select name="kota" class="form-control">
                                <option> -- Select City --</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group"> 
                            <label>Postal Code</label> 
                            <input type="text" name="kode_pos" class="form-control">

                        </div> 
                    </div>

                    <div class="form-group">
                        <label> Shipping Address </label>
                        <textarea class="form-control" name="shipping_address"></textarea>
                    </div>

                    <div class="form-group">
                        <label> Billing Address </label>
                        <textarea class="form-control" name="billing_address"></textarea>
                    </div>

                    <button class="btn btn-primary" type="submit"> Added </button>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("#add-address-book-modal").modal({
        show:true
    })

</script>

<script> 
    $("#form-address-book-add").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('account/address_book/add_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#ab-temp").html(data);
            }
        });

        return false;
    });

</script>