<div id="modal_order_delete" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> Delete order </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-order-delete">
            <div class="modal-body">
                <div id="temp-order"></div>
                
                <p> Are Your Sure want to Delete this order <b>"{{ $order->order_title }}"</b> ? </p>
                <input type="hidden" name="order_id" value="{{ $order->order_id }}">
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
    $("#modal_order_delete").modal({
        show:true
    });

    $("form#form-order-delete").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/order/delete_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-order").html(data);
            }

        });
        return false;
    });
</script>