// Retrieve data from localStorage
var doctorName = localStorage.getItem("doctorName");
var speciality = localStorage.getItem("speciality");

// Check if doctorName and speciality are not null
if (doctorName !== null && speciality !== null) {
    document.getElementById("Speciality").value = speciality;
    document.getElementById("DrName").value = doctorName;
}

// Optional: Add event listener for back button
document.getElementById("backButton").addEventListener("click", function() {
    // Redirect back to consultation.html
    window.location.href = "Consultation.php";
});

document.addEventListener("DOMContentLoaded", function() {
    // Find the "Back" button element
    var backButton = document.getElementById("backButton");

    // Add a click event listener to the "Back" button
    backButton.addEventListener("click", function() {
        // Redirect to consultation.html
        window.location.href = "Consultation.html";
    });
});
