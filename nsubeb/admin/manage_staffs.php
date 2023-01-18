<?php require 'helpers/admin_init.php'; ?>
<?php require 'helpers/_manage_staffs.php'; ?>

<?php
$pageDetails = [
    'title' => "Manage Staffs"
];

Includes::custom_include('includes/header.php', $pageDetails, true);

?>


<body class="app">
    <header class="app-header fixed-top">
        <?php Includes::custom_include('includes/navbar.php', [], true);    ?>
        <!--//app-header-inner-->
        <?php Includes::custom_include('includes/sidebar.php', [], true);    ?>
        <!--//app-sidepanel-->
    </header>
    <!--//app-header-->

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Manage Staffs</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    <form class="table-search-form row gx-1 align-items-center">
                                        <div class="col-auto">
                                            <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn app-btn-secondary">Search</button>
                                        </div>
                                    </form>

                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//table-utilities-->
                    </div>
                    <!--//col-auto-->
                </div>
                <!--//row-->

                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell">#</th>
                                        <th class="cell">Email</th>
                                        <th class="cell">Department</th>
                                        <th class="cell">Attendance</th>
                                        <th class="cell">Leaves</th>
                                        <th class="cell">QR Code</th>
                                        <th class="cell">Action</th>
                                        <th class="cell"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    while ($staff_result = mysqli_fetch_array($staff_res)) : ?>

                                        <tr>
                                            
                                            <td class="cell">#<?php echo $staff_result['id'] ?></td>
                                           
                                            <td class="cell"><?php echo $staff_result['email'] ?></td>
                                            <td class="cell"><span class="badge bg-success"><?php echo $staff_result['department'] ?></span></td>
                                            <td class="cell">0</td>
                                            <td class="cell">0</td>
                                            <td class="cell">
                                        <a class="btn btn-success" href="view_qr.php?email=<?php echo $staff_result['email'] ?>">View QR Code</a>

                                            </td>
                                            <td class="cell">
                                                <a class="btn btn-sm text-white btn-success" href="edit_staff.php?edit=<?php echo $staff_result['email'] ?>">Edit</a>

                                                <a class="btn btn-sm text-white btn-danger" href="?del=<?php echo $staff_result['email'] ?>">Delete</a>
                                            </td>
                                            
                                        </tr>
                                    <?php endwhile; ?>
                                    <?php mysqli_stmt_close($staff_data_stmt);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <!--//table-responsive-->

                    </div>
                    <!--//app-card-body-->
                </div>

            </div>
            <!--//container-fluid-->
        </div>
    </div>
    <!--//app-content-->




    <?php Includes::custom_include('includes/footer.php', [], true);    ?>