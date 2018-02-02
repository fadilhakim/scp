<div id="modal_product_delete" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> Delete Product </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-product-delete">
            <div class="modal-body">
                <div id="temp-product"></div>
                
                <p> Are Your Sure want to Delete this Product <b>"{{ $product->product_title }}"</b> ? </p>
                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
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
    $("#modal_product_delete").modal({
        show:true
    });

    $("form#form-product-delete").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/product/delete_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-product").html(data);
            }

        });
        return false;
    });
</script>