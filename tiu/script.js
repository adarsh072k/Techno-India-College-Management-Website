document.addEventListener("DOMContentLoaded", function() {
  alert("You have successfully, logged in!");
    const logoutButton = document.getElementById("logoutButton");
    
    logoutButton.addEventListener("click", function() {
      window.location.href = "index.html"; // Redirect to homepage or logout page
    });
  });
  

  document.addEventListener("DOMContentLoaded", function() {
  const addLectureBtn = document.getElementById("addLectureBtn");
  
  addLectureBtn.addEventListener("click", function() {
    showLectureForm();
  });
});

function showLectureForm() {
  const lectureForm = document.createElement("div");
  lectureForm.className = "lecture-form";
  
  lectureForm.innerHTML = `
    <h3>Add Lecture Video</h3>
    <form action="upload_lecture.php" method="post" enctype="multipart/form-data">
          <label for="lectureFile">Select Video File (MP4 format only):</label>
          <input type="file" id="lectureFile" name="lectureFile" accept=".mp4" required>
          <button type="submit">Upload</button>
    </form>
  `;
  
  document.body.appendChild(lectureForm);
  
  const lectureUploadForm = document.getElementById("lectureUploadForm");
  
  lectureUploadForm.addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission
    
    // Simulate successful lecture upload
    showAlert("Lecture Video Uploaded Successfully!", "success");
    lectureForm.remove();
  });
}


