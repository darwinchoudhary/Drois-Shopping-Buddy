<?php
session_start();
include_once 'config/connection.php';
include_once 'customer/component.php';
include_once 'views/view_navbar_customers.php';

if (isset($_POST['remove'])) {
  //print_r($_GET['id']);
  if ($_GET['action']=='remove') {
    foreach ($_SESSION['cart'] as $key => $value) {
      if ($value['product_id']==$_GET['id']) {
        unset($_SESSION['cart'][$key]);
        echo "<script>alert('Product has been removed...!')</script>";
        echo "<script>window.location='cart.php'</script>";
      }
    }
  }
}

 ?>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <link rel="stylesheet" href="css/styleProduct.css"/>
 <?php include_once 'customer/header.php'; ?>

 <div class="container">
   <div class="row px-5">
     <div class="col-md-7">
       <div class="shopping-cart">
         <h4>My Cart</h4>
         <hr>
         <?php
         $total=0;
         if (isset($_SESSION['cart'])) {
           $productId=array_column($_SESSION['cart'],'product_id');
           $sql="SELECT * FROM item";
           if ($rs=$conn->query($sql)) {
             while ($row = $rs->fetch_assoc()) {
              // print_r($row['iditem']);
               foreach ($productId as $id) {

                 if ($row['iditem']==$id) {

                   $total=$total + (int)$row['itemPrice'];

                   if($row['storeNumber']==1){
                     $seller='Tesco';
                   }elseif ($row['storeNumber']==2) {
                     $seller='Dunnes';
                   }else {
                     $seller='Lidl';
                   }


                   cartElement($row['itemName'].$row['storeNumber'].'.'.$row['imageExt'],$row['itemName'],$row['itemPrice'],$seller,$row['iditem']);
                 }
               }
             }
           }
           else {
             echo "Query did not run";
           }
         }else {
           echo "<h4>Cart is Empty</h4>";
         }

          ?>
       </div>
     </div>
     <div class="col-md-4 offset-md 1 border rounded mt-5 bg-white h-25  ">
       <div class="pt-4">
         <h5>PRICE DETAILS</h5>
         <hr>
         <div class="row price-details">
            <div class="col-md-6">
              <?php
                if (isset($_SESSION['cart'])) {
                  $count = count($_SESSION['cart']);
                  echo "<h6>Price (".$count." items)</h6>";
                }else {
                  echo "<h6>Price (0 item)</h6>";
                }
               ?>
               <h6>Delivery Charges</h6>
               <hr>
               <h6>Amount Payable</h6>
            </div>
            <div class="col-md-6">
              <h6><?php echo "$".$total; ?></h6>
              <h6 class="text-success">$10</h6>
              <hr>
              <h6>$<?php echo $total+10; ?></h6>
            </div>
         </div>
       </div>
      <a href="checkout.php"> <button type="button" class="btn btn-primary btn-lg btn-block m-2" name="checkout">Proceed to Checkout</button></a>
     </div>
   </div>
 </div>


 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
