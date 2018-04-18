<script src="<?=asset("resources/assets/plugins/bootstrap-filestyle/src/bootstrap-filestyle.min.js")?>" ></script>
<div id="modal_slider_update" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> Slider Image Update </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-slider-update">
            <div class="modal-body">
                <div id="temp-slider"></div>
                <input type="hidden" id="slider" name="id" value="<?=$slider->id?>">
                <div class="form-group">
                    <label> Image Url</label>
                    <input name="url_image" class="form-control" placeholder="Image Url" type="text" value="<?=$slider->url_image?>" >
                </div>

                
                <div class="row">
                    <div class="col-md-3">
                        <input type="file" data-placeholder="<?=!empty($slider->image_name) ? $slider->image_name : ""?>" name="image_name" data-size="sm" class="filestyle" data-text="slider logo" data-btnClass="btn-primary">
                        <input type="hidden" name="old_image" value="<?= $slider->image_name ?>">
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
    $("#modal_slider_update").modal({
        show:true,
        backdrop: 'static'
    });

    $("form#form-slider-update").submit(function(){

        var formData = new FormData($(this)[0]);

        $.ajax({
            type:"POST",
            url:"{{ url('admin/slider/update_process') }}",
            //data:$(this).serialize(),
            data:formData,
            cache: false,
            processData: false,
            contentType	: false,
            success:function(data)
            {
                $("#temp-slider").html(data);
            }

        });
        return false;
    });
</script>