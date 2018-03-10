@include('../template/header')
	<?php
		$user = Auth::guard("user")->user();
		$objProduct = new App\Models\Product();
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
										<i class="fa fa-cart-arrow-down"></i>&nbsp;Detail Order : #{{ Request::segment(2) }}
								</h3>
						</div>
						<div class="panel-body">

							<div class="col-md-5">
							 	<h5> Client Information </h5>
								lorem ipsum sit dolor amet 	lorem ipsum sit dolor amet 	lorem ipsum sit dolor amet 	lorem ipsum sit dolor amet

							</div>
							<div class="col-md-1">

							</div>
							<div class="col-md-5">
								<h5> Order Information </h5> 
								lorem ipsum sit dolor amet	lorem ipsum sit dolor amet	lorem ipsum sit dolor amet	lorem ipsum sit dolor amet	lorem ipsum sit dolor amet

							</div>
							<span class="clearfix"></span>
							<div class="empty-space col-xs-b15 col-sm-b30"></div>
							<table class="table table-bordered">
								<thead>
										<th> Description </th>
										<th> Quantity </th>
										<th> Price </th>
										<th> Total </th>
								</thead>
								<tbody>
								  	<?php
										foreach($order_detail as $row){
											
											$product_detail = $objProduct->detail_product($row->product_id);

										?>
										<tr>	
											<td> <?=$product_detail->product_title?> </td>
											<td> <?=number_format($row->qty)?> </td> 
											<td> Rp. <?=number_format($row->price)?> </td>
											<td> Rp. <?=number_format($row->sub_total)?> </td> 
										<tr>
										<?php
										}
										?>
								</tbody>
								<tfoot>
										<tr>	
											<td> &nbsp; </td>
											<td> &nbsp; </td> 
											<td> Subtotal </td>
											<td>Rp. {{ number_format($order->subtotal) }} </td> 
										<tr>
										<tr>	
											<td> &nbsp; </td>
											<td> &nbsp; </td> 
											<td> Tax </td>
											<td>Rp. {{ number_format($order->tax) }} </td> 
										<tr>
										<tr>	
											<td> &nbsp; </td>
											<td> &nbsp; </td> 
											<td> Grand Total </td>
											<td>Rp. {{ number_format($order->grand_total) }} </td> 
										<tr>

								</tfoot>

							</table>
							<center> <button class="btn btn-success"> Pay Now </button> </center>
						</div>
					</div>
			</div>
      </div>
		</div>
</div>
@include('../template/footer')
