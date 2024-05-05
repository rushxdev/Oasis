<!-- <?php
//session_start();

?> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Appointment</title>
</head>
<body>
    <h2>Update Appointment</h2>
    <form action="update.inc.php" method="POST">
        <label for="appointment_id">Appointment ID:</label><br> 
        <input type="text" id="appointment_id" name="appointment_id" required><br>
        <!-- <input type="hidden" name="appointment_id" value="<?php echo $row['appointment_id']; ?>"> -->
        <label for="date">New Date:</label><br>
        <input type="date" id="date" name="date" required><br>
        <label for="time">New Time:</label><br>
        <input type="time" id="time" name="time" required><br><br>
        <input type="submit" value="Update Appointment">
    </form>
</body>
</html>


