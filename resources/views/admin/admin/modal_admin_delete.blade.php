<div id="modal_role_delete" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> Delete Admin </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-role-delete">
            <div class="modal-body">
                <div id="temp-role"></div>
                
                <p> Are Your Sure want to Delete this admin? </p>
                <input type="hidden" name="admin_id" value="{{ $admin->admin_id }}">
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
    $("#modal_role_delete").modal({
        show:true
    });

    $("form#form-role-delete").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/admin_list/delete_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-role").html(data);
            }

        });
        return false;
    });
</script>