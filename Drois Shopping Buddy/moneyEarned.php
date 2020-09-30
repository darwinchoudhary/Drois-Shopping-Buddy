<?php
session_start();
include_once 'config/connection.php';
include_once 'views/view_navbar_driver.php';
?>
<div class="container">

<br>
<?php

$sql="SELECT COUNT(*) AS cnt FROM delivery WHERE idDriver='".$_SESSION['iddriver']."'";
if ($rs=$conn->query($sql)) {
while ($r=$rs->fetch_assoc()) {
  $itemsDelivered=$r['cnt'];
}

}else {
  header("Location: index.php?error=sqlMoneyEarnedFailed:".$conn->error);
  exit();
}
$money=((int)$itemsDelivered)*10;
echo "<h5>Total Orders Delivered: ".$itemsDelivered."</h5><br><h5>Total Money Earned: $".$money."</h5>";
?>
</div>
