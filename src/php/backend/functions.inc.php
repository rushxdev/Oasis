<?php
function emptyInputRegister($name, $NIC, $email, $username, $pwd, $pwdRepeat)
{
    $result;
    if (empty($name) || empty($NIC) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat)
{
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email)
{
    $sql = "SELECT * FROM patients WHERE userName = ? OR p_Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../register.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $NIC, $email, $username, $pwd)
{
    $sql = "INSERT INTO patients (p_Name, p_NIC, p_Email, userName, p_Pwd) VALUES (?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../register.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssss", $name, $NIC, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../login.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd)
{
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}



function LoginUser($conn, $username, $pwd)
{
    $uidExist = uidExists($conn, $username, $username);
    if ($uidExist === false) {
        header("Location:../register.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExist["p_Pwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header('Location:../register.php?error=wronglogin');
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExist["p_ID"];
        $_SESSION["useruid"] = $uidExist["userName"];
        $_SESSION["name"] = $uidExist["p_Name"];
        header("Location:../index.php");
        exit();
    }

}



// $user_id = $_SESSION['userid'];

function createappointment($conn, $user_id, $branch, $specialization, $doctor, $channeldate, $channeltime, $fullname, $phone, $gender, $DOB, $age)
{

    $sql = "INSERT INTO appointments ( p_ID, Branch, Specialization, Doctor, ChannelDate, ChannelTime, Fullname, phone, gender, DOB, Age) VALUES (?,?,?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../channeling.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sssssssssss", $user_id, $branch, $specialization, $doctor, $channeldate, $channeltime, $fullname, $phone, $gender, $DOB, $age);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../index.php?error=none");
    exit();
}

