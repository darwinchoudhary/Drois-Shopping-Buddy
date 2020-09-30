<?php
session_start();
include_once 'config/connection.php';
include_once 'views/view_navbar_admin.php';
include_once 'customer/component.php';

if (isset($_POST['disableAcc'])) {

  $sqldisable="UPDATE ".$_GET['table']." SET enable=0 WHERE ".$_GET['idName']."='".$_GET['id']."'";
  if ($result=$conn->query($sqldisable)) {

  }else {
    header("Location: regCustomers.php?error=sqldisableFailed:".$conn->error);
    exit();
  }
}
if (isset($_POST['enableAcc'])) {
  $sqlenable="UPDATE ".$_GET['table']." SET enable=1 WHERE ".$_GET['idName']."='".$_GET['id']."'";
  if ($result=$conn->query($sqlenable)) {

  }else {
    header("Location: regCustomers.php?error=sqlenableFailed:".$conn->error);
    exit();
  }
}

//Customers
echo "<br><h4 class='text-center'>All Registered Customers</h4><br>";
$sql="SELECT * FROM customer";
if ($rs=$conn->query($sql)) {
  echo '<div class="col-md-auto"><table class="table table-striped table-dark">
<thead>
<tr>
<th scope="col">Username</th>
<th scope="col">FirstName</th>
<th scope="col">LastName</th>
<th scope="col">Email</th>
<th scope="col">Disable</th>
<th scope="col">Enable</th>
</tr>
</thead>
<tbody>';
  while ($row=$rs->fetch_assoc()) {
    if ((int)$row['enable']==1) {
    echo '<tr><td>'.$row['idcustomer'].'</td><td>'.$row['firstName'].'</td><td>'.$row['lastName'].'</td><td>'.$row['email'].'</td><td><form class="cart-items" action="regCustomers.php?action=disableAcc&id='.$row['idcustomer'].'&table=customer&idName=idcustomer" method="post"><button type="submit" class="btn btn-danger" name="disableAcc">Disable</button></form></td><td></td></tr>';
    }
    elseif ((int)$row['enable']==0) {
    echo '<tr><td>'.$row['idcustomer'].'</td><td>'.$row['firstName'].'</td><td>'.$row['lastName'].'</td><td>'.$row['email'].'</td><td></td><td><form class="cart-items" action="regCustomers.php?action=disableAcc&id='.$row['idcustomer'].'&table=customer&idName=idcustomer" method="post"><button type="submit" class="btn btn-success" name="enableAcc">Enable</button></form></td></tr>';
    }
  }
  echo '</tbody></table></div>';
}else {
  echo "sqlfailed:".$conn->error;
}

//Store Manager
echo "<br><h4 class='text-center'>All Registered Store Managers</h4><br>";
$sql="SELECT * FROM storemanager";
if ($rs=$conn->query($sql)) {
  echo '<div class="col-md-auto"><table class="table table-striped table-dark">
<thead>
<tr>
<th scope="col">Username</th>
<th scope="col">FirstName</th>
<th scope="col">LastName</th>
<th scope="col">Email</th>
<th scope="col">Disable</th>
<th scope="col">Enable</th>
</tr>
</thead>
<tbody>';
  while ($row=$rs->fetch_assoc()) {
    if ((int)$row['enable']==1) {
    echo '<tr><td>'.$row['idstoreManager'].'</td><td>'.$row['firstName'].'</td><td>'.$row['lastName'].'</td><td>'.$row['email'].'</td><td><form class="cart-items" action="regCustomers.php?action=disableAcc&id='.$row['idstoreManager'].'&table=storemanager&idName=idstoreManager" method="post"><button type="submit" class="btn btn-danger" name="disableAcc">Disable</button></form></td><td></td></tr>';
    }
    elseif ((int)$row['enable']==0) {
    echo '<tr><td>'.$row['idstoreManager'].'</td><td>'.$row['firstName'].'</td><td>'.$row['lastName'].'</td><td>'.$row['email'].'</td><td></td><td><form class="cart-items" action="regCustomers.php?action=disableAcc&id='.$row['idstoreManager'].'&table=storemanager&idName=idstoreManager" method="post"><button type="submit" class="btn btn-success" name="enableAcc">Enable</button></form></td></tr>';
    }
  }
  echo '</tbody></table></div>';
}else {
  echo "sqlfailed:".$conn->error;
}

//Driver
echo "<br><h4 class='text-center'>All Registered Drivers</h4><br>";
$sql="SELECT * FROM driver";
if ($rs=$conn->query($sql)) {
  echo '<div class="col-md-auto"><table class="table table-striped table-dark">
<thead>
<tr>
<th scope="col">Username</th>
<th scope="col">FirstName</th>
<th scope="col">LastName</th>
<th scope="col">Email</th>
<th scope="col">Disable</th>
<th scope="col">Enable</th>
</tr>
</thead>
<tbody>';
  while ($row=$rs->fetch_assoc()) {
    if ((int)$row['enable']==1) {
    echo '<tr><td>'.$row['iddriver'].'</td><td>'.$row['firstName'].'</td><td>'.$row['lastName'].'</td><td>'.$row['email'].'</td><td><form class="cart-items" action="regCustomers.php?action=disableAcc&id='.$row['iddriver'].'&table=driver&idName=iddriver" method="post"><button type="submit" class="btn btn-danger" name="disableAcc">Disable</button></form></td><td></td></tr>';
    }
    elseif ((int)$row['enable']==0) {
    echo '<tr><td>'.$row['iddriver'].'</td><td>'.$row['firstName'].'</td><td>'.$row['lastName'].'</td><td>'.$row['email'].'</td><td></td><td><form class="cart-items" action="regCustomers.php?action=disableAcc&id='.$row['iddriver'].'&table=driver&idName=iddriver" method="post"><button type="submit" class="btn btn-success" name="enableAcc">Enable</button></form></td></tr>';
    }
  }
  echo '</tbody></table></div>';
}else {
  echo "sqlfailed:".$conn->error;
}
