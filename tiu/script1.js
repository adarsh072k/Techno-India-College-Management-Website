document.addEventListener("DOMContentLoaded", function() {
  const markAttendanceBtn = document.getElementById("markAttendanceBtn");

  markAttendanceBtn.addEventListener("click", function() {
    // Redirect to the attendance marking page
    window.location.href = "mark_attendance.php";
  });
});
