<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 

if(isset($_GET['delete_user'])){
	$delete_user_id = $_GET['delete_user'];
	$delete_user = "DELETE FROM admins WHERE admin_id='$delete_user_id'";
	$run_delete_user = mysqli_query($con,$delete_user);
	if($run_delete_user){
		echo "<script>alert('User is deleted sucessfully')</script>";
		echo "<script>window.open('index.php?view_users','_self')</script>";
	}
}
?>

<?php } ?>