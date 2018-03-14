<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" 
        role="tab" aria-controls="home" aria-selected="true"> Profile </a>
    </li>
   
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <form id="profile-form" class="container">
            <div class="form-group">
                <label> Name </label>
                <input type="text" name="name" class="form-control">
            </div>
            {{ csrf_field() }}

            <div class="form-group">
                <label>Email </label><br>
                <div class="input-group">
                    
                    <input disabled type="text" class="form-control" name="email" placeholder="" aria-label="" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button"> Change </button>
                    </div>
                </div>
            </div>

            
                <label> Gender </label>
                <br>
            <div class='form-group '>
                <div class=''>
                <input class="col-md-1" type="radio" name="gender" id="male" value="male">
                <label class="col-md-2" for="male" >Male</label>
                <span class="col-md-1"></span>
                <input class="col-md-1" type="radio" name="gender" id="female" value="female">
                <label class="col-md-2" for="female" >Female</label>
                </div>
            </div>  
           
            <span class="clearfix"></span>
            <div class="form-group">
                <label> Birthday </label>
                <input type="text" id="birthday" name="birthday" class="form-control">
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
            url:"<?=''?>",
            data:$(this).serialize(),
            success:function(data)
            {

            }
        });

        return false;
    });
</script>