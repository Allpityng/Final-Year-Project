<?php require 'helpers/admin_init.php'; ?>
<?php require 'helpers/_index.php'; ?>

<?php
$pageDetails = [
  'title' => "NSUBEB Admin"
];

Includes::custom_include('includes/header.php', $pageDetails, true);

  if (!isset($_GET['id']) && !isset($_GET['email'])) {
         header("Location: leaves.php");
    }


    $id = $_GET['id'];
    $email = $_GET['email'];


    
if (isset($_GET['accept'])) {
    global $connection;

    $applicationID = $_GET['accept'];

    $updateQuery = "UPDATE `leaves` SET `status`='Accepted' WHERE id = ?";

    $update_stmt = mysqli_prepare($connection, $updateQuery);

    mysqli_stmt_bind_param($update_stmt, "i", $applicationID);

    if (mysqli_stmt_execute($update_stmt)) {
            $Msg = "<span class='text-success'>Leave Application Successfully accepted</span";
    }else{
            $Msg = "<span class='text-danger'>Can't Accept, try again</span>";
    }
}

if (isset($_GET['decline'])) {
    global $connection;

    $applicationID = $_GET['decline'];

    $updateQuery = "UPDATE `leaves` SET `status`='Declined' WHERE id = ?";

    $update_stmt = mysqli_prepare($connection, $updateQuery);

    mysqli_stmt_bind_param($update_stmt, "i", $applicationID);

    if (mysqli_stmt_execute($update_stmt)) {
            $Msg = "<span class='text-danger'>Leave Application DECLINED</span";
    }else{
            $Msg = "<span class='text-danger'>Can't Decline, try again</span>";
    }
}

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
                <h1 class="app-page-title">Applicant Information</h1>

                <!--//app-card-->

                <!--//row-->
                <div class="row g-4 mb-4">

                    <div class="app-card app-card-stats-table h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 class="app-card-title">
                                       <b>
                                         <?php echo getOneLeave($id, $email)['title'] ?>
                                       </b>
                                    </h4>
                                </div>
                                <!--//col-->
                                <div class="col-auto">
                                    <div class="app-search-box col">
                                        <h4 class="app-card-title">Applicantion ID: <?php echo $id ?></h4>
                                    </div>
                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <div class="app-card-body p-2">

                            <div class="row">
                                <div class="col-md-9">
                                    <p class="text-center">
                                        <?php 
                                        if(isset($Msg)){
                                            echo $Msg;
                                        }
                                        ?>
                                    </p>
                                    <div class="row">
                                        <div class="col-sm-6 mb-3">
                                            <label for="exampleInputfname" class="form-label"><b>Application ID:</b>
                                            </label>
                                            <input type="text" class="form-control" id="exampleInputfname" required
                                                value="1"
                                                disabled>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label for="exampleInputfname" class="form-label"><b>Email:</b>
                                            </label>
                                            <input type="text" class="form-control" id="exampleInputfname" required
                                                value="<?php echo $email ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 mb-3">
                                            <label for="exampleInputfname" class="form-label"><b>Applicant Fullname:</b>
                                            </label>
                                            <input type="text" class="form-control" id="exampleInputfname" required
                                                value=" <?php echo getStaffByEmail($email)['first_name'] . " " . getStaffByEmail($email)['last_name'] ?>"
                                                disabled>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label for="exampleInputfname" class="form-label"><b>Phone Number:</b>
                                            </label>
                                            <input type="text" class="form-control" id="exampleInputfname" required
                                                value="<?php echo getStaffByEmail($email)['phone_number'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 mb-3">
                                            <label for="exampleInputfname" class="form-label"><b>Applied Date:</b>
                                            </label>
                                            <input type="text" class="form-control" id="exampleInputfname" required
                                                value="<?php echo date('l, F d Y.', strtotime(getOneLeave($id, $email)['datetime'])); ?>"
                                                disabled>
                                        </div>

                                        <div class="col-sm-6 mb-3">
                                            <label for="exampleInputfname" class="form-label"><b>Application
                                                    Status:</b>
                                            </label>
                                            <input type="text" class="form-control" id="exampleInputfname" required
                                                value="<?php echo getOneLeave($id, $email)['status'] ?>" disabled>
                                        </div>
                                    </div>
                                    <h4 class="app-card-title text-primary">Documents:</h4>
                                    <!-- Documents -->
                                    <div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="card shadow-sm text-center">
                                                    <div class="card-header">
                                                        <p class="card-text"><b>Hand Written Application</b></p>
                                                    </div>
                                                    <div class="card-body">
                                                        <a target="_blank"
                                                            href="<?php 
                                                            
                                                            echo getOneLeave($id, $email)['written_application']
                                                            
                                                            ?>"><b>Open</b></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card shadow-sm text-center">
                                                    <div class="card-header">
                                                        <p class="card-text"><b>Birth Certicate</b></p>
                                                    </div>
                                                    <div class="card-body">
                                                        <a href="<?php 
                                                            
                                                            echo getOneLeave($id, $email)['birth_certificate']
                                                            
                                                            ?>"><b>Open</b></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card shadow-sm text-center">
                                                    <div class="card-header">
                                                        <p class="card-text"><b>Qualification</b></p>
                                                    </div>
                                                    <div class="card-body">
                                                        <a href="<?php 
                                                            
                                                            echo getOneLeave($id, $email)['qualification']
                                                            
                                                            ?>"><b>Open</b></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card shadow-sm text-center">
                                                    <div class="card-header">
                                                        <p class="card-text"><b>Primary Certificate</b></p>
                                                    </div>
                                                    <div class="card-body">
                                                        <a href="<?php 
                                                            
                                                            echo getOneLeave($id, $email)['primary_certificate']
                                                            
                                                            ?>"><b>Open</b></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mt-2">
                                                <div class="card shadow-sm text-center">
                                                    <div class="card-header">
                                                        <p class="card-text"><b>Secondary Certificate</b></p>
                                                    </div>
                                                    <div class="card-body">
                                                        <a href="<?php 
                                                            
                                                            echo getOneLeave($id, $email)['secondary_certificate']
                                                            
                                                            ?>"><b>Open</b></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mb-4">
                                    <!-- /Documents -->
                                </div>
                                <div class="col-md-3">
                                    <img src="../assets/images/staff_avatar.png" class="img-thumbnail w-100" alt="">
                                    <div class="card my-3 bg-success">
                                        <a
                                            href="?id=<?php echo $id ?>&email=<?php echo $email ?>&accept=<?php echo $id ?>"
                                            >
                                            <div class="card-body text-center text-white">
                                                Accept Leave
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card my-3 bg-danger">
                                        <a
                                            href="?id=<?php echo $id ?>&email=<?php echo $email ?>&decline=<?php echo $id ?>">
                                            <div class="card-body text-center text-white">
                                                Decline Leave
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card my-3 bg-warning">
                                        <a href="leaves.php">
                                            <div class="card-body text-center text-white">
                                                Close Leave Page
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--//app-card-body-->
                    </div>

                </div>
                <!--//app-card-body-->
            </div>
            <!--//app-card-->
        </div>
    </div>


  <?php Includes::custom_include('includes/footer.php', [], true);    ?>