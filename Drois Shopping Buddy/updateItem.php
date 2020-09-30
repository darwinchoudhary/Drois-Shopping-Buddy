<?php
session_start();
include_once 'config/connection.php';
include_once 'views/view_navbar_storeManager.php';
 ?>
 <div class="container">
   <br><br>
  <h4>Update an Item By Id</h4><br>

 <form action="updateItem.php" method="post">
   <input type="text" name="itemid" placeholder="Item Id">
     <input type="text" name="itemPrice" placeholder="Item Price"><br><br>
   <input type="submit" class="btn btn-primary" name="updateItem-submit" value="Update">
 </form>

<?php
if (isset($_POST['updateItem-submit'])) {
  $sqlupdate="UPDATE item SET itemPrice='".$_POST['itemPrice']."' WHERE iditem='".$_POST['itemid']."'";
  if ($rsupdate=$conn->query($sqlupdate)) {
    echo "<script>alert('Item Price Updated')</script>";
    echo "<script>window.location='updateItem.php'</script>";
  }
  else {
    header("Location: updateItem.php?error=sqlupdateFailed");
    exit();
  }
}
 ?>
</div>
