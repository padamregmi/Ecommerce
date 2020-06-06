<?php
$active='Contact';
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
					Contact Us
				</li>
			</ul>
		</div><!----------col-md-12 finsh--------->
		
    <div class="col-md-12"><!----------col-md-9 begin--------->
      <div class="box"><!---------box begin-------->
        <div class="box-header"><!---------box-header begin-------->
          <center><!---------center begin-------->
            <h2>Feel free to contact us.</h2>
            <p class="text-muted">
              If you have any questions, feel free to contact us. Our customer service is 24/7.
            </p>
          </center><!---------center finish-------->
          <form action="contact.php" method="post"><!---------form begin-------->
            <div class="form-group"><!---------form-group begin-------->
              <label>Name:</label>
              <input type="text" name="name" class="form-control" required>
            </div><!---------form-group finish-------->
            <div class="form-group"><!---------form-group begin-------->
              <label>Email:</label>
              <input type="text" name="email" class="form-control" required>
            </div><!---------form-group finish-------->
            <div class="form-group"><!---------form-group begin-------->
              <label>Subject:</label>
              <input type="text" name="subject" class="form-control" required>
            </div><!---------form-group finish-------->
            <div class="form-group"><!---------form-group begin-------->
              <label>Message:</label>
              <textarea name="message" class="form-control"></textarea>
            </div><!---------form-group finish-------->
            <div class="text-center"><!---------text-center begin-------->
              <button type="submit" name="submit" class="btn btn-primary">
                <i class="fa fa-user-md"></i>Send Message
              </button>

            </div><!---------text-center finish-------->
          </form><!---------form finish-------->

          <?php 
          if(isset($_POST['submit'])){
            $sender_name = $_POST['name'];
            $sender_email = $_POST['email'];
            $sender_subject = $_POST['subject'];
            $sender_message = $_POST['message'];
            $receiver_email = "From: techtrend@gmail.com";
            mail($receiver_email,$sender_name,$sender_subject,$sender_message,$sender_email);

            //Auto reply with this email //
            $email = $_POST['email'];
            $subject = "Welcome to my website";
            $msg = "Thanks for sending us message. ASAP we will reply your message";
            $from = "From: techtrend@gmail.com";
            mail($email,$subject,$msg,$from);
            echo("<h2 align='center'> Your message sent sucessfully.</h2>");
          }

          ?>
        </div><!---------box-header finish-------->
      </div><!---------box finish-------->
    </div><!----------col-md-9 finish--------->
  </div> <!----------CONTENT finish--------->



<?php 
include("includes/footer.php");
?>