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
                <h1 class="app-page-title">Leaves Applicants</h1>

                <!--//app-card-->

                <!--//row-->
                <div class="row g-4 mb-4">

                    <div class="app-card app-card-stats-table h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Manage Applicants</h4>
                                </div>
                                <!--//col-->
                                <div class="col-auto">
                                    <div class="app-search-box col">
                                        <form class="app-search-form">
                                            <input type="text" placeholder="Search applicants..." name="search"
                                                class="form-control search-input" id="myInput"  />
                                            <button type="submit" class="btn search-btn btn-primary" value="Search">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <!--//col-->
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
                                                <th class="cell">Application Date</th>
                                                <th class="cell">Status</th>
                                                <th class="cell">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $counter = 1;
                                            $leaves = getAllLeaves();
                                    while ($applicant = mysqli_fetch_array($leaves)) : ?>

                                            <tr>
                                                <td class="cell">#<?php echo $counter++; ?></td>

                                                <td class="cell"><?php echo $applicant['email'] ?></td>

                                                <td class="cell"><?php echo $applicant['title'] ?></td>

                                                  <td class="cell"><?php echo $applicant['datetime'] ?></td>

                                                <td class="cell">
                                                    <?php $status = $applicant['status']; ?>
                                                    <span class="
                                                        <?php if($status == 'Accepted'){
                                                        echo "text-success";
                                                        }else if ($status == 'In Review'){
                                                        echo "text-warning";
                                                        }else if($status =='Declined'){
                                                        echo "text-danger";
                                                        } ?>

                                                        "><?php echo $status; ?></span>
                                                </td>
                                                <td class="cell">
                                                    <a class="btn btn-sm text-white btn-success"
                                                        href="view_leave.php?id=<?php echo $applicant['id'] ?>&email=<?php echo $applicant['email'] ?>">
                                                        View
                                                    </a>
                                                </td>
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