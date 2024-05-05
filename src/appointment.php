<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Appointments</title>
</head>
<body>
    <h2>Your Appointments</h2>
    <?php
  
    include 'config.php';

    $username = $_SESSION['username'];
    $user_query = "SELECT userid FROM users WHERE username='$username'";
    $user_result = $conn->query($user_query);
    $row = $user_result->fetch_assoc();
    $user_id = $row['userid'];

    $appointment_query = "SELECT * FROM appointment WHERE user_id='$user_id'";
    $appointment_result = $conn->query($appointment_query);

    if ($appointment_result->num_rows > 0): ?>
        <ul>
            <?php while($row = $appointment_result->fetch_assoc()): ?>
                <li>
                    <strong>Appointment ID:</strong> <?php echo $row['appointment_id']; ?><br>
                    <strong>Patient Name:</strong> <?php echo $row['patient_name']; ?><br>
                    <strong>Age:</strong> <?php echo $row['age']; ?><br>
                    <strong>Doctor Name:</strong> <?php echo $row['doctor_name']; ?><br>
                    <strong>Specialization:</strong> <?php echo $row['specialization']; ?><br>
                    <strong>Date:</strong> <?php echo $row['date']; ?><br>
                    <strong>Time:</strong> <?php echo $row['time']; ?><br>

                    <a href="update.php?appointment_id=<?php echo $row['appointment_id']; ?>">Update Appointment</a><br><br>
                    <!-- Form to submit appointment ID for deletion -->
                    <form action="delete.inc.php" method="POST">
                        <input type="hidden" name="appointment_id" value="<?php echo $row['appointment_id']; ?>">
                        <input type="submit" name="delete_appointment" value="Delete Appointment">
                    </form>
                    <br><br>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>No appointments scheduled yet.</p>
    <?php endif; ?>
</body>
</html>
