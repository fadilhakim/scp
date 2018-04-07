
<script src="<?=asset("resources/assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js")?>" ></script>
<div id="modal_product_insert" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Insert New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <style>
                
            </style>
            <form id="form-product-insert">
            <div class="modal-body">
                <div id="temp-product"></div>
                <div class="form-group">
                    <label> Product Name : </label>
                    <input type="text" name="product_title" id="product_title" class="form-control" >
                </div>
               

                <div class="row"> 
                    <div class="form-group col-md-4">
                        <label>Category :</label>
                        <select name="category" class="form-control">
                            <option value="">-- Select Category--</option>
                            <?php if(!empty($category)){foreach($category as $row){ ?>
                            <option value="<?=$row->category_id?>"> <?=$row->category_name?></option>
                            <?php } } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label> Subcategory :</label>
                        <select name="subcategory" class="form-control">
                            <option value="">-- Select Subcategory--</option>
                            <?php if(!empty($subcategory)){foreach($subcategory as $row){ ?>
                                <option value="<?=$row->subcategory_id?>"><?=$row->subcategory_name?></option>
                            <?php }} ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label> Brand </label>
                        <select name="brand" class="form-control">
                            <option value="">-- Select Brand--</option>
                            <?php if(!empty($brand)){foreach($brand as $row){ ?>
                                <option value="<?=$row->brand_id?>"><?=$row->brand_name?></option>
                            <?php }} ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="form-group col-md-4">
                        <label> Product Availability :</label>
                        <select class="form-control" name="product_availability" id="product_availability">
                            <option value="Ready Stock"> Ready Stock </option>
                            <option value="Pre Order"> Pre Order </option>
                            <option value="Sales Stock"> Sales Stock </option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label> Product Price :</label>
                        <input type="number" name="price" class="form-control" id="price" >
                    </div> 

                    <div class="form-group col-md-4">
                        <label> Stock :</label>
                        <input type="number" name="stock" id="stock" class="form-control">
                    </div>
                </div> 

                <div class="form-group">
                    <label> Product Short Description </label>
                    <textarea id="editor1" name="product_description" class="form-control"></textarea>
                </div>
        
                <script>
                    CKEDITOR.replace( 'editor1' );                           
                </script>
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add Product</button>
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
            url:"{{ url('admin/product/insert_process') }}",
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