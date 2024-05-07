<?php
include_once("../backend/config.php");
// Assuming you have already established a database connection

// Check if the form is submitted for update or delete
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update'])) {
        // Handle update operation
        $branch_id = $_POST['branch_id'];
        $mobile = $_POST['mobile'];
        
        // Perform update query
        $sql = "UPDATE branches SET mobile='$mobile' WHERE branch_id=$branch_id";
        
        if (mysqli_query($conn, $sql)) {
            header("Location: display.php");
        } else {
            header("Location: display.php");
        }
    } elseif (isset($_POST['delete'])) {
        // Handle delete operation
        $branch_id = $_POST['branch_id'];
        
        // Perform delete query
        $sql = "DELETE FROM branches WHERE branch_id=$branch_id";
        
        if (mysqli_query($conn, $sql)) {
            header("Location: display.php");
        } else {
            header("Location: display.php");
        }
    }
}
?>
