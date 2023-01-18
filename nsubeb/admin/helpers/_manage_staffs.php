<?php

$staff_data_q = "SELECT * FROM `staff`";

$staff_data_stmt = mysqli_prepare($connection, $staff_data_q);

mysqli_stmt_execute($staff_data_stmt);

$staff_res = mysqli_stmt_get_result($staff_data_stmt);


if (isset($_GET['del'])) {
    $del_staffid = $_GET['del'];
    delet_staff($del_staffid);
}

function delet_staff($staff_id)
{
    global $connection;

    $delete_q = "DELETE FROM `staff` WHERE `email` = ?";

    $delete_stmt = mysqli_prepare($connection, $delete_q);

    mysqli_stmt_bind_param($delete_stmt, 's', $staff_id);

    mysqli_stmt_execute($delete_stmt);

    mysqli_stmt_close($delete_stmt);

    header("Location: manage_staffs.php");
}
