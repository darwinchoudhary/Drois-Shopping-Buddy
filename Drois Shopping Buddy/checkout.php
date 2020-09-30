<?php
session_start();
include_once 'config/connection.php';
include_once 'views/view_navbar_customers.php';
?>
<div class="container">
<br>
<h6>Type in Your Address:</h6><br>
<form action="customer/checkout.inc.php" method="post">
  <textarea name="address" rows="1" cols="30" placeholder="Address"></textarea><br><br>
  <input type="submit" name="checkout-submit" value="Order" class="btn btn-primary">
</form>
</div>
