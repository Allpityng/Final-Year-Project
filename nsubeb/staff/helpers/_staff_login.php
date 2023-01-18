<?php
if (isset($_POST['loginStaff'])) {
    $email = mysqli_real_escape_string($connection, sanitizeInput($_POST['email']));
    $password = mysqli_real_escape_string($connection, sanitizeInput($_POST['password']));

    // validate credentials 
    $staffMsgs = [];
    if (!staff_exist($email, $password)) {
        $staffMsgs['credentialErr'] = "Incorrect email or password";
    }

    if (count($staffMsgs) < 1) {
        // login staff
        loginStaff($email, $password);
    }
}
