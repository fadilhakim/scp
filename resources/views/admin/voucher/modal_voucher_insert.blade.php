<div id="modal_brand_insert" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> brand Insert </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-brand-insert">
            <div class="modal-body">
                <div id="temp-brand"></div>
                
                <div class="form-group">
                    <label>Brand Name</label>
                    <input type="text" name="brand_name" id="brand_name" class="form-control">
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
    $("#modal_brand_insert").modal({
        show:true
    });

    $("form#form-brand-insert").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/product/brand/insert_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-brand").html(data);
            }

        });
        return false;
    });
</script>