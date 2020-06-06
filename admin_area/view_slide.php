<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<ol class="breadcrumb"><!---------breadcrumb begin---------->
			<li class="active">
				<i class="fa fa-dashboard"></i>Dashboard / View Slides
			</li>
		</ol><!---------breadcrumb end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->

<div class="row"><!---------row begin---------->
	<div class="col-lg-12"><!---------col-lg-12 begin---------->
		<div class="panel panel-default"><!---------panel panel-default begin---------->
			<div class="panel-heading"><!---------panel-heading begin---------->
				<h3 class="panel-title">
					<i class="fa fa-tags fa-fw"></i>View Slides
				</h3>
			</div><!---------panel-heading end---------->
			<div class="panel-body"><!---------panel-body begin---------->
				<?php
						$get_slides = "SELECT * FROM slider";
						$run_slides = mysqli_query($con,$get_slides);
						while($row_slides=mysqli_fetch_array($run_slides)){
							$slide_id = $row_slides['slide_id'];
							$slide_name = $row_slides['slide_name'];
							$slide_image = $row_slides['slide_image'];
						
				 ?>
				 <div class="col-lg-3 col-md-3"><!---------col-lg-3 col-md-3 begin---------->
				 	<div class="panel panel-primary"><!---------panel panel-primary begin---------->
				 		<div class="panel-heading"><!---------panel-heading begin---------->
							<h3 class="panel-title" align="center">
							<?php echo $slide_name; ?>
							</h3>
						</div><!---------panel-heading end---------->
						<div class="panel-body"><!---------panel-body begin---------->
							<img src="slides_images/<?php echo $slide_image; ?>" alt="<?php echo $slide_title; ?>" class="img-responsive">
						</div><!---------panel-body end---------->
						<div class="panel-footer"><!---------panel-footer begin---------->
							<center>
								<a href="index.php?delete_slide=<?php echo $slide_id; ?>" class="pull-right">
									<i class="fa fa-trash-o"></i>Delete
								</a>
								<a href="index.php?edit_slide=<?php echo $slide_id; ?>" class="pull-left">
									<i class="fa fa-pencil"></i>Edit
								</a>
							</center>
						</div><!---------panel-footer end---------->
						<div class="clearfix"></div>
				 	</div><!---------panel panel-primary begin---------->
				 </div><!---------col-lg-3 col-md-3 begin---------->
				<?php } ?>
			</div><!---------panel-body end---------->
		</div><!---------panel panel-default end---------->
	</div><!---------col-lg-12 end---------->
</div><!---------row end---------->



<?php } ?>