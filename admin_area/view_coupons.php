<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<div class="row"><!----row begin-------->
	<div class="col-lg-12"><!----col-lg-12 begin-------->
		<ol class="breadcrumb"><!----breadcrumb begin-------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / View Coupons
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
				 		<i class="fa fa-tags"></i>View Coupons
				 	</h3>
				 </div><!----panel-title end-------->
			</div><!----panel-heading end-------->
			<div class="panel-body"><!----panel-body begin-------->
				<div class="table-responsive"><!----table-responsive begin-------->
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>Coupon No:</th>
								<th>Product for Coupon:</th>
								<th>Coupon Title:</th>
								<th>Coupon Price:</th>
								<th>Coupon Code:</th>
								<th>Coupon Limit:</th>
								<th>Coupon Used:</th>
								<th>Edit Coupon:</th>
								<th>Delete Coupon:</th>
							</tr>
						</thead>
						<tbody>
							<?php 
									$i=0;
									$get_coupons = "SELECT * FROM coupons";
									$run_coupons = mysqli_query($con,$get_coupons);
									while($row_coupons=mysqli_fetch_array($run_coupons)){
										$coupon_id = $row_coupons['coupon_id'];
										$product_id = $row_coupons['product_id'];
										$coupon_title = $row_coupons['coupon_title'];
										$coupon_price = $row_coupons['coupon_price'];
										$coupon_code = $row_coupons['coupon_code'];
										$coupon_limit = $row_coupons['coupon_limit'];
										$coupon_used = $row_coupons['coupon_used'];
										
										$get_pro = "SELECT * FROM products WHERE product_id='$product_id'";
										$run_pro =mysqli_query($con,$get_pro);
										$row_pro = mysqli_fetch_array($run_pro);
										$product_title = $row_pro['product_title'];

										$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $product_title; ?></td>
								<td><?php echo $coupon_title; ?></td>
								<td><?php echo $coupon_price; ?></td>
								<td><?php echo $coupon_code; ?></td>
								<td><?php echo $coupon_limit; ?></td>
								<td><?php echo $coupon_used; ?></td>
								<td>
									<a href="index.php?edit_coupon=<?php echo $coupon_id; ?>">
										<i class="fa fa-trash-o"></i>Edit
									</a>
								</td>
								<td>
									<a href="index.php?delete_coupon=<?php echo $coupon_id; ?>">
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