<script src="<?=asset("resources/assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js")?>" ></script>
<?php
   $session =  Auth::guard("admin")->user();
   $name_session = $session->name;
?> 
<div class="page-body">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5> Profile </h5>
                </div>
                <div class="card-block table-border-style">
                    <div class="tmp-bank"></div>
                    <div class="">

                        <form id="form-admin-profile">
                        <div class="modal-body">
                            <div id="temp-admin-profile-respond"></div>
                            <div class="form-group">
                                <label> Name </label>
                                <input name="name" class="form-control" value="{{ $session->name }}" placeholder="Name" type="text">
                            </div>
                            <div class="form-group">
                                <label> Email </label>
                                <input name="email" class="form-control" value='{{ $session->email }}' placeholder="email" type="email">
                            </div>
                            
                            <label>Photo</label>
                                <span class="clearfix"></span>
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="file" data-placeholder="" name="admin_photo" data-size="sm" class="filestyle" data-text="Upload" data-btnClass="btn-primary">
                                </div>
                            </div>
                            <input type="hidden" id="admin_id" name="admin_id" value="{{ $session->admin_id }}">
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
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h5> Change Password </h5>
                </div>
                <div class="card-block table-border-style">
                    <div id="temp-change-password-respond"></div>
                    <div class="">

                        <form id="form-change-password">
                        <div class="modal-body">
                            <div id="temp-admin"></div>
                            <div class="form-group">
                                <label> Old Password </label>
                                <input name="old_password" class="form-control" placeholder="Old Password" type="password">
                            </div>
                            <div class="form-group">
                                <label> New Password </label>
                                <input name="new_password" class="form-control" placeholder="New Password" type="password">
                            </div>
                            <div class="form-group">
                                <label> New Password Confirmation </label>
                                <input name="new_password_confirmation" class="form-control" placeholder="New Password" type="password">
                            </div>
                            <input type="hidden" id="admin_id" name="admin_id" value="{{ $session->admin_id }}">
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
        </div>
    </div>
</div>
      

<script>
    $("#profile_update").modal({
        show:true,
        backdrop: 'static'
    });

    $("form#form-admin-profile").submit(function(e){
        
        var formData = new FormData($(this)[0]);
        //formData.append("_token","{{ csrf_token() }}");
        //alert($("#_token").val() +" = "+formData.get("_token"));

        $.ajax({
            type:"post",
            url:"{{ url('admin/profile/update') }}",
            //data:$(this).serialize(),
            data:formData,
            cache: false,
            processData: false,
            contentType	: false,
            success:function(data)
            {
                $("#temp-admin-profile-respond").html(data);
            },

        });
        return false;
    });

    $("form#form-change-password").submit(function(e){
        
        var formData = new FormData($(this)[0]);
        //formData.append("_token","{{ csrf_token() }}");
        //alert($("#_token").val() +" = "+formData.get("_token"));

        $.ajax({
            type:"post",
            url:"{{ url('admin/profile/change_password') }}",
            //data:$(this).serialize(),
            data:formData,
            cache: false,
            processData: false,
            contentType	: false,
            success:function(data)
            {
                $("#temp-change-password-respond").html(data);
            },

        });
        return false;
    });
</script>