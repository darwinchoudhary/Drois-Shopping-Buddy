<?php
session_start();
if (isset($_SESSION['idcustomer'])) {
  include_once 'views/view_navbar_customers.php';

}
elseif (isset($_SESSION['idadministrator'])) {
  include_once 'views/view_navbar_admin.php';
}
elseif (isset($_SESSION['idstoreManager'])) {
  include_once 'views/view_navbar_storeManager.php';
}
elseif (isset($_SESSION['iddriver'])) {
  include_once 'views/view_navbar_driver.php';
}
else {
  include_once 'views/view_navbar_general.php';
}


  if (isset($_SESSION['idcustomer'])) {
    echo "<p>Customer is logged in</p>";

  }
  elseif (isset($_SESSION['idadministrator'])) {
    echo "<p>Admin is logged in</p>";
  }
  elseif (isset($_SESSION['idstoreManager'])) {
    echo "<p>Store Manager is logged in</p>";
  }
  elseif (isset($_SESSION['iddriver'])) {
    echo "<p>Driver is logged in</p>";
  }
  else {
    echo "  <p>You are logged out</p>";
  }
  ?>
  
