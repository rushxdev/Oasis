<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>OASIS</title>
</head>

<body>
    <div class="navbar">
        <div class="logo"><a href="index.php">OASIS</a></div>
        <div class="nav-items">
            <a href="index.php" class="active">Home</a>
            <a href="#">About Us</a>
            <?php
            if (isset($_SESSION["name"])) {
                echo '<a href="channeling.php">Channeling</a>';
            } else {
                echo '<a href="login.php">Channeling</a>';
            }
            ?>
            <a href="#">Healthcare Locator</a>
            <a href="#">Health Blog</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="accounts">
            <?php
            if (isset($_SESSION["name"])) {
                echo '<a href="#profile.php">' . $_SESSION["name"] . '</a>';
                echo '<span class="separator"> | </span>';
                echo '<a href="includes/logout.inc.php">Log out</a>';
            } else {
                echo '<a href="login.php">Login</a>';
                echo '<span class="separator"> | </span>';
                echo '<a href="register.php">Register</a>';
            }
            ?>
        </div>
    </div>