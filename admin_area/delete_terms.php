<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<?php 
	if(isset($_GET['delete_terms'])){
		$delete_term_id = $_GET['delete_terms'];
		$delete_term = "DELETE FROM terms where term_id='$delete_term_id'";
		$run_delete_term = mysqli_query($con,$delete_term);
		if($run_delete_term){
			echo "<script>alert('Term is deleted sucessfully')</script>";
			echo "<script>window.open('index.php?view_terms','_self')</script>";
		}
	}
?>

<?php } ?>