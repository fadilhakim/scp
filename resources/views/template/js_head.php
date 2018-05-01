<script>
    function showCompare(product_id)
    {
        var _token = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            url:"<?=url("compare/modal")?>",
            type:"POST",
            data:"_token="+_token+"&product_id="+product_id,
            success:function(data)
            {
                $(".generalTemp").html(data);
            }

        })
    }
</script>

<?php // INGA2, pakai generalTemp ?>