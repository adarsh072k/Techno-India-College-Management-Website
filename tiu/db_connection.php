<?php
// Replace with your database credentials
$host = "localhost";
$user = "root";
$password = "teacher_password";
$database = "attendance_db";

// Create a database connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
