<style>
#choose-address-list{

}

#choose-address-list .list-group-item input[type='radio']{
    /* margin:7px 0 0 -55px;*/
    width:10px;
}
</style>
<script>
    
    function add_user_address(user_id){
        
        var _token = $('meta[name="csrf-token"]').attr('content');
       
        $.ajax({
            type:"POST",
            url:"<?=url("account/address_book/add")?>",
            data:"user_id="+user_id+"&from=cart&_token="+_token,
            success:function(data){
                
                $("#cart-user-address-temp").html(data);
            }
        });

        return false;
    }

    function delete_user_address(user_addtr_id){
        
        var _token = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            type:"POST",
            url:"<?=url("account/address_book/delete")?>",
            data:"user_addtr_id="+user_addtr_id+"&from=cart&_token="+_token,
            success:function(data){
                $("#cart-user-address-temp").html(data);
            }
        });
    }

</script>
<div id="choose-address-list">
    <h4> Choose Address Book </h4><br>
    <button type="button" class="btn btn-primary" onclick="add_user_address()"> Add Address </button>
   
    <div id='cart-user-address-temp'></div>
    <br class='clearfix'>
    <?php  
        $total_weight = session("total_weight");
        if($total_weight === 0){
            $total_weight = 1;
        }
    ?>
    <ul class="list-group" style='overflow-y:scroll; height:200px'>
    <input type="hidden" id="weight" name="weight" value="<?=$total_weight?>"> <!-- total dari cart -->
    <input type="hidden" id="destination" name="destination" value=""> 
    <input type="hidden" id="origin" name="origin" value="154" > <!-- 154 / jakarta selatan --> 
        <?php
        //var_dump($user_address);
        foreach($user_address as $row){
            
            //$user_address_choose = $this->objUserAddress->last_address_book();
            
            $checked = "";
            if($row->user_addtr_id === $choose_address_book->user_addtr_id){
                //echo "<script> alert('ahoi')</script>";
                $checked = "checked=true";
            }
        ?>
        <li class="list-group-item">
            <div class="form-check" style="width:100%">
                <input class="form-check-input user-address-id" type="radio" 
                name="user_address" id="exampleRadios<?=$row->user_addtr_id?>" 
                value="<?=$row->user_addtr_id?>" 
                <?=$checked?> >
                
                <label  style="width:100%"  class="form-check-label" for="exampleRadios<?=$row->user_addtr_id?>">
                    <b class='float-left'> <?=$row->address_name?> </b> <a onclick='delete_user_address(<?=$row->user_addtr_id?>)' class='float-right'> Delete </a>
                    <div class='clearfix'></div>
                    <div> <?=$row->shipping_address?> </div>
                    <div>Kode Pos :  <?=$row->kode_pos?> - No.HP : <?=$row->no_hp?>   </div>
                </label>
            </div>
        </li>
        <?php
        }
        ?>
    </ul>
</div> 

<div class="empty-space col-sm-b35"></div>

<script> 

    var dest =  $("input[name='user_address']:checked").val();
    $("#destination").val(dest);

    $(".user-address-id").change(function(){
        
        var user_addtr_id = $(this).val();
        // alert(" user_addtr_id : "+user_addtr_id);
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:"POST",
            url:"<?=url("account/address_book/detail")?>",
            data:"user_addtr_id="+user_addtr_id+"&_token="+_token,
            dataType:"JSON",
            success:function(data){

                $("#destination").val(data.user_address.kota);
            }
        })
    })

</script>