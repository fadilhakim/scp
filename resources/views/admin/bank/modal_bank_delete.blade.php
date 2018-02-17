<div id="modal_bank_delete" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> Delete Bank Account </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-bank-delete">
            <div class="modal-body">
                <div id="temp-bank"></div>
                
                <p> Are Your Sure want to Delete this Bank Account ? </p>
                <input type="hidden" name="bank_id" value="{{ $bank->bank_id }}">
                {{ csrf_field() }}
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary"> Delete </button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#modal_bank_delete").modal({
        sshow:true,
        backdrop: 'static'
    });

    $("form#form-bank-delete").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/bank/delete_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-bank").html(data);
            }

        });
        return false;
    });
</script>