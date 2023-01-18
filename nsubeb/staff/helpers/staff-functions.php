<?php

include 'setup.php';

function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = stripslashes($data);
    $data = filter_var($data, FILTER_SANITIZE_STRING);
    return $data;
}

function haveSpecialChar($data)
{
    return preg_match('/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/', $data);
}

function getStaffByEmail($email)
{
    global $connection;

    $staff_data_q = "SELECT * FROM `staff` WHERE `email` = ?";

    $staff_data_stmt = mysqli_prepare($connection, $staff_data_q);

    mysqli_stmt_bind_param($staff_data_stmt, 's', $email);

    mysqli_stmt_execute($staff_data_stmt);

    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($staff_data_stmt));

    mysqli_stmt_close($staff_data_stmt);

    return $result;
}

function staff_exist($email, $password)
{
    $staffExist = false;

    $result = getStaffByEmail($email);

    $db_staffEmail = isset($result['email']) ? $result['email'] : NULL;
    $is_password = isset($result['password']) ? password_verify($password, $result['password']) : NULL;

    if ($db_staffEmail == $email && $is_password) {
        $staffExist = true;
    } else {
        $staffExist = false;
    }
    return $staffExist;
}

function loginStaff($email, $password)
{
    if (staff_exist($email, $password)) {
        $result = getStaffByEmail($email);

        session_start();
        $_SESSION['s_staffID'] = $result['id'];
        $_SESSION['s_staff_email'] = $result['email'];
        header("Location: index.php");
    }
}

function isStaffLoggedIn()
{
    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['s_staffID']) && isset($_SESSION['s_staff_email'])) {
        return true;
    } else {
        return false;
    }
}


function logoutAdmin()
{
    if (!isset($_SESSION)) {
        session_start();
    }

    $s_id = $_SESSION['s_staffID'];
    $s_username = $_SESSION['s_staff_email'];

    $s_id = null;
    $s_username = null;

    unset($s_id);
    unset($s_username);

    session_destroy();
    header("Location: login.php");
}


function updateStaffPassword($staff_id, $newpassword)
{
    $isUPdated = false;
    global $connection;
    $hashedPass = password_hash($newpassword, PASSWORD_DEFAULT, []);

    $update_q = "UPDATE `staff` SET `password`= ? WHERE `email` = ?";

    $update_stmt = mysqli_prepare($connection, $update_q);

    mysqli_stmt_bind_param($update_stmt, "ss", $hashedPass, $staff_id);

    if (mysqli_stmt_execute($update_stmt)) {
        $isUPdated = true;
    } else {
        $isUPdated = false;
    }
    mysqli_stmt_close($update_stmt);

    return $isUPdated;
}


function isDefaultPassword($email)
{
    $isDefault = false;
    $result = getStaffByEmail($email);

    $is_password = password_verify("abc123", $result['password']);

    if ($is_password) {
        $isDefault = true;
    } else {
        $isDefault = false;
    }

    return $isDefault;
}


function getLeaves($email)
{
    global $connection;

    $get_leaves_q = "SELECT * FROM `leaves` WHERE `email` = ?";

    $leave_stmt = mysqli_prepare($connection, $get_leaves_q);

    mysqli_stmt_bind_param($leave_stmt, 's', $email);

    mysqli_stmt_execute($leave_stmt);

    $result = mysqli_stmt_get_result($leave_stmt);

    return $result;
}

function getStudentByID($matric)
{
    global $connection;

    $student_data_q = "SELECT * FROM `student` WHERE `matric` = ?";

    $student_data_stmt = mysqli_prepare($connection, $student_data_q);

    mysqli_stmt_bind_param($student_data_stmt, 's', $matric);

    mysqli_stmt_execute($student_data_stmt);

    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($student_data_stmt));

    mysqli_stmt_close($student_data_stmt);

    return $result;
}

function isSolved($support_id, $staff_id)
{
    $isSolved = false;

    global $connection;

    $get_supports_q = "SELECT * FROM `support` WHERE  `support_id` = ? AND `staff_id` = ?";

    $support_stmt = mysqli_prepare($connection, $get_supports_q);

    mysqli_stmt_bind_param($support_stmt, 'ss', $support_id, $staff_id);

    mysqli_stmt_execute($support_stmt);

    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($support_stmt));

    if ($result['feedback_status'] ==  1) {
        $isSolved = true;
    } else {
        $isSolved = false;
    }

    return $isSolved;
}


function isAppoved($support_id, $staff_id)
{
    $isApproved = false;

    global $connection;

    $get_supports_q = "SELECT * FROM `support` WHERE  `support_id` = ? AND `staff_id` = ?";

    $support_stmt = mysqli_prepare($connection, $get_supports_q);

    mysqli_stmt_bind_param($support_stmt, 'ss', $support_id, $staff_id);

    mysqli_stmt_execute($support_stmt);

    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($support_stmt));

    if ($result['status'] ==  1) {
        $isApproved = true;
    } else {
        $isApproved = false;
    }

    return $isApproved;
}



function getSupportsById($support_id, $staff_id)
{
    global $connection;

    $get_supports_q = "SELECT * FROM `support` WHERE `support_id` = ? AND `staff_id` = ?";

    $support_stmt = mysqli_prepare($connection, $get_supports_q);

    mysqli_stmt_bind_param($support_stmt, 'ss', $support_id, $staff_id);

    mysqli_stmt_execute($support_stmt);

    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($support_stmt));

    mysqli_stmt_close($support_stmt);

    return $result;
}
