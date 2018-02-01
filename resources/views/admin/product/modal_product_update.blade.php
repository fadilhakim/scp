<div id="modal_product_insert" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"> Product Insert </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-product-insert">
            <div class="modal-body">
                <div id="temp-product"></div>
                <div class="form-group">
                    <label> Product Title </label>
                    <input type="text" name="product_title" id="product_title" class="form-control" >
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label> Category</label>
                        <select name="category" class="form-control">
                            <option value="">-- Select Category--</option>
                            <?php if(!empty($category)){foreach($category as $row){ ?>
                            <option value="<?=$row->category_id?>"> <?=$row->category_name?></option>
                            <?php } } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label> Price </label>
                        <input type="number" name="price" class="form-control" id="price" >
                    </div> 

                    <div class="form-group col-md-4">
                        <label> Stock </label>
                        <input type="number" name="stock" id="stock" class="form-control">
                    </div>
                </div> 

                <div class="row">
                    <div class="form-group col-md-4">
                        <label> Subcategory </label>
                        <select name="subcategory" class="form-control">
                            <option value="">-- Select Subcategory--</option>
                            <?php if(!empty($subcategory)){foreach($subcategory as $row){ ?>
                                <option value="<?=$row->subcategory_id?>"><?=$row->subcategory_name?></option>
                            <?php }} ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label> Old Price </label> 
                        <input type="number" name="old_price" id="old_price" class="form-control">
                    </div>

                    <div class="form-group col-md-4"> 
                        <label> Weight </label>
                        <input type="number" name="weight" id="weight" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label> Product Description </label>
                    <textarea name="product_description" class="form-control"></textarea>
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
    $("#modal_product_insert").modal({
        show:true
    });

    $("form#form-product-insert").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/product/insert_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-product").html(data);
            }

        });
        return false;
    });
</script>