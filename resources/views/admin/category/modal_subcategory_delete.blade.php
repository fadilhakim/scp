<div id="modal_category_delete" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> Delete subcategory </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-category-delete">
            <div class="modal-body">
                <div id="temp-category"></div>
                
                <p> Are Your Sure want to Delete this subCategory <b>"{{ $subcategory->subcategory_name }}"</b> ? </p>
                <input type="hidden" name="subcategory_id" value="{{ $subcategory->subcategory_id }}">
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
    $("#modal_category_delete").modal({
        show:true
    });

    $("form#form-category-delete").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/product/subcategory/deletex_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-subcategory").html(data);
            }

        });
        return false;
    });
</script>