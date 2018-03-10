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
					<!-- <div class="header-lined">
						<div class="alert alert-success" role="alert">
						<h1>Selamat Datang, <?=$user->name?> </h1>
					</div> -->
		
					<ol class="breadcrumb">
						<li>
							<a href="">
								Home
							</a>        
						</li>
						<li>
							<a href="{{url('memberarea')}}">
								Member Area
							</a>  
						</li>
						<li class="active">
									Detail Order
						</li>
					</ol>
					<div menuitemname="Client Details" class="panel panel-default">
						<div class="panel-heading">
								<h3 class="panel-title">
										<i class="fa fa-cart-arrow-down"></i>&nbsp;Detail Order : #912923
								</h3>
						</div>
						<div class="panel-body">

							<div class="col-md-5">
								lorem ipsum sit dolor amet 	lorem ipsum sit dolor amet 	lorem ipsum sit dolor amet 	lorem ipsum sit dolor amet

							</div>
							<div class="col-md-1">

							</div>
							<div class="col-md-5">
								lorem ipsum sit dolor amet	lorem ipsum sit dolor amet	lorem ipsum sit dolor amet	lorem ipsum sit dolor amet	lorem ipsum sit dolor amet

							</div>
							<span class="clearfix"></span>
							<div class="empty-space col-xs-b15 col-sm-b30"></div>
							<table class="table table-bordered">
								<thead>
										<th> Description </th>
										<th> Quantity </th>
										<th> Amount </th>
										<th> Total </th>
								</thead>
								<tbody>
										<tr>	
											<td> &nbsp; </td>
											<td> &nbsp; </td> 
											<td> &nbsp; </td>
											<td> &nbsp; </td> 
										<tr>
								</tbody>
								<tfoot>
										<tr>	
											<td> &nbsp; </td>
											<td> &nbsp; </td> 
											<td> &nbsp; </td>
											<td> &nbsp; </td> 
										<tr>

								</tfoot>

							</table>

						</div>
					</div>
			</div>
      </div>
		</div>
</div>
@include('../template/footer')
