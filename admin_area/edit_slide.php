<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 
if(isset($_GET['edit_slide'])){
	$edit_slide_id = $_GET['edit_slide'];
	$get_slide = "SELECT * FROM slider WHERE slide_id='$edit_slide_id'";
	$run_slide = mysqli_query($con,$get_slide);
	$row_slide = mysqli_fetch_array($run_slide);
	$slide_id = $row_slide['slide_id'];
	$slide_name = $row_slide['slide_name'];
	$slide_url = $row_slide['slide_url'];
	$slide_image = $row_slide['slide_image'];

}
?>

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / Edit Slide
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i>Edit Slide
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body begin---------->
				<form method="post" action="" class="form-horizontal" enctype="multipart/form-data"><!-------form begin------>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Slide Name</label>
						<div class="col-md-9">
							<input type="text" name="slide_name" class="form-control" value="<?php echo $slide_name; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Slide Url</label>
						<div class="col-md-9">
							<input type="text" name="slide_url" class="form-control" value="<?php echo $slide_url; ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Slide Image</label>
						<div class="col-md-9">
							<input type="file" name="slide_image" class="form-control">
							<br/>
							<img src="slides_images/<?php echo $slide_image ?>"  class="img-responsive">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3"></label>
						<div class="col-md-9">
							<input type="submit" name="submit" value="Edit	 Slide" class="form-control btn btn-primary">
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
move_uploaded_file($temp_name1, "slides_images/$slide_image");
$update_slide ="UPDATE slider SET slide_name='$slide_name',slide_url='$slide_url',slide_image='$slide_image' WHERE slide_id='$slide_id'";
$run_update_slide = mysqli_query($con,$update_slide);
if($run_update_slide){
	echo "<script>alert('Slider updated sucessfully')</script>";
	echo "<script>window.open('index.php?view_slide','_SELF')</script>";
}
}

?>
<?php } ?>