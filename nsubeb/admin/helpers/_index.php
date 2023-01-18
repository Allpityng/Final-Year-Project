<?php


function getUsersCount($table)
{

    global $connection;

    $user_data_q = "SELECT * FROM `$table`";

    $user_data_stmt = mysqli_prepare($connection, $user_data_q);

    mysqli_stmt_execute($user_data_stmt);

    $result = mysqli_stmt_get_result($user_data_stmt);

    return mysqli_num_rows($result);
}


function getRecentUsers($table)
{
    global $connection;

    $user_data_q = "SELECT * FROM `$table` ORDER BY id DESC LIMIT 5";

    $user_data_stmt = mysqli_prepare($connection, $user_data_q);

    mysqli_stmt_execute($user_data_stmt);

    $result = mysqli_stmt_get_result($user_data_stmt);

    return $result;
}
