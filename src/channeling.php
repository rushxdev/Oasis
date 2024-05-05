<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Scheduling</title>
</head>
<body>
    <h2>Appointment Scheduling</h2>
    <form action="channeling.inc.php" method="POST">
        <label for="specialization">Specialization:</label><br>
        <input type="text" id="specialization" name="specialization" required><br>
        <label for="doctor_name">Doctor Name:</label><br>
        <input type="text" id="doctor_name" name="doctor_name" required><br>
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" required><br>
        <label for="time">Time:</label><br>
        <input type="time" id="time" name="time" required><br>
        <label for="patient_name">Patient Name:</label><br>
        <input type="text" id="patient_name" name="patient_name" required><br>
        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" required><br><br>
        <input type="submit" value="Schedule Appointment">
    </form>
</body>
</html>
