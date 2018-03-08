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
                	<div class="alert alert-success" role="alert">
					 	<h1>selamat datang, <?=$user->name?></h1>
					</div>

					<ol class="breadcrumb">
				        <li>
			            	<a href="">
			            		Home
			            	</a>        
			            </li>
			            <li class="active">
			                 <a href="{{ url('memberarea') }}"> Member Area </a> 
			            </li>
				    </ol>
                </div>
                <div menuitemname="Client Details" class="panel panel-default">
                	<div class="panel-heading">
			            <h3 class="panel-title">
			                <i class="fa fa-cart-arrow-down"></i>&nbsp;Order History
                        </h3>
			        </div>

	                <table class="table table-hover">
						  <thead class="thead-dark">
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Date</th>
						      <th scope="col">Order ID</th>
						      <th scope="col">Payment Method</th>
						      <th scope="col">Total Price</th>
						      <th scope="col">Status</th>
						      <th scope="col">Detail</th>
						    </tr>
						  </thead>
						  <tbody>
                          	<?php
							foreach($order as $row)
							{
							?>
						    <tr>
						      <th scope="row">1</th>
						      <td><?=$row->created_at?></td>
						      <td><?=$row->order_id?></td>
						      <td>MidTrans</td>
						      <td>Rp. <?=number_format($row->grand_total)?></td>
						      <td>
						      	<span class="label label-success">Shipping</span>
						      	<span class="label label-warning">Paid</span>
						      	<span class="label label-default">Unpaid</span>
						      </td>
						      <td>
						      	<span class="label label-primary">
						      		<a href="{{url('detail_order/1')}}">
						      			Detail Order
						      		</a>
						      	</span>
						      </td>
						    </tr>
                            <?php
							}
							?>
						  </tbody>
					</table>	
    			</div>
    		</div>
		</div>
	</div>
    
@include('../template/footer')