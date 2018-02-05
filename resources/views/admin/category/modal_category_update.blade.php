<div id="modal_category_update" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> category update </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-category-update">
            <div class="modal-body">
                <div id="temp-category"></div>
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" value="{{ $category->category_name }}" name="category_name" id="category_name" class="form-control">
                </div>
                <input type="hidden" name="category_id" id="category_id" value="{{ $category->category_id }}">
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
    $("#modal_category_update").modal({
        show:true
    });

    $("form#form-category-update").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/product/category/update_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-category").html(data);
            }

        });
        return false;
    });
</script>