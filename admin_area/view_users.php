<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<div class="row"><!----row begin-------->
	<div class="col-lg-12"><!----col-lg-12 begin-------->
		<ol class="breadcrumb"><!----breadcrumb begin-------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / View Users
			</li>
		</ol><!----breadcrumb end-------->
	</div><!----col-lg-12 end-------->
</div><!----row end-------->

<div class="row"><!----row begin-------->
	<div class="col-lg-12"><!----col-lg-12 begin-------->
		<div class="panel panel-default"><!----panel panel-default begin-------->
			<div class="panel-heading"><!----panel-heading begin-------->
				 <div class="panel-title"><!----panel-title begin-------->
				 	<h3>
				 		<i class="fa fa-tags"></i>View Users
				 	</h3>
				 </div><!----panel-title end-------->
			</div><!----panel-heading end-------->
			<div class="panel-body"><!----panel-body begin-------->
				<div class="table-responsive"><!----table-responsive begin-------->
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>No:</th>
								<th>User Name:</th>
								<th>User Image:</th>
								<th>User Email:</th>
								<th>User Country:</th>
								<th>User Contact:</th>
								<th>User Job:</th>
								<th>Edit User:</th>
								<th>Delete User:</th>
							</tr>
						</thead>
						<tbody>
							<?php 
									$i=0;
									$get_users = "SELECT * FROM admins";
									$run_users = mysqli_query($con,$get_users);
									while($row_users=mysqli_fetch_array($run_users)){
										$admin_id = $row_users['admin_id'];
										$admin_name = $row_users['admin_name'];
										$admin_image = $row_users['admin_image'];
										$admin_email = $row_users['admin_email'];
										$admin_country = $row_users['admin_country'];
										$admin_contact = $row_users['admin_contact'];
										$admin_job = $row_users['admin_job'];
										$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $admin_name; ?></td>
								<td>
									<img src="admin_images/<?php echo $admin_image; ?>" alt="<?php echo $admin_name; ?>" width="70" height="80">
								</td>
								<td><?php echo $admin_email; ?></td>
								<td><?php echo $admin_country; ?></td>
								<td><?php echo $admin_contact; ?></td>
								<td><?php echo $admin_job; ?></td>
								<td>
									<a href="index.php?edit_user=<?php echo $admin_id; ?>">
										<i class="fa fa-pencil"></i>Edit
									</a>
								</td>
								<td>
									<a href="index.php?delete_user=<?php echo $admin_id; ?>">
										<i class="fa fa-trash-o"></i>Delete
									</a>
								</td>
								
							</tr>

							<?php } ?>
						</tbody>
					</table>
				</div><!----table-responsive end-------->
			</div><!----panel-body end-------->
		</div><!----panel panel-default end-------->
	</div><!----col-lg-12 end-------->
</div><!----row end-------->
<?php } ?>