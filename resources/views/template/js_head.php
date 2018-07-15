<script>
    function isCompareChecked(val,product_id)
    {
        if(val.checked === true)
        {
            showCompare(product_id)
            //alert("hello");
            //alert(val.checked);
        }
        else
        {
            deleteCompare(product_id)
            //alert(val.checked);
        }
    }

    function showCompare(product_id)
    {
        var _token = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            url:"<?=url("compare/modal")?>",
            type:"POST",
            data:"_token="+_token+"&product_id="+product_id,
            success:function(data)
            {
                $("#compareTemp").html(data);
            }

        })
    }

    function deleteCompare(product_id)
    {
        var _token = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            url:"<?=url("compare/deleteAjax")?>",
            type:"POST",
            data:"_token="+_token+"&product_id="+product_id,
            success:function(data)
            {
                $("#compareTemp").html(data);
            }

        })
    }
</script>

<?php // INGA2, pakai generalTemp ?>