<form method="post" action="index.php?pageID=register">
<div class="form-group">
    <label for="lectID">Lecturer ID</label><input required type="text" class="form-control" id="lectID" name="lectID" pattern="[a-zA-Z0-9]{5,10}" title="Lecturer ID (5 to 10 Characters) - Enter Characters A-Z,a-z and/or numbers 0-9">
<label for="lectFirstName">First Name</label><input required type="text" class="form-control" id="lectFirstName" name="lectFirstName" pattern="[a-zA-Z0-9óáéí']{1,45}" title="First Name (up to 45 Characters)">
<label for="lectLastName">Last Name</label><input required type="text" class="form-control" id="lectLastName" name="lectLastName" pattern="[a-zA-Z0-9óáéí']{1,45}" title="Last Name (up to 45 Characters)" >
<label for="lectPass1">Password</label><input required type="password" class="form-control" id="lectPass1" name="lectPass1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
<label for="lectPass2">Re-enterPassword</label><input required type="password" class="form-control" id="lectPass2" name="lectPass2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must match the above password exactly">
</div>
<button type="submit" class="btn btn-default" name="btn" value='register'>Register</button>
</form>
