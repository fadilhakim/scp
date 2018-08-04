@include('template/header')

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
    <div class="col-md-5">
           <?php 
                $data["user_address"] = $user_address;
           ?>
           <?php echo view("cart/user_address",$data) ?>
           
           <h3> Choose Coureer </h3>
           <br>
           <div class="form-group">
                <label> Coureer </label>
                <select name="coureer" class="form-control">
                    <option value=""> -- Select Courer -- </option>
                    <option value="jne"> JNE </option> 
                    <option value="tiki"> TIKI </option>
                    <option value="pos"> POS </option>  
                    <option value="pcp"> PCP </option>
                    <option value="rpx"> RPX </option>
                    <option value="esl"> ESL </option>
                </select>
           </div>

           <div class="form-group">
                <label> Type of Delivery </label>
                <select class="form-control">
                    <option> -- Type of delivery -- </option>
                </select>
           </div>
    </div>
    <div class="col-md-7 table-responsive">
        <h3> Products </h3>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                   
                    <th style="width: 210px;">Product name</th>
                    <th style="width: 210px;">Price</th>
                    <th style="width: 100px;">Quantity</th>
                
                    <th style="width: 150px;">Weight</th>
                    
                    <th style="width: 70px;">Subtotal</th>
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
                    <td></td>
                    <td></td>
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

        <code>
            <?=Cart::total()?>
        </code>
    </div>    
    
</div>

<div class="clear"></div>

<div class="empty-space col-sm-b35"></div>

@include('template/footer')