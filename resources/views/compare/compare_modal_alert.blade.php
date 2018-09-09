<div id="compare-alert-modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white"> Compare Error </h5>
                
            </div>
            <div class="modal-body">
                <p> You Cannot Compare More the 3 products </p>
                <?php //print_r($data) ?>
            </div>
           
        </div>
    </div>
</div>
<script>
    $("#compare-alert-modal").modal({
        show:true
    });

    setTimeout(() => {
        
        location.reload(true);

    }, 3000);


</script>