<?php
if (isset($_POST['changepassword'])) {
    $oldpass = mysqli_real_escape_string($connection, sanitizeInput($_POST['oldpass']));
    $newpass = mysqli_real_escape_string($connection, sanitizeInput($_POST['newpass']));
    $cnewpass = mysqli_real_escape_string($connection, sanitizeInput($_POST['cnewpass']));

    $staff_d = getStaffByEmail($_SESSION['s_staff_email']);
    $staff_d_id = $staff_d['email'];

    $db_oldpass = $staff_d['password'];

    $msgs = [];

    if (!password_verify($oldpass, $db_oldpass)) {
        $msgs['passErr']  = "The Old Password does not match!";
    } elseif ($newpass != $cnewpass) {
        $msgs['passErr']  = "The New password and Confirm password does not match!";
    }

    if (count($msgs) < 1) {
        // change password staff
        if (updateStaffPassword($staff_d_id, $newpass)) {
            $msgs['passSucc']  = "Password changed successfully...";
        };
    }
}
