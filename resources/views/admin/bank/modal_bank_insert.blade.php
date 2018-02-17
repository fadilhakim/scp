
<script src="<?=asset("resources/assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js")?>" ></script>
<div id="modal_bank_insert" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> Add New Bank Account </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-bank-insert">
            <div class="modal-body">
                <div id="temp-bank"></div>
                <div class="form-group">
                    <label> Bank Name</label>
                    <input name="bank_name" class="form-control" placeholder="bank Name" type="text">
                </div>
                <label>Bank Logo</label>
                    <span class="clearfix"></span>
                <div class="row">
                    <div class="col-md-3">
                        <input type="file" data-placeholder="" name="bank_logo" data-size="sm" class="filestyle" data-text="Upload" data-btnClass="btn-primary">
                    </div>
                </div>

                <div class="form-group">
                    <label> Account Name / Owner</label>
                    <input name="bank_owner" class="form-control" placeholder="Account Owner" type="text">
                </div>

                <div class="form-group">
                    <label> Account No</label>
                    <input name="bank_acc_no" class="form-control" placeholder="Account No" type="text">
                </div>

                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


<script>
    $("#modal_bank_insert").modal({
        show:true,
        backdrop: 'static'
    });

    $("form#form-bank-insert").submit(function(e){
        
        var formData = new FormData($(this)[0]);
        //formData.append("_token","{{ csrf_token() }}");
        //alert($("#_token").val() +" = "+formData.get("_token"));

        $.ajax({
            type:"post",
            url:"{{ url('admin/bank/insert_process') }}",
            //data:$(this).serialize(),
            data:formData,
            cache: false,
            processData: false,
            contentType	: false,
            success:function(data)
            {
                $("#temp-bank").html(data);
            },

        });
        return false;
    });
</script>