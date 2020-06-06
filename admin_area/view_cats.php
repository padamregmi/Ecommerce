<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / View Categories
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->
<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-tags fa-fw"></i>View Categories
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body begin---------->
				<div class="table-responsive"><!---------table-responsive begin---------->
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>Category ID: </th>
								<th>Category Title:</th>
								<th>Category Desc:</th>
								<th>Delete Category:</th>
								<th>Edit Category:</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$i=0;
								$select_cat = "SELECT * FROM categories";
								$run_cat = mysqli_query($con,$select_cat);
								while($row_cat = mysqli_fetch_array($run_cat)){
									$cat_id = $row_cat['cat_id'];
									$cat_title = $row_cat['cat_title'];
									$cat_desc = $row_cat['cat_desc'];
									$i++;

							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $cat_title; ?></td>
								<td><?php echo $cat_desc; ?></td>
								<td>
									<a href="index.php?delete_cats=<?php echo $cat_id; ?>">
										<i class="fa fa-trash-o"></i>Delete
									</a>
								</td>
								<td>
									<a href="index.php?edit_cats=<?php echo $cat_id; ?>">
										<i class="fa fa-pencil"></i>Edit
									</a>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div><!---------table-responsive end---------->
			</div><!---------panel-body end---------->
		</div><!---------panel panel-default end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->

<?php } ?>