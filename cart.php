<?php
$active='Cart';
include("includes/header.php");

?>
<div id="content"> <!----------content begin--------->
	<div class="container"><!----------container begin--------->
		<div class="col-md-12"><!----------col-md-12 begin--------->
			<ul class="breadcrumb">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					Cart
				</li>
			</ul>
		</div><!----------col-md-12 finsh--------->
		<div id="cart" class="col-md-9"><!----------col-md-9 begin--------->
			<div class="box"><!----------box begin--------->
				<form action="cart.php" method="post" enctype="multipart/form-data"><!----------form begin--------->
				<h3>Shopping Cart</h3>	
				<?php
						$ip_add = getRealIpUser();
						$select_cart = "SELECT * FROM cart where ip_add='$ip_add'";
						$run_cart = mysqli_query($db,$select_cart );
						$count = mysqli_num_rows($run_cart);
				 ?>
				<p class="text-muted"> You currently have <?php echo $count; ?> items(s) in your cart.</p>
				<div class="table-responsive"><!----------table-responsive begin--------->
					<table class="table"><!----------table begin--------->
						<thead>
							<tr>
								<th colspan="2">Product</th>
								<th>Quantity</th>
								<th>Unit Price</th>
								<th>Size</th>
								<th colspan="1">Delete</th>
								<th colspan="2">Sub-total</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$total=0;
							while($row_cart=mysqli_fetch_array($run_cart)){
								$pro_id = $row_cart['p_id'];
								$pro_size = $row_cart['size'];
								$pro_qty = $row_cart['qty'];
								$pro_price = $row_cart['p_price'];
								$sub_total =$pro_price*$pro_qty;
								$total += $sub_total;
								$get_product = "SELECT * FROM products where product_id='$pro_id'";
								$run_product = mysqli_query($db,$get_product);
								while($row_product=mysqli_fetch_array($run_product)){
									$pro_title = $row_product['product_title'];
									$pro_img1 = $row_product['product_img1'];

							?>
							<tr>
								<td>
									<img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Iphone X">
								</td>
								<td><a href="details.php?pro_id=<?php echo $pro_id; ?>"><?php echo $pro_title; ?></a></td>
								<td>
									<?php echo $pro_qty; ?>
										
									</td>
								<td>$<?php 
									echo $pro_price;
									?>
								</td>
								<td>
									<?php echo $pro_size; ?>
										
								</td>
								<td>
									<a href="cart.php?delete_cart=<?php echo $pro_id; ?>">
										<i class="fa fa-trash-o"></i>Delete
									</a>
									<?php 
             								 if(isset($_GET['delete_cart'])){
                  							include('delete_cart.php');
             							 }
   									?>
								</td>
								<td>
									$ <?php echo $sub_total; ?>
								</td>
							</tr>	
							<?php 
									}
								} 
							?>
						</tbody>
						
						<tfoot>
							<tr>
								<th colspan="6">Total</th>
								<th colspan="1">$ <?php echo $total;?></th>
							</tr>
						</tfoot>
					</table><!----------table finish--------->
					<form class="form-inline pull-right"><!----------form-inline pull-right begin--------->
						<div class="form-group col-md-4"><!----------form-group begin--------->
							<label>Coupon Code:</label>
							<input type="text" name="code" class="form-control"><br>
							<input type="submit" name="apply_coupon" value="Use Coupon" class="btn btn-primary">
						</div><!----------form-group finish--------->
					</form><!----------form-inline pull-right finish--------->
				</div><!----------table-responsive finish--------->
				<div class="box-footer"><!----------box-footer begin--------->
					<div class="pull-left"><!----------pull-left begin--------->
						<a href="shop.php" class="btn btn-primary">
							<i class="fa fa-chevron-left"></i>Continue Shopping
						</a>
					</div><!----------pull-left finish--------->
					<div class="pull-right"><!----------pull-left begin--------->
						<a href="checkout.php" class="btn btn-primary">
							Proceed Checkout<i class="fa fa-chevron-right"></i>
						</a>
					</div><!----------pull-left finish--------->
				</div><!----------box-footer finish--------->
				</form><!----------form finish--------->
				</div><!----------box finish--------->
				
				<?php 
				if(isset($_POST['apply_coupon'])){
					$code = $_POST['code'];
					if($code == ""){
						echo "<script>alert('Please Enter the code.')</script>";
					}else{
						$get_coupons = "SELECT * FROM coupons where coupon_code='$code'";
						$run_coupons = mysqli_query($con,$get_coupons);
						$check_coupons = mysqli_num_rows($run_coupons);
						if($check_coupons == "1"){
							$row_coupons = mysqli_fetch_array($run_coupons);
							$coupon_pro_id = $row_coupons['product_id'];
							$coupon_price = $row_coupons['coupon_price'];
							$coupon_limit = $row_coupons['coupon_limit'];
							$coupon_used = $row_coupons['coupon_used'];
							if($coupon_limit == $coupon_used){
								echo "<script>alert('Your Coupon already expired.')</script>";
							}else{
								$get_cart = "SELECT * FROM cart WHERE p_id='$coupon_pro_id' AND ip_add='$ip_add'";
								$run_cart=mysqli_query($con,$get_cart);
								$check_cart=mysqli_num_rows($run_cart);
								if($check_cart == "1"){
									$add_used = "UPDATE coupons SET coupon_used=coupon_used+1 WHERE coupon_code='$code'";
									$run_used =mysqli_query($con,$add_used);
									$update_cart = "UPDATE cart SET p_price='$coupon_price' WHERE p_id='$coupon_pro_id' AND ip_add='$ip_add'";
									$run_update_cart = mysqli_query($con,$update_cart);
									echo "<script>alert('Your Coupon Code has been applied.')</script>";
									echo "<script>window.open('cart.php','_SELF')</script>";
								}else{
									echo "<script>alert('Your Coupon didnot match with your product.')</script>";
								}
							}
						}else{
							echo "<script>alert('Your Coupon is not valid.')</script>";
						}
					}
				}
				?>
				
			<div class="recent_box"><!----------box1 begin--------->
			<div id="row same-height-row"><!----------same-height-row begin--------->
				<div class="col-md-3 col-sm-6"><!----------col-md-3 begin--------->
					<div class="box same-height headline"><!----------same-height headline begin--------->
						<h3 class="text-center">Product You May Like</h3>
					</div><!----------same-height headline finish--------->
				</div><!----------col-md-3 finish--------->

				<?php
				$get_products = "SELECT * FROM products order by rand() LIMIT 0,3";
				$run_products = mysqli_query($con,$get_products );
				while($row_products = mysqli_fetch_array($run_products )){
					$pro_id = $row_products['product_id'];
					$pro_title = $row_products['product_title'];
					$pro_price = $row_products['product_price'];
					$pro_img1 = $row_products['product_img1'];

				echo "
				<div class='col-md-3 col-sm-6 center-responsive'><!----------col-md-3 col-sm-6 center-responsive begin--------->
					<div class='product same-height'><!----------product same-height begin--------->
						<a href='details.php?pro_id=$pro_id'>
							<img src='admin_area/product_images/$pro_img1' alt='laptop-1' class='img-responsive'>
						</a>
						<div class='text'><!----------text begin--------->
							<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>

							<p class='price'>$ $pro_price</p>
						</div><!----------text begin--------->
					</div><!----------product same-height begin--------->
				</div><!----------col-md-3 col-sm-6 center-responsive finish--------->
						";
						}

				 ?>
			</div><!----------same-height-row finish--------->
		</div><!----------box1 finish --------->
		</div><!----------col-md-9 finish--------->
		<div class="col-md-3"><!----------col-md-3 begin--------->
			<div id="order-summary" class="box"><!----------box begin --------->
				<div class="box-header"><!----------box-header begin --------->
					<h3>Order Summary</h3>
				</div><!----------box-header finish --------->
				<p class="text-muted">
					Shipping and additional cost are added calculated based on the value you have entered.
				</p>
				<div class="table-responsive"><!----------table-responsive begin --------->
					<table class="table"><!----------table begin --------->
						<tbody>
							<tr>
								<td>Order All Sub-total</td>
								<th>$ <?php echo $total; ?></th>
							</tr>
							<tr>
								<td>Shipping and handling</td>
								<th>$0</th>
							</tr>
							<tr>
								<td>Tax</td>
								<th>$0</th>
							</tr>
							<tr class="total">
								<td>Total</td>
								<th>$ <?php echo $total; ?></th>
							</tr>
						</tbody>
					</table><!----------table finish --------->
				</div><!----------table-responsive finish --------->
			</div><!----------box finish --------->
		</div><!----------col-md-3 finish--------->
	</div><!----------container finish--------->
</div><!----------content finish--------->


<?php 
include("includes/footer.php");
?>
