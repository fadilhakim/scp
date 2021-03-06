<div id="modal_voucher_update" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> voucher update </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-voucher-update">
            <div class="modal-body">
                <div id="temp-voucher"></div>
                
                <div class="form-group">
                    <label>Voucher Code</label>
                    <input type="text" value="{{ $voucher->voucher_code }}" name="voucher_code" id="voucher_code" class="form-control">
                    <input type="hidden" value="{{ $voucher->voucher_id }}" name="voucher_id" id="voucher_id" class="">
                </div>
            
                <div class="row">
                    <div class="col-md-6">
                        <label> Discount </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <div class="input-group-text" >
                                   
                                        <input type="radio" name="type" id="discount" value="discount" class="type" checked="true">
                                  
                                </div>
                            </div>
                            <input value="{{ $voucher->discount }}" type="number" min="1" max="100" class="form-control discount" name="discount"  disabled>
                            <span class="input-group-addon" > % </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label> Cashback </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <div class="input-group-text" for="cashback">
                                 <input type="radio" name="type" id="cashback" value="cashback" class="type">
                                </div>
                            </div>
                            <input value="{{ $voucher->cashback }}" type="number" class="form-control cashback" name="cashback" disabled>
                        </div>
                    </div>
                </div>
                <span class="clearfix"></span>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Issued Date </label>
                            <input value="{{ $voucher->issued_date }}" type="text" name="issued_date" id="issued_date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Expired Date </label>
                            <input value="{{ $voucher->expired_date }}" type="text" name="expired_date" id="expired_date" class="form-control">
                        </div>
                    </div>
                </div>
                <span class="clearfix"></span>
                <div class="form-group">
                    <label> Description </label>
                    <textarea name="description" class="form-control">{{ $voucher->description }}</textarea>
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
    $("#modal_voucher_update").modal({
        show:true
    });

    $(".discount").removeAttr("disabled");
    $(".type").change(function(){
        var type = $(this).val();

        if(type == "discount")
        {
            $(".discount").removeAttr("disabled");
            $(".cashback").attr("disabled",true);
            $(".cashback").val("");
        }
        else
        {
            $(".discount").attr("disabled",true);
            $(".cashback").removeAttr("disabled");
            $(".discount").val("");
        }
    });

    $("#issued_date").datepicker({
        dateFormat:"yy-mm-dd"
    });

    $("#expired_date").datepicker({
        dateFormat:"yy-mm-dd"
    });

    $("#modal_voucher_insert").modal({
        show:true
    });

    $("form#form-voucher-update").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/voucher/update_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-voucher").html(data);
            }

        });
        return false;
    });
</script>