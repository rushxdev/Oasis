// Get references to HTML elements
var imageSlides = document.getElementsByClassName('imageSlides');
var circles = document.getElementsByClassName('circle');
var leftArrow = document.getElementById('leftArrow');
var rightArrow = document.getElementById('rightArrow');
var counter = 0;  // Counter to keep track of the current image

// HIDE ALL IMAGES FUNCTION
function hideImages() {
  for (var i = 0; i < imageSlides.length; i++) {
    imageSlides[i].classList.remove('visible');
  }
}

// REMOVE ALL DOTS FUNCTION
function removeDots() {
  for (var i = 0; i < imageSlides.length; i++) {
    circles[i].classList.remove('dot');
  }
}

// SINGLE IMAGE LOOP/CIRCLES FUNCTION
function imageLoop() {
  var currentImage = imageSlides[counter];
  var currentDot = circles[counter];
  currentImage.classList.add('visible');
  removeDots();
  currentDot.classList.add('dot');
  counter++;
}

// LEFT & RIGHT ARROW FUNCTION & CLICK EVENT LISTENERS
function arrowClick(e) {
  var target = e.target;
  if (target == leftArrow) {
    clearInterval(imageSlideshowInterval);
    hideImages();
    removeDots();
    if (counter == 1) {
      counter = (imageSlides.length - 1);
      imageLoop();
      imageSlideshowInterval = setInterval(slideshow, 10000);
    } else {
      counter--;
      counter--;
      imageLoop();
      imageSlideshowInterval = setInterval(slideshow, 10000);
    }
  } 
  else if (target == rightArrow) {
    clearInterval(imageSlideshowInterval);
    hideImages();
    removeDots();
    if (counter == imageSlides.length) {
      counter = 0;
      imageLoop();
      imageSlideshowInterval = setInterval(slideshow, 10000);
    } else {
      imageLoop();
      imageSlideshowInterval = setInterval(slideshow, 10000);
    }
  }
}
// Add click event listeners to left and right arrows
leftArrow.addEventListener('click', arrowClick);
rightArrow.addEventListener('click', arrowClick);


// IMAGE SLIDE FUNCTION
function slideshow() {
  if (counter < imageSlides.length) {
    imageLoop();
  } else {
    counter = 0;
    hideImages();
    imageLoop();
  }
}

// SHOW FIRST IMAGE, & THEN SET & CALL SLIDE INTERVAL
setTimeout(slideshow, 1000);
var imageSlideshowInterval = setInterval(slideshow, 10000);

//Doctor Showing//
document.getElementById("speciality").onchange = function() {
    var speciality = document.getElementById("speciality").value;
    var doctors = document.querySelectorAll(".input-box");

    // Show all doctors initially
    for (var i = 0; i < doctors.length; i++) {
        doctors[i].style.display = "block";
    }

    // Filter doctors based on selected speciality
    if (speciality !== "Select") {
        for (var i = 0; i < doctors.length; i++) {
            var doctorSpecialities = doctors[i].querySelector(".input-box > div").classList;
            if (!doctorSpecialities.contains(speciality)) {
                doctors[i].style.display = "none";
            }
        }
    }

     // Adjust scroll bar size based on visible doctors
     var visibleDoctors = document.querySelectorAll(".input-box[style='display: block;']");
     var totalHeight = 0;
     for (var i = 0; i < visibleDoctors.length; i++) {
         totalHeight += visibleDoctors[i].offsetHeight;
     }
     scrollBar.style.height = totalHeight + "px";
};//Doctor show ending


function redirectToConsultation(doctorName, speciality) {
    // Store data in localStorage
    localStorage.setItem("doctorName", doctorName);
    localStorage.setItem("speciality", speciality);

    // Redirect to consult2.html
    window.location.href = "consult.php";
}

/*
function redirectToConsultation(DoctorName, speciality) {
  document.getElementById("drName").value = DoctorName;
  document.getElementById("Specialized_field").value = speciality;
  document.getElementById("doctorForm").submit(); // Submit the form
}
*/

