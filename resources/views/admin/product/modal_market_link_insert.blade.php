
<script src="<?=asset("resources/assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js")?>" ></script>
<div id="modal_product_insert" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Insert Market Link Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <style>
                
            </style>
            <form id="form-product-insert">
            <div class="modal-body">
                <div id="temp-product"></div>
                <div>
                    <input type="hidden" name="product_id" value="<?php echo $product->product_id ?>" class="form-control" >
                </div>
                <div class="form-group">
                    <label> Select Market Place : </label>
                    <select name="market_place_id" id="" required class="form-control"> 
                        <?php 
                            foreach($market_place as $rowMarket){ ?>
                                <option value="<?php echo $rowMarket->id ?>"><?php echo $rowMarket->market_name ?></option>
                        <?php  } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label> Inser Link</label>
                    <input required type="text" name="market_link" class="form-control" >
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
    $("#modal_product_insert").modal({
        show:true,
        backdrop: 'static'
    });

    $("form#form-product-insert").submit(function(e){
        
        var formData = new FormData($(this)[0]);
        //formData.append("_token","{{ csrf_token() }}");
        //alert($("#_token").val() +" = "+formData.get("_token"));

        $.ajax({
            type:"post",
            url:"{{ url('admin/product/insert_market_link_process') }}",
            //data:$(this).serialize(),
            data:formData,
            cache: false,
            processData: false,
            contentType	: false,
            success:function(data)
            {
                $("#temp-product").html(data);
            },

        });
        return false;
    });
</script>