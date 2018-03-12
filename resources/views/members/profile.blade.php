<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" 
        role="tab" aria-controls="home" aria-selected="true"> Profile </a>
    </li>
   
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <form class="container">
            <div class="form-group">
                <label> Name </label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label> Email </label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label> Gender </label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
                
            </div>
            <span class="clearfix"></span>
            <div class="form-group">
                <label> Birthday </label>
                <input type="text" name="birthday" class="form-control">
            </div>
            <button class="btn btn-primary">
                Update Profile
            </button>
        </form>
    </div>
</div>