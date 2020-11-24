<?php 

$servername = "localhost";
$username = "root";
$password = "";
$namadb = "sipendar";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $namadb);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}