<div class="row"><!----row 1 begin---------->
	<div class="col-lg-12"><!----col-lg-12 begin---------->
		<h1 class="page-header">Dashboard</h1>
		<ol class="breadcrumb"><!----breadcrumb begin---------->
			<li class="active"><!----active begin---------->
				<i class="fa fa-dashboard"></i>Dashbaord
			</li><!----active end---------->
		</ol><!----breadcrumb end---------->
	</div><!----col-lg-12 end---------->
</div><!----row 1 end---------->

<div class="row"><!----row 2 begin---------->
	<div class="col-lg-3 col-md-6"><!----col-lg-3 col-md-6 begin---------->
		<div class="panel panel-primary"><!----panel begin---------->
			<div class="panel-heading"><!----panel-header begin---------->
				<div class="row"><!----panel-header row begin---------->
					<div class="col-xs-3"><!----col-xs-3 begin---------->
						<i class="fa fa-tasks fa-5x"></i>
					</div><!----col-xs-3 end---------->
					<div class="col-xs-9 text-right"><!----col-xs-9 begin---------->
						<div class="huge"><?php echo $count_products; ?></div>
						<div>Products</div>
					</div><!----col-xs-9 begin---------->
				</div><!----panel-header row begin---------->
			</div><!----panel-header end---------->
			<a href="index.php?view_products"><!-----a begin----->
				<div class="panel-footer"><!----panel-footer begin---------->
					<span class="pull-left">
						View Details
					</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div><!----panel-footer end---------->
			</a><!-----a end----->
		</div><!----panel end---------->
	</div><!----col-lg-3 col-md-6 end---------->

	<div class="col-lg-3 col-md-6"><!----col-lg-3 col-md-6 begin---------->
		<div class="panel panel-green"><!----panel begin---------->
			<div class="panel-heading"><!----panel-header begin---------->
				<div class="row"><!----panel-header row begin---------->
					<div class="col-xs-3"><!----col-xs-3 begin---------->
						<i class="fa fa-users fa-5x"></i>
					</div><!----col-xs-3 end---------->
					<div class="col-xs-9 text-right"><!----col-xs-9 begin---------->
						<div class="huge"><?php echo $count_customers; ?></div>
						<div>Customers</div>
					</div><!----col-xs-9 begin---------->
				</div><!----panel-header row begin---------->
			</div><!----panel-header end---------->
			<a href="index.php?view_customers"><!-----a begin----->
				<div class="panel-footer"><!----panel-footer begin---------->
					<span class="pull-left">
						View Details
					</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div><!----panel-footer end---------->
			</a><!-----a end----->
		</div><!----panel end---------->
	</div><!----col-lg-3 col-md-6 end---------->

	<div class="col-lg-3 col-md-6"><!----col-lg-3 col-md-6 begin---------->
		<div class="panel panel-orange"><!----panel begin---------->
			<div class="panel-heading"><!----panel-header begin---------->
				<div class="row"><!----panel-header row begin---------->
					<div class="col-xs-3"><!----col-xs-3 begin---------->
						<i class="fa fa-tags fa-5x"></i>
					</div><!----col-xs-3 end---------->
					<div class="col-xs-9 text-right"><!----col-xs-9 begin---------->
						<div class="huge"><?php echo  $count_p_cats; ?></div>
						<div>Product Categories</div>
					</div><!----col-xs-9 begin---------->
				</div><!----panel-header row begin---------->
			</div><!----panel-header end---------->
			<a href="index.php?view_p_cats"><!-----a begin----->
				<div class="panel-footer"><!----panel-footer begin---------->
					<span class="pull-left">
						View Details
					</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div><!----panel-footer end---------->
			</a><!-----a end----->
		</div><!----panel end---------->
	</div><!----col-lg-3 col-md-6 end---------->

	<div class="col-lg-3 col-md-6"><!----col-lg-3 col-md-6 begin---------->
		<div class="panel panel-red"><!----panel begin---------->
			<div class="panel-heading"><!----panel-header begin---------->
				<div class="row"><!----panel-header row begin---------->
					<div class="col-xs-3"><!----col-xs-3 begin---------->
						<i class="fa fa-shopping-cart fa-5x"></i>
					</div><!----col-xs-3 end---------->
					<div class="col-xs-9 text-right"><!----col-xs-9 begin---------->
						<div class="huge"><?php echo  $count_pending_orders; ?></div>
						<div>Orders</div>
					</div><!----col-xs-9 begin---------->
				</div><!----panel-header row begin---------->
			</div><!----panel-header end---------->
			<a href="index.php?view_orders"><!-----a begin----->
				<div class="panel-footer"><!----panel-footer begin---------->
					<span class="pull-left">
						View Details
					</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div><!----panel-footer end---------->
			</a><!-----a end----->
		</div><!----panel end---------->
	</div><!----col-lg-3 col-md-6 end---------->
