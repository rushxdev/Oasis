document.getElementById('gpsToggle').addEventListener('change', function() {
  if (this.checked) {
    console.log('GPS turned ON');
  } else {
    console.log('GPS turned OFF');
  }
});


function clearAll() {
  document.getElementById("branchDetails").innerHTML = ""; // Clear the table rows
  document.querySelector('iframe[name="googlemap"]').src = "https://www.google.com/maps";
  document.getElementById("district").selectedIndex = 0;
  document.getElementById("clearBtn").addEventListener("click", function() {
  clearAll(); // Call the clearAll function when the clear button is clicked
});
}

const searchForm = document.getElementById('searchForm');
const districtSelect = document.getElementById('district');
const searchBtn = document.getElementById('searchBtn');
const branchDetails = document.getElementById('branchDetails');

searchBtn.addEventListener('click', function(event) {
  event.preventDefault();
  const selectedDistrict = districtSelect.value;

  if (selectedDistrict === '') {
    alert('Please select a district');
    return;
  }

  // Send AJAX request to search for branches (using XMLHttpRequest)
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'search_branches.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  const data = `district=${selectedDistrict}`;

  xhr.onload = function() {
    if (xhr.status === 200) {
      branchDetails.innerHTML = xhr.responseText;
    } else {
      console.error('Error fetching branches:', xhr.statusText);
      alert('An error occurred while searching for branches.');
    }
  };

  xhr.onerror = function() {
    console.error('Network error:', xhr.statusText);
    alert('An error occurred while searching for branches.');
  };

  xhr.send(data);
});
