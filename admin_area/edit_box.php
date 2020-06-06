<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 
if(isset($_GET['edit_box'])){
	$edit_box_id = $_GET['edit_box'];
	$select_box = "SELECT * FROM boxes_section WHERE box_id='$edit_box_id'";
	$run_box = mysqli_query($con,$select_box);
	$row_box = mysqli_fetch_array($run_box);
	$box_id = $row_box['box_id'];
	$box_title = $row_box['box_title'];
	$box_desc = $row_box['box_desc'];
}
?>
<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / Edit Box
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-tags fa-fw"></i>Edit Box
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body end----------> 
				<form method="post" action="" class="form-horizontal" enctype="multipart/form-data"><!-------form begin------>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Box Title</label>
						<div class="col-md-9">
							<input type="text" name="box_title" value="<?php echo $box_title; ?>" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Box Desc</label>
						<div class="col-md-9">
							<textarea rows="5" cols="18" name="box_desc" class="form-control"><?php echo $box_desc; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3"></label>
						<div class="col-md-9">
							<input type="submit" name="update" value="Edit Box" class="form-control btn btn-primary">
						</div>
					</div>
				</form><!-------form end------>
			</div><!---------panel-body end---------->
		</div><!---------panel panel-default end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->
<?php 
if(isset($_POST['update'])){
	$box_title = $_POST['box_title'];
	$box_desc = $_POST['box_desc'];
	$update_box = "UPDATE boxes_section SET box_title='$box_title',box_desc='$box_desc' WHERE box_id='$box_id'";
	$run_update_box = mysqli_query($con,$update_box);
	if($run_update_box){
		echo "<script>alert('Box updated sucessfully')</script>";
		echo "<script>window.open('index.php?view_box','_SELF')</script>";
	}
}

?>

<?php } ?>