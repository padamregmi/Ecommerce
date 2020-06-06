<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / View Product Categories
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-tags fa-fw"></i>View Product Categories
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body begin---------->
				<div class="table-responsive"><!----table-responsive begin-------->
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>Product Category ID:</th>
								<th>Product Category Title:</th>
								<th>Product Category Desc:</th>
								<th>Edit Product Category:</th>
								<th>Delete Product Category:</th>	
							</tr>
						</thead>
						<tbody>
							<?php 
							$i=0;
							$select_p_cat = "SELECT * FROM product_categories";
							$run_p_cats = mysqli_query($con,$select_p_cat);
							while($row_p_cat = mysqli_fetch_array($run_p_cats)){
							$p_cat_id = $row_p_cat['p_cat_id'];
							$p_cat_title = $row_p_cat['p_cat_title'];
							$p_cat_desc = $row_p_cat['p_cat_desc'];
							$i++;
							
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $p_cat_title; ?></td>
								<td><?php echo $p_cat_desc; ?></td>
								<td>
									<a href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>">
										<i class="fa fa-trash-o"></i>Delete
									</a>
								</td>
								<td>
									<a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>">
										<i class="fa fa-pencil"></i>Edit
									</a>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div><!----table-responsive end-------->
			</div><!---------panel-body end---------->
		</div><!---------panel panel-default end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->



<?php } ?>