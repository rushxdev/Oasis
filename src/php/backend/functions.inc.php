<?php
function emptyInputRegister($name, $NIC, $email, $username, $pwd, $pwdRepeat, $age, $gender, $address, $contact)
{
    $result = true;
    if (empty($name) || empty($NIC) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat) || empty($age) || empty($gender) || empty($address) || empty($contact)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function invalidUid($username)
{
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    return $result;
}

function invalidEmail($email)
{
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat)
{
    return $pwd === $pwdRepeat;
}

function uidExists($conn, $username)
{
    $sql = "SELECT * FROM users WHERE userName = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../frontend/register.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($stmt);
        return $row;
    } else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function createUser($conn, $name, $NIC, $email, $username, $pwd, $age, $gender, $address, $contact)
{
    $sql = "INSERT INTO users (name, nic, email, username, age, gender, address, contact, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../register.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssssissss", $name, $NIC, $email, $username, $age, $gender, $address, $contact, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../frontend/login.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd)
{
    return (empty($username) || empty($pwd));
}

function LoginUser($conn, $username, $pwd)
{
    $uidExist = uidExists($conn, $username);
    if ($uidExist === false) {
        header("Location:../frontend/login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExist["password"];
    $checkPwd = password_verify($pwd, $pwdHashed);
    
    if ($checkPwd === false) {
        header('Location:../frontend/login.php?error=wronglogin');
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExist["registered_number"];
        $_SESSION["username"] = $uidExist["username"];
        $_SESSION["name"] = $uidExist["name"];
        $_SESSION["email"] = $uidExist["email"];
        $_SESSION["age"] = $uidExist["age"];
        $_SESSION["contact"] = $uidExist["contact"];
        $_SESSION["nic"] = $uidExist["nic"];
        header("Location:../frontend/profile.php");
        exit();
    }

}

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

