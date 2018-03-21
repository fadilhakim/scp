<div class="container"> 
    <br>
    <h3> Address Book </h3><br>
    <div id="temp-address-book"></div>
    <button id="address-book-add-btn" class="btn btn-primary pull-right"> Add Address Book </button> <br>
    <div class="clearfix">  </div><br>
    <ul class="list-group">
        <li class="list-group-item">Cras justo odio</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Morbi leo risus</li>
        <li class="list-group-item">Porta ac consectetur ac</li>
        <li class="list-group-item">Vestibulum at eros</li>
    </ul>
</div>

<script>
    $("#address-book-add-btn").click(function(){
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:"POST",
            url:"<?=url("account/address_book/add")?>",
            data:"_token="+_token,
            success:function(data)
            {
                $("#temp-address-book").html(data);
            }
        })
    })

</script>