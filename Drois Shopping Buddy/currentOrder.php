<?php
session_start();
include_once 'config/connection.php';
include_once 'views/view_navbar_driver.php';
include_once 'customer/component.php';

if (isset($_POST['discard'])) {
  //print_r($_GET['id']);
  if ($_GET['action']=='discard') {
    $deliveryId=$_GET['id'];
    $sqlUpdateDelivery="UPDATE shopping_buddy.delivery SET idDriver=? WHERE iddelivery=?";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sqlUpdateDelivery)) {
      header("Location: currentOrder.php?error=sqlUpdateDeliveryFailed:".$conn->error);
      exit();
    }
    else {
      $driver=null;
      mysqli_stmt_bind_param($stmt,"ss",$driver,$deliveryId);
      mysqli_stmt_execute($stmt);
    }

  }
}

?>
<div class="container">
<?php
$sqlOrderId="SELECT * FROM delivery";
if ($rsOrderIds=$conn->query($sqlOrderId)) {
  while ($row=$rsOrderIds->fetch_assoc()) {

    if (!empty($row['idDriver'])) {
      $sqlcust="SELECT idCust FROM shopping_buddy.order WHERE idorder=".$row['idOrder'];

      if ($resultCust=$conn->query($sqlcust)) {
        while ($r=$resultCust->fetch_assoc()) {
          $custName=$r['idCust'];
        }
        currentOrderElement($row['idOrder'],$custName,$row['iddelivery']);
      }
      else {
        echo "sqlfailed:".$conn->error;

      }
    }
  }



}else {
  echo "sqlfailed:".$conn->error;
}

 ?>
</div>
