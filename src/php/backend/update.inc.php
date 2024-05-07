<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete_appointment"])) {
        $appointment_id = $_POST['appointment_id'];

        $delete_sql = "DELETE FROM appointment WHERE appointment_id='$appointment_id'";

        if ($conn->query($delete_sql)) {
            header("Location:../frontend/profile.php"); 
        } else {
            header("Location:../frontend/index.php?error=failed"); 
        }
    } else {

        $appointment_id = $_POST['appointment_id'];
        $new_date = $_POST['date'];
        $new_time = $_POST['time'];


        $sql = "UPDATE appointment SET date='$new_date', time='$new_time' WHERE appointment_id='$appointment_id'";

        if ($conn->query($sql) === TRUE) {
            header("Location:../frontend/profile.php"); 
        } else {
            header("Location:../frontend/profile.php?error=failed"); 
        }
    }
}

$conn->close();
?>