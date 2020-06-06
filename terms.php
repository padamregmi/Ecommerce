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
          Terms & Conditions | Refund
        </li>
      </ul>
    </div><!----------col-md-12 finish--------->

    <div class="col-md-3"><!----------col-md-3 begin--------->
      <div class="box"><!----------box finish--------->
        <ul class="nav nav-pills nav-stacked"> <!----------nav nav-pills finish--------->
          <?php 
          $get_terms ="SELECT * FROM terms LIMIT 0,1";
          $run_terms = mysqli_query($con,$get_terms);
          while($row_terms=mysqli_fetch_array($run_terms)){
              $term_title = $row_terms['term_title'];
              $term_link = $row_terms['term_link'];
              $term_desc = $row_terms['term_desc'];

          ?>
          <li class="active">
            <a href="#<?php echo $term_link; ?>" target="_blank" rel="noopener noreferrer">
              <?php echo $term_title; ?>
            </a>
          </li>
        <?php } ?>
        <?php 
            $count_terms = "SELECT * FROM terms";
            $run_count = mysqli_query($con, $count_terms);
            $count = mysqli_num_rows($run_count);
            $get_terms ="SELECT * FROM terms LIMIT 1,$count";
            $run_terms = mysqli_query($con,$get_terms);
            while($row_terms=mysqli_fetch_array($run_terms)){
                $term_title = $row_terms['term_title'];
                $term_link = $row_terms['term_link'];
                $term_desc = $row_terms['term_desc'];
            
          ?>
          <li>
            <a data-toggle="pill" href="#<?php echo $term_link; ?>" >
              <?php echo $term_title; ?>
            </a>
          </li>

        <?php   } ?>
        </ul><!----------nav nav-pills finish--------->
      </div><!----------box finish--------->
    </div><!----------col-md-3 finish--------->
    <div class="col-md-9"><!----------col-md-9 begin--------->
      <div class="box"><!----------box begin--------->
        <div class="tab-content"><!----------tab-content begin--------->
          <?php 
          $get_terms ="SELECT * FROM terms LIMIT 0,1";
          $run_terms = mysqli_query($con,$get_terms);
          while($row_terms=mysqli_fetch_array($run_terms)){
              $term_title = $row_terms['term_title'];
              $term_link = $row_terms['term_link'];
              $term_desc = $row_terms['term_desc'];

          ?>
          <div class="tab-pane fade in active" id="<?php echo $term_link; ?>">
            <h1 class="tabTitle"><?php echo $term_title; ?></h1>
            <p class="tabDesc"><?php echo $term_desc; ?></p>
          </div>
        <?php } ?>
        <?php 
         $count_terms = "SELECT * FROM terms";
            $run_count = mysqli_query($con, $count_terms);
            $count = mysqli_num_rows($run_count);
            $get_terms ="SELECT * FROM terms LIMIT 1,$count";
            $run_terms = mysqli_query($con,$get_terms);
              while($row_terms=mysqli_fetch_array($run_terms)){
              $term_title = $row_terms['term_title'];
              $term_link = $row_terms['term_link'];
              $term_desc = $row_terms['term_desc'];

          ?>
          <div class="tab-pane fade in" id="<?php echo $term_link; ?>">
            <h1 class="tabTitle"><?php echo $term_title; ?></h1>
            <p class="tabDesc"><?php echo $term_desc; ?></p>
          </div>
        <?php } ?>
        </div><!----------tab-content finish--------->
      </div><!----------box finish--------->
    </div><!----------col-md-9 finish--------->
  </div><!----------container end--------->
</div> <!----------content end--------->



<?php 
include("includes/footer.php");
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
  </html>
