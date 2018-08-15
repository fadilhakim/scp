@include('template/header')
        <div class="empty-space col-xs-b35 col-md-b70"></div>
    
        <div class="container">
            <h4 class="h4 text-center col-xs-b25">Product Warranty</h4>
            <p>When a problem occurs with a covered appliance or mechanical system such as an air conditioning unit or furnace, a service technician repairs or replaces it. The homeowner may have to pay for a service call fee and the home warranty company pays the balance for the repair or replacement of the covered item.</p>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form class="contact-form">
                        <div class="row m5">
                            <div class="col-sm-6">
                                <input class="simple-input col-xs-b20" type="text" value="" placeholder="Model Product" name="model" />
                            </div>
                            <div class="col-sm-6">
                                <input class="simple-input col-xs-b20" type="text" value="" placeholder="Buy Date" name="buy_date" />
                            </div>

                             <div class="col-sm-6">
                                <input class="simple-input col-xs-b20" type="text" value="" placeholder="Number Imer 1" name="no_imei_1" />
                            </div>

                             <div class="col-sm-6">
                                <input class="simple-input col-xs-b20" type="text" value="" placeholder="Number Imer 1" name="no_imei_2" />
                            </div>

                            <div class="col-sm-6">
                                <input class="simple-input col-xs-b20" type="text" value="" placeholder="Email" name="email" />
                            </div>

                            <div class="col-sm-6">
                                <input class="simple-input col-xs-b20" type="text" value="" placeholder="customer_name" name="customer_name" />
                            </div>

                            <div class="col-sm-6">
                                <input class="simple-input col-xs-b20" type="text" value="" placeholder="Customer Phone" name="customer_phone" />
                            </div>

                            <div class="col-sm-12">
                                <textarea class="simple-input col-xs-b20" placeholder="Customer Address " name="customer_address"></textarea>
                            </div>
                            <div class="col-sm-12">
                                <div class="text-center">
                                    <div class="button size-2 style-3">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="{{URL::asset('/public/img/icon-4.png')}}" alt=""></span>
                                            <span class="text">Submit</span>
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
        <div class="container">    
            <div class="map-wrapper">
                <!-- <div id="map-canvas" class="full-width" data-lat="34.0151244" data-lng="-118.4729871" data-zoom="14"></div> -->
                <iframe style="width: 100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4997.219632119069!2d106.7999551523865!3d-6.224659885729463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14e455ccd9f%3A0xd635e33c7c001b3d!2sFX+Sudirman!5e0!3m2!1sen!2sid!4v1517498386947"  height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="addresses-block hidden">
                <!-- <a class="marker" data-lat="34.0151244" data-lng="-118.4729871" data-string="1. Here is some address or email or phone or something else..."></a> -->
            </div>
        </div>
        <div class="empty-space col-xs-b35 col-md-b70"></div>
@include('template/footer')