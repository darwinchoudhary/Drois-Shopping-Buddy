<?php
session_start();

if (isset($_POST['checkout-submit'])) {


include_once '../config/connection.php';

$address = $_POST['address'];
$customerId =(string) $_SESSION['idcustomer'];
$firstItem =(int) $_SESSION['cart'][0]['product_id'];



if (empty($address)) {
  header("Location: ../checkout.php?error=field-empty");
  exit();
}
else {
  //insert first item
  $sqlOrder="SELECT MAX(idorder) AS max FROM shopping_buddy.order;";
  if ($resOrder=$conn->query($sqlOrder)) {
    while ($row=$resOrder->fetch_assoc()) {
      $orderId=($row['max'])+1;
    }

  }
  else {
    header("Location: ../checkout.php?error=sqlOrder".$conn->error);
    exit();
  }

  //put all rest of the item in database
  foreach ($_SESSION['cart'] as $key => $value) {

      $sql3 = "INSERT INTO shopping_buddy.order (idorder,idCust,idItem) VALUES (?,?,?);";
      $stmt=mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt,$sql3)) {
        header("Location: ../checkout.php?error=sql3didntprepare");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt,"isi",$orderId,$_SESSION['idcustomer'],$value['product_id']);
        mysqli_stmt_execute($stmt);
      }

  }
  //order table has been successfully updated
  //Now I update Delivery table
  $sqlDelivery="INSERT INTO shopping_buddy.delivery (idOrder,address) VALUES (?,?)";
  $stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sqlDelivery)) {
    header("Location: ../checkout.php?error=sqlDeliverydidntprepare");
    exit();
  }
  else {
    mysqli_stmt_bind_param($stmt,"is",$orderId,$address);
    mysqli_stmt_execute($stmt);
  }



  header("Location: ../tesco.php?order-table-updated");
  exit();

}
}
