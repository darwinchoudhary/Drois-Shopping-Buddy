<?php
if(isset($_POST['login-submit'])){
include_once '../config/connection.php';

$mailuid=$_POST['mailuid'];
$password=$_POST['pwd'];

if (empty($mailuid) || empty($password)) {
  header("Location: ../login.php?error=emptyfields&uid=".$mailuid);
  exit();
}
else {
  if ($_POST['userType']=="customer") {
    $sql="SELECT * FROM customer WHERE idcustomer=? OR email=?;";
  }
  elseif ($_POST['userType']=="admin") {
    $sql="SELECT * FROM administrator WHERE idadministrator=? OR email=?;";
  }
  elseif ($_POST['userType']=="storeManager") {
  $sql="SELECT * FROM storemanager WHERE idstoreManager=? OR email=?;";
  }
  elseif ($_POST['userType']=="driver") {
    $sql="SELECT * FROM driver WHERE iddriver=? OR email=?;";
  }
  else {
    header("Location: ../login.php?error=usertypenotselected");
    exit();
  }

  $stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    header("Location: ../index.php?error=sqlerror");
    exit();
  }
  else {
    mysqli_stmt_bind_param($stmt,"ss",$mailuid,$mailuid);
    mysqli_stmt_execute($stmt);
    $result=mysqli_stmt_get_result($stmt);
    if ($row=mysqli_fetch_assoc($result)) {
      $pwdCheck=password_verify($password, $row['password']);
      if ($pwdCheck==false) {
        header("Location: ../index.php?error=wrongpassword");
        exit();
      }
      elseif ($pwdCheck==true) {
        if ((int)$row['enable']==1) {


        session_start();
        if ($_POST['userType']=="customer") {
        $_SESSION['idcustomer'] = $row['idcustomer'];
        }
        elseif ($_POST['userType']=="admin") {
          $_SESSION['idadministrator'] = $row['idadministrator'];
        }
        elseif ($_POST['userType']=="storeManager") {
        $_SESSION['idstoreManager'] = $row['idstoreManager'];
        }
        elseif ($_POST['userType']=="driver") {
        $_SESSION['iddriver'] = $row['iddriver'];
        }
        else {
          header("Location: ../login.php?error=usertypenotselected");
          exit();
        }

        header("Location: ../index.php?login=success");
        exit();
      }else {
        echo "<script>alert('Your Account has been Disabled by the Admin')</script>";
        echo "<script>window.location='../index.php'</script>";
      }
      }
      else {
        header("Location: ../login.php?error=wrongpassword");
        exit();
      }
    }
    else {
      header("Location: ../login.php?error=nouser");
      exit();
    }
  }
}

}
else {
  header("Location: ../index.php");
  exit();
}
