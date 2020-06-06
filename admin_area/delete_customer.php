<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 

if(isset($_GET['delete_customer'])){
	$delete_c_id = $_GET['delete_customer'];
	$delete_c = "DELETE FROM customers WHERE customer_id='$delete_c_id'";
	$run_delete_c = mysqli_query($con,$delete_c);
	if($run_delete_c){
		echo "<script>alert('Customer is deleted sucessfully')</script>";
		echo "<script>window.open('index.php?view_customers','_self')</script>";
	}
}
?>

<?php } ?>