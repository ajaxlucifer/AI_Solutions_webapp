<?php
$servername = "localhost";
$username = "root";  // default XAMPP user
$password = "";      // leave blank if none
$dbname = "contact_db"; // ✅ must match your phpMyAdmin DB name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
