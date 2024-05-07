<?php
include 'config.php'; 

session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $admin_sql = 'SELECT * FROM admins WHERE username=? AND password=?';
    $admin_stmt = $conn->prepare($admin_sql);
    $admin_stmt->bind_param('ss', $username, $password);
    $admin_stmt->execute();
    $admin_result = $admin_stmt->get_result();

    if ($admin_result->num_rows > 0) {
        $admin_row = $admin_result->fetch_assoc();
        $_SESSION["admin_id"] = $admin_row["admin_id"];
        $_SESSION["admin_name"] = $admin_row["admin_name"];
        $_SESSION["admin_username"] = $admin_row["username"];
        $admin_stmt->close();
        header("Location: ../admin/admin.php");
        exit(0);
    }

    // Prepare SQL query to prevent SQL injection
    $sql = "SELECT * FROM users WHERE username=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch user details
        $user = $result->fetch_assoc();
        
        $_SESSION["userid"] = $user["registered_number"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["name"] = $user["name"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["age"] = $user["age"];
        $_SESSION["contact"] = $user["contact"];
        $_SESSION["nic"] = $user["nic"];
        header("Location:../frontend/index.php"); 
        exit();
    } else {
        header("Location:../frontend/login.php?error=invalid"); 
        exit();
    }
}

$conn->close();
