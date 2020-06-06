<?php
$active='Shop';
include("includes/header.php");

?>

<div id="content"> <!----------content begin--------->
	<div class="container"><!----------container begin--------->
		<div class="col-md-12"><!----------col-md-12 begin--------->
			<ul class="breadcrumb">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					Shop
				</li>
			</ul>
		</div><!----------col-md-12 finsh--------->
		<div class="col-md-3"><!----------col-md-3 begin--------->
		
			<?php 
				include("includes/sidebar.php");
			?>
		</div><!----------col-md-3 finsh--------->
		<div class="col-md-9"><!----------col-md-9 begin--------->

			<?php 
			if(!isset($_GET['p_cat'])){
				if(!isset($_GET['cat'])){
			echo " 
			<div class='box'>
				<h1>Shop</h1>
				<p>
					You can find the best products that fulfill your requirements. You are guaranteed the best genuine products from a authorised showroom service.
				</p>
			</div>
			";
			}
			}
			?>
			<div class="row"><!----------box begin--------->
				<?php
				if(!isset($_GET['p_cat'])){
					if(!isset($_GET['cat'])){
						$per_page=6;
						if(isset($_GET['page'])){
							$page = $_GET['page'];
						}
						else{
							
							$page = 1;
						}
							$start_from = ($page-1) * $per_page;
							$get_products = "SELECT * FROM products order by 1 DESC LIMIT $start_from,$per_page ";
							$run_products = mysqli_query($db,$get_products);
							while($row_products = mysqli_fetch_array($run_products)){
								$pro_id = $row_products['product_id'];
								$pro_title = $row_products['product_title'];
								$pro_price = $row_products['product_price'];
								$pro_img1 = $row_products['product_img1'];
								$pro_label = $row_products['product_label'];
								$pro_sale_price= $row_products['product_sale'];
								if($pro_label=="sale"){
									$product_price="<del>$ $pro_price</del>";
									$pro_sale_price=" / $ $pro_sale_price";
								}else{
									$product_price="$ $pro_price";
									$pro_sale_price='';
								}
								if($pro_label==""){

								}else{
									$product_label ="
									<a href='#' class='label $pro_label'>
										<div class='theLabel'>$pro_label</div>
										<div class='labelBackground'></div>
									</a>
									";
								}
						echo "
									<div class='col-md-4 col-sm-6 center-responsive'>
										<div class='product'>
									        <a href='details.php?pro_id=$pro_id'>
									          <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
									        </a>
									        <div class='text'>
									          <h3>
									            <a href='details.php?pro_id=$pro_id'>
									              $pro_title
									            </a>
									          </h3>
									          <p class='price'>
									          		$product_price $pro_sale_price
									          </p>
									          <p class='buttons'>
									            <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
									            <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
									              <i class='fa fa-shopping-cart'>
									                Add to Cart
									              </i>
									            </a>
									          </p>
									        </div>
									        $product_label
									    </div>
									</div>
									
							";
			
		}
			
			?>
		</div><!----------row end--------->

				<center><!----------center begin--------->
					<ul class="pagination"><!----------ul begin--------->
						<?php
						$query = "SELECT * FROM products";
						$result = mysqli_query($con,$query);
						$total_records = mysqli_num_rows($result);
						$total_pages = ceil($total_records / $per_page);
						echo "
						<li>
							<a href='shop.php?page=1'>".'First Page'."</a>
						</li>
						";
						for($i=1; $i<=$total_pages; $i++){
							echo"
							<li>
								<a href='shop.php?page=".$i."'>".$i."</a>
							</li>
							";
					};
					echo "
						<li>
							<a href='shop.php?page=$total_pages'>".'Last Page'."</a>
						</li>
						";

						}
						}
						?>
					</ul><!----------ul finish--------->
				</center><!----------center finish--------->
				<div class="row">
				<?php 
				getpcatpro();
				getcatpro();
				?>
				</div>
		</div><!----------col-md-9 finish--------->
	</div><!----------container finish--------->
</div><!----------content finish--------->


<?php 
include("includes/footer.php");
?>

</body>
</html>