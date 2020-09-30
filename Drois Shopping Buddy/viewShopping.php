<?php
session_start();
include_once 'config/connection.php';
include_once 'views/view_navbar_admin.php';
include_once 'customer/component.php';

echo "<br><h4 class='text-center'>View Shopping done by Customers</h4><br>";
?>
<div class="container">
<form action="viewShopping.php" method="post">
  <input type="text" name="cust" placeholder="Username">
  <input type="submit" name="viewShopping-submit" value="Search">

</form>
<?php
if (isset($_POST['viewShopping-submit'])) {


$sqlOrderId="SELECT * FROM delivery";
$exist=False;
$norders=0;
if ($rsOrderIds=$conn->query($sqlOrderId)) {
  while ($row=$rsOrderIds->fetch_assoc()) {

      $sqlcust="SELECT idCust FROM shopping_buddy.order WHERE idorder=".$row['idOrder'];

      if ($resultCust=$conn->query($sqlcust)) {
        while ($r=$resultCust->fetch_assoc()) {
          $custName=$r['idCust'];
        }
        if ($custName==$_POST['cust']) {
          $exist=True;
          $norders=1;
            salesElement($row['idOrder'],$custName,$row['iddelivery']);
        }
      }
      else {
        echo "sqlfailed:".$conn->error;

      }
  }
  $sqlexist="SELECT * FROM customer";
  if($rsexist=$conn->query($sqlexist)){
    while ($row=$rsexist->fetch_assoc()) {
      if ($row['idcustomer']==$_POST['cust']) {
        $exist=True;
        if ($norders==0) {
            echo "<h5>".$row['idcustomer']." has no orders</h5>";
        }

      }
    }
  }
  if ($exist==False) {
    echo "<h5>Username does not exist!</h5>";
  }
}else {
  echo "sqlfailed:".$conn->error;
}
}
 ?>
</div>
