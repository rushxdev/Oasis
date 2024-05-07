document.getElementById("services").onchange = function() // This function is triggered when the value of the services dropdown changes
 {
     // Get the selected service from the dropdown
    var selectedService = document.getElementById("services").value;

    // Check which service is selected and set the corresponding payment amount
    if (selectedService === "Channeling") 
    {
        document.getElementById("payment").value = "3000";
        document.getElementById("payment").disabled = true; // Disable payment input
    } 

    else if (selectedService === "Consulting")
    {
        document.getElementById("payment").value = "5000";
        document.getElementById("payment").disabled = true; // Disable payment input

    } 
    
    else if (selectedService === "Prescriptions")
    {
         document.getElementById("payment").value = "1000";
         document.getElementById("payment").disabled = true; // Disable payment input
    }

     else
    {
        // If no service is selected, clear the payment input
          document.getElementById("payment").value = "";
    }
    
};

// This function runs when the DOM content is loaded
document.addEventListener("DOMContentLoaded", function(){
    // Get reference to the payment method radio buttons
    var paymentMethods = document.querySelectorAll('input[type="radio"][name="paymentMethod"]');

    // Get reference to the cardDetails section
    var cardDetailsSection = document.querySelector('.cardDetails');

    // Create the service not available message
    var serviceNotAvailableMsg = document.createElement('div');
    serviceNotAvailableMsg.textContent = "Service not available";
    serviceNotAvailableMsg.style.color=" red";
    serviceNotAvailableMsg.style.backgroundColor="#f8d7da";
    serviceNotAvailableMsg.style.padding="10px";
    serviceNotAvailableMsg.style.margin="10px";
    serviceNotAvailableMsg.style.textAlign="center";
    serviceNotAvailableMsg.style.border = "1px solid #f5c6cb"; // Red border

    

    // Initially hide the service not available message
    serviceNotAvailableMsg.style.display = "none";

    // Loop through each payment method radio button
    paymentMethods.forEach(function(radioButton) 
    {
        // Add change event listener to each radio button
        radioButton.addEventListener('change', function(event) {
            var selectedPaymentMethod = event.target.value;

            // Check if the selected payment method is Credit Card
            if (selectedPaymentMethod === "creditCard")
            {
                // Show the cardDetails section
                cardDetailsSection.style.display = "block";
                // Hide the service not available message
                serviceNotAvailableMsg.style.display = "none";
            } 

            else 
            {
                // Hide the cardDetails section
                cardDetailsSection.style.display = "none";
                // Show the service not available message
                serviceNotAvailableMsg.style.display = "block";
            }
        });
    });

    // Append the service not available message to the container of cardDetailsSection
    cardDetailsSection.parentNode.appendChild(serviceNotAvailableMsg);
});


