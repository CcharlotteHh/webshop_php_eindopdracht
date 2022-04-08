<?php
function emptyInputSingup($user_name, $email, $password, $password2)
{
    global $result;

    $result;
    if (empty($user_name) || empty($email) || empty($password) || empty($password2)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($user_name)
{
    global $result;

    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $user_name)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    global $result;

    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function pwdMatch($password, $password2)
{
    global $result;

    $result;
    if ($password !== $password2) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExist($conn, $user_name, $email)
{
    global $result;

    $result;
    $sql = "SELECT * FROM users where user_name = ? or email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: register.php?error=statementfailed');
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $user_name, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $user_name, $email, $password)
{
    global $result;
    $result;

    $sql = "insert into users(user_name, email, password) values(?,?,?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../register.php?error=statementfailed');
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss", $user_name, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header('location: ../register.php?error=none');
    exit();
}

function emptyInputLogin($user_name, $password)
{
    global $result;

    $result;
    if (empty($user_name) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $user_name, $password) //fucntion that checks if user_name and passwords match the ones in the database table users
{
    $uidExist = uidExist($conn, $user_name, $user_name);

    if ($uidExist == false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExist["password"];
    $checkPassword = password_verify($password, $pwdHashed);

    if ($checkPassword === false) {
        header("location: login.php?error=wronglogin");
        exit();
    } else if ($checkPassword === true) {
        session_start();
        $_SESSION['id'] = $uidExist["id"];
        $_SESSION['user_name'] = $uidExist['user_name'];
        header("Location: ../index.php");
        exit();
    }
}
