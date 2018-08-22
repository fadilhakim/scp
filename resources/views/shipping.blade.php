@include('template/header')
<?php 
  use App\Models\Product;
   // $this->objProduct = new Product();
?>
<script>

    function list_result_ongkir(){

        var coureer = $("#coureer").val();

        $.ajax({
            type:"POST",
            url:"<?=url("rajaongkir/list_result_ongkir")?>",
            data:"coureer="+coureer,
            success:function(data){
                $("#temp-form-shipping").html(data);
            }
        });
    }

    function shipping_update(){
        //alert("<?=url("shipping/update")?>");
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:"POST",
            url:"<?=url("shipping/update")?>",
            //dataType:"JSON",
            data:"_token="+_token+"&"+$("#form-shipping").serialize(),
            success:function(data){

                $("#temp-form-shipping").html(data);
            }
        });

        return false;
    }
    

</script>

<div class="container">
    <div class="empty-space col-xs-b15 col-sm-b30"></div>
    <div class="breadcrumbs">
        <a href="#">Home</a>
        <a href="#">Shopping cart</a>
        <a href="#">Shipping</a>
    </div>
    <div class="text-center">
        <div class="h2"> Shipping </div>
        <div class="title-underline center"><span></span></div>
    </div>
</div>

<div class="empty-space col-xs-b35 col-md-b70"></div>


<div class="container" >
    <div id='temp-form-shipping'>
    @if (session('msg_shipping'))
        <div class='alert alert-danger'>
        <div><b> Error : </b></div>
        <?php
            $exp = explode(",",session('msg_shipping'));
            foreach($exp as $row)
            {
                echo "<div> $row </div>";
            }
        ?>
        </div>
    @endif
    </div>
    <form method="post" id="form-shipping" onSubmit="return shipping_update()">
    <div class="col-md-4">
           <?php 
                $data["choose_address_book"] = $choose_address_book;
                $data["user_address"] = $user_address;
           ?>
           <?php echo view("cart/user_address",$data) ?>
           
           <h3> Choose Coureer </h3>
           <br>
           <div class="form-group">
                <label> Coureer </label>
                <select name="coureer" class="form-control" id="coureer" onChange="detail_cost()">
                    <option value=""> -- Select Courer -- </option>
                    <option value="jne"> JNE </option> 
                    <option value="tiki"> TIKI </option>
                    <option value="pos"> POS </option>
                </select>
           </div>

           <div class="form-group">
                <label> Type of Delivery </label>
                <select name="delivery_type" id="delivery_type" class="form-control">
                    <option> -- Type of delivery -- </option>
                </select>
           </div>
           <button type="submit" class="btn btn-primary"> Shipping Update </button>
    </div>
    </form> 

    <div class="col-md-8 table-responsive">
        <h3> Products </h3>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                   
                    <th style="width: 210px;">Product name</th>
                    <th style="width: 150px;">Price</th>
                    <th style="width: 100px;">Quantity</th>
                
                    <th style="width: 100px;">Weight</th>
                    
                    <th style="width: 180px;">Subtotal</th>
                    <th style="width: 150px;">Shipping Cost</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach(Cart::content() as $row){ 
                    $subtotal = $row->price * $row->qty;    
                    $product = Product::detail_product($row->id);
                   
                ?>
                <tr>
                    
                    <td>{{ $row->name }}</td>
                    <td>Rp. {{ $row->price }}</td>
                    <td>{{ $row->qty }}</td>

                    <td>{{ $row->options->weight }}</td>
                    <td>Rp. {{ $row->subtotal }}</td>
                    <td>
                        <?php if($row->qty <  $product->product_total_free_ongkir ){  ?>
                        
                        <?php }else{ echo "Free Ongkir"; } ?>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        
        <div class="col-md-10">
            <h4 class="h5">cart totals</h4>
            <div class="order-details-entry simple-article size-3 grey uppercase">
                <div class="row">
                    <div class="col-xs-6">
                        Cart Total
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
                        Shipping Cost
                    </div>
                    <div class="col-xs-6 col-xs-text-right">
                        <div class="color">Rp. <?=session("shipping_cost")?></div>
                    </div>
                </div>
            </div>
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
        
        
        <div class='clearfix '></div> 
        <div class="empty-space col-sm-b20"></div>
        <a href="<?=url("checkout")?>" class='btn btn-primary float-right' > Checkout </a>
        
        
        
    </div>    
    
</div>


<div class="clear"></div>

<div class="empty-space col-sm-b35"></div>

<script>
    $("input[name='user_address']").change(function(){
        //var dest = $("input[name='user_address']:checked").val();
        detail_cost();
        //alert("value :"+dest)
    });

    function detail_cost(){

        var coureer = $("#coureer").val();
        var origin  = $("#origin").val();
        var destination = $("#destination").val();
        var weight = $("#weight").val();
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:"POST",
            url:"<?=url("rajaongkir/list_result_ongkir")?>",
            //dataType:"JSON",
            data:"_token="+_token+"&coureer="+coureer+"&origin="+origin+"&destination="+destination+"&weight="+weight,
            success:function(data){

                $("#delivery_type").html(data);
            }
        });
    }

    /*function checkout(){
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:"POST",
            url:"<?=url("user_form_checkout")?>",
            //dataType:"JSON",
            data:"_token="+_token+"&",
            success:function(data){ 
                let dt = "";
                $("#temp-form-shipping").html(data);

                if(data === "success"){

                }else{

                }
               //$("#temp-form-shipping").html(data);
            }
        });
    }*/

</script>

@include('template/footer')