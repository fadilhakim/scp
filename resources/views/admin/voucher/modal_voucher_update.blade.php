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
                    <label>voucher Name</label>
                    <input type="text" value="{{ $voucher->voucher_name }}" name="voucher_name" id="voucher_name" class="form-control">
                </div>
                <input type="hidden" name="voucher_id" id="voucher_id" value="{{ $voucher->voucher_id }}">
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

    $("form#form-voucher-update").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/product/voucher/update_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-voucher").html(data);
            }

        });
        return false;
    });
</script>