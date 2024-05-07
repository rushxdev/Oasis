<?php
// Include your database connection file
include '../backend/config.php';

// Check if the form is submitted
if(isset($_POST['update'])) {
    // Retrieve the question ID and reply from the form
    $question_id = $_POST['question_id'];
    $reply = $_POST['reply'];

    // Prepare an SQL statement to update the reply in the database
    $sql = "UPDATE questions SET reply='$reply' WHERE question_id='$question_id'";

    // Execute the SQL statement
    $result = mysqli_query($conn, $sql);

    // Check if the update was successful
    if ($result) {
        // Redirect back to the page where questions are displayed
        header("Location: question.php");
        exit();
    } else {
        // If update fails, display an error message
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);