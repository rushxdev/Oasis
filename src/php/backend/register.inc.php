<?php
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

    require_once 'config.php';
    require_once 'functions.inc.php';

    $emptyInput = emptyInputRegister($name, $NIC, $email, $username, $pwd, $pwdRepeat, $age, $gender, $address, $contact);
    $invalidUid = invalidUid($username);
    $invalidEmail = invalidEmail($email);
    $pwdMatch = pwdMatch($pwd, $pwdRepeat);
    $uidExists = uidExists($conn, $username);


    if ($emptyInput === true) {
        header("Location:../frontend/register.php?error=emptyinput");
        exit();
    }

    if ($invalidUid === true) {
        header("Location:../frontend/register.php?error=invaliduid");
        exit();
    }

    if ($invalidEmail === true) {
        header("Location:../frontend/register.php?error=invalidemail");
        exit();
    }

    if ($pwdMatch === false) {
        header("Location:../frontend/register.php?error=passworddontmatch");
        exit();
    }

    if ($uidExists !== false) {
        header("Location:../frontend/register.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $NIC, $email, $username, $pwd, $age, $gender, $address, $contact);
} else {
    header('Location:../frontend/login.php');
    exit();
}
