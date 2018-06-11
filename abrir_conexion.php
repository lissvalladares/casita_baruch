<?php
$servername = "localhost";
$username = "Jose";
$password = "1234";
$database= "proyecto_panaderia";
$conn= mysqli_connect($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
 ?>
