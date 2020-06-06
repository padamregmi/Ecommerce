<center>
	<h1>Do you really want to delete your account?</h1>
	<form action="" method="post">
		<input type="submit" name="Yes" value="Yes, I want to delete." class="btn btn-danger">
		<input type="submit" name="No" value="No, I  don't want to delete." class="btn btn-danger">
	</form>
</center>
<?php
$c_email = $_SESSION['customer_email'];
if(isset($_POST['Yes'])){
$delete_customer = "DELETE FROM customers where customer_email='$c_email'";
$run_delete_customer = mysqli_query($con,$delete_customer);
if($run_delete_customer){
	session_destroy();
	echo "<script>alert('Your account has been deleted sucessfully.')</script>";
	echo "<script>window.open('../index.php','_SELF')</script>";
}
}
if(isset($_POST['No'])){
		echo "<script>alert('my_account.php?my_orders','_SELF')</script>";
}
 ?>

