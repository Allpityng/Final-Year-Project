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
        <h1 class="app-page-title">Overview</h1>

        <!--//app-card-->

        <div class="row g-4 mb-4">
          <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
              <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Total Staffs</h4>
                <div class="stats-figure"><?php echo  getUsersCount('staff');
                                          ?></div>
                <div class="stats-meta text-success">+20%</div>
              </div>
              <!--//app-card-body-->
              <a class="app-card-link-mask" href="#"></a>
            </div>
            <!--//app-card-->
          </div>
          <!--//col-->

          <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
              <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Attendance Taken</h4>
                <div class="stats-figure">400</div>
                <div class="stats-meta text-success">+315%</div>
              </div>
              <!--//app-card-body-->
              <a class="app-card-link-mask" href="#"></a>
            </div>
            <!--//app-card-->
          </div>
          <!--//col-->
          <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
              <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Applied Leaves</h4>
                <div class="stats-figure">26</div>
              </div>
              <!--//app-card-body-->
              <a class="app-card-link-mask" href="#"></a>
            </div>
            <!--//app-card-->
          </div>
          <!--//col-->
          <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
              <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Approved Leaves</h4>
                <div class="stats-figure">20</div>
              </div>
              <!--//app-card-body-->
              <a class="app-card-link-mask" href="#"></a>
            </div>
            <!--//app-card-->
          </div>
          <!--//col-->
        </div>

        <!--//row-->
        <div class="row g-4 mb-4">
          <div class="col-12 col-lg-6">
            <div class="app-card app-card-progress-list h-100 shadow-sm">
              <div class="app-card-header p-3">
                <div class="row justify-content-between align-items-center">
                  <div class="col-auto">
                    <h4 class="app-card-title">Recent Attendance</h4>
                  </div>
                  <!--//col-->
                  <div class="col-auto">
                    <div class="card-header-action">
                      <a href="manage_staffs.php">View Attendance</a>
                    </div>
                    <!--//card-header-actions-->
                  </div>
                  <!--//col-->
                </div>
                <!--//row-->
              </div>
              <!--//app-card-header-->
              <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                  <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                      <thead>
                        <tr>
                          <th class="cell">#</th>
                          <th class="cell">Staff Email</th>
                          <th class="cell">Department</th>
                          <th class="cell">Attendance Type</th>
                        </tr>
                      </thead>
                      <tbody>

                       
                      </tbody>
                    </table>
                  </div>
                  <!--//table-responsive-->

                </div>
                <!--//app-card-body-->
              </div>
              <!--//app-card-body-->
            </div>
            <!--//app-card-->
          </div>
          <!--//col-->
          <div class="col-12 col-lg-6">
            <div class="app-card app-card-stats-table h-100 shadow-sm">
              <div class="app-card-header p-3">
                <div class="row justify-content-between align-items-center">
                  <div class="col-auto">
                    <h4 class="app-card-title">Recent Applied Leaves</h4>
                  </div>
                  <!--//col-->
                  <div class="col-auto">
                    <div class="card-header-action">
                      <a href="manage_students.php">View Leaves</a>
                    </div>
                    <!--//card-header-actions-->
                  </div>
                  <!--//col-->
                </div>
                <!--//row-->
              </div>
              <!--//app-card-header-->
              <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                  <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                      <thead>
                        <tr>
                          <th class="cell">#</th>
                          <th class="cell">ID</th>
                          <th class="cell">Staff Email</th>
                          <th class="cell">Department</th>
                        </tr>
                      </thead>
                      <tbody>

                 

                      </tbody>
                    </table>
                  </div>
                  <!--//table-responsive-->

                </div>
                <!--//app-card-body-->
              </div>
              <!--//app-card-body-->
            </div>
            <!--//app-card-->
          </div>
          <!--//col-->
        </div>
      </div>
      <!--//container-fluid-->
    </div>
  </div>
  <!--//app-content-->


  <?php Includes::custom_include('includes/footer.php', [], true);    ?>