<?php

$servername = "localhost";
$username = "id15222326_aayushipandey";
$password = "Kindle@89350";
$database = "id15221976_new_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
