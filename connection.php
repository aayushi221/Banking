<?php


$servername ="localhost";
$username = "root";
$password ="";
$dbname = "banking-system";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn)
{
echo "" ;
}

else
{
  die("Connection failed because" .mysqli_connect_error()) ;
}

?>