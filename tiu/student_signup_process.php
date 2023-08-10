<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = mysqli_connect("localhost", "your_mysql_username", "your_mysql_password", "student_database");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $fullname = $_POST["student_fullname"];
    $username = $_POST["student_username"];
    $email = $_POST["student_email"];
    $password = password_hash($_POST["student_password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO studentdb (fullname,username, email, password) VALUES ('$fullname','$username', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        echo "Signup successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
