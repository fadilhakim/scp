@include('template/header')

	<div class="empty-space col-xs-b25 col-sm-b50"></div>


	<div class="container">
    <h4 class="h4 text-center col-xs-b25">Sending Information</h4>
    <p style="text-align: center;">Returning customer? <a href="<?=url("login")?>">Click Here to Login</a></p>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form class="contact-form">
                <div class="row m5">
                    <div class="col-sm-6">
                        <input class="simple-input col-xs-b20" type="text" value="" placeholder="First Name" name="firstname" />
                    </div>
                    <div class="col-sm-6">
                        <input class="simple-input col-xs-b20" type="text" value="" placeholder="Last Name" name="lastname" />
                    </div>
                    <div class="col-sm-6">
                        <input class="simple-input col-xs-b20" type="text" value="" placeholder="Phone" name="phone" />
                    </div>
                    <div class="col-sm-6">
                        <input class="simple-input col-xs-b20" type="text" value="" placeholder="Email" name="email" />
                    </div>

                    <div class="col-sm-12">
                        <textarea class="simple-input col-xs-b20" placeholder="Address" name="address"></textarea>
                    </div>
                    <div class="col-sm-12">
                        <textarea class="simple-input col-xs-b20" placeholder="Your message" name="message"></textarea>
                    </div>
                    <div class="col-sm-12">
                        <div class="text-center">
                            <div class="button size-2 style-3">
                                <span class="button-wrapper">
                                    <span class="icon"><img src="img/icon-4.png" alt=""></span>
                                    <span class="text">Go to Payment Confirmation</span>
                                </span>
                                <input type="submit"/>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
	</div>
	<div class="empty-space col-xs-b35 col-md-b70"></div>
    <div class="empty-space col-xs-b35 col-md-b70"></div>
@include('template/footer')