<div id="modal_slider_delete" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> Delete User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-slider-delete">
            <div class="modal-body">
                <div id="temp-slider"></div>
                
                <p> Are Your Sure want to Delete this User ? </p>
                <input type="hidden" name="user_id" value="{{ $user->id }}">
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
    $("#modal_slider_delete").modal({
        sshow:true,
        backdrop: 'static'
    });

    $("form#form-slider-delete").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/users/delete_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-slider").html(data);
            }

        });
        return false;
    });
</script>