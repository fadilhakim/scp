@include('../template/header')
	<?php
		$user = Auth::guard("user")->user();
	?>
	<div class="container">
		<div class="empty-space col-xs-b15 col-sm-b30"></div>
		<div class="row">
			@include('members/member_sidebar') 
			<style type="text/css">
				.header-lined h1 {
					    font-weight: 400;
					    font-family: 'Raleway', sans-serif;
					    text-transform: uppercase;
				}
			</style>
			<div class="col-md-9 pull-md-right">
                <div class="header-lined">
                	

					<ol class="breadcrumb">
				        <li>
			            	<a href="">
			            		Home
			            	</a>        
			            </li>
			            <li class="">
			                 <a href="{{ url('memberarea') }}"> Member Area </a> 
			            </li>
                        <li class="active">
			                 <a href="{{ url('memberarea/profile') }}"> Profile </a>
			            </li>
				    </ol>
                </div>
                <div menuitemname="Client Details" class="panel panel-default">
                	<div class="panel-heading">
			            <h3 class="panel-title">
			                <i class="fa fa-cart-arrow-down"></i>&nbsp; Profile
                        </h3>
			        </div>

                    <div class="panel-body">
                        <div>
                        </div>
                    </div>

	               	
    			</div>
    		</div>
		</div>
	</div>
    
@include('../template/footer')