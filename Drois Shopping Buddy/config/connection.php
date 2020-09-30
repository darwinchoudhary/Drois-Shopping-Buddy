<?php
//Define database Connection Parameters
//for this application
//

//TODO : Make sure connection parameters are correct
$DBServer = '127.0.0.1'; // e.g 'localhost' or '127.0.0.1'
$DBUser   = 'root';  //the MySQL user name
$DBPass   = '';  //the MySQL user password
$DBName   = 'shopping_buddy'; //the MySQL database name
//
$conn=mysqli_connect($DBServer,$DBUser,$DBPass,$DBName);
if(!$conn){
  die("Connection Failed: ".mysqli_connect_error());
}
