<div id="modal_subcategory" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> SUbcategory </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
           
            <div class="modal-body">
                <div id="temp-subcategory"></div>
                <form id="form-subcategory-update">
                {{ csrf_field() }}
                </form>
                
            </div>
            
           
        </div>
    </div>
</div>
<script>
    $("#modal_subcategory").modal({
        show:true
    });

    $("form#form-subcategory").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/subcategory/add') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-subcategory").html(data);
            }

        });
        return false;
    });
</script>