<?php
    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $pwd = $_POST["pwd"];

        require_once 'config.php';
        require_once 'functions.inc.php';

        if (emptyInputLogin($username, $pwd) !== false) {
            header('Location: login.php?error=emptyinput');
            exit();
        }

        LoginUser($conn, $username, $pwd);
    }
    else {
        header('Location:../login.php');
        exit();
    }