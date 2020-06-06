<?php 
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_SELF')</script>";
}else{
?>
<div class="navbar navbar-inverse navbar-fixed-top"><!-------navbar navbar-inverse navbar-fixed-top begin------------------->
	<div class="navbar-header"><!--------navbar-header begin----------->
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="index.php?dashboard" class="navbar-brand">Admin Area</a>
	</div><!--------navbar-header end----------->
	<ul class="nav navbar-right top-nav"><!--------navbar-right top-menu begin----------->
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <!------dropdown-toggle begin----->
				<i class="fa fa-user"><?php echo $admin_name; ?></i><b class="caret"></b>
			</a><!------dropdown-toggle end----->
			<ul class="dropdown-menu">
				<li><!----li begin--------->
					<a href="index.php?user_profile=<?php echo $profile_id; ?>"><!----a begin--------->
						<i class="fa fa-fw fa-user"></i>Profile
					</a><!----a end--------->
				</li><!----li end--------->

				<li><!----li begin--------->
					<a href="index.php?view_products"><!----a begin--------->
						<i class="fa fa-fw fa-envelope"></i>Products
						<span class="badge"><?php echo $count_products; ?></span>
					</a><!----a end--------->
				</li><!----li end--------->

				<li><!----li begin--------->
					<a href="index.php?view_customers"><!----a begin--------->
						<i class="fa fa-fw fa-users"></i>Customers
						<span class="badge"><?php echo $count_customers; ?></span>
					</a><!----a end--------->
				</li><!----li end--------->

				<li><!----li begin--------->
					<a href="index.php?view_cats"><!----a begin--------->
						<i class="fa fa-fw fa-gear"></i>Product Categories
						<span class="badge"><?php echo $count_p_cats; ?></span>
					</a><!----a end--------->
				</li><!----li end--------->
				<li class="divider"></li>
				<li><!----li begin--------->
					<a href="logout.php"><!----a begin--------->
						<i class="fa fa-fw fa-power-off"></i>Logout
						
					</a><!----a end--------->
				</li><!----li end--------->
			</ul>
		</li>
	</ul><!--------navbar-right top-menu end----------->
	<div class="collapse navbar-collapse navbar-ex1-collapse"> <!----collapse navbar-collapse navbar-ex1-collapse begin--->
		<ul class="nav navbar-nav side-nav">
			<li>
				<a href="index.php?dashboard">
					<i class="fa fa-fw fa-dashboard"></i> Dashboard
				</a>
			</li>
			<li><!----li begin--------->
				<a href="#" data-toggle="collapse" data-target="#products">
					<i class="fa fa-fw fa-tag"></i> Products
					<i class="fa fa-fw fa-caret-down"></i>
				</a>
				<ul id="products" class="collapse">
					<li>
						<a href="index.php?insert_product">Insert Product</a>
					</li>
					<li>
						<a href="index.php?view_products">View Product</a>
					</li>
				</ul>
			</li><!----li end--------->
			<li><!----li begin--------->
				<a href="#" data-toggle="collapse" data-target="#p_cat">
					<i class="fa fa-fw fa-edit"></i> Products Categories
					<i class="fa fa-fw fa-caret-down"></i>
				</a>
				<ul id="p_cat" class="collapse">
					<li>
						<a href="index.php?insert_p_cats">Insert Product Categories</a>
					</li>
					<li>
						<a href="index.php?view_p_cats">View Product Categories</a>
					</li>
				</ul>
			</li><!----li end--------->
			<li><!----li begin--------->
				<a href="#" data-toggle="collapse" data-target="#cat">
					<i class="fa fa-fw fa-book"></i> Categories
					<i class="fa fa-fw fa-caret-down"></i>
				</a>
				<ul id="cat" class="collapse">
					<li>
						<a href="index.php?insert_cats">Insert categories</a>
					</li>
					<li>
						<a href="index.php?view_cats">View categories</a>
					</li>
				</ul>
			</li><!----li end--------->
			<li><!----li begin--------->
				<a href="#" data-toggle="collapse" data-target="#slides">
					<i class="fa fa-fw fa-gear"></i> Slides
					<i class="fa fa-fw fa-caret-down"></i>
				</a>
				<ul id="slides" class="collapse">
					<li>
						<a href="index.php?insert_slide">Insert Slide</a>
					</li>
					<li>
						<a href="index.php?view_slide">View Slide</a>
					</li>
				</ul>
			</li><!----li end--------->
			<li><!----li begin--------->
				<a href="#" data-toggle="collapse" data-target="#boxes">
					<i class="fa fa-fw fa-dropbox"></i> Boxes
					<i class="fa fa-fw fa-caret-down"></i>
				</a>
				<ul id="boxes" class="collapse">
					<li>
						<a href="index.php?insert_box">Insert Box</a>
					</li>
					<li>
						<a href="index.php?view_box">View Box</a>
					</li>
				</ul>
			</li><!----li end--------->
			<li><!----li begin--------->
				<a href="#" data-toggle="collapse" data-target="#coupons">
					<i class="fa fa-fw fa-table"></i> Coupons
					<i class="fa fa-fw fa-caret-down"></i>
				</a>
				<ul id="coupons" class="collapse">
					<li>
						<a href="index.php?insert_coupons">Insert Coupons</a>
					</li>
					<li>
						<a href="index.php?view_coupons">View Coupons</a>
					</li>
				</ul>
			</li><!----li end--------->

			<li><!----li begin--------->
				<a href="#" data-toggle="collapse" data-target="#terms">
					<i class="fa fa-fw fa-dropbox"></i> Terms
					<i class="fa fa-fw fa-caret-down"></i>
				</a>
				<ul id="terms" class="collapse">
					<li>
						<a href="index.php?insert_terms">Insert Terms</a>
					</li>
					<li>
						<a href="index.php?view_terms">View Terms</a>
					</li>
				</ul>
			</li><!----li end--------->
			<li><!----li begin--------->
				<a href="index.php?view_customers">
					<i class="fa fa-fw fa-users"></i>View Customers
				</a>
			</li><!----li end--------->
			<li><!----li begin--------->
				<a href="index.php?view_orders">
					<i class="fa fa-fw fa-book"></i>View Orders
				</a>
			</li><!----li end--------->
			<li><!----li begin--------->
				<a href="index.php?view_payments">
					<i class="fa fa-fw fa-money"></i>View Payments
				</a>
			</li><!----li end--------->
			</li><!----li end--------->
			<li><!----li begin--------->
				<a href="index.php?edit_css">
					<i class="fa fa-fw fa-pencil"></i>CSS Editor
				</a>
			</li><!----li end--------->
			<li><!----li begin--------->
				<a href="#" data-toggle="collapse" data-target="#users">
					<i class="fa fa-fw fa-users"></i> Users
					<i class="fa fa-fw fa-caret-down"></i>
				</a>
				<ul id="users" class="collapse">
					<li>
						<a href="index.php?insert_users">Insert User</a>
					</li>
					<li>
						<a href="index.php?view_users">View User</a>
					</li>
					<li>
						<a href="index.php?edit_user=<?php echo $admin_id;?>">Edit User Profile</a>
					</li>
				</ul>
			</li><!----li end--------->
			<li><!----li begin--------->
					<a href="logout.php"><!----a begin--------->
						<i class="fa fa-fw fa-power-off"></i>Logout
						
					</a><!----a end--------->
			</li><!----li end--------->
		</ul>
	</div><!----collapse navbar-collapse navbar-ex1-collapse end--->
</div><!-------navbar navbar-inverse navbar-fixed-top end------------------->
<?php } ?>