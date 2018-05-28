
<script src="<?=asset("resources/assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js")?>" ></script>
<div id="modal_slider_insert" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> Add New Market Place </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-slider-insert">
            <div class="modal-body">
                <div id="temp-slider"></div>
                <div class="form-group">
                    <label>Market Name</label>
                    <input name="market_name" class="form-control" placeholder="Market name" type="text">
                </div>
                <label>Market Logo</label>
                    <span class="clearfix"></span>
                <div class="row">
                    <div class="col-md-3">
                        <input type="file" data-placeholder="market logo" name="market_logo" data-size="sm" class="filestyle " data-text="Upload" data-btnClass="btn-primary">        
                    </div>
                    <div class="col-md-6">
                        <code>Please use image dimension for logo 35x35 pixel</code>
                    </div>
                </div>

                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


<script>
    $("#modal_slider_insert").modal({
        show:true,
        backdrop: 'static'
    });

    $("form#form-slider-insert").submit(function(e){
        
        var formData = new FormData($(this)[0]);
        //formData.append("_token","{{ csrf_token() }}");
        //alert($("#_token").val() +" = "+formData.get("_token"));

        $.ajax({
            type:"post",
            url:"{{ url('admin/marketplace/insert_process') }}",
            //data:$(this).serialize(),
            data:formData,
            cache: false,
            processData: false,
            contentType	: false,
            success:function(data)
            {
                $("#temp-slider").html(data);
            },

        });
        return false;
    });
</script>