// Wait for the DOM content to be fully loaded before executing the code
document.addEventListener("DOMContentLoaded", function() {
    const slider = document.querySelector(".slider");  // Get reference to the slider container
    const slides = document.querySelectorAll(".slider img");  // Get references to all the slides in the slider
    let currentSlide = 0;  // Initialize a variable to keep track of the current slide index

    // Function to show the next slide
    function showNextSlide() {
        currentSlide++; // Increment the current slide index

         // If the current slide index exceeds the number of slides,
        // reset it back to the first slide
        if (currentSlide >= slides.length) {
            currentSlide = 0;
        }
        // Scroll the slider horizontally to show the next slide
        slider.scrollLeft = slides[currentSlide].offsetLeft;
    }

    // Set interval to automatically show the next slide after a certain time
    setInterval(showNextSlide, 2500); // Change the interval time 
});
