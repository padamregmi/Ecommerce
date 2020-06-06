<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / Insert Slide
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i>Insert Slide
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body begin---------->
				<form method="post" action="" class="form-horizontal" enctype="multipart/form-data"><!-------form begin------>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Slide Name</label>
						<div class="col-md-9">
							<input type="text" name="slide_name" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Slide Url</label>
						<div class="col-md-9">
							<input type="text" name="slide_url" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Slide Image</label>
						<div class="col-md-9">
							<input type="file" name="slide_image" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3"></label>
						<div class="col-md-9">
							<input type="submit" name="submit" value="Insert Slide" class="form-control btn btn-primary">
						</div>
					</div>
				</form><!-------form end------>
			</div><!---------panel-body end---------->
		</div><!---------panel panel-default end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->
<?php 
if(isset($_POST['submit'])){
$slide_name = $_POST['slide_name'];
$slide_url = $_POST['slide_url'];
$slide_image = $_FILES['slide_image']['name'];
$temp_name1 = $_FILES['slide_image']['tmp_name'];
$view_slides = "SELECT * FROM slider";
$run_view_slide = mysqli_query($con,$view_slides);
$count_slide = mysqli_num_rows($run_view_slide);
if($count_slide<4){
move_uploaded_file($temp_name1, "slides_images/$slide_image");
$insert_slide = "INSERT INTO slider(slide_name,slide_url,slide_image)VALUES('$slide_name','$slide_url',
'$slide_image')";
$run_insert_slide = mysqli_query($con,$insert_slide);
	echo "<script>alert('Your new slide image inserted sucessfully')</script>";
	echo "<script>window.open('index.php?view_slide','_self')</script>";
}else{
	echo "<script>alert('Your have already 4 slides')</script>";
}
}


?>
<?php } ?>