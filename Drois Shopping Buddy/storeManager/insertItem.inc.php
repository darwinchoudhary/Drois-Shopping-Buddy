<?php
if (isset($_POST['insertItem-submit'])) {

  include_once '../config/connection.php';

  $store=$_POST['store'];
  $itemName=$_POST['itemName'];
  $itemPrice=$_POST['itemPrice'];
  $itemImage=$_FILES['itemImage'];
  $storeNumber=0;

  if (empty($store) || empty($itemName) || empty($itemPrice) || empty($itemImage)) {
    header("Location: ../insertItem.php?error=emptyfields&itemName=".$itemName."&Price=".$itemPrice);
    exit();
  }
  else {


    if ($store=="tesco") {
      $storeNumber=1;
    }
    elseif ($store=="dunnes") {
      $storeNumber=2;
    }
    elseif($store=="lidl") {
      $storeNumber=3;
    }
    else {
      header("Location: ../insertItem.php?error=formerrorstorenotstoredcorrectly");
      exit();
    }

    $imageName=$_FILES['itemImage']['name'];
    $imageTmpName=$_FILES['itemImage']['tmp_name'];
    $imageSize=$_FILES['itemImage']['size'];
    $imageError=$_FILES['itemImage']['error'];
    $imageType=$_FILES['itemImage']['type'];

    $fileExt=explode('.',$imageName);
    $fileActualExt=strtolower(end($fileExt));

    $sql="INSERT INTO item (itemName,itemPrice,storeNumber,imageExt) VALUES (?,?,?,?)";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
      header("Location: ../insertItem.php?error=sqlnotprepared");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt,"ssss",$itemName,$itemPrice,$storeNumber,$fileActualExt);
      mysqli_stmt_execute($stmt);
    }



    $allowed=array('jpg','jpeg','png');


    if (in_array($fileActualExt,$allowed)) {
      if ($imageError===0) {
        if ($imageSize<100000000) {
          $fileNameNew=$itemName.$storeNumber.".".$fileActualExt;
          $fileDestination = '../itemImages/'.$fileNameNew;
          move_uploaded_file($imageTmpName,$fileDestination);
          header("Location: ../insertItem.php?itemAdded=Success");
          exit();

        }
        else {
          header("Location: ../insertItem.php?error=filesizetoobig");
          exit();
        }
      }
      else {
        header("Location: ../insertItem.php?error=uploadingfileerror");
        exit();
      }
    }
    else {
      header("Location: ../insertItem.php?error=wrongfiletype");
      exit();
    }

  }
}
