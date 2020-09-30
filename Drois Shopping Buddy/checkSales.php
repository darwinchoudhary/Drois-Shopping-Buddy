<?php
session_start();
include_once 'config/connection.php';
include_once 'views/view_navbar_admin.php';
include_once 'customer/component.php';
?>
<div class="container">
<?php
$sqlOrderId="SELECT * FROM delivery";
if ($rsOrderIds=$conn->query($sqlOrderId)) {
  while ($row=$rsOrderIds->fetch_assoc()) {


      $sqlcust="SELECT idCust FROM shopping_buddy.order WHERE idorder=".$row['idOrder'];

      if ($resultCust=$conn->query($sqlcust)) {
        while ($r=$resultCust->fetch_assoc()) {
          $custName=$r['idCust'];
        }
        salesElement($row['idOrder'],$custName,$row['iddelivery']);
      }
      else {
        echo "sqlfailed:".$conn->error;

      }

  }



}else {
  echo "sqlfailed:".$conn->error;
}

 ?>
</div>
