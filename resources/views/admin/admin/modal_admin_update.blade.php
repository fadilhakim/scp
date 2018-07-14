<script src="<?=asset("resources/assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js")?>" ></script>
<div id="modal_bank_update" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> admin edit </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-bank-update">
            <div class="modal-body">
                <div id="temp-bank"></div>
                <input type="hidden" id="bank" name="admin_id" value="<?=$admin->admin_id?>">
                <div class="form-group">
                    <label> Admin Name</label>
                    <input name="admin_name" class="form-control" placeholder="Admin Name" type="text" value="<?=$admin->name?>" >
                </div>

                <div class="form-group">
                    <label> Admin Role</label>
                    <select name="role_id" class="form-control" >
                        <?php if(!empty($role)){foreach($role as $row){ 
                            if($admin->role_id == $row->role_id){ $selected = "selected=selected"; }else{ $selected=""; }
                        ?>
                            <option {{ $selected }} value="<?=$row->role_id?>"><?=$row->role_name?></option>
                        <?php }} ?>
                    </select>
                </div>

                <div class="form-group">
                    <label> Admin Status</label>
                    <select name="status" class="form-control">
                        <?php if( $admin->status != "ACTIVE") 
                                { 
                                    $valueOUT = "NOT ACTIVE";
                                } 
                                else {
                                     $valueOUT = "ACTIVE";
                                } 
                        ?>
                        <option value="{{$admin->status}}">{{ $valueOUT}}</option>
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="{{$admin->status}}">{{ $valueOUT }}</option>
                    </select>
                </div>

                {{ csrf_field() }}
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">SUBMIT</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#modal_bank_update").modal({
        show:true,
        backdrop: 'static'
    });

    $("form#form-bank-update").submit(function(){

        var formData = new FormData($(this)[0]);

        $.ajax({
            type:"POST",
            url:"{{ url('admin/admin_list/update_process') }}",
            //data:$(this).serialize(),
            data:formData,
            cache: false,
            processData: false,
            contentType	: false,
            success:function(data)
            {
                $("#temp-bank").html(data);
            }

        });
        return false;
    });
</script>