<?php

include_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_prescription'])) {
    $prescription_id = $_POST['prescription_id'];
    $branch = $_POST['branch'];

    $conn = new mysqli('your_host', 'your_username', 'your_password', 'your_database');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE prescription SET branch = ? WHERE prescription_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $branch, $prescription_id);

    if ($stmt->execute()) {
        echo "Prescription updated successfully.";
    } else {
        echo "Error updating prescription: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
