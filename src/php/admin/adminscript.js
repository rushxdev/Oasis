// User.php Script codes

function validateMobileNumber(inputtxt) {
    var mobilePattern = /^[0-9]{10}$/;
    if (inputtxt.value.match(mobilePattern)) {
        return true;
    } else {
        alert("Please enter a valid 10-digit mobile number!");
        inputtxt.focus();
        return false;
    }
}

function displayOutput(output) {
    alert(output);
}






// Display.php script codes

// function filterByDistrict(district) {
//     var table, rows, cells, districtIndex;
//     table = document.getElementById("branchTable");
//     rows = table.getElementsByTagName("tr");
//     cells = rows[0].getElementsByTagName("th");
//     for (var i = 0; i < cells.length; i++) {
//       if (cells[i].textContent === "District Name") {
//         districtIndex = i;
//         break;
//       }
//     }
//     for (var i = 1; i < rows.length; i++) {
//       cells = rows[i].getElementsByTagName("td");
//       if (cells[districtIndex].textContent === district) {
//         rows[i].style.display = "";
//       } else {
//         rows[i].style.display = "none";
//       }
//     }
//   }
  
function searchByDistrict() {
    // Get the selected district from the dropdown
    var districtDropdown = document.getElementById("districtDropdown");
    var selectedDistrict = districtDropdown.value;

    // Redirect to a search page with the selected district as a query parameter
    window.location.href = "search.php?district=" + encodeURIComponent(selectedDistrict);
}
