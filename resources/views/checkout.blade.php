@include('template/header')

        <div class="container">
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="breadcrumbs">
                <a href="#">home</a>
                <a href="#">checkout</a>
            </div>
            <div class="text-center">
                <div class="simple-article size-3 grey uppercase col-xs-b5">checkout</div>
                <div class="h2">check your info</div>
                <div class="title-underline center"><span></span></div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-b50 col-md-b0">
                    <h4 class="h4 col-xs-b25">billing details</h4>
                    <select class="SlectBox">
                        <option disabled="disabled" selected="selected">Choose country</option>
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
                    </select>
                    <div class="empty-space col-xs-b20"></div>
                    <div class="row m10">
                        <div class="col-sm-6">
                            <input class="simple-input" type="text" value="" placeholder="First name" />
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                        <div class="col-sm-6">
                            <input class="simple-input" type="text" value="" placeholder="Last name" />
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                    </div>
                    <input class="simple-input" type="text" value="" placeholder="Company name" />
                    <div class="empty-space col-xs-b20"></div>
                    <input class="simple-input" type="text" value="" placeholder="Street address" />
                    <div class="empty-space col-xs-b20"></div>
                    <div class="row m10">
                        <div class="col-sm-6">
                            <input class="simple-input" type="text" value="" placeholder="Appartment" />
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                        <div class="col-sm-6">
                            <input class="simple-input" type="text" value="" placeholder="Town/City" />
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                    </div>
                    <div class="row m10">
                        <div class="col-sm-6">
                            <input class="simple-input" type="text" value="" placeholder="State/Country" />
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                        <div class="col-sm-6">
                            <input class="simple-input" type="text" value="" placeholder="Postcode/ZIP" />
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                    </div>
                    <div class="row m10">
                        <div class="col-sm-6">
                            <input class="simple-input" type="text" value="" placeholder="Email" />
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                        <div class="col-sm-6">
                            <input class="simple-input" type="text" value="" placeholder="Phone" />
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                    </div>
                    <label class="checkbox-entry">
                        <input type="checkbox" checked><span>Privacy policy agreement</span>
                    </label>
                    <div class="empty-space col-xs-b50"></div>
                    <label class="checkbox-entry checkbox-toggle-title">
                        <input type="checkbox"><span>ship to different address?</span>
                    </label>
                    <div class="checkbox-toggle-wrapper">
                        <div class="empty-space col-xs-b25"></div>
                        <select class="SlectBox">
                            <option disabled="disabled" selected="selected">Choose country</option>
                            <option value="volvo">Volvo</option>
                            <option value="saab">Saab</option>
                            <option value="mercedes">Mercedes</option>
                            <option value="audi">Audi</option>
                        </select>
                        <div class="empty-space col-xs-b20"></div>
                        <div class="row m10">
                            <div class="col-sm-6">
                                <input class="simple-input" type="text" value="" placeholder="First name" />
                                <div class="empty-space col-xs-b20"></div>
                            </div>
                            <div class="col-sm-6">
                                <input class="simple-input" type="text" value="" placeholder="Last name" />
                                <div class="empty-space col-xs-b20"></div>
                            </div>
                        </div>
                        <input class="simple-input" type="text" value="" placeholder="Company name" />
                        <div class="empty-space col-xs-b20"></div>
                        <input class="simple-input" type="text" value="" placeholder="Street address" />
                        <div class="empty-space col-xs-b20"></div>
                        <div class="row m10">
                            <div class="col-sm-6">
                                <input class="simple-input" type="text" value="" placeholder="Appartment" />
                                <div class="empty-space col-xs-b20"></div>
                            </div>
                            <div class="col-sm-6">
                                <input class="simple-input" type="text" value="" placeholder="Town/City" />
                                <div class="empty-space col-xs-b20"></div>
                            </div>
                        </div>
                        <div class="row m10">
                            <div class="col-sm-6">
                                <input class="simple-input" type="text" value="" placeholder="State/Country" />
                                <div class="empty-space col-xs-b20"></div>
                            </div>
                            <div class="col-sm-6">
                                <input class="simple-input" type="text" value="" placeholder="Postcode/ZIP" />
                                <div class="empty-space col-xs-b20"></div>
                            </div>
                        </div>
                    </div>
                    <div class="empty-space col-xs-b30 col-sm-b60"></div>
                    <textarea class="simple-input" placeholder="Note about your order"></textarea>
                </div>
                <div class="col-md-6">
                    <h4 class="h4 col-xs-b25">your order</h4>
                    <div class="cart-entry clearfix">
                        <a class="cart-entry-thumbnail" href="#"><img src="img/product-1.png" alt=""></a>
                        <div class="cart-entry-description">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="h6"><a href="#">modern beat ht</a></div>
                                            <div class="simple-article size-1">QUANTITY: 2</div>
                                        </td>
                                        <td>
                                            <div class="simple-article size-3 grey">$155.00</div>
                                            <div class="simple-article size-1">TOTAL: $310.00</div>
                                        </td>
                                        <td>
                                            <div class="cart-color" style="background: #eee;"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="cart-entry clearfix">
                        <a class="cart-entry-thumbnail" href="#"><img src="img/product-2.png" alt=""></a>
                        <div class="cart-entry-description">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="h6"><a href="#">modern beat ht</a></div>
                                            <div class="simple-article size-1">QUANTITY: 2</div>
                                        </td>
                                        <td>
                                            <div class="simple-article size-3 grey">$155.00</div>
                                            <div class="simple-article size-1">TOTAL: $310.00</div>
                                        </td>
                                        <td>
                                            <div class="cart-color" style="background: #bf584b;"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="cart-entry clearfix">
                        <a class="cart-entry-thumbnail" href="#"><img src="img/product-3.png" alt=""></a>
                        <div class="cart-entry-description">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="h6"><a href="#">modern beat ht</a></div>
                                            <div class="simple-article size-1">QUANTITY: 2</div>
                                        </td>
                                        <td>
                                            <div class="simple-article size-3 grey">$155.00</div>
                                            <div class="simple-article size-1">TOTAL: $310.00</div>
                                        </td>
                                        <td>
                                            <div class="cart-color" style="background: #facc22;"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="order-details-entry simple-article size-3 grey uppercase">
                        <div class="row">
                            <div class="col-xs-6">
                                cart subtotal
                            </div>
                            <div class="col-xs-6 col-xs-text-right">
                                <div class="color">$1195.00</div>
                            </div>
                        </div>
                    </div>
                    <div class="order-details-entry simple-article size-3 grey uppercase">
                        <div class="row">
                            <div class="col-xs-6">
                                shipping and handling
                            </div>
                            <div class="col-xs-6 col-xs-text-right">
                                <div class="color">free shipping</div>
                            </div>
                        </div>
                    </div>
                    <div class="order-details-entry simple-article size-3 grey uppercase">
                        <div class="row">
                            <div class="col-xs-6">
                                order total
                            </div>
                            <div class="col-xs-6 col-xs-text-right">
                                <div class="color">$1195.00</div>
                            </div>
                        </div>
                    </div>
                    <div class="empty-space col-xs-b50"></div>
                    <h4 class="h4 col-xs-b25">payment method</h4>
                    <select class="SlectBox">
                        <option selected="selected">PayPal</option>
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
                    </select>
                    <div class="empty-space col-xs-b10"></div>
                    <div class="simple-article size-2">* Etiam mollis tristique mi ac ultrices. Morbi vel neque eget lacus sollicitudin facilisis. Lorem ipsum dolor sit amet semper ante vehicula ociis natoq.</div>
                    <div class="empty-space col-xs-b30"></div>
                    <div class="button block size-2 style-3">
                        <span class="button-wrapper">
                            <span class="icon"><img src="img/icon-4.png" alt=""></span>
                            <span class="text">place order</span>
                        </span>
                        <input type="submit"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>

@include('template/footer')