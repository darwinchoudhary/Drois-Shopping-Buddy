<!DOCTYPE html>
<html lang="en">
<head>
  <title>Drois Shopping Buddy</title>
  <meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" integrity="sha256-39jKbsb/ty7s7+4WzbtELS4vq9udJ+MDjGTD5mtxHZ0=" crossorigin="anonymous" />
<link rel="stylesheet" href="css/main.css"/>

</head>
<body>
  <nav class="navbar navbar-expand-lg  navbar-dark bg-dark  ">
  <a class="navbar-brand zero-padding" href="#"><img src="images/logo.png" id="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="insertItem.php">Insert Item</a>
      <a class="nav-item nav-link" href="deleteItem.php">Delete Item</a>
      <a class="nav-item nav-link" href="updateItem.php">Update Item</a>
    </div>
    <div class="navbar-collapse collapse w-300 order-3 dual-collapse2">
      <?php
      if (isset($_SESSION['idcustomer'])) {

        echo '<ul class="navbar-nav ml-auto"><li class="nav-item"><a class="nav-link" href="loginIncludes\logout.inc.php">Logout</a></li></ul>';

      }
      elseif (isset($_SESSION['idadministrator'])) {
      echo '<ul class="navbar-nav ml-auto"><li class="nav-item"><a class="nav-link" href="loginIncludes\logout.inc.php">Logout</a></li></ul>';
      }
      elseif (isset($_SESSION['idstoreManager'])) {
      echo '<ul class="navbar-nav ml-auto"><li class="nav-item"><a class="nav-link" href="loginIncludes\logout.inc.php">Logout</a></li></ul>';
      }
      elseif (isset($_SESSION['iddriver'])) {
        echo '<ul class="navbar-nav ml-auto"><li class="nav-item"><a class="nav-link" href="loginIncludes\logout.inc.php">Logout</a></li></ul>';
      }
      else {
        echo '<ul class="navbar-nav ml-auto"><li class="nav-item"><a class="nav-link" href="signup.php"><i class="fas fa-user-plus"></i>  SignUp</a></li><li class="nav-item"><a class="nav-link" href="login.php"><i class="fas fa-user"></i>  Login</a></li></ul>';
      }
       ?>
    </div>


  </div>
</nav>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
