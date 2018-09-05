<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="password-tab" data-toggle="tab" href="#password" 
        role="tab" aria-controls="home" aria-selected="true"> Change Password </a>
    </li>
   
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane show active" id="password" role="tabpanel" aria-labelledby="password-tab">
        <div id="change-password-respond"></div>
        <form id="change-password-form" class="container" autocomplete="off">
            <div class="form-group">
                <label> Old Password </label>
                <input onready="this.value = ''" autocomplete="off" placeholder="" type="password" name="old_password" id="old_password" class="form-control">  
            </div> 
            <div class="form-group">
                <label> New Password </label>
                <input onready="this.value = ''" autocomplete="off" placeholder="" type="password" name="new_password" id="new_password" class="form-control">
            </div>
            {{ csrf_field() }}
            <div class="form-group"> 
                <label>Confirm Password</label> 
                <input onready="this.value = ''" autocomplete="off" placeholder="" type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary"> Change </button>
        </form>
    </div>
</div>

<script>
      $("#change-password-form").submit(function(){
        $.ajax({
            type:"POST",
            url:"<?=url('account/change_password_process')?>",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#change-password-respond").html(data);
            }
        });

        return false;
    });

</script>