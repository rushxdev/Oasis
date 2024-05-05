<?php
session_start();

include 'config.php';



$appointment_id = $_POST['appointment_id'];

$delete_sql = "DELETE FROM appointment WHERE appointment_id='$appointment_id'";

if($conn->query($delete_sql))
{
    echo "Deleted";
}
else{
    echo "delete failed";
}

$conn->close();
?>
