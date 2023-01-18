<?php include 'includes/header.php' ?>


<?php if (isDefaultPassword($_SESSION['s_staff_email'])) {
  header("Location: index.php");
}

?>

<body>
  <div class="wrapper">
    <!-- Sidebar  -->
    <?php include 'includes/sidebar.php' ?>

    <!-- Page Content  -->
    <div id="content">
      <!-- nav -->
      <?php include 'includes/nav.php' ?>

      <!-- Main -->

       <div class="card my-3">
          <div class="card-body p-0">
            <h4 class="text-center text-info mt-2">Recent Attendance</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Attendance Type</th>
                    <th scope="col">Date Time</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                 $email = $_SESSION['s_staff_email'];

            $get_supports_q = "SELECT * FROM `attendance` WHERE `email` = ?";

            $attendances_stmt = mysqli_prepare($connection, $get_supports_q);

            mysqli_stmt_bind_param($attendances_stmt, 's', $email);

            mysqli_stmt_execute($attendances_stmt);

            $result = mysqli_stmt_get_result($attendances_stmt);


                  $i = 1;
                  ?>

                  <?php while ($attendance = mysqli_fetch_assoc($result)) : ?>
                    
                    <tr>
                      <th scope="row"><?php echo $i; ?></th>
                      <td>#<?php echo $attendance['id']; ?></td>
                      <td><div class="btn btn-sm btn-primary">
                        <?php echo $attendance['type']; ?>
                      </div></td>
                      <td><?php echo $attendance['datetime']; ?></td>
                      <?php $i = $i + 1; ?>
                    <?php endwhile; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

  

    <div class="card my-5">
      <div class="card-body">
        <table>
          <!--  -->
        </table>
          <!-- Pagination  -->
          <nav>
            <ul class="pagination justify-content-center">
              <li class="page-item">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Prev</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">2</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
      </div>
    </div>
        </div>
      </div>
    </div>
  </div>


  <script src="assets/js/html5-qrcode.min.js"></script>


  <?php include 'includes/footer.php' ?>