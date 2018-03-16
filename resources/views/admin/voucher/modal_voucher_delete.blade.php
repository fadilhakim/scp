<div id="modal_brand_delete" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> Delete brand </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-brand-delete">
            <div class="modal-body">
                <div id="temp-brand"></div>
                
                <p> Are Your Sure want to Delete this brand <b>"{{ $brand->brand_name }}"</b> ? </p>
                <input type="hidden" name="brand_id" value="{{ $brand->brand_id }}">
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
    $("#modal_brand_delete").modal({
        show:true
    });

    $("form#form-brand-delete").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/product/brand/delete_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-brand").html(data);
            }

        });
        return false;
    });
</script>