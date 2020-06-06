
<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / Insert Users
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->
<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i>Insert Users
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body begin---------->
				<form method="post"  class="form-horizontal" enctype="multipart/form-data"><!---------form begin---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Admin Name</label>
						<div class="col-md-6">
							<input type="text" name="admin_name" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Email</label>
						<div class="col-md-6">
							<input type="text" name="admin_email" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Password</label>
						<div class="col-md-6">
							<input type="password" name="admin_pass" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
				
				
					
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Image</label>
						<div class="col-md-6">
							<input type="file" name="admin_image" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Country</label>
						<div class="col-md-6">
							<input type="text" name="admin_country" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> About</label>
						<div class="col-md-6">
							<textarea  name="admin_about" rows="5" cols="30" class="form-control" required></textarea>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Contact</label>
						<div class="col-md-6">
							<input  type="text" name="admin_contact" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Job</label>
						<div class="col-md-6">
							<input  type="text" name="admin_job" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input type="submit" name="submit" value="Insert Admin" class="btn btn-primary form-control">
						</div>
					</div><!---------form-group end---------->
				</form><!---------form end---------->
			</div><!---------panel-body end---------->
		</div><!---------panel panel-default end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->


  
<?php 
if(isset($_POST['submit'])){
		$user_name = $_POST['admin_name'];
		$user_email = $_POST['admin_email'];
		$user_pass = $_POST['admin_pass'];
		$user_country = $_POST['admin_country'];
		$user_about = $_POST['admin_about'];
		$user_contact = $_POST['admin_contact'];
		$user_job = $_POST['admin_job'];

		$user_image = $_FILES['admin_image']['name'];
		$temp_name = $_FILES['admin_image']['tmp_name'];
		move_uploaded_file($temp_name, "admin_images/$user_image");

		$insert_user = "INSERT INTO admins(admin_name,admin_email,admin_pass,admin_image,admin_country,admin_about,admin_contact,admin_job)VALUES('$user_name','$user_email','$user_pass','$user_image','$user_country','$user_about','$user_contact','$user_job')";

		$run_user = mysqli_query($con,$insert_user);
		if($run_user){
			echo "<script>alert('A new user in Admin inserted sucessfully')</script>";
			echo "<script>window.open('index.php?view_users','_self')</script>";
		}
		}
?>
<?php } ?>