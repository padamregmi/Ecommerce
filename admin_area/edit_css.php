<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 
$file = "../css/style.css";
if(file_exists($file)){
$data = file_get_contents($file);
}

?>
<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / CSS Editor
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
					<h3 class="panel-title">
						<i class="fa fa-tags"></i>CSS Editor
					</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-heading begin---------->
				<form method="post" class="form-horizontal" action="">
					<div class="form-group"><!---------form-group begin---------->
						<div class="col-lg-12">
							<textarea name="newdata" rows="15" cols="30" class="form-control" id>
								<?php echo $data; ?>
							</textarea>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="control-label col-md-3"></label>
							<div class="col-md-6">
								<input type="submit" name="update" value="Update CSS" class="form-control btn btn-primary">
							</div>
					</div><!---------form-group end---------->
				</form>
			</div><!---------panel-heading end---------->
		</div><!---------panel panel-default end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->
<?php 

if(isset($_POST['update'])){
$newdata = $_POST['newdata'];
$handle = fopen($file, "w");
fwrite($handle,$newdata);
fclose($handle);
echo "<script>alert('Your CSS is updated sucessfully')</script>";
echo "<script>window.open('index.php?edit_css','_self')</script>";
}

?>
<?php } ?>