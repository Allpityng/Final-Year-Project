<?php include 'helpers/init.php' ?>
<?php include 'helpers/_gallery.php' ?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- external links -->
  <link rel="shortcut icon" href="assets/images/auk-logo.png" type="image/x-icon" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="assets/icons/mdi/css/materialdesignicons.min.css" />
  <title>SSS</title>
  <style>
    .gallery .card:hover {
      transition: 0.5s;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
        0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
  </style>
</head>

<body>

  <!-- Navbar  -->
  <?php include 'includes/nav.php' ?>

  <!-- /Navbar -->

  <!-- /Navbar -->
  <!-- Main -->
  <main>
    <div class="container">
      <div class="card my-5">
        <div class="card-body shadow-sm">
          <h4 class="text-center text-info">Staff Gallery</h4>
        </div>
        <div class="card-body gallery">
          <div class="row">
            <!-- start card -->
            <?php
            while ($staff_result = mysqli_fetch_array($staff_res)) : ?>

              <div class="col-md-3 my-2">
                <div class="card">
                  <img class="card-img-top" src="<?php if ($staff_result['avatar'] != "assets/images/staff_avatar.png") {
                                                    echo 'staff/' . $staff_result['avatar'];
                                                  } else {
                                                    echo $staff_result['avatar'];
                                                  } ?>" alt="Card image" height="180" />
                  <hr />
                  <div class="card-body text-center">
                    <h4><?php echo $staff_result['title'] ?></h4>
                    <h5 class="card-title text-info"><?php echo $staff_result['first_name']  . ' ' . $staff_result['last_name']  ?></h5>
                    <p class="card-text"><span class="badge bg-success"><?php echo $staff_result['position'] ?></span></p>
                  </div>
                </div>
              </div>

            <?php endwhile; ?>
            <?php mysqli_stmt_close($staff_data_stmt);
            ?>
            <!-- end card -->
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- /Main -->
  <!-- Footer -->
  <?php include 'includes/footer.php' ?>