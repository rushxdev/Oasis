// This function executes whenever the value of the services dropdown changes
document.getElementById("services").onchange = function()
 {
     // Get the selected service from the dropdown
    var selectedService = document.getElementById("services").value;

    // Check the selected service and update the payment amount accordingly
    if (selectedService === "Channeling") 
    {
        // If the service is Channeling, set the payment amount to 3000 and disable the input field
        document.getElementById("payment").value = "3000";
        document.getElementById("payment").disabled = true;
    } 

    else if (selectedService === "Consulting")
    {
         // If the service is Consulting, set the payment amount to 5000 and disable the input field
        document.getElementById("payment").value = "5000";
        document.getElementById("payment").disabled = true;

    } 
    
    else if (selectedService === "Prescriptions")
    {
        // If the service is Prescriptions, set the payment amount to 1000 and disable the input field
         document.getElementById("payment").value = "1000";
         document.getElementById("payment").disabled = true;
    }

     else
    {
        // If no service is selected, clear the payment amount and enable the input field
          document.getElementById("payment").value = "";
    }
    
};
