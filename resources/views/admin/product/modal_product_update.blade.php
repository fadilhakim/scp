<div id="modal_product_update" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> Product update </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-product-update">
            <div class="modal-body">
                <div id="temp-product"></div>
                <div class="form-group">
                    <label> Product Title </label>
                    <input type="text" name="product_title" id="product_title" class="form-control" value="<?=$product->product_title?>" >
                </div>

                <div class="row"> 
                    <div class="form-group col-md-4">
                        <label> Category</label>
                        <select name="category" class="form-control">
                            <option value="">-- Select Category--</option>
                            <?php if(!empty($category)){foreach($category as $row){ 
                                if($product->product_category == $row->category_id){ $selected = "selected=selected"; }else{ $selected=""; }    
                            ?>
                            <option {{ $selected }} value="<?=$row->category_id?>"> <?=$row->category_name?></option>
                            <?php } } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label> Subcategory </label>
                        <select name="subcategory" class="form-control">
                            <option value="">-- Select Subcategory--</option>
                            <?php if(!empty($subcategory)){foreach($subcategory as $row){ 
                               if($product->product_subcategory == $row->category_id){ $selected = "selected=selected"; }else{ $selected=""; }    
                            ?>
                                <option {{ $selected }} value="<?=$row->subcategory_id?>"><?=$row->subcategory_name?></option>
                            <?php }} ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label> Brand </label>
                        <select name="brand" class="form-control">
                            <option value="">-- Select Brand--</option>
                            <?php if(!empty($brand)){foreach($brand as $row){ 
                                if($product->brand_id == $row->brand_id){ $selected = "selected=selected"; }else{ $selected=""; }
                            ?>
                                <option {{ $selected }} value="<?=$row->brand_id?>"><?=$row->brand_name?></option>
                            <?php }} ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="form-group col-md-4">
                        <label> Product Availability </label>
                        <select class="form-control" name="product_availability" id="product_availability">
                            <option value="Ready Stock"> Ready Stock </option>
                            <option value="Pre Order"> Pre Order </option>
                            <option value="Sales Stock"> Sales Stock </option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label> Price </label>
                        <input type="number" name="price" class="form-control" id="price" value="<?=$product->price?>" >
                    </div> 

                    <div class="form-group col-md-4">
                        <label> Stock </label>
                        <input type="number" name="stock" id="stock" class="form-control" value="<?=$product->stock?>">
                    </div>
                </div> 

                <div class="row">
                    <div class="form-group col-md-4">
                        <label> Status </label>
                        <br>
                        <label for="checkshow"> <input id="checkshow" type="radio" name="status" value="show" checked="true" > Show </label>
                        <label for="checkhidden"> <input id="checkhidden" type="radio" name="status" value="hidden" > Hidden </label>
                    </div>

                    <div class="form-group col-md-4">
                        <label> Old Price </label> 
                        <input type="number" name="old_price" id="old_price" class="form-control" value="<?=$product->old_price?>">
                    </div>

                    <div class="form-group col-md-4"> 
                        <label> Weight </label>
                        <input type="number" name="weight" id="weight" class="form-control" value="<?=$product->weight?>">
                    </div>
                </div>

                <div class="form-group">
                    <label> Product Description </label>
                    <textarea name="product_description" class="form-control"><?=$product->product_description?></textarea>
                </div>
                {{ csrf_field() }}
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#modal_product_update").modal({
        show:true
    });

    $("form#form-product-update").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/product/update_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-product").html(data);
            }

        });
        return false;
    });
</script>