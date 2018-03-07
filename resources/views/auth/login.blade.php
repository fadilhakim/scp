@include('template/header')
<div class="container">
    <div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>
    <center >
        <div class="popup-container size-1">
            <div class="popup-align">
                <h3 class="h3 text-center">Log in</h3>
                <form id="form-login" method="post" action="{{ url('auth/login_process') }}">
                    <div class="empty-space col-xs-b30">
                        <div id='temp-login'></div>
                    </div>
                    <input name="email" class="simple-input" type="text" value="" placeholder="Your email" />
                    {{ csrf_field() }}
                    <div class="empty-space col-xs-b10 col-sm-b20"></div>
                    <input name="password" class="simple-input" type="password" value="" placeholder="Enter password" />
                    <div class="empty-space col-xs-b10 col-sm-b20"></div>
                   
                    <div class="row">
                        <div class="col-sm-6 col-xs-b10 col-sm-b0">
                            <div class="empty-space col-sm-b5"></div>
                            <a class="simple-link">Forgot password?</a>
                            <div class="empty-space col-xs-b5"></div>
                            <a class="simple-link">register now</a>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button type="submit" class="button size-2 style-3" >
                                <span class="button-wrapper">
                                    <span class="icon"><img src="{{ URL::asset('public/img/icon-4.png')}}" alt="" /></span>
                                    <span class="text">submit</span>
                                </span>
                            </button>  
                        </div>
                    </div>
                </form>
                <!--  <div class="popup-or">
                    <span>or</span>
                </div>
                <div class="row m5">
                    <div class="col-sm-4 col-xs-b10 col-sm-b0">
                        <a class="button facebook-button size-2 style-4 block" href="#">
                            <span class="button-wrapper">
                                <span class="icon"><img src="{{ URL::asset('public/img/icon-4.png')}}" alt="" /></span>
                                <span class="text">facebook</span>
                            </span>
                        </a>
                    </div>
                    <div class="col-sm-4 col-xs-b10 col-sm-b0">
                        <a class="button twitter-button size-2 style-4 block" href="#">
                            <span class="button-wrapper">
                                <span class="icon"><img src="{{ URL::asset('public/img/icon-4.png')}}" alt="" /></span>
                                <span class="text">twitter</span>
                            </span>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a class="button google-button size-2 style-4 block" href="#">
                            <span class="button-wrapper">
                                <span class="icon"><img src="{{ URL::asset('public/img/icon-4.png')}}" alt="" /></span>
                                <span class="text">google+</span>
                            </span>
                        </a>
                    </div>
                </div> -->
            </div>
            
        </div>
    </center>

    <script>

    /* $("form#form-login").submit(function(){
        //e.preventDefault();
      
        $.ajax({
            type:"POST",
            url:"",
            data:$(this).serialize(),
            success:function(data){
                $("#temp-login").html(data);
            }
        });

        return false;
    });*/
    </script>
</div>
<div class="header-empty-space"></div>
@include('template/footer')