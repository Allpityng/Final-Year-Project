<?php require 'helpers/admin_init.php'; ?>
<?php require 'helpers/_index.php'; ?>

<?php
$pageDetails = [
  'title' => "NSUBEB Admin"
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
                <h1 class="app-page-title">Attendances</h1>

                <!--//app-card-->

                <!--//row-->
                <div class="row g-4 mb-4">

                    <div class="app-card app-card-stats-table h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                </div>
                                                        </div>
                            <!--//row-->
                        </div>
                        <!--//app-card-header-->
                        <div class="app-card app-card-orders-table shadow-sm mb-5">
                            <div class="app-card-body">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left" id="myTable">
                                        <thead>
                                            <tr>
                                                <th class="cell">#</th>
                                                <th class="cell">Email</th>
                                                <th class="cell">Title</th>
                                                <th class="cell">Date Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $counter = 1;
                                            $a = getAllAttendance();
                                    while ($applicant = mysqli_fetch_array($a)) : ?>

                                            <tr>
                                                <td class="cell">#<?php echo $counter++; ?></td>

                                                <td class="cell"><?php echo $applicant['email'] ?></td>

                                                <td class="cell"><?php echo $applicant['type'] ?></td>

                                                  <td class="cell"><?php echo $applicant['datetime'] ?></td>

                                               
                                            </tr>
                                            <?php endwhile; ?>
                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!--//table-responsive-->

                            </div>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-body-->
                    </div>

                </div>
                <!--//app-card-body-->
            </div>
            <!--//app-card-->
        </div>
    </div>
  <!--//app-content-->


  <?php Includes::custom_include('includes/footer.php', [], true);    ?>