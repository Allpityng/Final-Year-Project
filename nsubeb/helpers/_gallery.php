<?php

$staff_data_q = "SELECT * FROM `staff`";

$staff_data_stmt = mysqli_prepare($connection, $staff_data_q);

mysqli_stmt_execute($staff_data_stmt);

$staff_res = mysqli_stmt_get_result($staff_data_stmt);
