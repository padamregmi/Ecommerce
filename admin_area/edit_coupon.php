<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 
if(isset($_GET['edit_coupon'])){
	$edit_coupon_id = $_GET['edit_coupon'];
	$select_coupon = "SELECT * FROM coupons WHERE coupon_id='$edit_coupon_id'";
	$run_coupon = mysqli_query($con,$select_coupon);
	$row_coupon = mysqli_fetch_array($run_coupon);
	$coupon_title = $row_coupon['coupon_title'];
	$coupon_product_id= $row_coupon['product_id'];
	$coupon_price = $row_coupon['coupon_price'];
	$coupon_code = $row_coupon['coupon_code'];
	$coupon_limit = $row_coupon['coupon_limit'];
	$coupon_used = $row_coupon['coupon_used'];

	$get_product = "SELECT * FROM products where product_id='$coupon_product_id'";
	$run_product = mysqli_query($con,$get_product);
	$row_product = mysqli_fetch_array($run_product);
	$product_title = $row_product['product_title'];
}
?>
<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / Edit Coupon
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-tags fa-fw"></i>Edit Coupon
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body end----------> 
				<form method="post" class="form-horizontal" enctype="multipart/form-data"><!---------form begin---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Coupon Title</label>
						<div class="col-md-6">
							<input type="text" name="c_title" class="form-control" value="<?php echo $coupon_title; ?>" required >
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label">Select Product </label>
						<div class="col-md-6">
							<select name="p_id" class="form-control" >
								<option disabled value="Select Product">Select Product</option>
								<option value="<?php echo $coupon_product_id; ?>"><?php echo $product_title; ?></option>
								<?php 
								$get_p="SELECT * FROM products";
								$run_p=mysqli_query($con,$get_p );
								while($row_p=mysqli_fetch_array($run_p)){
									$p_id = $row_p['product_id'];
									$p_title = $row_p['product_title'];

									echo "
									<option value='$p_id'> $p_title </option>
									";
								}

								?>
							</select>
						</div>
					</div><!---------form-group end---------->
					
					
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label">Coupon Price</label>
						<div class="col-md-6">
							<input type="text" name="c_price" class="form-control" value="<?php echo $coupon_price; ?>" required>
						</div>
					</div><!---------form-group end---------->
					
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label">Coupon Limit</label>
						<div class="col-md-6">
							<input type="number" name="c_limit" class="form-control" value="<?php echo $coupon_limit; ?>" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label">Coupon Code</label>
						<div class="col-md-6">
							<input type="text" name="c_code" class="form-control" value="<?php echo $coupon_code; ?>" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input type="submit" name="submit" value="Edit Coupon" class="btn btn-primary form-control">
						</div>
					</div><!---------form-group end---------->
				</form><!---------form end---------->
			</div><!---------panel-body end---------->
		</div><!---------panel panel-default end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->
<?php 
if(isset($_POST['submit'])){
	$coupon_title = $row_coupon['c_title'];
	$coupon_product_id= $row_coupon['p_id'];
	$coupon_price = $row_coupon['c_price'];
	$coupon_limit = $row_coupon['c_limit'];
	$coupon_code = $row_coupon['c_code'];
	$coupon_used=0;
	$update_coupon = "UPDATE coupons SET product_id='$coupon_product_id',coupon_title='$coupon_title',coupon_price='$coupon_price',coupon_code='$coupon_code',coupon_limit='$coupon_limit',coupon_used='$coupon_used' WHERE coupon_id='$edit_coupon_id'";
	$run_update_coupon = mysqli_query($con,$update_coupon);
	if($run_update_coupon){
		echo "<script>alert('Coupon updated sucessfully')</script>";
	echo "<script>window.open('index.php?view_coupons','_SELF')</script>";
	}
}


?>

<?php } ?>