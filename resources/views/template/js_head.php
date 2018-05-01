<script>
    function showCompare()
    {
        var _token = $('meta[name="csrf-token"]').attr('content');
       
        $.ajax({
            url:"<?=url("compare/modal")?>",
            type:"POST",
            data:"_token="+_token,
            success:function(data)
            {
                $(".generalTemp").html(data);
            }

        })
    }
</script>

<?php // INGA2, pakai generalTemp ?>