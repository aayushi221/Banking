<?php

$servername = "localhost";
$username = "id15222326_aayushipandey";
$password = ")uZ(w^mxIODs&A3Z1&J^";
$database = "id15222326_mydb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
