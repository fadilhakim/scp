<div id="modal_voucher_insert" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> voucher Insert </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-voucher-insert">
            <div class="modal-body">
                <div id="temp-voucher"></div>
                
                <div class="form-group">
                    <label>Voucher Code</label>
                    <input type="text" name="voucher_code" id="voucher_code" class="form-control">
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <label> Discount </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <div class="input-group-text">
                                <input type="radio" name="type" value="discount">
                                </div>
                            </div>
                            <input type="text" class="form-control" name="discount">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label> Cashback </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <div class="input-group-text">
                                <input type="radio" name="type" value="cashback">
                                </div>
                            </div>
                            <input type="text" class="form-control" name="cashback">
                        </div>
                    </div>
                </div>
                
                {{ csrf_field() }}
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#modal_voucher_insert").modal({
        show:true
    });

    $("form#form-voucher-insert").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/product/voucher/insert_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-voucher").html(data);
            }

        });
        return false;
    });
</script>