<?php require 'helpers/staff_init.php' ?>
<?php require 'helpers/_recover_password.php' ?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- external links -->
  <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="assets/icons/mdi/css/materialdesignicons.min.css" />
  <title>NSUBEB</title>
</head>

<body>
  <!-- Navbar  -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-info shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php
        "><img src="assets/images/logo.png" alt="" width="60" class="d-inline-block" />
            NSUBEB</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="staff/index.php">Staff</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="complain.php">Complain</a>
                </li>
            </ul>
            <a class="btn btn-outline-secondary navbar-btn-login" href="staff/staff_login.php">Login</a>
        </div>
    </div>
</nav>
  <!-- /Navbar -->
  <!-- Main -->
  <main>
    <div class="container my-5">
      <div class="card shadow col-md-6 offset-md-3">
        <div class="card-body text-center p-1 shadow-sm">
          <h4 class="text-info">Recover Staff Password</h4>
          <p class="lead">Let's recover your password</p>
        </div>
        <div class="card-body">
          <form class="row g-3 needs-validation" novalidate>
            <div class="form-floating mb-3">
              <input type="text" class="form-control shadow-sm" id="floatingInput" placeholder="Enter Matric Number" required />
              <label for="floatingInput">Staff ID or Email</label>
              <div class="valid-feedback">Looks good!</div>
              <div class="invalid-feedback">Enter Staff ID or Email</div>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-outline-secondary w-100 shadow">
                Recover Password <i class="mdi mdi-lock"></i>
              </button>
            </div>
            <div class="form-group text-center">
              <a class="card-link nav-link p-0" href="staff_login.php">Staff Login</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  <!-- /Main -->
    <!-- Footer -->
<footer class="footer bg-info">
     <div class="container-fluid">
         <div class="row footer-links d-flex justify-content-center">
             <div class="col-md-3">
                 <h3>
                     Niger State Universal Basic Education Board (NSUBEB)
                     <img src="assets/images/logo.png" alt="" width="60px" />
                 </h3>
                 <p>
                    The Niger State Universal Basic Education Board Was Established By The State Universal Basic Education Law, 2005. The Establishment Of The Board Was As A Proactive Response To The Challenges Of The Basic Education Sub-Sector In The In The State. In A Nutshell, The Board Is Responsible For Ensuring Unfettered Access, Equity And Quality Basic Education For All Children Of School Age In The State.

                 </p>
             </div>

             <div class="col-md-6">
                 <h4>Staff</h4>
                 <ul>
                     <li class="">
                         <a class="" href="staff/staff_login.php"><span class="mdi mdi-chevron-double-right"></span> Login</a>
                     </li>

                     <li class="">
                         <a class="" href="staff/staff_recover_password.php"><span class="mdi mdi-chevron-double-right"></span> Recover
                             Password</a>
                     </li>
                     <li class="">
                         <a class="" href="staff/index.php"><span class="mdi mdi-chevron-double-right"></span> Staff
                             Dashboard</a>
                     </li>
                 </ul>
             </div>
             <div class="col-md-3">
                 <h4>Quick Links <span class="mdi mdi-link"></span></h4>
                 <ul>
                     <li class="">
                         <a class="" href="gallery.php"><span class="mdi mdi-chevron-double-right"></span> Gallery</a>
                     </li>
                   

                     <li class="">
                         <a class="" href="contact_us.php"><span class="mdi mdi-chevron-double-right"></span> Send a Complain</a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
     <hr />
     <div class="d-flex justify-content-center mt-2">
         <ul class="nav">
             <li class="nav-item">
                 <a class="nav-link disabled" href="#">&copy;Student Support System</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="t_and_c.php">Terms & Conditions</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="privacy_policy.php">Privacy Policy</a>
             </li>
         </ul>
     </div>
 </footer>

 <!-- /Footer -->
 <script src="assets/js/popper.min.js"></script>
 <script src="assets/js/bootstrap.min.js"></script>
 <script src="assets/js/script.js"></script>
 </body>

 </html>