<?php
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = $_POST["name"];
    $NIC = $_POST["nic"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $pwd = $_POST["password"];
    $pwdRepeat = $_POST["password_repeat"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    
   
    $sql = "INSERT INTO users (name, nic, email, username, age, gender, address, contact, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../register.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssissss", $name, $NIC, $email, $username, $age, $gender, $address, $contact, $pwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../frontend/login.php?error=none");
    exit();
}
