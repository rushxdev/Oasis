<?php
    if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $NIC = $_POST["NIC"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $pwd = $_POST["pwd"];
        $pwdRepeat = $_POST["pwdrepeat"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        $emptyInput = emptyInputRegister($name, $NIC, $email, $username, $pwd, $pwdRepeat);   
        $invalidUid = invalidUid($username);
        $invalidEmail = invalidEmail($email);
        $pwdMatch = pwdMatch($pwd, $pwdRepeat);
        $uidExists = uidExists($conn, $username, $email);


        if ($emptyInput !== false) {
            header("Location:../register.php?error=emptyinput");
            exit();
        }

        if ($invalidUid !== false) {
            header("Location:../register.php?error=invaliduid");
            exit();
        }

        if ($invalidEmail !== false) {
            header("Location:../register.php?error=invalidemail");
            exit();
        }

        if ($pwdMatch !== false) {
            header("Location:../register.php?error=passworddontmatch");
            exit();
        }

        if ($uidExists !== false) {
            header("Location:../register.php?error=usernametaken");
            exit();
        }

        createUser($conn, $name, $NIC, $email, $username, $pwd);

        
    }
    else {
        header('Location:../login.php');
        exit();
    }