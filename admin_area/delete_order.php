<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 

if(isset($_GET['delete_order'])){
	$delete_order_id = $_GET['delete_order'];
	$delete_order = "DELETE FROM pending_orders WHERE order_id='$delete_order_id'";
	$run_delete_order = mysqli_query($con,$delete_order);
	if($run_delete_order){
		echo "<script>alert(' Customer Order is deleted sucessfully')</script>";
		echo "<script>window.open('index.php?view_orders','_self')</script>";
	}
}
?>

<?php } ?>