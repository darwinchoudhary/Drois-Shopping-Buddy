<?php
include_once 'config/connection.php';
session_start();
include_once 'customer/component.php';

include_once 'views/view_navbar_customers.php';

if (isset($_POST['add'])) {
//print_r($_POST['product_id']);
if (isset($_SESSION['cart'])) {
$item_array_id=  array_column($_SESSION['cart'],"product_id");

if(in_array($_POST['product_id'],$item_array_id)){
  echo "<script>alert('Product is already added in the cart..!')</script>";
  echo "<script>window.location='tesco.php'</script>";
}else {
  $count=count($_SESSION['cart']);
  $item_array=array('product_id'=>$_POST['product_id']);
  $_SESSION['cart'][$count]=$item_array;

}
}
else {
  $item_array=array('product_id'=>$_POST['product_id']);
  $_SESSION['cart'][0]=$item_array;

}
}
 ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="css/styleProduct.css"/>
<?php include_once 'customer/header.php'; ?>
 <div class="container">
   <div class="row text-center py-5">
     <?php
     $sql="SELECT * FROM item";
     $stmt=mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt,$sql)) {
       header("Location: ../tesco.php?error=sqlerror");
       exit();
     }
     else {
       mysqli_stmt_execute($stmt);
       $result=mysqli_stmt_get_result($stmt);
       while ($row = mysqli_fetch_assoc($result)) {
         component($row['itemName'],$row['itemPrice'],$row['itemName'].$row['storeNumber'].".".$row['imageExt'],$row['iditem']);
       }
     }




      ?>

   </div>
 </div>



   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 </body>
