<div id="modal_review_delete" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> Delete review  </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-review-delete">
            <div class="modal-body">
                <div id="temp-review"></div>
                
                <p> Are Your Sure want to Delete this review ? </p>
                <input type="hidden" name="review_id" value="{{ $review->review_id }}">
                {{ csrf_field() }}
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary"> Delete </button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#modal_review_delete").modal({
        sshow:true,
        backdrop: 'static'
    });

    $("form#form-review-delete").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/review/delete_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-review").html(data);
            }

        });
        return false;
    });
</script>