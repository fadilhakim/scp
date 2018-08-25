@include('template/header')
        <div class="empty-space col-xs-b35 col-md-b70"></div>
    
        <div class="container">
            <h4 class="h4 text-center col-xs-b25">Product Warranty</h4>
            <p>When a problem occurs with a covered appliance or mechanical system such as an air conditioning unit or furnace, a service technician repairs or replaces it. The homeowner may have to pay for a service call fee and the home warranty company pays the balance for the repair or replacement of the covered item.</p>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form class="contact-form" method="post" action="{{url('/admin/warranty/submit')}}">
                        <div class="row m5">
                            <div class="col-sm-6">
                                <input class="simple-input col-xs-b20" type="text" value="" placeholder="Model Product" name="model" />
                            </div>
                            <div class="col-sm-6">
                                <input class="simple-input col-xs-b20" type="text" value="" placeholder="Buy Date (sample : 30 Oktober 2017)" name="buy_date" />
                            </div>

                             <div class="col-sm-6">
                                <input class="simple-input col-xs-b20" type="text" value="" placeholder="Number Imer 1" name="no_imei_1" />
                            </div>

                             <div class="col-sm-6">
                                <input class="simple-input col-xs-b20" type="text" value="" placeholder="Number Imer 1" name="no_imei_2" />
                            </div>

                            <div class="col-sm-6">
                                <input class="simple-input col-xs-b20" type="text" value="" placeholder="Customer Email" name="customer_email" />
                            </div>

                            <div class="col-sm-6">
                                <input class="simple-input col-xs-b20" type="text" value="" placeholder="customer_name" name="customer_name" />
                            </div>

                            <div class="col-sm-6">
                                <input class="simple-input col-xs-b20" type="text" value="" placeholder="Customer Phone" name="customer_phone" />
                            </div>

                            <div class="col-sm-12">
                                <textarea class="simple-input col-xs-b20" placeholder="Customer Address " name="customer_address"></textarea>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" >
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

        <script type="text/javascript">
            
             $(function () {
                   var bindDatePicker = function() {
                        $(".date").datetimepicker({
                        format:'YYYY-MM-DD',
                            icons: {
                                time: "fa fa-clock-o",
                                date: "fa fa-calendar",
                                up: "fa fa-arrow-up",
                                down: "fa fa-arrow-down"
                            }
                        }).find('input:first').on("blur",function () {
                            // check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
                            // update the format if it's yyyy-mm-dd
                            var date = parseDate($(this).val());

                            if (! isValidDate(date)) {
                                //create date based on momentjs (we have that)
                                date = moment().format('YYYY-MM-DD');
                            }

                            $(this).val(date);
                        });
                    }
                   
                   var isValidDate = function(value, format) {
                        format = format || false;
                        // lets parse the date to the best of our knowledge
                        if (format) {
                            value = parseDate(value);
                        }

                        var timestamp = Date.parse(value);

                        return isNaN(timestamp) == false;
                   }
                   
                   var parseDate = function(value) {
                        var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
                        if (m)
                            value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

                        return value;
                   }
                   
                   bindDatePicker();
                 });
        </script>
        <div class="empty-space col-xs-b35 col-md-b70"></div>
@include('template/footer')