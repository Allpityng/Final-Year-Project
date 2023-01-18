<?php $staff_data = getStaffByEmail($_SESSION['s_staff_email'])  ?>
<nav id="sidebar" class="bg-info text-white shadow">
    <div class="sidebar-header text-center text-white bg-info">
        <img src="<?php echo $staff_data['avatar']; ?>" alt="" class="img-fluid rounded-circle" width="60px" />
        <h5 class="my-1"><?php echo  ' ' . $staff_data['first_name'] . ' ' . $staff_data['last_name'] ?></h5>
        <i class="bg-dark badge">Staff</i>
        <strong><?php echo $staff_data['first_name'][0] . $staff_data['last_name'][0] ?></strong>
    </div>

    <ul class="list-unstyled components">
        <li class="active">
            <a href="index.php">
                <i class="mdi mdi-home"></i>
                Home
            </a>
        </li>
        <li>
            <a href="attendance.php">
                <i class="mdi mdi-message-arrow-right-outline"></i>
                Attendance
            </a>
        </li>
        <li>
            <a href="apply_leave.php">
                <i class="mdi mdi-message-cog"></i>
                Apply Leave
            </a>
        </li>

        <li>
            <a href="check_status.php">
                <i class="mdi mdi-message-cog"></i>
                Check Leave Status
            </a>
        </li>

        <li>
            <a href="change_password.php">
                <i class="mdi mdi-lock"></i>
                Change Password
            </a>
        </li>
        <li>
            <a href="settings.php">
                <i class="mdi mdi-cog"></i>
                Settings
            </a>
        </li>
    </ul>

    <ul class="list-unstyled text-center">
        <p>Department Code: <strong><?php echo $staff_data['department'] ?></strong></p>
        <li>
            <a href="logout.php" class="btn btn-outline-secondary text-center">Log Out <i class="mdi mdi-logout"></i></a>
        </li>
    </ul>
</nav>