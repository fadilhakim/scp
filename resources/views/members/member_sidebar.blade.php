<?php
    $user = Auth::guard("user")->user();
?>
<div class="col-md-3 pull-md-left sidebar">
	<div menuitemname="Client Details" class="panel panel-default">
		<div class="panel-heading">
            <h3 class="panel-title">
                <i class="fa fa-user"></i>&nbsp;Informasi Anda
            </h3>
        </div>

        <div class="panel-body">
            <p><strong><?=$user->name?>Your Shipping Address :</strong></p>
            <p></p>
        </div>

        <div class="panel-footer clearfix">
	        <a href="{{ url('memberarea/account') }}" class="btn btn-success btn-sm btn-block">
	        	<i class="fa fa-pencil"></i> Update
	    	</a>
        </div>
	</div>
</div>
<script> 
	
	
</script>