<?php

if (isset($_GET['email']) && isset($_GET['type'])) {
    if($_GET['email'] == $_SESSION['s_staff_email']){
        
        $email = $_GET['email'];
        $type = $_GET['type'];        

        $date = date('Y-m-d H:i:s');

        $add_query = "INSERT INTO `attendance`(`email`, `type`, `datetime`) VALUES (?, ?, ?)";

        $add_stmt = mysqli_prepare($connection, $add_query);

        mysqli_stmt_bind_param(
            $add_stmt,
            "sss",
            $email,
            $type,
            $date
        );

        $exec_add = mysqli_stmt_execute($add_stmt);

        mysqli_stmt_close($add_stmt);

        if ($exec_add) {
            $messages['msgSucc'] = "Attendance taken successfully";
        } else {
            $messages['msgErr'] = "Error Occured taking attendance, try again";
        }


    }else{
            $messages['msgErr'] = "Email doenst match with the logged in account!";
    }

}
