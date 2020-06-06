<?php 
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<?php 
if(isset($_GET['c_id'])){
	$customer_id=$_GET['c_id'];
}
$ip_add = getRealIpUser();
$status = "pending";
$invoice_no = mt_rand();
$select_cart = "SELECT * FROM cart where ip_add='$ip_add'";
$run_cart = mysqli_query($con,$select_cart);
while($row_cart=mysqli_fetch_array($run_cart )){
$pro_id = $row_cart['p_id'];
$pro_qty = $row_cart['qty'];
$pro_colour = $row_cart['colour'];
$get_product = "SELECT * FROM products where product_id='$pro_id'";
$run_product = mysqli_query($con,$get_product);
while($row_product=mysqli_fetch_array($run_product )){
$sub_total = $row_product['product_price']*$pro_qty;
$insert_customer_order = "INSERT INTO customer_orders(customer_id,due_amount,invoice_no,qty,colour,order_date,order_status)VALUES('$customer_id','$sub_total','$invoice_no','$pro_qty','$pro_colour',NOW(),'$status')";
$run_customer_order = mysqli_query($con,$insert_customer_order);
$insert_pending_order = "INSERT INTO pending_orders(customer_id,invoice_no,product_id,qty,colour,order_status)VALUES('$customer_id','$invoice_no','$pro_id','$pro_qty','$pro_colour','$status')";
$run_pending_order = mysqli_query($con,$insert_pending_order);
$delete_cart = "DELETE FROM cart WHERE ip_add='$ip_add'";
$run_delete = mysqli_query($con,$delete_cart);
echo "<script>alert('Your order has been submitted.Thank you')</script>";
echo "<script>window.open('customer/my_account.php?my_orders','_SELF')</script>";

}
}
?>