<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = mysqli_connect("localhost", "your_mysql_username", "your_mysql_password", "teacher_database");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $fullname = $_POST["teacher_fullname"];
    $username = $_POST["teacher_username"];
    $email = $_POST["teacher_email"];
    $password = password_hash($_POST["teacher_password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO teacherdb (fullname,username, email, password) VALUES ('$fullname','$username', '$email', '$password')";
    if (mysqli_query($conn, $sql)) {
        echo "Signup successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>