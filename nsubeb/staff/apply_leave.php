<?php include 'includes/header.php' ?>
<?php include 'helpers/_apply.php' ?>

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
                    <div class="card shadow-sm mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                Apply For a Leave</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" id="LeaveForm" enctype="multipart/form-data">
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

                              <div class="form-group">
                                <label for=""><b>Leave Title</b></label>
                                <input type="text" name="title" placeholder="Leave For"  class="form-control">
                                 <p class="text-danger">
                                            <?php
                                                if(isset($titleError)){
                                                    print $titleError;
                                                };
                                            ?>
                                        </p>
                              </div>

                                <div class="form-group">
                                    <label for=""><b>HAND WRITTEN APPLICATION:</b></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="written_application"
                                            accept=".pdf,.doc,.docx,.img,.jpg">
                                        <label class="custom-file-label" for="customFile">Choose file (WRITTEN APPLICATION)</label>
                                        <p class="text-danger">
                                            <?php
                                                if(isset($written_applicationError)){
                                                    print $written_applicationError;
                                                };
                                            ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for=""><b>BIRTH CERTIFICATE:</b> </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="birth_certificate"
                                            accept=".pdf,.doc,.docx,.img,.jpg">
                                        <label class="custom-file-label" for="customFile">Choose file (Birth Certificate)</label>
                                        <p class="text-danger">
                                            <?php
                                                if(isset($birthError)){
                                                    print $birthError;
                                                };
                                            ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for=""><b>QUALIFICATION:</b></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile"
                                            name="qualification" accept=".pdf,.doc,.docx,.img,.jpg">
                                        <label class="custom-file-label" for="customFile">Choose file (Qualification)</label>
                                        <p class="text-danger">
                                            <?php
                                                if(isset($qualificationError)){
                                                    print $qualificationError;
                                                };
                                            ?>
                                        </p>
                                    </div>
                                </div>

                              <div class="form-group">
                                    <label for=""><b>PRIMARY CERTIFICATE:</b></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile"
                                            name="primary_certificate" accept=".pdf,.doc,.docx,.img,.jpg">
                                        <label class="custom-file-label" for="customFile">Choose file (CERTIFICATE)</label>
                                        <p class="text-danger">
                                            <?php
                                                if(isset($primary_certificateError)){
                                                    print $primary_certificateError;
                                                };
                                            ?>
                                        </p>
                                    </div>
                                </div>

                                    <div class="form-group">
                                    <label for=""><b>SECONDARY CERTIFICATE:</b></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile"
                                            name="secondary_certificate" accept=".pdf,.doc,.docx,.img,.jpg">
                                        <label class="custom-file-label" for="customFile">Choose file (CERTIFICATE)</label>
                                        <p class="text-danger">
                                            <?php
                                                if(isset($secondary_certificateError)){
                                                    print $secondary_certificateError;
                                                };
                                            ?>
                                        </p>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="card-footer">
                             <button class="btn btn-primary float-right w-50" type="submit" form="LeaveForm"
                                name="apply">Apply</button>
                        </div>
                    </div>
                    <!-- // uploads undegraduate-->
      </div>
    </div>
  </div>

  <?php include 'includes/footer.php' ?>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>


