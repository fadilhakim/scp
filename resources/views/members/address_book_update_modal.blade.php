<script> 
    function load_province()
    {
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type:"POST",
            url:"<?=url("rajaongkir/list_province")?>",
            dataType:"json",
            data:"_token="+token,
            success:function(data)
            {
               
                $('#provinsi').empty();
                $('#provinsi').append($('<option>').text("-- Select Province --"));
                $.each(data, function(i, obj){
                    $('#provinsi').append($('<option>').text(obj.province).attr('value', obj.province_id));
                });
            }
        })
    }

    function load_city_province()
    {

        var token = $('meta[name="csrf-token"]').attr('content');
        var id_province = $("#provinsi").val();

        $.ajax({
            type: "POST",
            url:"<?=url("rajaongkir/city_province")?>",
            dataType:"json",
            data:"_token="+token+"&id_province="+id_province,
            success:function(data)
            {
                $('#city').empty();
                $('#city').append($('<option>').text("-- Select City --"));
                $.each(data, function(i, obj){
                    $('#city').append($('<option>').text(obj.city_name).attr('value', obj.city_id));
                });
            }
        })
    }

</script>

<div id="update-address-book-modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white"> update Address Book </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-address-book-update" method="post" action="{{ url('account/address_book/update_process') }}">
                <input type="hidden" name="user_addtr_id" value="<?=$user_address->user_addtr_id?>" >
                <div class="modal-body">
                    <?php
                        $session =  Auth::guard("user")->user();
                        if(!empty($session))
                        {
                            $name_session = $session->name;
                            $userId = $session->id; 
                        }
                    ?>
                    <div id="ab-temp"></div>
                    <input type="hidden" name="user_id" value="<?php echo  $userId ?>">
                    <div class="form-group">
                        <label> Address Name </label>
                        <input type="text" name="address_name" id="address_name" class="form-control" value="<?=$user_address->address_name?>">
                    </div>
                    <div class="row"> 
                        <div class="col-md-6 form-group">
                            <label> Contact Person </label>
                            <input type="text" name="contact_person" id="contact_person" class="form-control" value="<?=$user_address->contact_person?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label> No Handphone </label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control" value="<?=$user_address->no_hp?>">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label> Province </label>
                            <select name="provinsi" id="provinsi" class="form-control">
                                <option> -- select province -- </option>
                               
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label> Kecamatan </label>
                            <input type="text" name="kecamatan" class="form form-control" value="<?=$user_address->kecamatan?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label> City </label>
                            <select name="city" id="city" class="form-control">
                                <option> -- Select City --</option>""
                                
                            </select>
                        </div>
                        <div class="col-md-6 form-group"> 
                            <label>Postal Code</label> 
                            <input type="text" name="kode_pos" class="form-control" value="<?=$user_address->kode_pos?>">

                        </div> 
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label> Shipping Address </label>
                            <textarea class="form-control" name="shipping_address"><?=$user_address->shipping_address?></textarea>
                        </div>
                        <div class="col-md-6 form-group">
                            <label> Billing Address </label>
                            <textarea class="form-control" name="billing_address"><?=$user_address->billing_address?></textarea>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit"> Update </button>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("#update-address-book-modal").modal({
        show:true
    });

    $(document).ready(function(){
        load_province();
        //alert(<?=$user_address->provinsi?>);
        setTimeout(function(){ 
            $("select#provinsi option[value=<?=$user_address->provinsi?>]").attr("selected","selected");
            load_city_province();
           
        }, 1000);
        
        setTimeout(() => {
            
            //alert(<?=$user_address->kota?>);
            console.log(<?=$user_address->kota?>)
            $("select#city option[value=<?=$user_address->kota?>]").attr("selected","selected");
        }, 1500);
       
        
    });

    $("#provinsi").change(function(){
        load_city_province();
    })

</script>

<script> 
    $("form#form-address-book-update").submit(function(e){

         var formData = new FormData($(this)[0]);
        //formData.append("_token","{{ csrf_token() }}");
        //alert($("#_token").val() +" = "+formData.get("_token"));

        $.ajax({
            type:"post",
            url:"{{ url('account/address_book/update_process') }}",
            //data:$(this).serialize(),
            data:formData,
            cache: false,
            processData: false,
            contentType	: false,
            success:function(data)
            {
                $("#ab-temp").html(data);
            },

        });
        return false;
    });

</script>