</div><!----row 2 end---------->
<div class="row"><!----row 3 begin---------->
	<div class="col-lg-8"><!----col-lg-8 begin---------->
		<div class="panel panel-primary"><!----panel panel-primary begin---------->
			<div class="panel-heading"><!----panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> New Orders
				</h3>
			</div><!----panel-heading end---------->
			<div class="panel-body"><!----panel-body begin---------->
					<div class="table-responsive"><!----table-responsive begin---------->
						<table class="table table-hover table-striped  table-bordered"><!----table table-hover begin---------->
							<thead><!----thead begin---------->
								<tr>
									<th>Order No:</th>
									<th>Customer Email:</th>
									<th>Invoice No:</th>
									<th>Product ID:</th>
									<th>Product Qty:</th>
									<th>Product Colour:</th>
									<th>Status:</th>
								</tr>
							</thead><!----thead begin---------->
							<tbody><!----tbody begin---------->
								<?php 

									$i=0;
									$get_order = "SELECT * FROM pending_orders order by 1 DESC LIMIT 0,4";
									$run_order = mysqli_query($con,$get_order);
									while($row_order=mysqli_fetch_array($run_order)){
										$order_id = $row_order['order_id'];
										$customer_id = $row_order['customer_id'];
										$invoice_no = $row_order['invoice_no'];
										$product_id = $row_order['product_id'];
										$qty = $row_order['qty'];
										$colour = $row_order['colour'];
										$order_status = $row_order['order_status'];
										$i++;
								?>
								<tr>
									<td> <?php echo $order_id; ?> </td>
									<td> <?php
										$get_customer = "SELECT * FROM customers WHERE customer_id='$customer_id'";
										$run_customer = mysqli_query($con,$get_customer);
										$row_customer = mysqli_fetch_array($run_customer);
										$customer_email = $row_customer['customer_email'];
										echo $customer_email;
										?>
									</td>
									<td> <?php echo $invoice_no; ?> </td>
									<td> <?php echo $product_id; ?> </td>
									<td> <?php echo $qty; ?> </td>
									<td> <?php echo $colour; ?> </td>
									<td> 
										<?php 
										if($order_status=='pending'){
											echo $order_status='Pending';
										}else{
											echo $order_status='Complete';
										}

										?> 
									</td>
								</tr>
								<?php } ?>

							</tbody><!----tbody begin---------->
							
						</table><!----table table-hover end---------->
					</div><!----table-responsive end---------->
					<div class="text-right">
						<a href="index.php?view_orders">
							View All Orders<i class="fa fa-arrow-circle-right"></i>
						</a>
					</div>
			</div><!----panel-body end---------->
		</div><!----panel panel-primary end---------->
	</div><!----col-lg-8 end---------->
	<div class="col-lg-4"><!----col-lg-4 end---------->
		<div class="panel"><!----panel begin---------->
			<div class="panel-body"><!----panel-body begin---------->
				<div class="mb-md thumb-info"><!----mb-md thumb-info begin---------->
					<img src="admin_images/<?php echo $admin_image; ?>" alt="admin-thumb-info" class="rounded img-responsive">

					<div class="thumb-info-title">
						<span class="thumb-info-inner"><?php echo $admin_name; ?></span>
						<span class="thumb-info-type"><?php echo $admin_job; ?></span>
					</div>
				</div><!----mb-md thumb-info begin---------->
				<div class="mb-md"><!----mb-md begin---------->
					<div class="widget-content-expanded"><!----widget-content-expanded begin---------->
						<i class="fa fa-user"></i><span>Email:</span><?php echo $admin_email; ?><br/>
						<i class="fa fa-flag"></i><span>Country:</span><?php echo $admin_country; ?><br/>
						<i class="fa fa-phone"></i><span>Contact:</span><?php echo $admin_contact; ?><br/>
					</div><!----widget-content-expanded begin---------->
						<hr class="dotted short" style="margin:10px 0px 10px 0px;">
						<h5 class="text-muted">About Me</h3>
						<p>
							<?php echo $admin_about; ?>
						</p>
				</div><!----mb-md end---------->
			</div><!----panel-body end---------->
		</div><!----panel end---------->
	</div><!----col-lg-4 end---------->
</div><!----row 3 end---------->