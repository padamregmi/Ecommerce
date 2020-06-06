<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 
if(isset($_GET['edit_p_cat'])){
	$edit_id = $_GET['edit_p_cat'];
	$select_p_cat = "SELECT * FROM product_categories WHERE p_cat_id='$edit_id'";
	$run_edit_p_cat = mysqli_query($con,$select_p_cat);
	$row_edit_p_cat = mysqli_fetch_array($run_edit_p_cat);
	$p_cat_id = $row_edit_p_cat['p_cat_id'];
	$p_cat_title = $row_edit_p_cat['p_cat_title'];
	$p_cat_desc = $row_edit_p_cat['p_cat_desc'];
}
?>
<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / Edit Product Category
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->


<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-tags fa-fw"></i>Edit Product Category
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body end----------> 
				<form method="post" action="" class="form-horizontal" enctype="multipart/form-data"><!-------form begin------>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Product Category Title</label>
						<div class="col-md-6">
							<input type="text" name="p_cat_title" class="form-control" value="<?php echo $p_cat_title; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Product Category Description</label>
						<div class="col-md-6">
							<textarea rows="5" cols="18" name="p_cat_desc" class="form-control"><?php echo $p_cat_desc; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3"></label>
						<div class="col-md-6">
							<input type="submit" name="submit" value="Edit Product Category" class="form-control btn btn-primary">
						</div>
					</div>
				</form><!-------form end------>
			</div><!---------panel-body end---------->
		</div><!---------panel panel-default end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->
<?php 
if(isset($_POST['submit'])){
	$p_cat_title = $_POST['p_cat_title'];
	$p_cat_desc = $_POST['p_cat_desc'];
	$update_p_cat = "UPDATE product_categories SET p_cat_title='$p_cat_title',p_cat_desc='$p_cat_desc' WHERE p_cat_id='$p_cat_id'";
	$run_update_p_cat = mysqli_query($con,$update_p_cat);
	if($run_update_p_cat){
		echo "<script>alert('Product Categories updated sucessfully')</script>";
		echo "<script>window.open('index.php?view_p_cats','_SELF')</script>";

}
}

?>
<?php 
}
?>