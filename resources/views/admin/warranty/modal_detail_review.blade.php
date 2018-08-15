<script src="<?=asset("resources/assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js")?>" ></script>
<div id="modal_bank_update" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> Review Edit </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-bank-update">
            <div class="modal-body">
                <div id="temp-bank"></div>
                <input type="hidden" id="review" name="review_id" value="<?=$review->review_id?>">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6"> 
                            <label>Username</label>
                            <?php $getUserName2 = App\Models\User::detail_user($review->user_id) ?>
                            <input name="username" readonly class="form-control" placeholder="username" type="text" value="<?=$getUserName2->username ?>" >
                        </div>
                        <div class="col-md-6"> 
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <?php if($review->status == 1) { $title = 'SHOW' ?>
                                    <option selected value="<?php echo $review->status ?>"><?php echo $title ?></option>
                                <?php } else { $title = "HIDE" ?>
                                    <option selected value="<?php echo $review->status ?>"><?php echo $title ?></option>
                                <?php } ?>
                                <option value="1">Show</option>
                                <option value="0">Hide</option>
                            </select>
                        </div>
                    </div>
        
                </div>

    
                <div class="row">
                    <div class="col-md-6"> 
                        <label> Product Name</label>
                        <?php $getProductName2 = App\Models\Product::detail_product($review->product_id) ?>
                        
                        <input name="product_name" readonly class="form-control" placeholder="Product Name" type="text" value="<?= $getProductName2->product_title ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"> 
                        <label> Review Comment</label>
                        <textarea name="review_text" class="form-control"><?php echo $review->review_text ?></textarea>
                    </div>
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
    $("#modal_bank_update").modal({
        show:true,
        backdrop: 'static'
    });

    $("form#form-bank-update").submit(function(){

        var formData = new FormData($(this)[0]);

        $.ajax({
            type:"POST",
            url:"{{ url('admin/review/update_process') }}",
            //data:$(this).serialize(),
            data:formData,
            cache: false,
            processData: false,
            contentType	: false,
            success:function(data)
            {
                $("#temp-bank").html(data);
            }

        });
        return false;
    });
</script>