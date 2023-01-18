<?php
// fecth Info 
$profile = getStaffByEmail($_SESSION['s_staff_email']);

// <!-- update profile -->
if (isset($_POST['updateProfile'])) {
    $email = mysqli_real_escape_string($connection, sanitizeInput($_POST['email']));
    $first_name = mysqli_real_escape_string($connection, sanitizeInput($_POST['first_name']));
    $last_name = mysqli_real_escape_string($connection, sanitizeInput($_POST['last_name']));
    $phone_number = mysqli_real_escape_string($connection, sanitizeInput($_POST['phone_number']));
    $department = mysqli_real_escape_string($connection, sanitizeInput($_POST['department']));
    $address = mysqli_real_escape_string($connection, sanitizeInput($_POST['address']));
    $avatar = $profile['avatar'];
    $staff_id = $_SESSION['s_staff_email'];

    $msgs = [];

    if ($_FILES['avatar']['error'] < 1 && isset($_FILES['avatar'])) {
        $avatar_name = $staff_id;
        $file_input = 'avatar';
        $upload_dir = 'assets/images/avatars/';

        $target_file = $upload_dir .  basename($_FILES["avatar"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (!isset($_FILES[$file_input])) {
            $msgs['imageErr'] = "Error Uploading image";
        }

        // return false if error occurred
        $error = $_FILES[$file_input]['error'];

        if ($error !== UPLOAD_ERR_OK) {
            $msgs['imageErr'] = "Error Uploading image";
        }

        // move the uploaded file to the upload_dir
        $new_file = $upload_dir . $avatar_name . '.' . $imageFileType;

        if (move_uploaded_file(
            $_FILES[$file_input]['tmp_name'],
            $new_file
        )) {
            $avatar = $new_file;
        };
    }


    if (count($msgs) < 1) {
        //    update profile
        $update_staff_q = "UPDATE `staff` SET `email`= ?, `first_name`= ?, `last_name`= ?,`phone_number`= ?, `address`= ?, `department`= ?,`avatar`= ? WHERE `email` = ?";

        $update_stmt = mysqli_prepare($connection, $update_staff_q);

        mysqli_stmt_bind_param(
            $update_stmt,
            "ssssssss",
            $email,
            $first_name,
            $last_name,
            $phone_number,
            $address,
            $department,
            $avatar,
            $staff_id
        );

        if (mysqli_stmt_execute($update_stmt)) {
            $msgs['msgSucc'] = "Profile Updated Successufully";
        } else {
            $msgs['msgErr'] = "Can't update profile";
        }
        mysqli_stmt_close($update_stmt);
    }
}
