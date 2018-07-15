<div id="modal_change_status" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> Change Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="change-status-form">
            <div class="modal-body">
                <div id="temp-slider"></div>
                
                <p> Are Your Sure want to Change Status to this User into "<?=$status?>" ? </p>
                <input type="hidden" name="user_id" value="<?=$user_id?>">
                <input type="hidden" name="status" value="<?=$status?>">
                {{ csrf_field() }}
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary"> Update </button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#modal_change_status").modal({
        show:true,
        backdrop: 'static'
    });

    $("form#change-status-form").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/users/change_status_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-slider").html(data);
            }

        });
        return false;
    });
</script>