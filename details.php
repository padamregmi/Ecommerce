
<?php 
session_start();
include("includes/db.php");
include("functions/functions.php");
$active='Cart';
?>
<?php 
if(isset($_GET['pro_id'])){
      $product_id = $_GET['pro_id'];
      $get_product = "SELECT * FROM products where product_id='$product_id'";
      $run_product = mysqli_query($con,$get_product); 
      $row_product = mysqli_fetch_array($run_product);
      $p_cat_id  = $row_product['p_cat_id'];
      $pro_title = $row_product['product_title'];
      $pro_price = $row_product['product_price'];
      $pro_desc = $row_product['product_desc'];
      $pro_img1 = $row_product['product_img1'];
      $pro_img2 = $row_product['product_img2'];
      $pro_sale_price= $row_product['product_sale'];
      $pro_label = $row_product['product_label'];
      						if($pro_label==""){

								}else{
									$product_label ="
									<a href='#' class='label $pro_label'>
										<div class='theLabel'>$pro_label</div>
										<div class='labelBackground'></div>
									</a>
									";
								}
      $get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id='$p_cat_id'";
      $run_p_cat = mysqli_query($con,$get_p_cat);
      $row_p_cat = mysqli_fetch_array($run_p_cat);
      $p_cat_title = $row_p_cat['p_cat_title'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Technology trends</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
   <body>
      <div id="top">
        <div class="container">
          <div class="row">
               <div class="col-md-6 offer">
                 <a href="#" class="btn btn-success btn-sm">
                  <?php 
                    if(!isset($_SESSION['customer_email'])){
                      echo "Welcome: Guest";
                    }else{
                        echo "Welcome:". $_SESSION['customer_email'] ."";
                    }

                  ?>
                 </a>
                 <a href="checkout.php"><?php items(); ?> items In Your Cart | Total Price: <?php total_price(); ?></a>
               </div> 
               <!-----end offer-->
               
               <div class="col-md-6">
                 <ul class="menu">
                   <li>
                     <a href="customer_register.php">Register</a>
                   </li>
                   <li>
                     <a href="customer/my_account.php">My Account</a>
                   </li>
                   <li>
                     <a href="cart.php">Go To Cart</a>
                   </li>
                   <li>
                     <a href="checkout.php">
                      <?php 
                          if(!isset($_SESSION['customer_email'])){
                            echo "<a href='checkout.php'> Login </a>";
                          }else{
                              echo "<a href='logout.php'> Log Out </a>";
                          }

                      ?>
                     </a>
                   </li>
                 </ul>
               </div>
             </div>
        </div>
      </div>

<!--------------navbar--------->

<div id="navbar" class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a href="index.php" class="navbar-brand home">
        <img src="images/header/111.png" alt="trend logo" class="hidden-xs" >
        <img src="images/header/222.png" alt="trend mobile logo" class="visible-xs" >
      </a>

      <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
        <span class="sr-only">Toggle Navigation</span>
        <i class="fa fa-align-justify"></i>
      </button>

      <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
        <span class="sr-only">Toggle Search</span>
        <i class="fa fa-search"></i>
      </button>

    </div> <!--------------navbar-header finish--------->

    <div class="navbar-collapse collapse" id="navigation"><!--------------navbar-collase begin--------->
      <div class="padding-nav"><!-------------padding-nav begin-------->
        <ul class="nav navbar-nav left"><!---------------navbar-nav begin------>
          <li class="<?php if($active=='Home') echo "active"; ?>">
            <a href="index.php">Home</a>
          </li>
          <li class="<?php if($active=='Shop') echo "active"; ?>">
            <a href="shop.php">Shop</a>
          </li>
          <li class="<?php if($active=='Account') echo "active"; ?>">
            <?php
                if(!isset($_SESSION['customer_email'])){
                      echo "<a href='checkout.php'>My Account</a>";
                }else{
                      echo "<a href='customer/my_account.php?my_orders'>My Account</a>";
                }
             ?>
          </li>
          <li class="<?php if($active=='Cart') echo "active"; ?>">
            <a href="cart.php">Shopping Cart</a>
          </li>
          <li class="<?php if($active=='Contact') echo "active"; ?>">
            <a href="contact.php">Contact Us</a>
          </li>
        </ul><!---------------navbar-nav begin------>
      </div><!-------------padding-nav finish-------->

      <a href="cart.php" class="btn navbar-btn btn-primary right"><!-----btn navbar-btn btn-primary begin-------->
        <i class="fa fa-shopping-cart"></i>
        <span><?php items(); ?> Items In Your Cart</span>
      </a><!-----btn navbar-btn btn-primary finish-------->
      <div class="navbar-collapse collapse right"><!-------------navbar-collapse collapse right begin-------->
        <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
          <span class="sr-only">Toggle Search</span>
          <i class="fa fa-search"></i>
        </button>
      </div><!-------------navbar-collapse collapse right finish-------->
      <div class="collapse clearfix" id="search"><!-------------collapse clearfix begin-------->
        <form method="get" action="results.php" class="navbar-form"><!---------form begin-------->
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="user-query"  required>
            <span class="input-group-btn">
              <button type="submit" name="search" value="Search" class="btn btn-primary">
               <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form><!---------form begin-------->

      </div><!-------------collapse clearfix finish-------->
    </div><!--------------navbar-collase finish--------->
  </div><!--------------container finish--------->
</div><!--------------navbar finish--------->
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
				<li>
				<a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
				</li>
				<li>
					<?php echo $pro_title; ?>
				</li>
			</ul>
		</div><!----------col-md-12 finsh--------->
		
		<div class="col-md-12"><!----------col-md-9 begin--------->
			<div id="productMain" class="row"><!----------productMain begin--------->
				<div class="col-sm-6"><!----------col-sm-6 begin--------->
					<div id="mainImage"><!----------mainImage begin--------->
						<div class="carousel slide" id="myCarousel" data-ride="carousel"><!----carousel slide begin--------->
						      <ol class="carousel-indicators"><!------------carousel indicators begin--------->
						        <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
						        <li data-target="#myCarousel" data-slide-to="1"></li>
						        <li data-target="#myCarousel" data-slide-to="2"></li>
						        <li data-target="#myCarousel" data-slide-to="3"></li>
						      </ol><!------------carousel indicators finish--------->
				    <div class="carousel-inner"><!------------carousel-inner begin--------->
				     	<div class="item active">
					        <center><img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Slider Image 1"></center>
					   	</div>
					    <div class="item">
					        <center><img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="Slider Image 2"></center>
					    </div>
					 </div><!------------carousel-inner finish-------->
					    <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!---left carousel control begin------->
					      <span class="glyphicon glyphicon-chevron-left"></span>
					      <span class="sr-only">Previous</span>
					    </a><!---left carousel control finish------->
					    <a href="#myCarousel" class="right carousel-control" data-slide="next"><!--right control begin---------->
					      <span class="glyphicon glyphicon-chevron-right"></span>
					      <span class="sr-only">Next</span>
					    </a><!---right carousel control finish------->
					    </div><!--------------carousel slide finish--------->
					</div><!----------mainImage finish--------->
					<?php echo $product_label; ?>
				</div><!----------col-sm-6 finish--------->
					<div class="col-sm-6"><!----------col-sm-6 begin--------->
						<div class="box"><!----------box begin--------->
							<h1 class="text-center"><?php echo $pro_title; ?></h1>
							<?php add_cart(); ?>
							<form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post"> <!----------form begin--------->
								<div class="form-group"> <!----------form-group begin--------->
									<label for="" class="col-md-5 control-label">Product Quantity</label>
									<div class="col-md-7"><!----------col-sm-7 begin--------->
										<select class="form-control" id="" name="product_quantity">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
										</select>
									</div><!----------col-sm-7 finish--------->
								</div> <!----------form-group finish--------->
								<div class="form-group"><!----------form-group begin--------->
									<label class="col-md-5 control-label">Product Size</label>
									<div class="col-md-7"><!----------col-md-7 begin--------->
										<select name="product_size" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('One size must be selected')">
											<option disabled selected>Select a size </option>
											<option>Small</option>
											<option>Medium</option>
											<option>Large</option>
										</select>
									</div><!----------col-md-7 finish--------->
								</div><!----------form-group finish--------->
								<?php 
									if($pro_label=="sale"){
									echo "
									<p class='price'>
									PRICE: $ <del>$pro_price</del>
									/ SALE:$ $pro_sale_price
									</p>
									";
								}else{
									echo "
									<p class='price'>
									PRICE:$ $pro_price
									</p>
									";
								}
								 ?>
								<p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart">Add to cart</button></p>
							</form><!----------form finish--------->
						</div><!----------box finish--------->
						<div class="row" id="thumbs"><!----------row begin--------->
							<div class="col-xs-4"><!----------col-sx-4 begin--------->
								<a href="#" class="thumb">
									<img src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="product 1" class="img-responsive">
								</a>
							</div><!----------col-sx-4 finish--------->
							<div class="col-xs-4"><!----------col-sx-4 begin--------->
								<a href="#" class="thumb">
									<img src="admin_area/product_images/<?php echo $pro_img2; ?>" alt="product 2" class="img-responsive">
								</a>
							</div><!----------col-sx-4 finish--------->
						</div><!----------row finish--------->

					</div><!----------col-sm-6 finish--------->
			</div><!----------productMain finish--------->
			<div class="box" id="details"><!----------box begin--------->
					<h4>Product Details</h4>
					<p><?php echo $pro_desc; ?></p>
					<h4>Size</h4>
						<ul>
							<li>Small</li>
							<li>Medium</li>
							<li>Large</li>
						</ul>
						<hr>
			</div><!----------box finish--------->
			<div id="row same-height-row"><!----------same-height-row begin--------->
				<div class="col-md-3 col-sm-6"><!----------col-md-3 begin--------->
					<div class="box same-height headline"><!----------same-height headline begin--------->
						<h3 class="text-center">Product You May Like</h3>
					</div><!----------same-height headline finish--------->
				</div><!----------col-md-3 finish--------->
				<?php
					$get_products = "SELECT * FROM products order by rand()LIMIT 0,3";
					$run_products = mysqli_query($con,$get_products);
					while($row_products = mysqli_fetch_array($run_products)){
						$pro_id = $row_products['product_id'];
						$pro_title = $row_products['product_title'];
						$pro_img1 = $row_products['product_img1'];
						$pro_price = $row_products['product_price'];
						$pro_label = $row_products['product_label'];
						if($pro_label==""){

								}else{
									$product_label ="
									<a href='#' class='label $pro_label'>
										<div class='theLabel'>$pro_label</div>
										<div class='labelBackground'></div>
									</a>
									";
								}
						echo"
						 <div class='col-md-3 col-sm-6 center-responsive'>
							<div class='product same-height'>
								<a href='details.php?pro_id=$pro_id'>
									<img src='admin_area/product_images/$pro_img1' alt='laptop-1' class='img-responsive'>
								</a>
							<div class='text'>
								<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>

								<p class='price'>$ $pro_price</p>
							</div>
							</div>
							$product_label
						</div>
						";
					}

					 ?>
			</div><!----------same-height-row finish--------->


		</div><!----------col-md-9 finish--------->
	</div><!----------container finish--------->
</div> <!----------content finish--------->
<?php 
include("includes/footer.php");
?>