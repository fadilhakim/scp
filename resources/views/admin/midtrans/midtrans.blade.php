
<div class="page-body">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                
                    <h5 class="col-md-10 pull-left"> Midtrans Setting </h5>
                  
                      
                    <span class="clearfix"></span>
                  
                </div>
                <div class="card-block table-border-style">
                  <div class="container">
                  <form id="form-update-midtrans-setting">
                    <br> 
                    <div class="tmp-midtrans"></div>
                    <br>
                    <input type="hidden" name="midtrans_id" value="{{ $midtrans->midtrans_id }}">
                    <div class="form-group">
                        <label> Production Server Key </label>
                        <input name="production_server_key" value="{{ $midtrans->production_server_key }}" class="form-control" id="production_server_key"> 
                    </div>
                    <div class="form-group">
                        <label> Production Client Key</label>
                        <input name="production_client_key" value="{{ $midtrans->production_server_key }}" class="form-control" id="production_cleint_key">
                    </div>
                    <div class="form-group">
                        <label> SandBox Server key </label>
                        <input type="text" name="sandbox_server_key" value="{{ $midtrans->sandbox_server_key }}" id="sandbox_server_key" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label>Sandbox Client Key </label>
                        <input type="text" name="sandbox_client_key" value="{{ $midtrans->sandbox_client_key }}" id="sandbox_client_key" class="form-control">
                    </div>
                    <div class="form-group">
                        <label> Production Javascript Link </label>
                        <input type="text" name="production_javascript_link" value="{{ $midtrans->production_javascript_link }}" id="production_javascript_link" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label>Sandbox Javascript Link</label>
                        <input type="text" name="sandbox_javascript_link" value="{{ $midtrans->sandbox_javascript_link }}" id="sandbox_javascript_link" class="form-control">
                    </div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Payment Method</label>
                        <input type="text" name="payment_method" value="{{ $midtrans->payment_method }}" id="payment_method" class="form-control">
                    </div>
                    <div class="form-group-inline">
                        <label for="active_production_version">
                            <Input type="checkbox" class="form-control" name="active_production_version">
                            Active Production version
                        </label>
                    </div>
                    <div class="form-group-inline">
                        <label for="active_midtrans">
                            <input type="checkbox" class="form-control" name="active_midtrans" id="active_midtrans">
                            Active Midtrans
                        </label> 
                    </div>
                    <input type="submit" class="btn btn-primary " value="Edit Setting">
                  </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#form-update-midtrans-setting").submit(function(){

        $.ajax({
            type:"POST",
            url:"<?=url("admin/midtrans_setting/update")?>",
            data:$("#form-update-midtrans-setting").serialize(),
            success:function(data)
            {
                $(".tmp-midtrans").html(data);
            }
        });

        return false;
    })

</script>