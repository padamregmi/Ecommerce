
<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / Insert Coupon
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i>Insert Coupon
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body begin---------->
				<form method="post" class="form-horizontal" enctype="multipart/form-data"><!---------form begin---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Coupon Title</label>
						<div class="col-md-6">
							<input type="text" name="coupon_title" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label">Select Product </label>
						<div class="col-md-6">
							<select name="product_id" class="form-control" >
								<option>Select Product</option>
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
							<input type="text" name="coupon_price" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label">Coupon Limit</label>
						<div class="col-md-6">
							<input type="number" name="coupon_limit" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label">Coupon Code</label>
						<div class="col-md-6">
							<input type="text" name="coupon_code" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input type="submit" name="submit" value="Insert Coupon" class="btn btn-primary form-control">
						</div>
					</div><!---------form-group end---------->
				</form><!---------form end---------->
			</div><!---------panel-body end---------->
		</div><!---------panel panel-default end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->


  </body>

</html>

<?php 
if(isset($_POST['submit'])){
$coupon_title = $_POST['coupon_title'];
$product_id = $_POST['product_id'];
$coupon_price = $_POST['coupon_price'];
$coupon_limit = $_POST['coupon_limit'];
$coupon_code = $_POST['coupon_code'];
$coupon_used=0;

$get_coupons = "SELECT * FROM coupons WHERE product_id='$product_id' OR coupon_code='$coupon_code'";
$run_coupons = mysqli_query($con,$get_coupons);
$check_coupons = mysqli_num_rows($run_coupons);
if($check_coupons==1){
		echo "<script>alert('Coupon code in the product already added.')</script>";
}else{

$insert_coupon = "INSERT INTO coupons(product_id,coupon_title,coupon_price,coupon_code,coupon_limit,coupon_used)VALUES('$product_id','$coupon_title','$coupon_price','$coupon_code','$coupon_limit','$coupon_used')";

$run_coupon = mysqli_query($con,$insert_coupon);
if($insert_coupon){
	echo "<script>alert('Coupon is inserted sucessfully')</script>";
	echo "<script>window.open('index.php?view_coupons','_self')</script>";
}
}
}
?>
<?php } ?>