<?php 

if(isset($_GET['delete_cart'])){
	$delete_cart_id = $_GET['delete_cart'];
	$delete = "DELETE FROM cart WHERE p_id='$delete_cart_id'";
	$run_delete_cart = mysqli_query($con,$delete);
	if($run_delete_cart){
		echo "<script>alert(' cart item is deleted sucessfully')</script>";
		echo "<script>window.open('cart.php','_self')</script>";
	}
}
?>