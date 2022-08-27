<?php
$server="localhost";
$username="root";
$password="";
$database="final";







//establish the connection
$con=mysqli_connect($server,$username,$password,$database);

$check=false;

if(!$con){
  echo " <script>alert('Unable to connect to data base try again later')</script>";
}

?>