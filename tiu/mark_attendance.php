<?php
// Replace the following lines with your database connection setup
$host = "localhost";
$dbname = "attendance_db";
$user = "teacher_username";
$password = "teacher_password";

// Create a PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle database connection error
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentId = $_POST["studentId"];
    $teacherId = $_POST["teacherId"];
    $date = date("Y-m-d");
    $isPresent = isset($_POST["isPresent"]) ? 1 : 0;

    // Insert attendance record into the database
    $query = "INSERT INTO attendance (student_id, teacher_id, date, is_present) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);

    try {
        $stmt->execute([$studentId, $teacherId, $date, $isPresent]);
        
        // Set a session variable to indicate successful attendance marking
        session_start();
        $_SESSION["attendance_marked"] = true;

        // Redirect back to the teacher portal
        header("Location: teacher-portal.php");
        exit();
    } catch (PDOException $e) {
        // Handle database error
        die("Error inserting attendance: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mark Attendance</title>
    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!--FONT-AWESOME ICONS-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <!-- ===============UNICONS================ -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <header>
                <!-- Header content goes here -->
                <nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary bg-dark border-bottom border-body"
            data-bs-theme="dark">
            <div class="container-fluid">
            <img src="images/course_5__2_-removebg-preview.png" alt="Logo" width="95" height="60"
                class="d-inline-block align-text-top">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">CAMPUS CHRONICLES</a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Student Life</a></li>
                    <li><a class="dropdown-item" href="#">Innovation Center</a></li>
                    <li><a class="dropdown-item" href="#">Students Club</a></li>
                    <li><a class="dropdown-item" href="#">Sports</a></li>
                    <li><a class="dropdown-item" href="#">Cultural Activities</a></li>
                    <li><a class="dropdown-item" href="#">Grievance Cell</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    EXPLORE US
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">History</a></li>
                    <li><a class="dropdown-item" href="#">Mission</a></li>
                    <li><a class="dropdown-item" href="#">Vision</a></li>
                    <li><a class="dropdown-item" href="#">Priority & Trust</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">FAQ</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="#">Placement Cell</a>
                </li>
                </ul>
                <div class="media-icons">
                    <a href="#" target="_blank"
                    style="color:white; font-size: 1.5rem ; margin: 0 0 0 30px;"><i class="fab fa-instagram"></i></a>
                    <a href="#" target="_blank"
                    style="color:white; font-size: 1.5rem ; margin: 0 0 0 30px;"><i class="fab fa-linkedin"></i></a>
                    <a href="#" target="_blank"
                    style="color:white; font-size: 1.5rem ; margin: 0 0 0 30px;"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
            </div>

        </nav>
    </header>
    <main>
        <section class="mark-attendance">
            <h2>Mark Attendance</h2>
            <hr class="rule">
            <form action="mark_attendance.php" method="post">
                <!-- Here, you need to fetch the list of students for the teacher's class from the database -->
                <!-- For the sake of simplicity, let's assume we have a predefined list of students -->
                <input type="hidden" name="teacherId" value="[Teacher ID]">
                <label id="lab" for="studentId">Select Student:</label>
                <select id="studentId" name="studentId" required>
                    <option value="1">Adarsh Prakash</option>
                    <option value="2">Abhimanyu Kumar</option>
                    <option value="3">Akash Ghosh</option>
                    <option value="4">Jacky Kumar</option>
                    <option value="5">Akash Paul</option>
                    <option value="6">Remond Anthony</option>
                    <!-- Add more options based on the actual student data -->
                </select>
                <br>
                <br>
                <label id="lab1" for="isPresent">Present:</label>
                <input type="checkbox" id="isPresent" name="isPresent">
                <br>
                <button id="lab2" type="submit">Submit</button>
            </form>
        </section>
    </main>
    <footer>
        <!-- Footer content goes here -->
        <p>&copy; 2023 College Website. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
</body>
</html>
