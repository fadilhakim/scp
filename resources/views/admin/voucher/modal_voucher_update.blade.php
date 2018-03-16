<div id="modal_brand_update" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> brand update </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-brand-update">
            <div class="modal-body">
                <div id="temp-brand"></div>
                <div class="form-group">
                    <label>brand Name</label>
                    <input type="text" value="{{ $brand->brand_name }}" name="brand_name" id="brand_name" class="form-control">
                </div>
                <input type="hidden" name="brand_id" id="brand_id" value="{{ $brand->brand_id }}">
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
    $("#modal_brand_update").modal({
        show:true
    });

    $("form#form-brand-update").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/product/brand/update_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-brand").html(data);
            }

        });
        return false;
    });
</script>