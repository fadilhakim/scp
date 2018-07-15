
<?php $objUser = new App\Models\User(); ?>
<script>
    function calculate()
    {
        $.ajax({
            type:"POST",
            data:$("form#shipping-calculate-form").serialize(),
            url:"<?=url("admin/shipping/calculate")?>",
            success:function(data)
            {
                $("#shipping-calculate-temp").html(data);
            }
        });

        return false;
    }

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
                $('#province_origin').empty();
                $('#province_origin').append($('<option>').text("-- Select Province --"));

                $('#province_destination').empty();
                $('#province_destination').append($('<option>').text("-- Select Province --"));
                $.each(data, function(i, obj){
                    $('#province_origin').append($('<option>').text(obj.province).attr('value', obj.province_id));
                    $('#province_destination').append($('<option>').text(obj.province).attr('value', obj.province_id));
                });
            }
        })
    }

    function load_city_province(id_province,element)
    {

        var token = $('meta[name="csrf-token"]').attr('content');
        //var id_province = $("#provinsi").val();

        $.ajax({
            type: "POST",
            url:"<?=url("rajaongkir/city_province")?>",
            dataType:"json",
            data:"_token="+token+"&id_province="+id_province,
            success:function(data)
            {
                $(element).empty();
                $(element).append($('<option>').text("-- Select City --"));
                $.each(data, function(i, obj){
                    $(element).append($('<option>').text(obj.city_name).attr('value', obj.city_id));
                });
            }
        })
    }


</script>
<div class="page-body">
    <form id="shipping-calculate-form" method="post">
    <div class="row">
      
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                
                    <h5 class="col-md-10 pull-left"> Origin </h5>

                </div>
                <div class="card-block ">
                    
                    <div class="form-group">
                        <label> Province </label>
                        <select id="province_origin" name="province_origin" class="form-control">
                            <option value="">-- Select Province --</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label> City </label>
                        <select id="city_origin" name="city_origin" class="form-control">
                            <option value="">-- Select City --</option>
                        </select>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                
                    <h5 class="col-md-10 pull-left"> Destination </h5>

                </div>
                <div class="card-block">
                    <div class="form-group">
                        <label> Province </label>
                        <select id="province_destination" name="province_destination" class="form-control">
                            <option value="">-- Select Province --</option>
                        </select>
                    </div>
                    <div class="form-group">
                      
                        <label> City </label>
                        <select id="city_destination" name="city_destination" class="form-control">
                            <option value="">-- Select City --</option>
                        </select>
                       
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                
                    <h5 class="col-md-10 pull-left"> Service </h5>

                </div>
                <div class="card-block">
                   <div class="form-group">
                        <label>Courer</label>
                        <select name="courer" class="form-control">
                            <option value=""> -- Select Courer -- </option>
                            <option value="jne"> JNE </option> 
                            <option value="tiki"> TIKI </option>
                            <option value="pos"> POS </option>  
                            <option value="pcp"> PCP </option>
                            <option value="rpx"> RPX </option>
                            <option value="esl"> ESL </option>
                        </select> 
                   </div>
                   {{ csrf_field() }}
                   <div class="form-group">
                        <label> Weight in Gram </label>
                        <input value="" type="number" class="form-control" name="weight">
                   </div>
                   
                  
                </div>
                <div align="center" class="card-footer">
                    <button type="submit" class="btn btn-success"> Calculate Now </button>
                </div>
            </div>
        </div>
     
    </div>
    </form>
    <div class="row">
       
            <div id="shipping-calculate-temp"></div>
       
    </div>
</div>

<script>
    $(document).ready(function(){
        load_province();
    });

    $("#province_origin").change(function(){
        
        var id_province = $(this).val();
        load_city_province(id_province,"#city_origin")
    });

    $("#province_destination").change(function(){
        var id_province = $(this).val();
        load_city_province(id_province,"#city_destination")
    });

    $("form#shipping-calculate-form").submit(function(){
        calculate();

        return false;
    })

</script>