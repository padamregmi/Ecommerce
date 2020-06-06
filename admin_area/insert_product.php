
<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / Insert Product
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i>Insert Product
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body begin---------->
				<form method="post" class="form-horizontal" enctype="multipart/form-data"><!---------form begin---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Product Title</label>
						<div class="col-md-6">
							<input type="text" name="product_title" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Product Category</label>
						<div class="col-md-6">
							<select name="product_cat" class="form-control" >
								<option>Select a Category Product</option>
								<?php 
								$get_p_cat="SELECT * FROM product_categories";
								$run_p_cat=mysqli_query($con,$get_p_cat );
								while($row_p_cats=mysqli_fetch_array($run_p_cat)){
									$p_cat_id = $row_p_cats['p_cat_id'];
									$p_cat_title = $row_p_cats['p_cat_title'];

									echo "
									<option value='$p_cat_id'> $p_cat_title </option>
									";
								}

								?>
							</select>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Category</label>
						<div class="col-md-6">
							<select name="cat" class="form-control" >
								<option>Select a Category</option>
								<?php 
								$get_cat="SELECT * FROM categories";
								$run_cat=mysqli_query($con,$get_cat );
								while($row_p_cats=mysqli_fetch_array($run_cat)){
									$cat_id = $row_p_cats['cat_id'];
									$cat_title = $row_p_cats['cat_title'];

									echo "
									<option value='$cat_id'> $cat_title </option>
									";
								}

								?>
							</select>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Product Image 1</label>
						<div class="col-md-6">
							<input type="file" name="product_img1" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Product Image 2</label>
						<div class="col-md-6">
							<input type="file" name="product_img2" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Price</label>
						<div class="col-md-6">
							<input type="text" name="product_price" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label">Sale Price</label>
						<div class="col-md-6">
							<input type="text" name="product_sale" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label">Product Label</label>
						<div class="col-md-6">
							<input type="text" name="product_label" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Product Keywords</label>
						<div class="col-md-6">
							<input type="text" name="product_keywords" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Product Description</label>
						<div class="col-md-6">
							<textarea  name="product_desc" cols="19" rows="6" class="form-control"></textarea>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control">
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

$product_cat = $_POST['product_cat'];
$cat = $_POST['cat'];
$product_title = $_POST['product_title'];
$product_img1 = $_FILES['product_img1']['name'];
$product_img2 = $_FILES['product_img2']['name'];
$product_price =$_POST['product_price'];
$product_keywords =$_POST['product_keywords'];
$product_desc =$_POST['product_desc'];
$product_label =$_POST['product_label'];
$product_sale =$_POST['product_sale'];


$temp_name1 = $_FILES['product_img1']['tmp_name'];
$temp_name2 = $_FILES['product_img2']['tmp_name'];

move_uploaded_file($temp_name1, "product_images/$product_img1");
move_uploaded_file($temp_name2, "product_images/$product_img2");


$insert_product = "INSERT INTO products(p_cat_id,cat_id,date,product_title,product_img1,product_img2,product_price,product_keywords,product_desc,product_label,product_sale)VALUES('$product_cat','$cat',NOW(),'$product_title','$product_img1','$product_img2','$product_price','$product_keywords','$product_desc','$product_label','$product_sale')";

$run_product = mysqli_query($con,$insert_product);
if($insert_product){
	echo "<script>alert('Product inserted sucessfully')</script>";
	echo "<script>window.open('index.php?view_products','_self')</script>";
}
}
?>
<?php } ?>