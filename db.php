<?php
$servername = "localhost";
$username = "root";
$password = "";
$stetis= "stetis";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $stetis);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>