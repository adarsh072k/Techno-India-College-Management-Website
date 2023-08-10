
<?php
session_start();

// Check if the teacher is logged in
if (!isset($_SESSION["teacher_username"])) {
    header("Location: teacher-login.html"); // Redirect to login page if not logged in
    exit();
}

// Retrieve teacher's name from session
$teacherName = "Teacher"; // Default value if not set
if (isset($_SESSION["teacher_username"])) {
    $teacherName = $_SESSION["teacher_username"];
}

$attendanceMarked = isset($_SESSION["attendance_marked"]) && $_SESSION["attendance_marked"];

// Clear the session variable
unset($_SESSION["attendance_marked"]);
?>


<!DOCTYPE html>
<html>
<head>
  <title>Teacher Portal</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <!--FONT-AWESOME ICONS-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

  <!-- ===============UNICONS================ -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
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

  <script>
        // JavaScript to show an alert if attendance is marked
        <?php if ($attendanceMarked) : ?>
        window.onload = function() {
            alert("You have successfully marked the attendance.");
        };
        <?php endif; ?>
    </script>
  </header>
  <main>
    <section id="teacher" class="landing-section">
      <h2>Welcome, <?php echo $teacherName; ?>!</h2>
      <hr class="rule">
      <p>Welcome to your, Teacher's Portal.</p>
      <button id="addLectureBtn">Add Lecture Video</button>

      <button id="markAttendanceBtn">Mark Attendance</button>


      <h3>Uploaded Lectures</h3>
      <ul>
        <?php
        // Display list of uploaded lectures
        $lectureFiles = glob("uploads/*.mp4");
        foreach ($lectureFiles as $lectureFile)
        {
          echo "<li><a href='$lectureFile' target='_blank'>" . basename($lectureFile) . "</a></li>";
        }
        ?>
      </ul>

      <button id="logoutButton">Logout</button>
    </section>
  </main>
  <footer>
    <!-- Footer content goes here -->
    <p>&copy; 2023 College Website. All rights reserved.</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>

    <script src="script1.js"></script>
</body>
</html>



  