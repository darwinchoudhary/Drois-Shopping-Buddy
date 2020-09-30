<?php


include_once 'views/view_navbar_general.php';
?>
<div class="container">
  <br>
  <h4>SignUp</h4>

  <form action="loginIncludes/signup.inc.php" method="post">
    <input type="radio" id="admin" name="userType" value="admin">
<label for="admin">Administrator</label><br>
<input type="radio" id="customer" name="userType" value="customer">
<label for="customer">Customer</label><br>
<input type="radio" id="storeManager" name="userType" value="storeManager">
<label for="storeManager">Store Manager</label><br>
<input type="radio" id="driver" name="userType" value="driver">
<label for="driver">Driver</label><br>

    <div class="row justify-content-start">
      <div class="col-4">
      <h6>Username:</h6>
      <input type="text" name="uid" placeholder="Username ">
      </div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col-4">
        <h6>First Name:</h6>
        <input type="text" name="fname" placeholder="FirstName ">
      </div>
      <div class="col-4">
        <h6>Last Name:</h6>
        <input type="text" name="lname" placeholder="LastName ">
      </div>
    </div>
    <br>
    <div class="row justify-content-start">
      <div class="col-4">
      <h6>Email:</h6>
      <input type="email" name="mail" placeholder="E-Mail ">
      </div>
    </div>
    <br>

    <div class="row justify-content-start">
      <div class="col-4">
        <h6>Password:</h6>
        <input type="password" name="pwd" placeholder="Password ">
      </div>
      <div class="col-4">
        <h6>Repeat Password:</h6>
        <input type="password" name="pwd-repeat" placeholder="Repeat Password ">
      </div>
    </div>


    <br>
    <input class="" type="checkbox" >
<label class="form-check-label" for="inlineFormCheck">
  Accept Terms and Condition
</label><br><br>
    <button type="submit" class="btn btn-primary" name="signup-submit">SignUp</button>
  </form>

</div>
