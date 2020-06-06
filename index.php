<?php
$active='Home';
include("includes/header.php");

?>

<!--------------slider--------->
<div class="container" id="slider"><!--------------container begin--------->
  <div class="col-md-12"><!--------------col-md-12 begin--------->
    <div class="carousel slide" id="myCarousel" data-ride="carousel"><!------------carousel slide begin--------->
      <ol class="carousel-indicators"><!------------carousel indicators begin--------->
        <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol><!------------carousel indicators finish--------->
    <div class="carousel-inner"><!------------carousel-inner begin--------->
      <?php 
        $get_slides  = "SELECT * FROM slider LIMIT 0,1";
        $run_slider = mysqli_query($con , $get_slides );

        while ($row_slides =mysqli_fetch_array($run_slider)) {
          $slide_name = $row_slides['slide_name'];
          $slide_image = $row_slides['slide_image'];
          $slide_url = $row_slides['slide_url'];

          echo "
          <div class='item active'>
          <a href='$slide_url'>
              <img src='admin_area/slides_images/$slide_image'>
          </a>
          </div>
              ";
        }
        $get_slides  = "SELECT * FROM slider LIMIT 1,3";
        $run_slider = mysqli_query($con , $get_slides );

        while ($row_slides =mysqli_fetch_array($run_slider)) {
          $slide_name = $row_slides['slide_name'];
          $slide_image = $row_slides['slide_image'];
          $slide_url = $row_slides['slide_url'];
          echo "
          <div class='item'>
          <a href='$slide_url'>
             <img src='admin_area/slides_images/$slide_image'>
          </a>
          </div>
              ";
        }
      ?>
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
  </div><!--------------col-md-12 finish--------->
</div><!--------------container finish--------->
<!--------------About us--------->
<div id="advantages"> <!--------------advantages begin--------->
  <div class="container"><!--------------container begin--------->
    <div class="same-height-row"><!--------------same-height-row begin--------->
      <?php 
        $get_boxes = "SELECT * FROM boxes_section";
        $run_boxes = mysqli_query($con,$get_boxes);
        while($row_boxes=mysqli_fetch_array($run_boxes)){
          $box_id = $row_boxes['box_id'];
          $box_title = $row_boxes['box_title'];
          $box_desc = $row_boxes['box_desc'];
      ?>
      <div class="col-sm-4"><!--------------col-sm-4 begin--------->
        <div class="box same-height"><!--------------box same-height begin--------->
          <div class="icon"><!--------------icon begin--------->
            <i class="fa fa-heart"></i>
          </div><!--------------icon finish--------->
          <h3><a href="#"><?php echo $box_title; ?></a></h3>
          <p><a href="#"><?php echo $box_desc; ?></p>
        </div><!--------------box same-height finish--------->
      </div><!--------------col-sm-4 finish--------->
    <?php } ?>
       </div><!--------------same-height-row finish--------->
  </div><!--------------container finish--------->
</div><!--------------advantages finish--------->

<!-------------Latest products--------->
<div id="latest"><!--------------latest begin--------->
  <div class="box">
    <div class="container">
      <div class="col-md-12">
        <h2>Our Latest Products</h2>
      </div>
    </div>
  </div>
</div><!--------------latest finish--------->

<div id="content" class="container"><!--------------container begin--------->
 <div class="row"><!--------------row begin--------->
   <?php 
      getPro();
   ?>
 </div><!--------------row begin--------->
</div><!--------------container finish--------->
<?php 
include("includes/footer.php");
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
  </html>
