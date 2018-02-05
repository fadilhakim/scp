<div id="modal_category_insert" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> Category Insert </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-category-insert">
            <div class="modal-body">
                <div id="temp-category"></div>
                
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" name="category_name" id="category_name" class="form-control">
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
    $("#modal_category_insert").modal({
        show:true
    });

    $("form#form-category-insert").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/product/category/insert_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-category").html(data);
            }

        });
        return false;
    });
</script>