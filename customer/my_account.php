<?php 
session_start();
if(!isset($_SESSION['customer_email'])){
    echo "<script>window.open('../checkout.php','_SELF')</script>";
}else{
include("includes/db.php");
include("functions/functions.php");
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
                     <a href="../customer_register.php">Register</a>
                   </li>
                   <li>
                     <a href="my_account.php">My Account</a>
                   </li>
                   <li>
                     <a href="../cart.php">Go To Cart</a>
                   </li>
                   <li>
                     <a href="../checkout.php">
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
      <a href="../index.php" class="navbar-brand home">
        <img src="../images/header/111.png" alt="trend logo" class="hidden-xs" >
        <img src="../images/header/222.png" alt="trend mobile logo" class="visible-xs" >
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
          <li >
            <a href="../index.php">Home</a>
          </li>
          <li >
            <a href="../shop.php">Shop</a>
          </li>
          <li class="active">
            <a href="my_account.php">My Account</a>
          </li>
          <li>
            <a href="../cart.php">Shopping Cart</a>
          </li>
          <li>
            <a href="../contact.php">Contact Us</a>
          </li>
        </ul><!---------------navbar-nav begin------>
      </div><!-------------padding-nav finish-------->

      <a href="../cart.php" class="btn navbar-btn btn-primary right"><!-----btn navbar-btn btn-primary begin-------->
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
          <a href="../index.php">Home</a>
        </li>
        <li>
         My Account
        </li>
      </ul>
    </div><!----------col-md-12 finsh--------->
    <div class="col-md-3"><!----------col-md-3 begin--------->
    
      <?php 
        include("includes/sidebar.php");
      ?>
    </div><!----------col-md-3 finsh--------->

          <div class="col-md-9"><!----------col-md-9 begin--------->
            <div class="box"><!----------box begin--------->
              <?php
              if(isset($_GET['my_orders']))
              {
                include('my_orders.php');
              }
              ?>
              <?php
              if(isset($_GET['pay_offline']))
              {
                include('pay_offline.php');
              }
              ?>
               <?php
              if(isset($_GET['edit_account']))
              {
                include('edit_account.php');
              }
              ?>
               <?php
              if(isset($_GET['change_pass']))
              {
                include('change_pass.php');
              }
              ?>
              <?php
              if(isset($_GET['delete_account']))
              {
                include('delete_account.php');
              }
              ?>
            </div><!----------box finish--------->
          </div><!----------col-md-9 finish--------->
    </div><!----------container finish--------->
</div><!----------content finish--------->


<?php 
include("includes/footer.php");
?>
</body>
</html>
<?php } ?>