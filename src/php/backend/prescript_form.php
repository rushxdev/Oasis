<?php
require 'config.php';

$reg_num = $_POST["reg_number"];
$name = $_POST["name"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$address = $_POST["address"];
$email = $_POST["email"];
$contact = $_POST["contact_number"];
$special = $_POST["speciality"];
$doctor = $_POST["doctor"];
$branch = $_POST["branch"];


$pres_sql = "INSERT INTO PrescriptionForms (RegisteredNumber, Name, Age, Gender, Address, Email, ContactNumber, Speciality, Doctor, Branch)
        VALUES ('$reg_number', '$name', '$age', '$gender', '$address', '$email', '$contact_number', '$speciality', '$doctor', '$branch')";

if ($con->query($pres_sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $con->error;
}

$con->close();

?>