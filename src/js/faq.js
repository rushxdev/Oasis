function validateForm()
 {
  let x = document.forms["qform"]["qmessage"].value;
  if (x == "") {
    alert("form must be filled out");
    return false;
  }
}

function confirmDelete() {
  return confirm("Are you sure you want to delete this item?");
}

function validateFormup() {
  var question = document.getElementById("questionid").value;
  var message = document.getElementById("question-text").value;
  
  if (question.trim() == "" || message.trim() == "") {
      alert("Please fill out all fields");
      return false;
  }
  return true;
}


