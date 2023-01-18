<?php

if (isset($_POST['contactUS'])) {
    $fullname = mysqli_real_escape_string($connection, sanitizeInput($_POST['fullname']));
    $email = mysqli_real_escape_string($connection, sanitizeInput($_POST['email']));
    $messagetitle = mysqli_real_escape_string($connection, sanitizeInput($_POST['messagetitle']));
    $messagecontent = mysqli_real_escape_string($connection, sanitizeInput($_POST['messagecontent']));

    $datetime = date('Y-m-d h:i:s');

    $contact_query = "INSERT INTO `contact_us` (`fullnname`, `email`, `message_title`, `messaget_content`, `data_time`) VALUES (?, ?, ?, ?, ?)";

    $contact_stmt = mysqli_prepare($connection, $contact_query);

    mysqli_stmt_bind_param($contact_stmt, "sssss", $fullname, $email, $messagetitle, $messagecontent, $datetime);

    $exec_contact_us = mysqli_stmt_execute($contact_stmt);

    mysqli_stmt_close($contact_stmt);

    if ($exec_contact_us) {
        $messages['msgSucc'] = "Your message is sent successfully...";
    } else {
        $messages['msgErr'] = "Can't send message, try again";
    }
}
