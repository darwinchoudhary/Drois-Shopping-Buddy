<?php
session_start();
include_once 'views/view_navbar_storeManager.php';
 ?>
 <div class="container">
<br><br>

<form action="storeManager/insertItem.inc.php" method="post" enctype="multipart/form-data">
  <input type="radio" id="tesco" name="store" value="tesco">
<label for="tesco">Tesco</label><br>
<input type="radio" id="dunnes" name="store" value="dunnes">
<label for="dunnes">Dunnes</label><br>
<input type="radio" id="lidl" name="store" value="lidl">
<label for="lidl">Lidl</label><br><br>
    <input type="text" name="itemName" placeholder="Item Name">
    <input type="text" name="itemPrice" placeholder="Item Price"><br><br>
    Select image to upload: <input type="file" name="itemImage">
    <br><br>
    <input type="submit" class="btn btn-primary" name="insertItem-submit" value="Upload">
</form>
</div>
