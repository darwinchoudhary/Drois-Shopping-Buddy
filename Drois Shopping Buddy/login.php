<?php

include_once 'views/view_navbar_general.php';

 ?>
 <div class="container">
   <br><br>

   <div class="row justify-content-center">
     <div class="col-sm">
       <h4>Login</h4>


     <form action="loginIncludes/login.inc.php" method="post">
       <input type="radio" id="admin" name="userType" value="admin">
   <label for="admin">Administrator</label><br>
   <input type="radio" id="customer" name="userType" value="customer">
   <label for="customer">Customer</label><br>
   <input type="radio" id="storeManager" name="userType" value="storeManager">
   <label for="storeManager">Store Manager</label><br>
   <input type="radio" id="driver" name="userType" value="driver">
   <label for="driver">Driver</label><br>
         <input type="text" name="mailuid" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password ">
        <br>
        <input class="" type="checkbox" >

    <label class="form-check-label" for="inlineFormCheck">
      Remember me
    </label><br>
         <button type="submit" class="btn btn-primary" name="login-submit">Login</button>
     </form>
   </div>
   </div>

 </div>
