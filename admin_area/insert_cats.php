<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / Insert Categories
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i>Insert Categories
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body begin---------->
				<form method="post" action="" class="form-horizontal" enctype="multipart/form-data"><!-------form begin------>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Category Title</label>
						<div class="col-md-9">
							<input type="text" name="cat_title" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Category Description</label>
						<div class="col-md-9">
							<textarea rows="5" cols="18" name="cat_desc" class="form-control"></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label for="" class="control-label col-md-3"></label>
						<div class="col-md-9">
							<input type="submit" name="submit" value="Submit Category" class="form-control btn btn-primary">
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
	$insert_cat = "INSERT INTO categories(cat_title,cat_desc)VALUES('$cat_title','$cat_desc')";
	$run_cat = mysqli_query($con,$insert_cat);
	if($run_cat){
		echo "<script>alert('Categories inserted sucessfully')</script>";
		echo "<script>window.open('index.php?view_cats','_self')</script>";
	}

}
?>

<?php } ?>