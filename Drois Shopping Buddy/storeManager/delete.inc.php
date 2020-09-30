<?php
if (isset($_POST['deleteItem-submit'])) {
include_once '../config/connection.php';

$itemId = $_POST['itemID'];

if (empty($itemId)) {
  header("Location: ../deleteItem.php?error=field-empty");
  exit();
}
else {
  $sql = "DELETE FROM item WHERE iditem=?";
  $stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    header("Location: ../deleteItem.php?error=stmtdidntprepare");
    exit();
  }
  else {
    mysqli_stmt_bind_param($stmt,"s",$itemId);
    mysqli_stmt_execute($stmt);
    header("Location: ../deleteItem.php?deleteItem=success");
    exit();
  }
}



}
else {
  header("Location: ../deleteItem.php?error=btn-not-pressed");
  exit();
}
