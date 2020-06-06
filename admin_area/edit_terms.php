<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 
if(isset($_GET['edit_terms'])){
	$edit_term_id = $_GET['edit_terms'];
	$select_term = "SELECT * FROM terms WHERE term_id='$edit_term_id'";
	$run_term = mysqli_query($con,$select_term);
	$row_term = mysqli_fetch_array($run_term);
	$term_id = $row_term['term_id'];
	$term_title = $row_term['term_title'];
	$term_link = $row_term['term_link'];
	$term_desc = $row_term['term_desc'];
}
?>
<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / Edit Term
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-tags fa-fw"></i>Edit Term
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body end----------> 
				<form method="post" action="" class="form-horizontal" enctype="multipart/form-data"><!-------form begin------>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Term Title</label>
						<div class="col-md-9">
							<input type="text" name="term_title" value="<?php echo $term_title; ?>" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Term Link</label>
						<div class="col-md-9">
							<input type="text" name="term_link" value="<?php echo $term_link; ?>" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Term Desc</label>
						<div class="col-md-9">
							<textarea rows="5" cols="18" name="term_desc" class="form-control"><?php echo $term_desc; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3"></label>
						<div class="col-md-9">
							<input type="submit" name="update" value="Edit Term" class="form-control btn btn-primary">
						</div>
					</div>
				</form><!-------form end------>
			</div><!---------panel-body end---------->
		</div><!---------panel panel-default end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->
<?php 
if(isset($_POST['update'])){
	$term_title = $_POST['term_title'];
	$term_link = $_POST['term_link'];
	$term_desc = $_POST['term_desc'];
	$update_term = "UPDATE terms SET term_title='$term_title',term_link='$term_link',term_desc='$term_desc' WHERE term_id='$term_id'";
	$run_update_term = mysqli_query($con,$update_term);
	if($run_update_term){
		echo "<script>alert('Term updated sucessfully')</script>";
		echo "<script>window.open('index.php?view_terms','_SELF')</script>";
	}
}

?>

<?php } ?>