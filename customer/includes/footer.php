<div id="footer"> <!-----------footer begin------------------>
	<div class="container"><!-----------container begin------------------>
		<div class="row"><!-----------row begin------------------>
			<div class="col-sm-6 col-md-3"><!-----------col-sm-6 col-md-3 begin------------------>
				<h4>Pages</h4>
				<ul> <!-------ul begin------------>
					<li><a href="../cart.php">Shopping Cart</a></li>
					<li><a href="../contact.php">Contact Us</a></li>
					<li><a href="../shop.php">Shop</a></li>
					<li><a href="my_account.php">My Account</a></li>
				</ul><!-------ul finish------------>
				<hr>
				<h4>User Section</h4>
				<ul><!-------ul begin------------>
					<?php
			                if(!isset($_SESSION['customer_email'])){
			                      echo "<a href='../checkout.php'>Login</a>";
			                }else{
			                      echo "<a href='my_account.php?my_orders'>My Account</a>";
			                }
             		?>
					<li>
						<?php
			                if(!isset($_SESSION['customer_email'])){
			                      echo "<a href='../checkout.php'>Login</a>";
			                }else{
			                      echo "<a href='my_account.php?edit_account'>Edit Account</a>";
			                }
             			?>
             			
             		</li>
             		<li><a href="../terms.php">Terms & Conditions </a></li>
				</ul><!-------ul finish------------>
				<hr class="hidden-md hidden-lg hidden-sm">
			</div><!-----------col-sm-6 col-md-3 finish------------------>

			<div class="col-sm-6 col-md-3"><!-----------col-sm-6 col-md-3 begin------------------>
				<h4>Top Product Categories</h4>
				<ul><!-------ul begin------------>
					<?php
					$gets_p_cats = "SELECT * FROM product_categories";
					$run_p_cats = mysqli_query($con,$gets_p_cats);
					while($row_p_cats = mysqli_fetch_array($run_p_cats)){
						$p_cat_id = $row_p_cats['p_cat_id'];
						$p_cat_title = $row_p_cats['p_cat_title'];
						echo "
						<li>
						<a href='../shop.php?p_cat=$p_cat_id'></a>
						$p_cat_title
						</li>


						";
					}


					 ?>
				</ul><!-------ul finish------------>
				<hr class="hidden-md hidden-lg">
			</div><!-----------col-sm-6 col-md-3 finish------------------>
			<div class="col-sm-6 col-md-3"><!-----------col-sm-6 col-md-3 begin------------------>
				<h4>Find Us:</h4>
				<p><!------p start------>
					<strong>Technology Trends</strong>
					<br/>Kathmandu, Nepal
					<br/>+977-982563256
					<br/>techtrend@gmail.com
					<br/><strong>Padam</strong>
				</p><!------p finish------>
				<a href="../contact.php">Check Our Contact Page</a>
				<hr class="hidden-md hidden-lg">
			</div><!-----------col-sm-6 col-md-3 finish------------------>
			<div class="col-sm-6 col-md-3"><!-----------col-sm-6 col-md-3 begin------------------>
				<h4>Get the News</h4>
				<p class="text-muted">
					Don't miss our latest  offers and updates. Be in Touch.
				</p>
				<form method="post" action=""><!------form begin------->
					<div class="input-group"><!------input-group begin------->
						<input type="text" name="email" class="form-control">
						<span>
							<input type="submit" value="subscribe" class="btn btn-default">
						</span>
					</div><!------input-group finish------->
				</form><!------form finish------->
				<hr>
				<h4>Keep In Touch</h4>
				<p class="social">
					<a href="#" class="fa fa-facebook"></a>
					<a href="#" class="fa fa-instagram"></a>
					<a href="#" class="fa fa-twitter"></a>
					<a href="#" class="fa fa-envelope"></a>
				</p>
			</div><!-----------col-sm-6 col-md-3 finish------------------>
		</div><!-----------row finish------------------>
	</div><!-----------container finish------------------>
</div><!-----------footer finish------------------>
<div id="copyright"><!-----------copyright begin------------------>
	<div class="container"><!-----------container begin------------------>
		<div class="col-md-6"><!-----------col-md-6 begin------------------>
			<p class="pull-left">&copy;  2020 Technology Trends All Rights Reserved</p>
		</div><!-----------col-md-6 finish------------------>
		<div class="col-md-6"><!-----------col-md-6 begin------------------>
			<p class="pull-right">&copy; Theme by:<a href="#">Padam</a></p>
	</div><!-----------container finish------------------>
</div><!-----------copyright finish------------------>