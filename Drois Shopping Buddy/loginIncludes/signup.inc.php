<?php
if(isset($_POST['signup-submit'])){

include_once '../config/connection.php';

$username=$_POST['uid'];
$firstName=$_POST['fname'];
$lastName=$_POST['lname'];
$email=$_POST['mail'];
$password=$_POST['pwd'];
$passwordRepeat=$_POST['pwd-repeat'];

if (empty($username) || empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($passwordRepeat)) {
  // code...
  header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
  exit();
}

elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  header("Location: ../signup.php?error=invalidmail&uid=".$username);
  exit();
}
elseif ($password!==$passwordRepeat) {
  // code...
  header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
  exit();
}
else{

if ($_POST['userType']=="customer") {
  $sql="SELECT idcustomer FROM customer WHERE idcustomer=?";
}
elseif ($_POST['userType']=="admin") {
  $sql="SELECT idadministrator FROM administrator WHERE idadministrator=?";
}
elseif ($_POST['userType']=="storeManager") {
  $sql="SELECT idstoreManager FROM storemanager WHERE idstoreManager=?";
}
elseif ($_POST['userType']=="driver") {
  $sql="SELECT iddriver FROM driver WHERE iddriver=?";
}
else {
  header("Location: ../signup.php?error=usertypenotselected");
  exit();
}
$stmt=mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
  // code...
  header("Location: ../signup.php?error=sqlerrorstmtprepare");
  exit();
}
else {
  mysqli_stmt_bind_param($stmt,"s",$username);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  $resultCheck=mysqli_stmt_num_rows($stmt);
  if ($resultCheck>0) {
    header("Location: ../signup.php?error=usertaken&mail=".$email);
    exit();
  }
  else {
    if ($_POST['userType']=="customer") {
    $sql="INSERT INTO customer VALUES (?,?,?,?,?)";
    }
    elseif ($_POST['userType']=="admin") {
      $sql="INSERT INTO administrator VALUES (?,?,?,?,?)";
    }
    elseif ($_POST['userType']=="storeManager") {
      $sql="INSERT INTO storemanager VALUES (?,?,?,?,?)";
    }
    elseif ($_POST['userType']=="driver") {
    $sql="INSERT INTO driver VALUES (?,?,?,?,?)";
    }

    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
      // code...
      header("Location: ../signup.php?error=sqlerrorinsertintoprepareerror");
      exit();
    }
    else {
      $hashPwd=password_hash($password,PASSWORD_DEFAULT);


      mysqli_stmt_bind_param($stmt,"sssss",$username,$firstName,$lastName,$hashPwd,$email);
      mysqli_stmt_execute($stmt);
      header("Location: ../signup.php?signupsuccess");
      exit();

    }
  }
}

}
mysqli_stmt_close($stmt);
mysqli_close($conn);

}
else {
  header("Location: ../signup.php?error=notpressedbutton");
  exit();
}
