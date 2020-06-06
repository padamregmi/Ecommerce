<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<div class="row"><!----row begin-------->
	<div class="col-lg-12"><!----col-lg-12 begin-------->
		<ol class="breadcrumb"><!----breadcrumb begin-------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / View Orders
			</li>
		</ol><!----breadcrumb end-------->
	</div><!----col-lg-12 end-------->
</div><!----row end-------->

<div class="row"><!----row begin-------->
	<div class="col-lg-12"><!----col-lg-12 begin-------->
		<div class="panel panel-default"><!----panel panel-default begin-------->
			<div class="panel-heading"><!----panel-heading begin-------->
				 <div class="panel-title"><!----panel-title begin-------->
				 	<h3>
				 		<i class="fa fa-tags"></i>View Orders
				 	</h3>
				 </div><!----panel-title end-------->
			</div><!----panel-heading end-------->
			<div class="panel-body"><!----panel-body begin-------->
				<div class="table-responsive"><!----table-responsive begin-------->
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>Order No:</th>
								<th>Customer Email:</th>
								<th>Invoice No:</th>
								<th>Product Name:</th>
								<th>Product Quantity:</th>
								<th>Product Color:</th>
								<th>Order Date:</th>
								<th>Total Price:</th>
								<th>Status:</th>
								<th>Delete:</th>
							</tr>
						</thead>
						<tbody>
							<?php 
									$i=0;
									$get_orders = "SELECT * FROM pending_orders";
									$run_orders = mysqli_query($con,$get_orders);
									while($row_orders=mysqli_fetch_array($run_orders)){
										$order_id = $row_orders['order_id'];
										$customer_id = $row_orders['customer_id'];
										$invoice_no = $row_orders['invoice_no'];
										$product_id = $row_orders['product_id'];
										$qty = $row_orders['qty'];
										$colour = $row_orders['colour'];
										$order_status = $row_orders['order_status'];

										
										$get_pro = "SELECT * FROM products WHERE product_id='$product_id'";
										$run_pro =mysqli_query($con,$get_pro);
										$row_pro = mysqli_fetch_array($run_pro);
										$product_title = $row_pro['product_title'];

										$get_cus = "SELECT * FROM customers WHERE customer_id='$customer_id'";
										$run_cus =mysqli_query($con,$get_cus);
										$row_cus = mysqli_fetch_array($run_cus);
										$customer_email = $row_cus['customer_email'];

										$get_cus_orders = "SELECT * FROM customer_orders WHERE order_id='$order_id'";
										$run_cus_orders =mysqli_query($con,$get_cus_orders);
										$row_cus_orders = mysqli_fetch_array($run_cus_orders);
										$due_amount = $row_cus_orders['due_amount'];
										$order_date = $row_cus_orders['order_date'];

										$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $customer_email; ?></td>
								<td><?php echo $invoice_no; ?></td>
								<td><?php echo $product_title; ?></td>
								<td><?php echo $qty; ?></td>
								<td><?php echo $colour; ?></td>
								<td><?php echo $order_date; ?></td>
								<td><?php echo $due_amount; ?></td>
								<td><?php echo $order_status; ?></td>
								<td>
									<a href="index.php?delete_order=<?php echo $order_id; ?>">
										<i class="fa fa-trash-o"></i>Delete
									</a>
								</td>
							</tr>

							<?php } ?>
						</tbody>
					</table>
				</div><!----table-responsive end-------->
			</div><!----panel-body end-------->
		</div><!----panel panel-default end-------->
	</div><!----col-lg-12 end-------->
</div><!----row end-------->
<?php } ?>