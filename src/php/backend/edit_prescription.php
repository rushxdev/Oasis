<?php

include_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_prescription'])) {
    $branch = $_POST["branch"];
    $prescription_id = $_POST["prescription_id"];

    $sql = "UPDATE prescription SET branch = ? WHERE prescription_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $branch, $prescription_id);

    if ($stmt->execute()) {
        header("Location:../frontend/profile.php?success=true");
    } else {
        header("Location:../frontend/profile.php?error=submissionFailed");
    }

    $stmt->close();
    $conn->close();
    exit(0);
}
