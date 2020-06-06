
<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 
if(isset($_GET['edit_user'])){
	$edit_id = $_GET['edit_user'];
	$select_admin = "SELECT * FROM admins WHERE admin_id='$edit_id'";
	$run_select_admin = mysqli_query($con,$select_admin);
	$row_select_admin = mysqli_fetch_array($run_select_admin);
	$user_id  = $row_select_admin['admin_id'];
	$user_name = $row_select_admin['admin_name'];
	$user_email = $row_select_admin['admin_email'];
	$user_image = $row_select_admin['admin_image'];
	$user_pass = $row_select_admin['admin_pass'];
	$user_country = $row_select_admin['admin_country'];
	$user_about = $row_select_admin['admin_about'];
	$user_contact = $row_select_admin['admin_contact'];
	$user_job = $row_select_admin['admin_job'];
}
?>

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / Edit Users
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->
<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i>Edit Users
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body begin---------->
				<form method="post"  class="form-horizontal" enctype="multipart/form-data"><!---------form begin---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Admin Name</label>
						<div class="col-md-6">
							<input type="text" name="admin_name" value="<?php echo $user_name; ?>" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Email</label>
						<div class="col-md-6">
							<input type="text" name="admin_email" value="<?php echo $user_email; ?>" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Password</label>
						<div class="col-md-6">
							<input type="password" name="admin_pass" value="<?php echo $user_pass; ?>" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
				
				
					
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Image</label>
						<div class="col-md-6">
							<input type="file" name="admin_image" class="form-control" required>
							<img src="admin_images/<?php echo $user_image; ?>" width="60" height="60">
						</div>
					</div><!---------form-group end---------->
					
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Country</label>
						<div class="col-md-6">
							<input type="text" name="admin_country" value="<?php echo $user_country; ?>" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> About</label>
						<div class="col-md-6">
							<textarea  name="admin_about" rows="5" cols="30" class="form-control" required><?php echo $user_about; ?></textarea>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Contact</label>
						<div class="col-md-6">
							<input  type="text" name="admin_contact" value="<?php echo $user_contact; ?>" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"> Job</label>
						<div class="col-md-6">
							<input  type="text" name="admin_job" value="<?php echo $user_job; ?>" class="form-control" required>
						</div>
					</div><!---------form-group end---------->
					<div class="form-group"><!---------form-group begin---------->
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input type="submit" name="update" value="Edit Admin" class="btn btn-primary form-control">
						</div>
					</div><!---------form-group end---------->
				</form><!---------form end---------->
			</div><!---------panel-body end---------->
		</div><!---------panel panel-default end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->


  
<?php 
if(isset($_POST['update'])){
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

		$edit_user = "UPDATE admins SET admin_name='$user_name',admin_email='$user_email',admin_pass='$user_pass',admin_image='$user_image',admin_country='$user_country',admin_about='$user_about',admin_contact='$user_contact',admin_job='$user_job' WHERE admin_id='$user_id '"; 

		$run_edit_user = mysqli_query($con,$edit_user);
		if($run_edit_user){
			echo "<script>alert('A new user in Admin edited sucessfully')</script>";
			echo "<script>window.open('index.php?view_users','_self')</script>";
		}
		}
?>
<?php } ?>