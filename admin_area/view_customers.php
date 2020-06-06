<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<div class="row"><!----row begin-------->
	<div class="col-lg-12"><!----col-lg-12 begin-------->
		<ol class="breadcrumb"><!----breadcrumb begin-------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / View Customers
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
				 		<i class="fa fa-tags"></i>View Customers
				 	</h3>
				 </div><!----panel-title end-------->
			</div><!----panel-heading end-------->
			<div class="panel-body"><!----panel-body begin-------->
				<div class="table-responsive"><!----table-responsive begin-------->
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>No:</th>
								<th>Name:</th>
								<th>Image:</th>
								<th>Email:</th>
								<th>Country:</th>
								<th>City:</th>
								<th>Address:</th>
								<th>Contact:</th>
								<th>Delete:</th>
							</tr>
						</thead>
						<tbody>
							<?php 
									$i=0;
									$get_c = "SELECT * FROM customers";
									$run_c = mysqli_query($con,$get_c);
									while($row_c=mysqli_fetch_array($run_c)){
										$customer_id = $row_c['customer_id'];
										$customer_name = $row_c['customer_name'];
										$customer_email = $row_c['customer_email'];
										$customer_country = $row_c['customer_country'];
										$customer_city = $row_c['customer_city'];
										$customer_address = $row_c['customer_address'];
										$customer_contact = $row_c['customer_contact'];
										$customer_image = $row_c['customer_image'];
										

										$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $customer_name; ?></td>
								<td><img src="../customer/customer_images/<?php echo  $customer_image;?>" width="70" height="100"></td>
								<td><?php echo $customer_email; ?></td>
								<td><?php echo $customer_country; ?></td>
								<td><?php echo $customer_city; ?></td>
								<td><?php echo $customer_address; ?></td>
								<td><?php echo $customer_contact; ?></td>
								<td>
									<a href="index.php?delete_customer=<?php echo $customer_id; ?>">
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