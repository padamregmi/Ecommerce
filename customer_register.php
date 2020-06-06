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
		
    <div class="col-md-12"><!----------col-md-9 begin--------->
      <div class="box"><!---------box begin-------->
        <div class="box-header"><!---------box-header begin-------->
          <center><!---------center begin-------->
            <h2>Register a new account</h2>
            <p class="text-muted">
              If you have any questions, feel free to contact us. Our customer service is 24/7.
            </p>
          </center><!---------center finish-------->
          <form action="customer_register.php" method="post" enctype="multipart/form-data"><!---------form begin-------->
            <div class="form-group"><!---------form-group begin-------->
              <label>Your Name:</label>
              <input type="text" name="c_name" class="form-control" required>
            </div><!---------form-group finish-------->
            <div class="form-group"><!---------form-group begin-------->
              <label>Your Email:</label>
              <input type="text" name="c_email" class="form-control" required>
            </div><!---------form-group finish-------->
            <div class="form-group"><!---------form-group begin-------->
              <label>Password:</label>
              <input type="password" name="c_password" class="form-control" required>
            </div><!---------form-group finish-------->
            <div class="form-group"><!---------form-group begin-------->
              <label>Country:</label>
              <input type="text" name="c_country" class="form-control" required>
            </div><!---------form-group finish-------->
            <div class="form-group"><!---------form-group begin-------->
              <label>City:</label>
              <input type="text" name="c_city" class="form-control" required>
            </div><!---------form-group finish-------->
            <div class="form-group"><!---------form-group begin-------->
              <label>Contact:</label>
              <input type="text" name="c_contact" class="form-control" required>
            </div><!---------form-group finish-------->
            <div class="form-group"><!---------form-group begin-------->
              <label>Address:</label>
              <input type="text" name="c_address" class="form-control" required>
            </div><!---------form-group finish-------->
            <div class="form-group"><!---------form-group begin-------->
              <label>Profile:</label>
              <input type="file" name="c_image" class="form-control" required>
            </div><!---------form-group finish-------->
            <div class="text-center"><!---------text-center begin-------->
              <button type="submit" name="register" class="btn btn-primary">
                <i class="fa fa-user-md"></i>Register
              </button>

            </div><!---------text-center finish-------->
          </form><!---------form finish-------->
        </div><!---------box-header finish-------->
      </div><!---------box finish-------->
    </div><!----------col-md-9 finish--------->



<?php 
include("includes/footer.php");
?>
</body>
</html>

<?php
if(isset($_POST['register'])){
      $c_name = $_POST['c_name'];
      $c_email = $_POST['c_email'];
      $c_password = $_POST['c_password'];
      $c_country = $_POST['c_country'];
      $c_city = $_POST['c_city'];
      $c_contact = $_POST['c_contact'];
      $c_address = $_POST['c_address'];
      $c_image = $_FILES['c_image']['name'];
      $c_image_tmp = $_FILES['c_image']['tmp_name'];
      $c_ip = getRealIpUser();
      move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

            $insert_customer = "INSERT INTO customers(customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip)VALUES('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact',' $c_address','$c_image','$c_ip')";
            $run_customer = mysqli_query($con,$insert_customer);
            $sel_cart = "SELECT * FROM cart where ip_add='$c_ip'";
            $run_cart = mysqli_query($con,$sel_cart);
            $check_cart = mysqli_num_rows($run_cart);
            if($check_cart>0){
              //with item in cart//
              $_SESSION['customer_email']=$c_email;
              echo "<script>alert('You have registered sucessfully')</script>";
              echo "<script>window.open('checkout.php','_SELF')</script>";
            }else{
              //with item in cart//
              $_SESSION['customer_email']=$c_email;
              echo "<script>alert('You have registered sucessfully')</script>";
              echo "<script>window.open('index.php','_SELF')</script>";

            }



          }

 ?>