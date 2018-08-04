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
    <button class="btn btn-primary" onclick="add_user_address()"> Add Address </button>
   
    <div id='cart-user-address-temp'></div>
    <br class='clearfix'>
    <ul class="list-group" style='overflow-y:scroll; height:200px'>
        <?php
        //var_dump($user_address);
        foreach($user_address as $row){
        ?>
        <li class="list-group-item">
            <div class="form-check" style="width:100%">
                <input class="form-check-input" type="radio" name="user_address" id="exampleRadios<?=$row->user_addtr_id?>" value="<?=$row->user_addtr_id?>" checked>
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