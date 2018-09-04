<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" 
        role="tab" aria-controls="home" aria-selected="true"> Profile </a>
    </li>
   
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div id="temp-profile-respond"></div>
        <form id="profile-form" class="container">
            <div class="form-group">
                <label> Name :</label>
                <input value="<?php echo $user->name ?>" type="text" name="name" class="form-control">
            </div>
            {{ csrf_field() }}

            <div class="form-group">
                <label>Email :</label><br>
                <div class="input-group">
                    <input value="<?php echo $user->email ?>" type="text" class="form-control" name="email" placeholder="" aria-label="" aria-describedby="basic-addon2">
                </div>
            </div>

            <div class="form-group">
                <label>Phone Number :</label><br>
                <div class="input-group">
                    <input value="<?php echo $user->no_telp ?>" type="text" class="form-control" name="phone_no" placeholder="" aria-label="" aria-describedby="basic-addon2">
                </div>
            </div>
           
            <button class="btn btn-primary">
                Update Profile
            </button>
        </form>
    </div>
</div>
<script>
    $("#birthday").datepicker({
        dateFormat:"yy-mm-dd"
    });

    $("#profile-form").submit(function(){

        $.ajax({
            type:"POST",
            url:"<?=url('account/profile_edit_process')?>",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-profile-respond").html(data);
            }
        });

        return false;
    });
</script>