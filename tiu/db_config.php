<?php
// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "attendance_db";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Function to get the list of students
function get_students() {
  global $conn;
  $sql = "SELECT id, name FROM students";
  $result = $conn->query($sql);
  $students = array();
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $students[] = $row;
    }
  }
  return $students;
}

// Function to mark attendance for a student
function mark_attendance($studentId) {
  global $conn;
  $sql = "UPDATE students SET attendance_status = 1 WHERE id = " . $studentId;
  $conn->query($sql);
}
?>
