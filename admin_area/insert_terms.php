<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / Insert Terms
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i>Insert Terms
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body begin---------->
				<form method="post" action="" class="form-horizontal" enctype="multipart/form-data"><!-------form begin------>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Term Title</label>
						<div class="col-md-9">
							<input type="text" name="term_title" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Term Link</label>
						<div class="col-md-9">
							<input type="text" name="term_link" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3">Term Desc</label>
						<div class="col-md-9">
							<textarea rows="5" cols="18" name="term_desc" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-md-3"></label>
						<div class="col-md-9">
							<input type="submit" name="submit" value="Insert Term" class="form-control btn btn-primary">
						</div>
					</div>
				</form><!-------form end------>
			</div><!---------panel-body end---------->
		</div><!---------panel panel-default end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->
<?php 
if(isset($_POST['submit'])){
$term_title = $_POST['term_title'];
$term_link = $_POST['term_link'];
$term_desc = $_POST['term_desc'];

$insert_term = "INSERT INTO terms(term_title,term_link,term_desc)VALUES('$term_title','$term_link','$term_desc')";
$run_insert_term = mysqli_query($con,$insert_term);
if($run_insert_term){
	echo "<script>alert('New Term infromation is inserted sucessfully')</script>";
	echo "<script>window.open('index.php?view_terms','_self')</script>";
}
}



?>
<?php } ?>