<div class="popup-content" data-rel="2">
    <div class="layer-close"></div>
    <div class="popup-container size-1">
    <script type="text/javascript">

            function checkForm(form)
            {
        
            if(!form.terms.checked) {
                alert("Please indicate that you accept the Terms and Conditions");
                form.terms.focus();
                return false;
            }
            return true;
            }

        </script>

        <form id="form-register" method="post" onsubmit="return checkForm(this)" action="{{ url('auth/register_process') }}"> 
        <div class="popup-align">
            <h3 class="h3 text-center">Register</h3>
            <div class="empty-space col-xs-b30"></div>
            <span class="clearfix"></span>
            <h6 id="info-register"></h6>
            <span class="clearfix"></span>
            <div class="empty-space col-xs-b30"></div>
            <input class="simple-input" type="text" value="" name="name" placeholder="Your name" />
            <div class="empty-space col-xs-b10 col-sm-b20"></div>
            <input class="simple-input" type="text" value="" name="email" placeholder="Your email" />
            <div class="empty-space col-xs-b10 col-sm-b20"></div>
            <input class="simple-input" type="password" value="" name="password" placeholder="Enter password" />
            <div class="empty-space col-xs-b10 col-sm-b20"></div>
            <input class="simple-input" type="password" value="" name="password_confirmation" placeholder="Repeat password" />
            <div class="empty-space col-xs-b10 col-sm-b20"></div>
            {{ csrf_field() }}
            <div class="row">
                <div class="col-sm-7 col-xs-b10 col-sm-b0">
                    <div class="empty-space col-sm-b15"></div>
                    <label class="checkbox-entry">
                        <input name="terms" type="checkbox" /><span><a href="#">Privacy policy agreement</a></span>
                    </label>
                </div>
                <div class="col-sm-5 text-right">
                    <button class="button size-2 style-3" type="submit">
                        <span class="button-wrapper">
                            <span class="icon"><img src="{{ URL::asset('public/img/icon-4.png')}}" alt="" /></span>
                            <span class="text">submit</span>
                        </span>
                    </button>  
                </div>
            </div>
            <!-- <div class="popup-or">
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
        <div class="button-close"></div>
        </form>
    </div>
</div>

<script>
	$("#form-register").submit(function(e){
		
		e.preventDefault();
		
		$.ajax({
				
			type:"POST",
			url:"{{ url('auth/register_process') }}",
			data:$("#form-register").serialize(),
			success: function(data)
			{
				$("#info-register").html(data);
			}
				
		});
		
		return false;
		
	});

</script>