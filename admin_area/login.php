<?php 
session_start();
include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Technology Trends Admin Area</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="container"><!-------container begin----------------->
	<form action="" class="form-login" method="post"><!-------form begin----------------->
		<h2 class="form-login-heading">Admin Login</h2>
		<input type="text" name="admin_email" placeholder="Email Address" class="form-control" required>
		<input type="password" name="admin_pass" placeholder="Password" class="form-control" required>
		<button type="submit" name="admin_login" class="btn btn-lg btn-primary btn-block">
			Login
		</button>
	</form><!-------form end----------------->
</div><!-------container end----------------->

</body>
</html>	

<?php
if(isset($_POST['admin_login'])){
	$admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
	$admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
	$get_admin = "SELECT * FROM admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
	$run_admins = mysqli_query($con, $get_admin);
	$count = mysqli_num_rows($run_admins);
	if($count==1){
		$_SESSION['admin_email']=$admin_email;
		echo "<script>alert('Logged in. Welcome Back to your dashboard')</script>";
        echo "<script>window.open('index.php?dashboard','_SELF')</script>";
	}else{
		echo "<script>alert('Wrong Email and Password')</script>";
	}
}
 ?>
}


