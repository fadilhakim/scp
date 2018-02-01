<div id="modal_product_insert" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"> Product Insert </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label> Product Title </label>
                    <input type="text" name="product_title" id="product_title" class="form-control" >
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label> Category</label>
                        <select name="category" class="form-control">
                            <option value="">-- Select Category--</option>
                            <?php if(!empty($category)){foreach($category as $row){ ?>
                            <option value="<?=$row->category_id?>"> <?=$row->category_name?></option>
                            <?php } } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label> Price </label>
                        <input type="integer" name="price" class="form-control" id="price" >
                    </div> 
                </div> 

                <div class="row">
                    <div class="form-group col-md-6">
                        <label> Subcategory </label>
                        <select name="subcategory" class="form-control">
                            <option value="">-- Select Subcategory--</option>
                            <?php if(!empty($subcategory)){foreach($subcategory as $row){ ?>
                                <option value="<?=$row->subcategory_id?>"><?=$row->subcategory_name?></option>
                            <?php }} ?>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label> Old Price </label> 
                        <input type="integer" name="old_price" id="old_price" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label> Product Description </label>
                    <textarea name="product_description" class="form-control"></textarea>
                </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $("#modal_product_insert").modal({
        show:true
    })
</script>