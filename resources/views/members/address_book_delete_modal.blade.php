<div id="modal_address_book_delete" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> Delete Address Book </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-address-book-delete" method="post">
                <div class="modal-body">
                    <div id="temp-user-address"></div>
                    
                    <p> Are Your Sure want to Delete this Address Book <b>"{{ $user_address->address_name }}"</b> ? </p>
                    <input type="hidden" name="user_addtr_id" value="{{ $user_addtr_id }}">
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
    $("#modal_address_book_delete").modal({
        show:true
    });

    $("form#form-address-book-delete").submit(function(e){
        $.ajax({
            type:"POST",
            url:"{{ url('account/address_book/delete_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-user-address").html(data);
            }

        }) 
        return false;
    });
</script>