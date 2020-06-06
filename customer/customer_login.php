<div class="box"><!--------box begin--------------->
	<div class="box-header"><!--------box-header begin--------------->
		<center><!--------center begin--------------->
			<h1>Login</h1>
			<p class="lead">Already have our Account..?</p>
			<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</center><!--------center end--------------->
	</div><!--------box-header end--------------->
	<form method="post" action="checkout.php"><!--------form-group begin--------------->
		<div class="form-group">
			<label>Email:</label>
			<input type="text" name="c_email" class="form-control" required>
		</div><!--------form-group end--------------->
		<div class="form-group"><!--------form-group begin--------------->
			<label>Passsword:</label>
			<input type="password" name="c_password" class="form-control" required>
		</div><!--------form-group end--------------->
		<div class="text-center"><!--------text-center begin--------------->
			<button name="login" value="Login" class="btn btn-primary">
				<i class="fa fa-sign-in"></i>Login
			</button>
		</div><!--------text-center end--------------->

	</form><!--------form end--------------->
	<center>
		<a href="customer_register.php">
			<h3>Don't have an account? Register here...</h3>
		</a>
	</center>
</div><!--------box end--------------->

<?php

if(isset($_POST['login'])){
	$customer_email = $_POST['c_email'];
	$customer_pass = $_POST['c_password'];
	$select_customer = "SELECT * FROM customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
	$run_customer = mysqli_query($con,$select_customer);
	$get_ip = getRealIpUser();
	$check_customer = mysqli_num_rows($run_customer);
	$select_cart = " SELECT * FROM cart where ip_add='$get_ip'";
	$run_cart = mysqli_query($con,$select_cart);
	$check_cart = mysqli_num_rows($run_cart);
		if($check_customer==0){
				echo "<script>alert('You email or password is wrong')</script>";
				exit();
		}
		if($check_customer==1 AND $check_cart==0){
				$_SESSION['customer_email']=$customer_email;
				echo "<script>alert('You are logged in')</script>";
              	echo "<script>window.open('customer/my_account.php?my_orders','_SELF')</script>";
		}else{
			$_SESSION['customer_email']=$customer_email;
			echo "<script>alert('You are logged in')</script>";
             echo "<script>window.open('checkout.php','_SELF')</script>";
		}
	
		}
 ?>
