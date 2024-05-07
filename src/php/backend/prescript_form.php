<?php
require 'config.php';
session_start(); 

$special = $_POST["speciality"];
$doctor = explode(" - ", $_POST["doctor"])[0];
$branch = $_POST["branch"];
$date = $_POST["need_before"];
$registered_number = $_SESSION['userid'];

if (empty($date)) {
    $date = date('Y-m-d', strtotime('+2 days'));
}

$pres_sql = "INSERT INTO prescription (registered_number, speciality, doctor, branch, need_before) 
             VALUES ('$registered_number', '$special', '$doctor', '$branch', '$date')";


if ($conn->query($pres_sql)) {
    header("Location:../frontend/profile.php");
    exit();
} else {
    header("Location:../frontend/prescription.php?error=submissionFailed");
    exit();
}
