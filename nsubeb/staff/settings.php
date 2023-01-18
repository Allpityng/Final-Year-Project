<?php include 'includes/header.php' ?>
<?php include 'helpers/_update_profile.php' ?>


<?php
if (isDefaultPassword($_SESSION['s_staff_email'])) {
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
      <div class="container">
        <div class="card">
          <div class="card-body shadow-sm">
            <h4 class="text-center text-info">Settings</h4>
            <div class="card-body border m-3 shadow-sm">
              <h4 class="text-center text-info">(Update Profile)</h4>
              <form action="" method="post" action="" method="POST" enctype="multipart/form-data" novalidate>
                <span class="text-success">
                  <?php if (isset($msgs['msgSucc'])) {
                    echo $msgs['msgSucc'];
                  } ?></span>
                <span class="text-danger">
                  <?php if (isset($msgs['msgErr'])) {
                    echo $msgs['msgErr'];
                  } ?></span>
                <div class="row">
                  <div class="col-md-12 my-2">
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0">
                        <img src="<?php echo $profile['avatar']; ?>" class="img-thumbnail" width="80" alt="" />
                      </div>
                      <div class="ms-3">
                        <label for="formFile" class="form-label">Update Avatar <i class="mdi mdi-upload"></i>
                        </label>
                        <input class="form-control" name="avatar" type="file" id="formFile">
                        <small class="d-block fst-normal">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control shadow-sm" id="floatingInput" placeholder="Enter Staff ID" disabled value="<?php echo $profile['id']; ?>" />
                      <label for="floatingInput"> Staff ID </label>
                      <div class="valid-feedback">Looks good!</div>
                      <div class="invalid-feedback">Enter Staff ID</div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control shadow-sm" id="floatingInput" placeholder="Enter Email" name="email" required value="<?php echo $profile['email']; ?>"  disabled/>
                      <input type="email" class="form-control shadow-sm" id="floatingInput" placeholder="Enter Email" name="email" required value="<?php echo $profile['email']; ?>" hidden/>
                      <label for="floatingInput">Email </label>
                      <div class="valid-feedback">Looks good!</div>
                      <div class="invalid-feedback">Enter Email</div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating mb-3">
                      <input type="text" name="first_name" value="<?php echo $profile['first_name']; ?>" class="form-control shadow-sm" id="floatingInput" placeholder="Enter First Name" required />
                      <label for="floatingInput">First Name </label>
                      <div class="valid-feedback">Looks good!</div>
                      <div class="invalid-feedback">Enter First Name</div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating mb-3">
                      <input type="text" name="last_name" value="<?php echo $profile['last_name']; ?>" class="form-control shadow-sm" id="floatingInput" placeholder="Enter Last Name" required />
                      <label for="floatingInput">Last Name </label>
                      <div class="valid-feedback">Looks good!</div>
                      <div class="invalid-feedback">Enter Last Name</div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating">
                      <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                      </select>
                      <label for="floatingSelect">Gender</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating mb-3">
                      <input type="text" name="phone_number" value="<?php echo $profile['phone_number']; ?>" class="form-control shadow-sm" id="floatingInput" placeholder="Enter Phone Number" required />
                      <label for="floatingInput">Phone Number </label>
                      <div class="valid-feedback">Looks good!</div>
                      <div class="invalid-feedback">Enter Phone Number</div>
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control shadow-sm" id="floatingInput" placeholder="Enter Department" name="department" required value="<?php echo $profile['department']; ?>" />
                      <label for="floatingInput">Department </label>
                      <div class="valid-feedback">Looks good!</div>
                      <div class="invalid-feedback">Enter Department</div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-floating mb-3">
                      <input type="text" name="address" value="<?php echo $profile['address']; ?>" class="form-control shadow-sm" id="floatingInput" placeholder="Enter Address" required value="<?php echo $profile['department']; ?>" />
                      <label for="floatingInput">Address </label>
                      <div class="valid-feedback">Looks good!</div>
                      <div class="invalid-feedback">Enter Address</div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-floating mb">
                      <button class="btn btn-info float-end" type="submit" name="updateProfile">
                        Update Profile
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <?php include 'includes/footer.php' ?>