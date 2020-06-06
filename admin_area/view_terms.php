<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / View Terms
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->
<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-tags fa-fw"></i>View Terms
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body begin---------->
				<div class="table-responsive"><!---------table-responsive begin---------->
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>Term ID: </th>
								<th>Term Title:</th>
								<th>Term Link:</th>
								<th>Term Description:</th>
								<th>Delete Term:</th>
								<th>Edit Term:</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$i=0;
								$select_term = "SELECT * FROM terms";
								$run_term = mysqli_query($con,$select_term);
								while($row_term = mysqli_fetch_array($run_term)){
									$term_id = $row_term['term_id'];
									$term_title = $row_term['term_title'];
									$term_link = $row_term['term_link'];
									$term_desc = $row_term['term_desc'];
									$i++;

							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $term_title; ?></td>
								<td><?php echo $term_link; ?></td>
								<td><?php echo $term_desc; ?></td>
								<td>
									<a href="index.php?delete_terms=<?php echo $term_id; ?>">
										<i class="fa fa-trash-o"></i>Delete
									</a>
								</td>
								<td>
									<a href="index.php?edit_terms=<?php echo $term_id; ?>">
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