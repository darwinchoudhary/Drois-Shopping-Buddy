<?php
session_start();
include_once 'views/view_navbar_storeManager.php';
 ?>
 <div class="container">

<br><br>
 <h5>Select an item to delete by Id</h5><br>
 <form action="storeManager/delete.inc.php" method="post">
   <input type="text" name="itemID" placeholder="Item ID"><br><br>
   <input type="submit" class="btn btn-danger" name="deleteItem-submit" value="Delete">

 </form>
 </div>
