<?php
$active='Account';
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
					Register
				</li>
			</ul>
		</div><!----------col-md-12 finsh--------->
		
      <div class="col-md-12">
    <?php 

        if(!isset($_SESSION['customer_email'])){
            include("customer/customer_login.php");
        }else{
          include("payment_options.php");
        }

    ?>
    </div>
    </div><!----------container end--------->
  </div><!----------content end--------->


<?php 
include("includes/footer.php");
?>
</body>
</html>

