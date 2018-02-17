<script src="<?=asset("resources/assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js")?>" ></script>
<div id="modal_bank_update" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> bank update </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-bank-update">
            <div class="modal-body">
                <div id="temp-bank"></div>
                <input type="hidden" id="bank" name="bank_id" value="<?=$bank->bank_id?>">
                <div class="form-group">
                    <label> Bank Name</label>
                    <input name="bank_name" class="form-control" placeholder="bank Name" type="text" value="<?=$bank->bank_name?>" >
                </div>

                
                <div class="row">
                    <div class="col-md-3">
                        <input type="file" data-placeholder="<?=!empty($bank->bank_logo) ? $bank->bank_logo : ""?>" name="bank_logo" data-size="sm" class="filestyle" data-text="bank logo" data-btnClass="btn-primary">
                        <input type="hidden" name="old_logo" value="<?= $bank->bank_logo ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6"> 
                        <label> Account Name / Owner</label>
                        <input name="bank_owner" class="form-control" placeholder="Account Owner" type="text" value="<?=$bank->bank_owner?>">
                    </div>

                    <div class="col-md-6"> 
                        <label> Account No</label>
                        <input name="bank_acc_no" class="form-control" placeholder="Account Owner" type="text" value="<?=$bank->bank_acc_no?>">
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
    $("#modal_bank_update").modal({
        show:true,
        backdrop: 'static'
    });

    $("form#form-bank-update").submit(function(){

        var formData = new FormData($(this)[0]);

        $.ajax({
            type:"POST",
            url:"{{ url('admin/bank/update_process') }}",
            //data:$(this).serialize(),
            data:formData,
            cache: false,
            processData: false,
            contentType	: false,
            success:function(data)
            {
                $("#temp-bank").html(data);
            }

        });
        return false;
    });
</script>