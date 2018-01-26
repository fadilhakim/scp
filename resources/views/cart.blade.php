@include('template/header')

<div class="container">
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="breadcrumbs">
                <a href="#">home</a>
                <a href="#">shopping cart</a>
            </div>
            <div class="text-center">
                <div class="simple-article size-3 grey uppercase col-xs-b5">shopping cart</div>
                <div class="h2">check your products</div>
                <div class="title-underline center"><span></span></div>
            </div>
</div>

<div class="empty-space col-xs-b35 col-md-b70"></div>

<div class="container">
    <table class="cart-table">
        <thead>
            <tr>
                <th style="width: 95px;"></th>
                <th>product name</th>
                <th style="width: 150px;">price</th>
                <th style="width: 260px;">quantity</th>
                <th style="width: 70px;">color</th>
                <th style="width: 150px;">total</th>
                <th style="width: 70px;"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-title=" ">
                    <a class="cart-entry-thumbnail" href="#"><img src="img/product-1.png" alt=""></a>
                </td>
                <td data-title=" "><h6 class="h6"><a href="#">modern beat ht</a></h6></td>
                <td data-title="Price: ">Rp. 155.00</td>
                <td data-title="Quantity: ">
                    <div class="quantity-select">
                        <span class="minus"></span>
                        <span class="number">2</span>
                        <span class="plus"></span>
                    </div>
                </td>
                <td data-title="Color: "><div class="cart-color" style="background: #eee;"></div></td>
                <td data-title="Total:">Rp. 310.00</td>
                <td data-title="">
                    <div class="button-close"></div>
                </td>
            </tr>
            <tr>
                <td data-title=" ">
                    <a class="cart-entry-thumbnail" href="#"><img src="img/product-2.png" alt=""></a>
                </td>
                <td data-title=" "><h6 class="h6"><a href="#">sport beat atx</a></h6></td>
                <td data-title="Price: ">Rp. 155.00</td>
                <td data-title="Quantity: ">
                    <div class="quantity-select">
                        <span class="minus"></span>
                        <span class="number">1</span>
                        <span class="plus"></span>
                    </div>
                </td>
                <td data-title="Color: "><div class="cart-color" style="background: #eee;"></div></td>
                <td data-title="Total:">Rp. 310.00</td>
                <td data-title="">
                    <div class="button-close"></div>
                </td>
            </tr>
            <tr>
                <td data-title=" ">
                    <a class="cart-entry-thumbnail" href="#"><img src="img/product-3.png" alt=""></a>
                </td>
                <td data-title=" "><h6 class="h6"><a href="#">hipster beat hr</a></h6></td>
                <td data-title="Price: ">Rp. 155.00</td>
                <td data-title="Quantity: ">
                    <div class="quantity-select">
                        <span class="minus"></span>
                        <span class="number">1</span>
                        <span class="plus"></span>
                    </div>
                </td>
                <td data-title="Color: "><div class="cart-color" style="background: #eee;"></div></td>
                <td data-title="Total:">Rp. 310.00</td>
                <td data-title=" ">
                    <div class="button-close"></div>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="empty-space col-xs-b35"></div>
    <div class="row">
        <div class="col-sm-6 col-md-5 col-xs-b10 col-sm-b0">
            <div class="single-line-form">
                <input class="simple-input" type="text" value="" placeholder="Enter your coupon code" />
                <div class="button size-2 style-3">
                    <span class="button-wrapper">
                        <span class="icon"><img src="img/icon-4.png" alt=""></span>
                        <span class="text">submit</span>
                    </span>
                    <input type="submit" value="">
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-7 col-sm-text-right">
            <div class="buttons-wrapper">
                <a class="button size-2 style-2" href="#">
                    <span class="button-wrapper">
                        <span class="icon"><img src="img/icon-2.png" alt=""></span>
                        <span class="text">update cart</span>
                    </span>
                </a>
                <a class="button size-2 style-3" href="{{url('checkout')}}">
                    <span class="button-wrapper">
                        <span class="icon"><img src="img/icon-4.png" alt=""></span>
                        <span class="text">proceed to checkout</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="empty-space col-xs-b35 col-md-b70"></div>
    <div class="row">
        <div class="col-md-6 col-xs-b50 col-md-b0">
            <h4 class="h4 col-xs-b25">calculate shipping</h4>
            <select class="SlectBox">
                <option disabled="disabled" selected="selected">Choose country for shipping</option>
                <option value="volvo">Volvo</option>
                <option value="saab">Saab</option>
                <option value="mercedes">Mercedes</option>
                <option value="audi">Audi</option>
            </select>
            <div class="empty-space col-xs-b20"></div>
            <div class="row m10">
                <div class="col-sm-6">
                    <input class="simple-input" type="text" value="" placeholder="State / Country" />
                    <div class="empty-space col-xs-b20"></div>
                </div>
                <div class="col-sm-6">
                    <input class="simple-input" type="text" value="" placeholder="Postcode / Zip" />
                    <div class="empty-space col-xs-b20"></div>
                </div>
            </div>
            <div class="button size-2 style-2">
                <span class="button-wrapper">
                    <span class="icon"><img src="img/icon-1.png" alt=""></span>
                    <span class="text">update totals</span>
                </span>
                <input type="submit"/>
            </div>
        </div>
        <div class="col-md-6">
            <h4 class="h4">cart totals</h4>
            <div class="order-details-entry simple-article size-3 grey uppercase">
                <div class="row">
                    <div class="col-xs-6">
                        cart subtotal
                    </div>
                    <div class="col-xs-6 col-xs-text-right">
                        <div class="color">Rp. 1195.00</div>
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
                        <div class="color">Rp. 1195.00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="empty-space col-xs-b35 col-md-b70"></div>
    <div class="empty-space col-xs-b35 col-md-b70"></div>
</div>
	
@include('template/footer')