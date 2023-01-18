<?php
//  fetch dept
$dept_id = $_GET['edit'];
$department_data_q = "SELECT * FROM `department` WHERE dept_id = ?";

$department_data_stmt = mysqli_prepare($connection, $department_data_q);

mysqli_stmt_bind_param($department_data_stmt, "s", $dept_id);

mysqli_stmt_execute($department_data_stmt);

$dept_results = mysqli_fetch_assoc(mysqli_stmt_get_result($department_data_stmt));

if (isset($_POST['edit_dept'])) {
    $dept_title = mysqli_real_escape_string($connection, sanitizeInput($_POST['dept_title']));

    $messages = [];
    if ($dept_results['dept_id'] != $dept_id) {
        $messages['msgErr'] = "Cannot edit department ID";
    }

    if (count($messages) < 1) {
        $update_dept_query = "UPDATE `department` SET `dept_title` = ? WHERE `dept_id` = ?";

        $update_dept_stmt = mysqli_prepare($connection, $update_dept_query);

        mysqli_stmt_bind_param(
            $update_dept_stmt,
            "ss",
            $dept_title,
            $dept_id
        );

        $exec_add_dept = mysqli_stmt_execute($update_dept_stmt);

        mysqli_stmt_close($update_dept_stmt);

        if ($exec_add_dept) {
            $messages['msgSucc'] = "Department Updated Successfully...";
        } else {
            $messages['msgErr'] = "Error Occured updating department, try again";
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

    mysqli_stmt_close($dept_data_stmt);

    $db_dept_id = $result['dept_id'];

    if ($db_dept_id == $dept_id) {
        $deptExist = true;
    } else {
        $deptExist = false;
    }
    return $deptExist;
}
