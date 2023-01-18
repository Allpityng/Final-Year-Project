<?php include 'includes/header.php' ?>
<?php include 'helpers/_change_password.php' ?>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include 'includes/sidebar.php' ?>

        <!-- Page Content  -->
        <div id="content">
            <!-- nav -->
            <?php include 'includes/nav.php' ?>

            <!-- Main -->
            <div class="container">
                <div class="card col-md-8">
                    <div class="card-body border m-3 shadow-sm">
                        <h4 class="text-center text-info">(Change Password)</h4>
                        <form class="row g-3 needs-validation" action="" method="POST" novalidate>
                            <span class="text-success">
                                <?php if (isset($msgs['passSucc'])) {
                                    echo $msgs['passSucc'];
                                }  ?></span>
                            <span class="text-danger">
                                <?php if (isset($msgs['passErr'])) {
                                    echo $msgs['passErr'];
                                }  ?></span>
                            <div class="form-floating">
                                <input type="password" name="oldpass" class="form-control shadow-sm" id="floatingPassword" placeholder="Enter Old Password" required />
                                <label for="floatingPassword">Old Password</label>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Enter Old password</div>
                            </div>
                            <div class="form-floating">
                                <input type="password" name="newpass" class="form-control shadow-sm" id="floatingPassword" placeholder="Enter New Password" required />
                                <label for="floatingPassword">New Password</label>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Enter New password</div>
                            </div>
                            <div class="form-floating">
                                <input type="password" name="cnewpass" class="form-control shadow-sm" id="floatingPassword" placeholder="Enter New Password" required />
                                <label for="floatingPassword">Confirm New Password</label>
                                <div class="valid-feedback">Looks good!</div>
                                <div class="invalid-feedback">Enter New password</div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="changepassword" class="btn btn-info float-end">
                                    Change Password <i class="mdi mdi-lock"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php' ?>