
<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 
if(isset($_GET['edit_product'])){
	$edit_id = $_GET['edit_product'];
	$get_pro = "SELECT * FROM products WHERE product_id='$edit_id'";
	$run_edit = mysqli_query($con,$get_pro);
	$row_edit = mysqli_fetch_array($run_edit);
	$p_id = $row_edit['product_id'];
	$p_cat_id = $row_edit['p_cat_id'];
	$cat_id = $row_edit['cat_id'];
	$date = $row_edit['date'];
	$p_title = $row_edit['product_title'];
	$p_img1 = $row_edit['product_img1'];
	$p_img2 = $row_edit['product_img2'];
	$p_sale = $row_edit['product_sale'];
	$p_label = $row_edit['product_label'];
	$p_price = $row_edit['product_price'];
	$p_keywords = $row_edit['product_keywords'];
	$p_desc = $row_edit['product_desc'];

}

$get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id='$p_cat_id'";
$run_p_cat = mysqli_query($con,$get_p_cat);
$row_p_cat= mysqli_fetch_array($run_p_cat);
$p_cat_title = $row_p_cat['p_cat_title'];

$get_cat = "SELECT * FROM categories WHERE cat_id='$cat_id'";
$run_cat = mysqli_query($con,$get_cat);
$row_cat= mysqli_fetch_array($run_cat);
$cat_title = $row_cat['cat_title'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Insert Product</title>
  
  
</head>
  <body>
<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / Edit Product
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->
<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i>Edit Product
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body begin---------->
				<form method="post" class="form-horizontal" enctype="multipart/form-data"><!---------form begin---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Product Title</label>
						<div class="col-md-6">
							<input type="text" name="product_title" class="form-control" value="
							<?php echo $p_title;?>">
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Product Category</label>
						<div class="col-md-6">
							<select name="product_cat" class="form-control" >
								<option disabled value="Select Product Category">Select Product Category</option>
								<option value="<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></option>
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
								<option disabled value="Select Category">Select Category</option>
								<option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
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
							<input type="file" name="product_img1" class="form-control" >
							<br>
							<img src="product_images/<?php echo $p_img1; ?>" alt="<?php echo $p_title; ?>" width="80" height="80">
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Product Image 2</label>
						<div class="col-md-6">
							<input type="file" name="product_img2" class="form-control">
							<br>
							<img src="product_images/<?php echo $p_img2; ?>" alt="<?php echo $p_title; ?>" width="80" height="80">
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Price</label>
						<div class="col-md-6">
							<input type="text" name="product_price" class="form-control" value="
							<?php echo $p_price;?>">
						</div>
					</div><!---------form-group end---------->
					
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Product Label</label>
						<div class="col-md-6">
							<input type="text" name="product_label" class="form-control" value="
							<?php echo $p_label;?>">
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Sale Price</label>
						<div class="col-md-6">
							<input type="text" name="product_sale" class="form-control" value="
							<?php echo $p_sale;?>">
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Product Keywords</label>
						<div class="col-md-6">
							<input type="text" name="product_keywords" class="form-control" value="
							<?php echo $p_keywords;?>">
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Product Description</label>
						<div class="col-md-6">
							<textarea  name="product_desc" cols="19" rows="6" class="form-control" ><?php echo $p_desc;?></textarea>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input type="submit" name="update" value="Update Product" class="btn btn-primary form-control">
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
if(isset($_POST['update'])){

$product_cat = $_POST['product_cat'];
$cat = $_POST['cat'];
$product_title = $_POST['product_title'];
$product_price =$_POST['product_price'];
$product_sale =$_POST['product_sale'];
$product_label =$_POST['product_label'];
$product_keywords =$_POST['product_keywords'];
$product_desc =$_POST['product_desc'];
if(is_uploaded_file($_FILES['file']['tmp_name'])){
$product_img1 = $_FILES['product_img1']['name'];
$product_img2 = $_FILES['product_img2']['name'];
$temp_name1 = $_FILES['product_img1']['tmp_name'];
$temp_name2 = $_FILES['product_img2']['tmp_name'];

move_uploaded_file($temp_name1, "product_images/$product_img1");
move_uploaded_file($temp_name2, "product_images/$product_img2");

$update_pro = "UPDATE products SET p_cat_id='$product_cat', cat_id='$cat',date=NOW(),product_title='$product_title',product_img1='$product_img1',product_img2='$product_img2',product_price='$product_price',product_label='$product_label',product_sale='$product_sale',product_keywords='$product_keywords',product_desc='$product_desc'WHERE product_id='$p_id'";
$run_update = mysqli_query($con,$update_pro);
if($run_update){
	echo "<script>alert('Product updated sucessfully')</script>";
	echo "<script>window.open('index.php?view_products','_SELF')</script>";
}
}else{
$update_pro = "UPDATE products SET p_cat_id='$product_cat', cat_id='$cat',date=NOW(),product_title='$product_title',product_price='$product_price',product_label='$product_label',product_sale='$product_sale',product_keywords='$product_keywords',product_desc='$product_desc' WHERE product_id='$p_id'";
$run_update = mysqli_query($con,$update_pro);
if($run_update){
	echo "<script>alert('Product updated sucessfully')</script>";
	echo "<script>window.open('index.php?view_products','_SELF')</script>";
}
}


}
?>
<?php } ?>