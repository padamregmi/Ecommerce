

<h1 align="center"> Change Password</h1>
<form method="post" action="" enctype="multipart/form-data">
	<div class="form-group">
		<label>Old Password</label>
		<input type="password" name="old_pass" class="form-control" required="">
	</div>
	<div class="form-group">
		<label>New Password</label>
		<input type="password" name="new_pass" class="form-control" required="">
	</div>
	<div class="form-group">
		<label> Confirm New Password</label>
		<input type="password" name="new_pass_again" class="form-control" required="">
	</div>
	<div class="text-center">
		<button name="update" class="btn btn-primary">
			<i class="fa fa-user-md"></i>Change Password
		</button>
	</div>
</form>
<?php 
if(isset($_POST['update'])){
	$c_email = $_SESSION['customer_email'];
	$old_pass = $_POST['old_pass'];
	$new_pass = $_POST['new_pass'];
	$new_pass_again = $_POST['new_pass_again'];
	$select_old_pass = "SELECT * FROM customers WHERE customer_pass='$old_pass'";
	$run_old_pass = mysqli_query($con,$select_old_pass);
	$check_old_pass = mysqli_fetch_array($run_old_pass);
		if($check_old_pass==0){
			echo "<script>alert('Your old passsword is incorrect.Try again.')</script>";
			exit();
		}
		if($new_pass!=$new_pass_again){
			echo "<script>alert('Your new passsword didnot match.Try again.')</script>";
			exit();
		}
		$update_customer_pass = "UPDATE customers SET customer_pass='$new_pass' WHERE customer_email='$c_email'";
		$run_update = mysqli_query($con,$update_customer_pass);
		if($run_update){
			echo "<script>alert('Your passsword has changed sucessfully.')</script>";
			echo "<script>window.open('my_account.php?my_orders','_SELF')</script>";
		}


}

?>