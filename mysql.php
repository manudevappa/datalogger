<?php
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "json";

// $servername = "localhost";
// $username = "jusexp7_cricket";
// $password = "2a8h6ogAYR";
// $dbname = "jusexp7_cricket";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully". "<br>";
?>