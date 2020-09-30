<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mt-1">

      <div class="navbar-collapse collapse w-300 order-1 order-md-0 dual-collapse2">
        <a class="navbar-brand mr-auto" href="tesco.php"><h3 class="px-5"><i class="fas fa-shopping-basket"></i> Shopping Cart</h3></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

     <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
       <div class="mr-auto">

       </div>
       <div class="navbar-nav">
         <a href="cart.php" class="nav-item nav-link active px-5 cart">
             <h5 class="px-5 cart">
               <i class="fas fa-shopping-cart"></i> Cart
               <?php
               if (isset($_SESSION['cart'])) {
                 $count=count($_SESSION['cart']);
                 echo '<span id="cart_count" class="text-warning bg-li">'.$count.'</span>';
               }else {
                 echo '<span id="cart_count" class="text-warning bg-li">0</span>';
               }
                ?>

             </h5>
         </a>
       </div>
     </div>
    </nav>
</header>
