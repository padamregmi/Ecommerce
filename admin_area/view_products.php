<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<div class="row"><!----row begin-------->
	<div class="col-lg-12"><!----col-lg-12 begin-------->
		<ol class="breadcrumb"><!----breadcrumb begin-------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / View Products
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
				 		<i class="fa fa-tags"></i>View Products
				 	</h3>
				 </div><!----panel-title end-------->
			</div><!----panel-heading end-------->
			<div class="panel-body"><!----panel-body begin-------->
				<div class="table-responsive"><!----table-responsive begin-------->
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>Product ID:</th>
								<th>Product Title:</th>
								<th>Product Image:</th>
								<th>Product Price:</th>
								<th>Sale Price:</th>
								<th>Product Label:</th>
								<th>Product Sold:</th>
								<th>Product keywords:</th>
								<th>Product Description:</th>
								<th>Product Date:</th>
								<th>Product Delete:</th>
								<th>Product Edit:</th>
							</tr>
						</thead>
						<tbody>
							<?php 
									$i=0;
									$get_pro = "SELECT * FROM products";
									$run_pro = mysqli_query($con,$get_pro);
									while($row_pro=mysqli_fetch_array($run_pro)){
										$product_id = $row_pro['product_id'];
										$product_title = $row_pro['product_title'];
										$product_img1 = $row_pro['product_img1'];
										$product_price = $row_pro['product_price'];
										$product_sale = $row_pro['product_sale'];
										$product_label = $row_pro['product_label'];
										$product_keywords = $row_pro['product_keywords'];
										$product_desc = $row_pro['product_desc'];
										$product_date = $row_pro['date'];
										$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $product_title; ?></td>
								<td><img src="product_images/<?php echo  $product_img1;?>" width="60" height="60"></td>
								<td><?php echo $product_price; ?></td>
								<td><?php echo $product_sale; ?></td>
								<td><?php echo $product_label; ?></td>
								<td>
									<?php 
									$get_sold = "SELECT * FROM pending_orders where product_id='$product_id'";
									$run_sold = mysqli_query($con,$get_sold);
									$row_sold = mysqli_fetch_array($run_sold);
									$count_sold = $row_sold['qty'];
									if($count_sold){
										echo $count_sold;
									}else{
										echo 0;
									}
									
									?>
								</td>
								<td><?php echo $product_keywords; ?></td>
								<td><?php echo $product_desc; ?></td>
								<td><?php echo $product_date; ?></td>
								<td>
									<a href="index.php?delete_product=<?php echo $product_id; ?>">
										<i class="fa fa-trash-o"></i>Delete
									</a>
								</td>
								<td>
									<a href="index.php?edit_product=<?php echo $product_id; ?>">
										<i class="fa fa-pencil"></i>Edit
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