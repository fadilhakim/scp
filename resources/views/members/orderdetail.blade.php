@include('../template/header')
	<div class="container">
		<div class="empty-space col-xs-b15 col-sm-b30"></div>
		<div class="row">
			@include('../template/member_sidebar')
			<div class="col-md-9 pull-md-right">
                <div class="header-lined">
                	<div class="alert alert-success" role="alert">
					 	<h1>Selamat Datang, Muhammad Fadil Hakim</h1>
					</div>

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
                </div>
                <div menuitemname="Client Details" class="panel panel-default">
                	<div class="panel-heading">
			            <h3 class="panel-title">
			                <i class="fa fa-cart-arrow-down"></i>&nbsp;Detail Order : #912923
                        </h3>
			        </div>

                	<div class="container">
                		<div class="row" style="padding-top: 20px;">

						    <div class="form-group col-md-6">
						      <label for="inputEmail4" >Order ID</label>
						      <input readonly type="text" class="form-control" id="inputEmail4" value="#1939213" style="margin-top: 10px;">
						    </div>

						    <div class="form-group col-md-6">
						      <label for="inputPassword4">Date</label>
						      <input readonly type="text" class="form-control" id="inputPassword4" value="2018-02-27 14:05:56" style="margin-top: 10px;">
						    </div>

				  		</div>
                	</div>

                	<div class="container">
                		<div class="card" style="width: 18rem;">
						  <div class="card-body">
						    <h5 class="card-title">Shipping detail</h5>
						    <h6 class="card-subtitle mb-2 text-muted">Shipping Address :</h6>
						    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						    <a href="#" class="card-link">Card link</a>
						    <a href="#" class="card-link">Another link</a>
						  </div>
						</div>
                	</div>


    			</div>
    		</div>
		</div>
	</div>
@include('../template/footer')

