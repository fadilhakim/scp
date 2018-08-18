<script src="<?=asset("resources/assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js")?>" ></script>
<div id="modal_bank_update" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> Warranty Edit </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-bank-update">
            <div class="modal-body">
                <div id="temp-bank"></div>
                <input type="hidden" id="warranty" name="id" value="<?=$warranty->id?>">
                <div class="form-group">

                    <div class="row">
                        <div class="col-md-6"> 
                            <label> Model Product</label>
                            
                            <input name="model" readonly class="form-control" placeholder="Model Product" type="text" value="{{$warranty->model}}">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6"> 
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <?php if($warranty->status == 'on progress') { $title = 'on progress' ?>
                                    <option selected value="<?php echo $warranty->status ?>"><?php echo $title ?></option>
                                <?php } else { $title = "finish" ?>
                                    <option selected value="<?php echo $warranty->status ?>"><?php echo $title ?></option>
                                <?php } ?>
                                <option value="on progress">On Progress</option>
                                <option value="finish">Finish</option>
                            </select>
                        </div>
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
            url:"{{ url('admin/warranty/update_process') }}",
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