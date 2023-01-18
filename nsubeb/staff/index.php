<?php include 'includes/header.php' ?>
<?php include 'helpers/take_attendance.php' ?>


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
        <!-- alerts -->
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
          <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
          </symbol>
          <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
          </symbol>
          <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
          </symbol>
        </svg>
         <span class="text-success text-center">
                                        <?php if (isset($messages['msgSucc'])) {
                                            echo $messages['msgSucc'];
                                        } ?>
                                    </span>
                                    <span class="text-danger text-center">
                                        <?php if (isset($messages['msgErr'])) {
                                            echo $messages['msgErr'];
                                        } ?>
                                    </span>

        <?php if (isDefaultPassword($_SESSION['s_staff_email'])) : ?>
          <div class="alert alert-warning d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
              <use xlink:href="#info-fill" />
            </svg>
            <div>You are still using the default password <a href="change_password.php" class="alert-link">Change Password</a></div>
          </div>
        <?php else : ?>
          <div class="alert alert-primary d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
              <use xlink:href="#info-fill" />
            </svg>
            <div>No More Alerts</div>
          </div>
        <?php endif;  ?>

        <!-- /alerrts -->

        <!-- Main -->
        <div class="container">
          <div class="row cards">
            <div class="col-md-4">
              <div class="card text-center">
                <div class="card-body text-info shadow-sm">
                  <div class="clearfix">
                    <i class="mdi mdi-message-cog mdi-48px float-start"></i>
                    <div class="float-end">
                      <h4>Attendance</h4>
                      <span>Take Attendance</span>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="clearfix">
                    <a href="#" class="link-info">
                      <div class="float-start">View Details</div>
                      <i class="float-end mdi mdi-chevron-right-circle-outline"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card text-center">
                <div class="card-body text-success shadow-sm">
                  <div class="clearfix">
                    <i class="mdi mdi-message-reply-text mdi-48px float-start"></i>
                    <div class="float-end">
                      <h4>Leaves</h4>
                      <h4>Apply for Leave</h4>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="clearfix">
                    <a href="#" class="link-success">
                      <div class="float-start">View Details</div>
                      <i class="float-end mdi mdi-chevron-right-circle-outline"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card text-center">
                <div class="card-body text-secondary shadow-sm">
                  <div class="clearfix">
                    <i class="
                          mdi mdi-message-arrow-right-outline mdi-48px
                          float-start
                        "></i>
                    <div class="float-end">
                      <h4>4</h4>
                      <h4>Approved Leaves</h4>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="clearfix">
                    <a href="#" class="link-secondary">
                      <div class="float-start">View Details</div>
                      <i class="float-end mdi mdi-chevron-right-circle-outline"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /Main -->

        <!-- Level Staff -->
           <div class="container">
        <div class="card">
         <div class="card p-4">
           <div class="card-body p-4 shadow-sm">
            <h4 class="text-center text-info">Take Attendance</h4>
          </div>
          <div class="card-body p-3">
            <form action="" method="post">
             <div class="form-group">
               <label for=""><b>Attendance Type</b></label>
              <select name="" id="type" class="form-control">
                <option value="SignIn">Sign In</option>
                <option value="SignOut">Sign Out</option>
              </select>
             </div>
             <div class="card p-4 my-3">
              <div class="w-100" id="reader"></div>
             </div>
            
              </form>
          </div>
         </div>
        <!-- /Level Staff -->
      </div>
    </div>
  </div>

    <script src="assets/js/html5-qrcode.min.js"></script>

    <script>
      
let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { fps: 10, qrbox: {width: 400, height: 400} },
  /* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);


  function onScanSuccess(decodedText, decodedResult) {
  // handle the scanned code as you like, for example:
  console.log(`Code matched = ${decodedText}`, decodedResult);
  html5QrcodeScanner.clear();
  var getType = document.querySelector("#type");
  let type = getType.value;
  console.log(decodedText);
  window.location.replace(`index.php?email=${decodedText}&type=${type}`);
}

function onScanFailure(error) {
  // handle scan failure, usually better to ignore and keep scanning.
  // for example:
  console.warn(`Code scan error = ${error}`);
}

  </script>
    </script>

  <?php include 'includes/footer.php' ?>