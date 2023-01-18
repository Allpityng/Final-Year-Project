<?php
if (!isset($_SESSION)) {
    session_start();
}

$s_id = $_SESSION['s_staffID'];
$s_username = $_SESSION['s_staff_email'];

$s_id = null;
$s_username = null;

unset($s_id);
unset($s_username);

session_destroy();
header("Location: staff_login.php");
