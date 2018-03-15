<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="password-tab" data-toggle="tab" href="#password" 
        role="tab" aria-controls="home" aria-selected="true"> Change Password </a>
    </li>
   
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane show active" id="password" role="tabpanel" aria-labelledby="password-tab">
        <form id="change-password-form" class="container">
            <div class="form-group">
                <label> Old Password </label>
                <input type="password" name="old_password" id="old_password" class="form-control">  
            </div> 
            <div class="form-group">
                <label> New Password </label>
                <input type="password" name="new_password" id="new_password" class="form-control">
            </div>
            {{ csrf_field() }}
            <div class="form-group"> 
                <label>Confirm Password</label> 
                <input type="passwordtext" name="confirm_new_password" id="confirm_new_password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary"> Change </button>
        </form>
    </div>
</div>

<script>
      $("#change-password-form").submit(function(){
        $.ajax({
            type:"POST",
            url:"<?=''?>",
            data:$(this).serialize(),
            success:function(data)
            {
                
            }
        });

        return false;
    });

</script>