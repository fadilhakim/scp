
<script src="<?=asset("resources/assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js")?>" ></script>
<div id="modal_admin_insert" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> Add New Admin </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-admin-insert">
            <div class="modal-body">
                <div id="temp-admin"></div>
                <div class="form-group">
                    <label> Admin Name</label>
                    <input name="name" class="form-control" placeholder="admin Name" type="text">
                </div>
                <div class="form-group">
                    <label> Email </label>
                    <input name="email" class="form-control" placeholder="email" type="email">
                </div>
                <div class="form-group">
                    <label> Role </label>
                   <select name="role_id" class="form-control">
                        <option value="">-- select role --</option>
                        <?php foreach($role as $row){ ?>
                            <option value="<?=$row->role_id?>"><?=$row->role_name?></option>
                        <?php } ?>
                   </select>
                </div>
                <label>Photo</label>
                    <span class="clearfix"></span>
                <div class="row">
                    <div class="col-md-5">
                        <input type="file" data-placeholder="" name="admin_photo" data-size="sm" class="filestyle" data-text="Upload" data-btnClass="btn-primary">
                    </div>
                </div>

                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


<script>
    $("#modal_admin_insert").modal({
        show:true,
        backdrop: 'static'
    });

    $("form#form-admin-insert").submit(function(e){
        
        var formData = new FormData($(this)[0]);
        //formData.append("_token","{{ csrf_token() }}");
        //alert($("#_token").val() +" = "+formData.get("_token"));

        $.ajax({
            type:"post",
            url:"{{ url('admin/admin_list/insert_process') }}",
            //data:$(this).serialize(),
            data:formData,
            cache: false,
            processData: false,
            contentType	: false,
            success:function(data)
            {
                $("#temp-admin").html(data);
            },

        });
        return false;
    });
</script>