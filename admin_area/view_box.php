<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / View Box
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->
<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-tags fa-fw"></i>View Box
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body begin---------->
				<div class="table-responsive"><!---------table-responsive begin---------->
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>Box ID: </th>
								<th>Box Title:</th>
								<th>Box Description:</th>
								<th>Delete Box:</th>
								<th>Edit Box:</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$i=0;
								$select_box = "SELECT * FROM boxes_section";
								$run_box = mysqli_query($con,$select_box);
								while($row_box = mysqli_fetch_array($run_box)){
									$box_id = $row_box['box_id'];
									$box_title = $row_box['box_title'];
									$box_desc = $row_box['box_desc'];
									$i++;

							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $box_title; ?></td>
								<td><?php echo $box_desc; ?></td>
								<td>
									<a href="index.php?delete_box=<?php echo $box_id; ?>">
										<i class="fa fa-trash-o"></i>Delete
									</a>
								</td>
								<td>
									<a href="index.php?edit_box=<?php echo $box_id; ?>">
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