<?php

$contact_data_q = "SELECT * FROM `contact_us`";

$contact_data_stmt = mysqli_prepare($connection, $contact_data_q);

mysqli_stmt_execute($contact_data_stmt);

$contacts = mysqli_stmt_get_result($contact_data_stmt);
