<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 
if(isset($_GET['edit_cats'])){
	$edit_cat_id = $_GET['edit_cats'];
	$select_cat = "SELECT * FROM categories WHERE cat_id='$edit_cat_id'";
	$run_cat = mysqli_query($con,$select_cat);
	$row_cat = mysqli_fetch_array($run_cat);
	$cat_id = $row_cat['cat_id'];
	$cat_title = $row_cat['cat_title'];
	$cat_desc= $row_cat['cat_desc'];
}
?>
<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / Edit Category
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-tags fa-fw"></i>Edit Category
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body end----------> 
				<form method="post" action="" class="form-horizontal" enctype="multipart/form-data"><!-------form begin------>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Category Title</label>
						<div class="col-md-9">
							<input type="text" name="cat_title" class="form-control" value="<?php echo $cat_title; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Category Description</label>
						<div class="col-md-9">
							<textarea rows="5" cols="18" name="cat_desc" class="form-control"><?php echo $cat_desc; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3"></label>
						<div class="col-md-9">
							<input type="submit" name="submit" value="Edit Category" class="form-control btn btn-primary">
						</div>
					</div>
				</form><!-------form end------>
			</div><!---------panel-body end---------->
		</div><!---------panel panel-default end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->
<?php 
if(isset($_POST['submit'])){
	$cat_title = $_POST['cat_title'];
	$cat_desc = $_POST['cat_desc'];
	$update_cat = "UPDATE categories SET cat_title='$cat_title',cat_desc='$cat_desc' WHERE cat_id='$cat_id'";
	$run_update_cat = mysqli_query($con,$update_cat);
	if($run_update_cat){
		echo "<script>alert('Categories updated sucessfully')</script>";
	echo "<script>window.open('index.php?view_cats','_SELF')</script>";
	}
}


?>

<?php } ?>