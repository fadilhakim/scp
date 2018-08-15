@include('template/header')

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

<form action="post" id="form-shipping">
<div class="container" >
    <div id='temp-form-shipping'>
      
    </div>
    <div class="col-md-4">
           <?php 
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
    </div>
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
                ?>
                <tr>
                    
                    <td>{{ $row->name }}</td>
                    <td>Rp. {{ $row->price }}</td>
                    <td>{{ $row->qty }}</td>

                    <td>{{ $row->options->weight }}</td>
                    <td>Rp. {{ $row->subtotal }}</td>
                    <td>Rp.  {{ $row->options->shipping }} </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <div>
        <h5> Totals </h5>

        </div>

        <code>
            <?=Cart::content()?>
        </code>
        <hr>
    
    </div>    
    
</div>
</form> 

<div class="clear"></div>

<div class="empty-space col-sm-b35"></div>

<script>
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

</script>

@include('template/footer')