<div class="box">
	<?php 
	$session_email = $_SESSION['customer_email'];
	$select_customer = "SELECT * FROM customers where customer_email='$session_email'";
	$run_customer = mysqli_query($con,$select_customer);
	$row_customer = mysqli_fetch_array($run_customer);
	$customer_id = $row_customer['customer_id'];
	?>
	<h1 class="text-center">Payment options for you</h1>
	<p class="lead text-center">
		<a href="order.php?c_id=<?php echo $customer_id;?>">Offline Payment</a>
	</p>
	<center>
		<p class="lead">
			<a href="#">
				Paypal Payment
				<img src="images/paypal.png" class="img-responsive">
			</a>
		</p>
	</center>
</div>