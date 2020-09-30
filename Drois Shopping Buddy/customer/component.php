<?php
function component($productName,$productPrice,$productImg,$productId){
  $element='
  <div class="col-md-3 col-sm-6">
    <form action="tesco.php" method="post">
      <div class="card shadow">
        <div>
          <img src="itemImages/'.$productImg.'" alt="Ps4" class="img-fluid card-img-top" id="productImage">
        </div>
        <div class="card-body">
          <h6 class="card-title">'.$productName.'</h6>
          <h6>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </h6>
          <p class="card-text">Some Quick Example Text to tell about product</p>
          <h6>
            <small><s class="text-secondary">$519</s></small>
            <span class="price">$'.$productPrice.'</span>
          </h6>
          <button type="submit" class="btn btn-warning my-3" name="add">Add to Cart<i class="fas fa-shopping-cart"></i></button>
          <input type="hidden" name="product_id" value="'.$productId.'">
        </div>
      </div>
    </form>
  </div>

  ';
  echo $element;
}

function cartElement($productImg,$productName,$productPrice,$productSeller,$productId){
  $element='
  <form class="cart-items" action="cart.php?action=remove&id='.$productId.'" method="post">
    <div class="border rounded">
      <div class="row bg-white">
        <div class="col-md-3 pl-0">
           <img src="itemImages/'.$productImg.'" alt="Product" class="img-fluid">
        </div>
        <div class="col-md-6">
         <h6 class="pt-2">'.$productName.'</h6>
         <small class="text-secondary">Seller: '.$productSeller.'</small>
         <h6 class="pt-2">$'.$productPrice.'</h6>
         <button type="submit" class="btn btn-warning">Save for Later</button>
         <button type="submit" class="btn btn-danger mx-2" name="remove">Remove</button>
       </div>
        <div class="col-md-3 py-5">
          <button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-minus"></i></button>
          <input type="text" class="form-control w-25 d-inline" value="1">
          <button type="button" class="btn bg-light border rounded-circle"><i class="fas fa-plus"></i></button>
        </div>
      </div>
    </div>
  </form>
  ';
  echo $element;
}


function tableElement($orderId){
  $DBServer = '127.0.0.1'; // e.g 'localhost' or '127.0.0.1'
  $DBUser   = 'root';  //the MySQL user name
  $DBPass   = '';  //the MySQL user password
  $DBName   = 'shopping_buddy'; //the MySQL database name
  //
  $conn=mysqli_connect($DBServer,$DBUser,$DBPass,$DBName);
  if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
  }
  $output='';

  $sql="SELECT shopping_buddy.item.iditem,shopping_buddy.item.itemName,shopping_buddy.item.itemPrice,shopping_buddy.item.storeNumber FROM shopping_buddy.item
  INNER JOIN shopping_buddy.order ON shopping_buddy.order.idItem = shopping_buddy.item.iditem WHERE idorder=".$orderId;
  if ($rs=$conn->query($sql)) {

    while ($row=$rs->fetch_assoc()) {
      if ($row['storeNumber']==1) {
        $seller='Tesco';
      }elseif ($row['storeNumber']==2) {
        $seller='Dunnes';
      }else {
        $seller='Lidl';
      }
      $output=$output."<tr><td>".$row['iditem']."</td><td>".$row['itemName']."</td><td>".$row['itemPrice']."</td><td>".$seller."</td></tr>";
    }
  }
  else {
    header("Location: ../newOrder.php?error=sqlcomponentfailed=".$conn->error);
    exit();
  }
  return $output;
}


function orderElement($orderId,$customerName,$deliveryId){
  //<tr>
    //<th scope="row">12</th>
    //<td>DualShock 4</td>
    //<td>$39.99</td>
    //<td>Dunnes</td>
  //</tr>

  $table=tableElement($orderId);

  $element='
  <form class="cart-items" action="newOrder.php?action=acceptOrderbtn&id='.$deliveryId.'" method="post">

    <div class="border rounded card shadow m-4">
      <div class="row bg-white">
        <div class="col-md-9">
         <h6 class="pt-2">Order Id: '.$orderId.'</h6>
         <h6 class="pt-2">Customer: '.$customerName.'</h6>
         <h6 class="pt-2">Items Ordered:</h6>
         <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">ItemId</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Seller</th>
    </tr>
  </thead>
  <tbody>
  '.$table.'

  </tbody>
</table>
         <button type="submit" class="btn btn-primary" name="acceptOrderbtn">Accept Order</button>

       </div>

      </div>
    </div>
  </form>
  ';
  echo $element;
}

function salesElement($orderId,$customerName,$deliveryId){
  //<tr>
    //<th scope="row">12</th>
    //<td>DualShock 4</td>
    //<td>$39.99</td>
    //<td>Dunnes</td>
  //</tr>

  $table=tableElement($orderId);

  $element='
  <form class="cart-items" action="newOrder.php?action=acceptOrderbtn&id='.$deliveryId.'" method="post">

    <div class="border rounded card shadow m-4">
      <div class="row bg-white">
        <div class="col-md-9">
         <h6 class="pt-2">Order Id: '.$orderId.'</h6>
         <h6 class="pt-2">Customer: '.$customerName.'</h6>
         <h6 class="pt-2">Items Ordered:</h6>
         <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">ItemId</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Seller</th>
    </tr>
  </thead>
  <tbody>
  '.$table.'

  </tbody>
</table>
         

       </div>

      </div>
    </div>
  </form>
  ';
  echo $element;
}

function currentOrderElement($orderId,$customerName,$deliveryId){
  //<tr>
    //<th scope="row">12</th>
    //<td>DualShock 4</td>
    //<td>$39.99</td>
    //<td>Dunnes</td>
  //</tr>

  $table=tableElement($orderId);

  $element='
  <form class="cart-items" action="currentOrder.php?action=discard&id='.$deliveryId.'" method="post">

    <div class="border rounded card shadow m-4">
      <div class="row bg-white">
        <div class="col-md-9">
         <h6 class="pt-2">Order Id: '.$orderId.'</h6>
         <h6 class="pt-2">Customer: '.$customerName.'</h6>
         <h6 class="pt-2">Items Ordered:</h6>
         <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">ItemId</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Seller</th>
    </tr>
  </thead>
  <tbody>
  '.$table.'

  </tbody>
</table>
         <button type="submit" class="btn btn-danger" name="discard">Discard Order</button>

       </div>

      </div>
    </div>
  </form>
  ';
  echo $element;
}
