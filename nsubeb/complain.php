<?php include 'helpers/init.php' ?>
<?php include 'helpers/_contact_us.php' ?>
<?php include 'includes/header.php' ?>

<body>
  <!-- Navbar  -->
  <?php include 'includes/nav.php' ?>

  <!-- /Navbar -->
  <!-- Main -->
  <div class="container my-5">
    <div class="card">
      <div class="card-body shadow-sm text-info">
        <h4>Contact us</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <form class="row g-3 needs-validation" novalidate action="" method="POST">

              <span class="text-success text-center">
                <?php

                if (isset($messages['msgSucc'])) {
                  echo $messages['msgSucc'];
                }
                ?>
              </span>
              <span class="text-danger text-center">
                <?php

                if (isset($messages['msgErr'])) {
                  echo $messages['msgErr'];
                }
                ?>
              </span>
              <div class="form-floating mb-3">
                <input type="text" class="form-control shadow-sm" id="floatingInput" name="fullname" placeholder="Enter Full Name" required />
                <label for="floatingInput">Full Name</label>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Enter Your Full Name</div>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control shadow-sm" id="floatingInput" name="email" placeholder="Enter Email address" required />
                <label for="floatingInput">Email address</label>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Enter address</div>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control shadow-sm" id="floatingInput" name="messagetitle" placeholder="Enter Message Title" required />
                <label for="floatingInput">Message Title</label>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Enter Message Title</div>
              </div>
              <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="messagecontent" style="height: 100px" required></textarea>
                <label for="floatingTextarea2">Message Content</label>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Enter Message Content</div>
              </div>

              <div class="form-group">
                <button type="submit" name="contactUS" class="btn btn-outline-secondary w-100 shadow">
                  Send <i class="mdi mdi-send"></i>
                </button>
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <h4 class="text-info">Address</h4>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <i class="mdi mdi-map"></i> IBB way Dutsinma Road.
              </li>
              <li class="list-group-item">
                <i class="mdi mdi-phone"></i> Phone: +234-8145676954
              </li>
              <li class="list-group-item">
                <i class="mdi mdi-mail"></i> Email: info@auk.edu.ng
              </li>
              <li class="list-group-item">
                <i class="mdi mdi-box"></i> PMB: P. M. B. 2137
              </li>
            </ul>
            <div class="ratio ratio-16x9">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.471821081941!2d7.599065914189742!3d12.941632419038244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x11ae1a30da64e8bb%3A0xe86b90d5be9e8f61!2sAl%20Qalam%20University!5e0!3m2!1sen!2sng!4v1623831638016!5m2!1sen!2sng" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <h4 class="text-center">Connect With Us @</h4>
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span class="mdi mdi-whatsapp mdi-24px"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span class="mdi mdi-facebook mdi-24px"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span class="mdi mdi-twitter mdi-24px"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span class="mdi mdi-youtube mdi-24px"></span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- /Main -->

  <!-- Footer -->
  <?php include 'includes/footer.php' ?>