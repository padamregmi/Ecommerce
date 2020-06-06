<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 

if(isset($_GET['delete_coupon'])){
	$delete_coupon_id = $_GET['delete_coupon'];
	$delete_coupon = "DELETE FROM coupons WHERE coupon_id='$delete_coupon_id'";
	$run_delete_coupon = mysqli_query($con,$delete_coupon);
	if($run_delete_coupon){
		echo "<script>alert(' Coupon is deleted sucessfully')</script>";
		echo "<script>window.open('index.php?view_coupons','_self')</script>";
	}
}
?>

<?php } ?>