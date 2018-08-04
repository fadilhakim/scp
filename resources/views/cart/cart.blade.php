@include('template/header')
<script>
    function update_cart()
    {
        alert("wait a minute ...");
        $.ajax({
            type:"POST",
            url:"<?= url("cart/update") ?>",
            data:$("form#form-update-cart").serialize(),
            success:function(data)
            {
               
                $("#cart-info-temp").html(data);
            }
        });
        //$("form#form-update-cart").submit();
    }
</script>
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
        <div id="cart-info-temp"></div>
        <table class="cart-table">
            <thead>
                <tr>
                    <th style="width: 195px;">product display</th>
                    <th style="width: 210px;">product name</th>
                    <th style="width: 210px;">price</th>
                    <th style="width: 100px;">quantity</th>
                
                    <th style="width: 150px;">total</th>
                    <th style="width: 70px;"></th>
                </tr>
            </thead>
            <form onSubmit="update_cart()" id="form-update-cart" method="post">
            {{ csrf_field() }}
            <tbody>
                <?php foreach(Cart::content() as $row){ 
                    $subtotal = $row->price * $row->qty;    
                ?>
                <tr>
                    
                    <td data-title=" ">
                        <a class="cart-entry-thumbnail" href="#"><img height="100" width="100" src="{{URL::asset('public/products/'.$row->id.'/'.$row->options->image)}}" alt=""></a>
                        
                    </td>
                    <td data-title=" ">  
                        {{ $row->name }}
                        
                        
                    </td>
                    <td data-title="Price: ">Rp. <?=number_format($row->price)?>
                    <input type="hidden" value="{{ $row->rowId }}" name="rowid-input[]" />
                    <input type="hidden" value="{{ $row->id }}" name="productId-input[]" />
                    </td>
                    <td data-title="Quantity: ">

                        <div class="quantity-select">
                           
                            <!-- <span class="number" id="number-id"><?=number_format($row->qty)?></span> -->
                            <input style='text-align:center' min="0" type="number" id="qty-input" name="qty-input[]" value="<?=number_format($row->qty)?>" >
                           
                           
                        </div>
                    </td>
                
                    <td data-title="Total:">Rp. <?=number_format($subtotal)?></td>
                    <td data-title="">
                        <a href="{{ url('cart/delete/'.$row->rowId) }}"><div class="button-close"></div></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            </form>
        </table>
        <div class="empty-space col-xs-b35"></div>
        <div class="row">
            <div class="col-sm-6 col-md-5 col-xs-b10 col-sm-b0">
            <form id="update-coupon" method="post"> 
                <div class="single-line-form">
                    <input name="coupon_code" class="simple-input" type="text" value="" placeholder="Enter your coupon code" />
                    <div class="button size-2 style-3">
                        <span class="button-wrapper">
                            <span class="icon"><img src="img/icon-4.png" alt=""></span>
                            {{ csrf_field() }}
                            <span class="text">Submit</span>
                           
                        </span>
                        <input type="submit" value="">
                    </div>
                </div>
            </form>
            </div>
            <div class="col-sm-6 col-md-7 col-sm-text-right">
                <div class="buttons-wrapper">
                    <a onclick="update_cart()" class="button size-2 style-2" >
                        <span class="button-wrapper">
                            <span class="icon"><img src="img/icon-2.png" alt=""></span>
                            <span class="text" style="color:white">Update Cart</span>
                        </span>
                    </a>
                    <!-- <a onclick="return confirm('Are you sure want to checkout')" class="button size-2 style-3" href="{{url('checkout')}}">
                        <span class="button-wrapper">
                            <span class="icon"><img src="img/icon-4.png" alt=""></span>
                            <span class="text">proceed to checkout</span>
                        </span>
                    </a> -->
                    <a class="button size-2 style-3" href="{{url('shipping')}}">
                        <span class="button-wrapper">
                            <span class="icon"><img src="img/icon-4.png" alt=""></span>
                            <span class="text"> Shipping </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    
    <div class="empty-space col-xs-b35 col-md-b70"></div>
      <div class="row">
        <div class="col-md-6 col-xs-b50 col-md-b0">
           <!-- User addresss List  -->
           <code>
           <?php 
                print_r(Cart::content());
                //$data["user_address"] = $user_address;
           ?>
           </code>
           <?php //view("cart/user_address",$data) ?>
        </div>
        <div class="col-md-6">
            <h4 class="h4">cart totals</h4>
            <div class="order-details-entry simple-article size-3 grey uppercase">
                <div class="row">
                    <div class="col-xs-6">
                        cart subtotal
                    </div>
                    <div class="col-xs-6 col-xs-text-right">
                        <div class="color">Rp. <?=Cart::subtotal();?></div>
                    </div>
                </div>
            </div>
            <div class="order-details-entry simple-article size-3 grey uppercase">
                <div class="row">
                    <div class="col-xs-6">
                        Tax
                    </div>
                    <div class="col-xs-6 col-xs-text-right">
                        <div class="color">Rp. <?=Cart::tax()?></div>
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
            <?php if (session()->has('voucher_code')) { ?>
            <div class="order-details-entry simple-article size-3 grey uppercase">
                <div class="row">
                    <div class="col-xs-6">
                        Discount / Cashback
                    </div>
                    <div class="col-xs-6 col-xs-text-right">
                        <div class="color">Rp. <?=number_format(session("voucher_nominal"))?></div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="order-details-entry simple-article size-3 grey uppercase">
                <div class="row">
                    <div class="col-xs-6">
                        Order Total
                    </div>
                    <div class="col-xs-6 col-xs-text-right">
                        <div class="color">Rp. <?=number_format(session("final_total"))//Cart::total()?></div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    <div class="empty-space col-xs-b35 col-md-b70"></div>
    <div class="empty-space col-xs-b35 col-md-b70"></div>
</div>

<script>
    $("span.minus").click(function(){
        var num = $("#number-id").html();
        $("#qty-input").val(num);
    });
    $("span.plus").click(function(){
        var num = $("#number-id").html();
        $("#qty-input").val(num);
    });
    /*$("#number-id").change(function(){
        $("#qty-input").val($(this).html());
    });*/
    /* $("#update-cart").click(function(){
       alert("duh");
       $("#form-update-cart").submit(function(){
           update_cart();
           return false;
       });
    }); */

    $("#update-coupon").submit(function(){
        $.ajax({
            type:"POST",
            url:"<?=url("cart/update_coupon")?>",
            data:$(this).serialize(),
            success:function(data)
            {
               
                $("#cart-info-temp").html(data);
            }
        }); 

        return false;
    });
</script>
@include('template/footer')