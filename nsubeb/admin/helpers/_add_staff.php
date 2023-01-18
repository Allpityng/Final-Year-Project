<?php
if (isset($_POST['add_staff'])) {
    $firstname = mysqli_real_escape_string($connection, sanitizeInput($_POST['firstname']));
    $lastname = mysqli_real_escape_string($connection, sanitizeInput($_POST['lastname']));
    $email = mysqli_real_escape_string($connection, sanitizeInput($_POST['email']));
    $department = mysqli_real_escape_string($connection, sanitizeInput($_POST['department']));
    $gender = mysqli_real_escape_string($connection, sanitizeInput($_POST['gender']));
    $dob = mysqli_real_escape_string($connection, sanitizeInput($_POST['dob']));
    $phone_number = mysqli_real_escape_string($connection, sanitizeInput($_POST['phone_number']));


    if ($department == "Select Department" || empty($department)) {
        $department = "";
    }

    $messages = [];
    if (staff_email_exist($email)) {
        $messages['msgErr'] = "staff exist with same email";
    }

    if (count($messages) < 1) {
        $add_staff_query = "INSERT INTO `staff`(`email`, `first_name`, `last_name`, `phone_number`, `dob`, `gender`, `department`) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $add_staff_stmt = mysqli_prepare($connection, $add_staff_query);

        mysqli_stmt_bind_param(
            $add_staff_stmt,
            "sssssss",
            $email,
            $firstname,
            $lastname,
            $phone_number,
            $dob,
            $gender,
            $department
        );

        $exec_add_staff = mysqli_stmt_execute($add_staff_stmt);

        mysqli_stmt_close($add_staff_stmt);

        if ($exec_add_staff) {
            $messages['msgSucc'] = "Staff Added Successfully...";
        } else {
            $messages['msgErr'] = "Error Occured adding staff, try again";
        }
    }
}

