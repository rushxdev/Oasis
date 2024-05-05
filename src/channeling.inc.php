<?php
include 'config.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $specialization = $_POST['specialization'];
    $doctor_name = $_POST['doctor_name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $patient_name = $_POST['patient_name'];
    $age = $_POST['age'];
    
    
    session_start();
    $username = $_SESSION['username'];
    $user_query = "SELECT userid FROM users WHERE username='$username'";
    $user_result = $conn->query($user_query);
    $row = $user_result->fetch_assoc();
    $user_id = $row['userid'];
    
   
    $sql = "INSERT INTO appointment (patient_name, age, email, doctor_name, specialization, date, time, user_id)
            VALUES ('$patient_name', '$age', '', '$doctor_name', '$specialization','$date','$time', '$user_id')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Appointment scheduled successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
