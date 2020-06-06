<?php 
session_start();
include("includes/db.php");
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{

      $admin_session = $_SESSION['admin_email'];
      $get_admin = "SELECT * FROM admins where admin_email='$admin_session'";
      $run_admin = mysqli_query($con,$get_admin);
      $row_admin = mysqli_fetch_array($run_admin);
      $admin_id = $row_admin['admin_id'];
      $admin_name = $row_admin['admin_name'];
      $admin_email = $row_admin['admin_email'];
      $admin_image = $row_admin['admin_image'];
      $admin_country = $row_admin['admin_country'];
      $admin_about = $row_admin['admin_about'];
      $admin_contact = $row_admin['admin_contact'];
      $admin_job = $row_admin['admin_job'];





      $get_products = "SELECT * FROM products";
      $run_products = mysqli_query($con, $get_products);
      $count_products = mysqli_num_rows($run_products);
      $get_customers = "SELECT * FROM customers";
      $run_customers = mysqli_query($con, $get_customers);
      $count_customers = mysqli_num_rows($run_customers);
      $get_p_cats = "SELECT * FROM product_categories";
      $run_p_cats = mysqli_query($con, $get_p_cats);
      $count_p_cats = mysqli_num_rows($run_p_cats);
      $get_pending_orders = "SELECT * FROM pending_orders";
      $run_pending_orders = mysqli_query($con, $get_pending_orders);
      $count_pending_orders = mysqli_num_rows($run_pending_orders);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Technology Trends Admin Area</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
   <body>
   		<div id="wrapper"><!-------wrapper begin----------------->
   			<?php
   				include('includes/sidebar.php');
   			?>
   			<div id="page-wrapper"><!-------page-wrapper begin----------------->
   				<div class="container-fluid"><!-------container-fluid begin----------------->
   					<?php 
   						if(isset($_GET['dashboard'])){
   								include('dashboard.php');
   						}
              if(isset($_GET['insert_product'])){
                  include("insert_product.php");
              }
              if(isset($_GET['view_products'])){
                  include("view_products.php");
              }
              if(isset($_GET['delete_product'])){
                  include("delete_product.php");
              }
              if(isset($_GET['edit_product'])){
                  include("edit_product.php");
              }
              if(isset($_GET['insert_p_cats'])){
                  include("insert_p_cats.php");
              }
              if(isset($_GET['view_p_cats'])){
                  include("view_p_cats.php");
              }
              if(isset($_GET['delete_p_cat'])){
                  include("delete_p_cat.php");
              }
              if(isset($_GET['edit_p_cat'])){
                  include("edit_p_cat.php");
              }
               if(isset($_GET['insert_cats'])){
                  include("insert_cats.php");
              }
               if(isset($_GET['view_cats'])){
                  include("view_cats.php");
              }
              if(isset($_GET['delete_cats'])){
                  include("delete_cats.php");
              }
              if(isset($_GET['edit_cats'])){
                  include("edit_cats.php");
              }
              if(isset($_GET['insert_slide'])){
                  include("insert_slide.php");
              }
              if(isset($_GET['view_slide'])){
                  include("view_slide.php");
              }
              if(isset($_GET['delete_slide'])){
                  include("delete_slide.php");
              }
              if(isset($_GET['edit_slide'])){
                  include("edit_slide.php");
              }
              if(isset($_GET['insert_box'])){
                  include("insert_box.php");
              }
              if(isset($_GET['view_box'])){
                  include("view_box.php");
              }
              if(isset($_GET['delete_box'])){
                  include("delete_box.php");
              }
              if(isset($_GET['edit_box'])){
                  include("edit_box.php");
              }
               if(isset($_GET['insert_terms'])){
                  include("insert_terms.php");
              }
              if(isset($_GET['view_terms'])){
                  include("view_terms.php");
              }
              if(isset($_GET['delete_terms'])){
                  include("delete_terms.php");
              }
              if(isset($_GET['edit_terms'])){
                  include("edit_terms.php");
              }
              if(isset($_GET['view_customers'])){
                  include("view_customers.php");
              }

              if(isset($_GET['delete_customer'])){
                  include("delete_customer.php");
              }
              if(isset($_GET['view_orders'])){
                  include("view_orders.php");
              }
              if(isset($_GET['delete_order'])){
                  include("delete_order.php");
              }
              if(isset($_GET['view_payments'])){
                  include("view_payments.php");
              }
              if(isset($_GET['delete_payment'])){
                  include("delete_payment.php");
              }
              if(isset($_GET['edit_css'])){
                  include("edit_css.php");
              }
              if(isset($_GET['view_users'])){
                  include("view_users.php");
              }
              if(isset($_GET['delete_user'])){
                  include("delete_user.php");
              }
              if(isset($_GET['edit_user'])){
                  include("edit_user.php");
              }
               if(isset($_GET['insert_users'])){
                  include("insert_users.php");
              }
              if(isset($_GET['view_coupons'])){
                  include("view_coupons.php");
              }
              if(isset($_GET['delete_coupon'])){
                  include("delete_coupon.php");
              }
              if(isset($_GET['edit_coupon'])){
                  include("edit_coupon.php");
              }
               if(isset($_GET['insert_coupons'])){
                  include("insert_coupons.php");
              }

   					?>
   				</div><!-------container-fluid end----------------->
   			</div><!-------page-wrapper end----------------->
   		</div><!-------wrapper end----------------->

   
  </body>
 </html>
 <?php 
}
 ?>