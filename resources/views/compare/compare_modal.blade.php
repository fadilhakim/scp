<div id="modal_compare" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white"> Compare Product </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-compare">
            <div class="modal-body">
                
                {{ csrf_field() }}
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"> Compare </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#modal_compare").modal({
        sshow:true,
        backdrop: 'static'
    });

    $("form#form-compare").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('compare/process') }}",
            data:$(this).serialize()
          
        });
     
    });
</script>