<?php

include_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_prescription'])) {
    $prescription_id = $_POST["prescription_id"];

    $sql = "Delete from prescription where prescription_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $prescription_id);

    if ($stmt->execute()) {
        header("Location:../frontend/profile.php?success=deleted");
    } else {
        header("Location:../frontend/profile.php?error=submissionFailed");
    }

    $stmt->close();
    $conn->close();
    exit(0);
}
