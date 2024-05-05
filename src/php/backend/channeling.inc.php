<?php

require_once 'dbh.inc.php';

if (isset($_POST["submit"])) {
    $user_id = $_POST['userid'];
    $branch =  $_POST["branch"];
    $specialization = $_POST["specialization"];
    $doctor = $_POST["doctor"];
    $channeldate = $_POST["chaneldate"];
    $channeltime = $_POST["chaneltime"];
    $fullname = $_POST["fullname"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $DOB = $_POST["dob"];
    $age = $_POST["age"];

    
    require_once 'functions.inc.php';

    createappointment($conn, $user_id, $branch, $specialization, $doctor, $channeldate, $channeltime, $fullname, $phone, $gender, $DOB, $age);
}

