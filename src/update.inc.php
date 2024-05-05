<?php
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appointment_id = $_POST['appointment_id'];
    $new_date = $_POST['date'];
    $new_time = $_POST['time'];
    
    
    $sql = "UPDATE appointment SET date='$new_date', time='$new_time' WHERE appointment_id='$appointment_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Appointment updated successfully";
    } else {
        echo "Error updating appointment: " . $conn->error;
    }
}

$conn->close();
?>
