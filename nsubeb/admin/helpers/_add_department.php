<?php
if (isset($_POST['add_dept'])) {
    $dept_id = mysqli_real_escape_string($connection, sanitizeInput($_POST['dept_id']));
    $dept_title = mysqli_real_escape_string($connection, sanitizeInput($_POST['dept_title']));

    $messages = [];
    if (dept_exist($dept_id)) {
        $messages['msgErr'] = "Department already exist";
    }

    if (count($messages) < 1) {
        $add_dept_query = "INSERT INTO `department` (`dept_id`, `dept_title`) VALUES (?, ?)";

        $add_dept_stmt = mysqli_prepare($connection, $add_dept_query);

        mysqli_stmt_bind_param(
            $add_dept_stmt,
            "ss",
            $dept_id,
            $dept_title
        );

        $exec_add_dept = mysqli_stmt_execute($add_dept_stmt);

        mysqli_stmt_close($add_dept_stmt);

        if ($exec_add_dept) {
            $messages['msgSucc'] = "Department Added Successfully...";
        } else {
            $messages['msgErr'] = "Error Occured adding department, try again";
        }
    }
}


function dept_exist($dept_id)
{
    $deptExist = false;

    global $connection;

    $dept_data_q = "SELECT * FROM `department` WHERE `dept_id` = ?";

    $dept_data_stmt = mysqli_prepare($connection, $dept_data_q);

    mysqli_stmt_bind_param($dept_data_stmt, 's', $dept_id);

    mysqli_stmt_execute($dept_data_stmt);

    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($dept_data_stmt));
    
    $db_dept_id = isset($result['dept_id']) ? $result['dept_id'] : NULL;
    
    mysqli_stmt_close($dept_data_stmt);

    if ($db_dept_id == $dept_id) {
        $deptExist = true;
    } else {
        $deptExist = false;
    }
    return $deptExist;
}
