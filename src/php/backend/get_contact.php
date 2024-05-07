<?php

include_once("../backend/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Prepare and bind SQL statement
    $sql = "INSERT INTO contacts (name, email, company, phone, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $company, $phone, $message);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: ../frontend/index.php?success=true");
    } else {
        header("Location: ../frontend/index.php?error=true");
    }

    // Close statement
    $stmt->close();
} else {
    // If the form is not submitted, redirect back to the form page or handle it accordingly
    header("Location: ../frontend/index.php");
    exit;
}

// Close connection
$conn->close();