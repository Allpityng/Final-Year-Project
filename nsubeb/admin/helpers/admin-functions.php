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

function staff_email_exist($email)
{
    $emailExist = false;

    $result = getStaffByEmail($email);

    $db_email = isset($result['email']) ? $result['email'] : NULL;

    if ($db_email == $email) {
        $emailExist = true;
    } else {
        $emailExist = false;
    }
    return $emailExist;
}

function getAllLeaves()
{
    global $connection;

    $get_leaves_q = "SELECT * FROM `leaves`";

    $leave_stmt = mysqli_prepare($connection, $get_leaves_q);

    mysqli_stmt_execute($leave_stmt);

    $result = mysqli_stmt_get_result($leave_stmt);

    return $result;
}

function getAllAttendance(){
    global $connection;

    $get_leaves_q = "SELECT * FROM `attendance`";

    $leave_stmt = mysqli_prepare($connection, $get_leaves_q);

    mysqli_stmt_execute($leave_stmt);

    $result = mysqli_stmt_get_result($leave_stmt);

    return $result;
}

function getOneLeave($id, $email)
{
    global $connection;

    $get_leaves_q = "SELECT * FROM `leaves` WHERE  `id` = ? AND `email`  = ? LIMIT 1";

    $leave_stmt = mysqli_prepare($connection, $get_leaves_q);

    mysqli_stmt_bind_param($leave_stmt, 'is', $id, $email);

    mysqli_stmt_execute($leave_stmt);

    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($leave_stmt));

    return $result;
}

function getStaffByEmail($email)
{
    global $connection;

    $data_q = "SELECT * FROM `staff` WHERE `email` = ?";

    $data_stmt = mysqli_prepare($connection, $data_q);

    mysqli_stmt_bind_param($data_stmt, 's', $email);

    mysqli_stmt_execute($data_stmt);

    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($data_stmt));

    mysqli_stmt_close($data_stmt);

    return $result;
}

function staff_id_exist($staffid)
{
    global $connection;

    $staff_data_q = "SELECT * FROM `staff` WHERE `staff_id` = ?";

    $staff_data_stmt = mysqli_prepare($connection, $staff_data_q);

    mysqli_stmt_bind_param($staff_data_stmt, 's', $staffid);

    mysqli_stmt_execute($staff_data_stmt);

    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($staff_data_stmt));

    mysqli_stmt_close($staff_data_stmt);

    $staffIDExist = false;

    $db_staffID = $result['staff_id'];

    if ($db_staffID == $staffid) {
        $staffIDExist = true;
    } else {
        $staffIDExist = false;
    }
    return $staffIDExist;
}

function haveSpecialChar($data)
{
    return preg_match('/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/', $data);
}

function getAdminByUsername($username)
{
    global $connection;

    $admin_data_q = "SELECT * FROM `admin` WHERE `username` = ?";

    $admin_data_stmt = mysqli_prepare($connection, $admin_data_q);

    mysqli_stmt_bind_param($admin_data_stmt, 's', $username);

    mysqli_stmt_execute($admin_data_stmt);

    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($admin_data_stmt));

    mysqli_stmt_close($admin_data_stmt);

    return $result;
}

function getAdminByEmail($email)
{
    global $connection;

    $admin_data_q = "SELECT * FROM `admin` WHERE `email` = ?";

    $admin_data_stmt = mysqli_prepare($connection, $admin_data_q);

    mysqli_stmt_bind_param($admin_data_stmt, 's', $email);

    mysqli_stmt_execute($admin_data_stmt);

    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($admin_data_stmt));

    mysqli_stmt_close($admin_data_stmt);

    return $result;
}


function admin_exist($username, $password)
{
    $adminExist = false;

    $result = getAdminByUsername($username);

    $db_username = $result['username'];
    $is_password = password_verify($password, $result['password']);

    if ($db_username == $username && $is_password) {
        $adminExist = true;
    } else {
        $adminExist = false;
    }
    return $adminExist;
}

function email_exist($email)
{
    $emailExist = false;

    $result = getAdminByEmail($email);

    $db_email = $result['email'];

    if ($db_email == $email) {
        $emailExist = true;
    } else {
        $emailExist = false;
    }
    return $emailExist;
}


function loginAdmin($username, $password)
{
    if (admin_exist($username, $password)) {
        $result = getAdminByUsername($username);

        session_start();
        $_SESSION['s_adminID'] = $result['id'];
        $_SESSION['s_adminUsername'] = $result['username'];
        header("Location: index.php");
    }
}

function isAdminLoggedIn()
{
    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['s_adminID']) && isset($_SESSION['s_adminUsername'])) {
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

    $s_id = $_SESSION['s_adminID'];
    $s_username = $_SESSION['s_adminUsername'];

    $s_id = null;
    $s_username = null;

    unset($s_id);
    unset($s_username);

    session_destroy();
    header("Location: login.php");
}

function getDepartments()
{

    global $connection;

    $dept_data_q = "SELECT * FROM `department`";

    $dept_data_stmt = mysqli_prepare($connection, $dept_data_q);

    mysqli_stmt_execute($dept_data_stmt);

    $dept_res = mysqli_stmt_get_result($dept_data_stmt);
    mysqli_stmt_close($dept_data_stmt);
    return $dept_res;
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

    mysqli_stmt_close($support_stmt);

    if ($result['status'] ==  1) {
        $isApproved = true;
    } else {
        $isApproved = false;
    }

    return $isApproved;
}


function CountsentSupports()
{
    global $connection;

    $get_supports_q = "SELECT * FROM `support`";

    $support_stmt = mysqli_prepare($connection, $get_supports_q);

    mysqli_stmt_execute($support_stmt);

    $result = mysqli_num_rows(mysqli_stmt_get_result($support_stmt));

    return $result;
}

function CountApprovedsentSupports()
{
    global $connection;

    $get_supports_q = "SELECT * FROM `support` WHERE `status` = 1";

    $support_stmt = mysqli_prepare($connection, $get_supports_q);

    mysqli_stmt_execute($support_stmt);

    $result = mysqli_num_rows(mysqli_stmt_get_result($support_stmt));

    return $result;
}

function CountResolvedSupports()
{
    global $connection;

    $get_supports_q = "SELECT * FROM `support` WHERE `feedback_status` = 1";

    $support_stmt = mysqli_prepare($connection, $get_supports_q);

    mysqli_stmt_execute($support_stmt);

    $result = mysqli_num_rows(mysqli_stmt_get_result($support_stmt));

    return $result;
}