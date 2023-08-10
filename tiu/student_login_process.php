<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = mysqli_connect("localhost", "your_mysql_username", "your_mysql_password", "student_database");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = $_POST["student_username"];
    $password = $_POST["student_password"];

    $sql = "SELECT * FROM studentdb WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user["password"])) {
            session_start();
            $_SESSION["student_username"] = $username;
            header("Location: student-portal.php"); 
            exit();
        } else {
            header("Location: student-login.html");
            exit();
        }
    } else {
        echo "User not found.";
    }

    mysqli_close($conn);
}
?>