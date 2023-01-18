<?php

$department_data_q = "SELECT * FROM `department`";

$department_data_stmt = mysqli_prepare($connection, $department_data_q);

mysqli_stmt_execute($department_data_stmt);

$dept_results = mysqli_stmt_get_result($department_data_stmt);


if (isset($_GET['del'])) {
    $del_dept_id = $_GET['del'];
    delete_department($del_dept_id);
}

function delete_department($dept_id)
{
    global $connection;

    $delete_q = "DELETE FROM `department` WHERE `dept_id` = ?";

    $delete_stmt = mysqli_prepare($connection, $delete_q);

    mysqli_stmt_bind_param($delete_stmt, 's', $dept_id);

    mysqli_stmt_execute($delete_stmt);

    mysqli_stmt_close($delete_stmt);

    header("Location: manage_department.php");
}


function CountDepartmentStaffs($dept_id)
{
    global $connection;

    $staff_data_q = "SELECT * FROM `staff` WHERE department = ?";

    $staff_data_stmt = mysqli_prepare($connection, $staff_data_q);

    mysqli_stmt_bind_param($staff_data_stmt, 's', $dept_id);

    mysqli_stmt_execute($staff_data_stmt);

    $staff_results = mysqli_num_rows(mysqli_stmt_get_result($staff_data_stmt));

    return $staff_results;
}