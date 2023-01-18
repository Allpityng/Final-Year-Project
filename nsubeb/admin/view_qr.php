<?php require 'helpers/admin_init.php'; ?>
<?php require 'helpers/_manage_staffs.php'; ?>

<?php
$pageDetails = [
    'title' => "Manage Staffs"
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

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <a href="manage_staffs.php">Back</a>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    <form class="table-search-form row gx-1 align-items-center">
                                        <div class="col-auto">
                                            <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn app-btn-secondary">Search</button>
                                        </div>
                                    </form>

                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//table-utilities-->
                    </div>
                    <!--//col-auto-->
                </div>
                <!--//row-->

              <div class="card">
                <div class="card-header">QR CODE</div>
                 <div class="qr-code-container">
                                            <div class="qr-code" style>
                                                
                                            </div>
                                        </div>
              </div>

            </div>
            <!--//container-fluid-->
        </div>
    </div>
    <!--//app-content-->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>

    let qr_code_element = document.querySelector(".qr-code");

    function generate(user_input) {
  qr_code_element.style = "";

  var qrcode = new QRCode(qr_code_element, {
    text: `${user_input.value}`,
    width: 400, //128
    height: 400,
    colorDark: "#000000",
    colorLight: "#ffffff",
    correctLevel: QRCode.CorrectLevel.H
  });

  let download = document.createElement("button");
  qr_code_element.appendChild(download);

  let download_link = document.createElement("a");
  download_link.setAttribute("download", "qr_code.png");
  download_link.innerHTML = `Download <i class="fa-solid fa-download"></i>`;

  download.appendChild(download_link);

  let qr_code_img = document.querySelector(".qr-code img");
  let qr_code_canvas = document.querySelector("canvas");

  if (qr_code_img.getAttribute("src") == null) {
    setTimeout(() => {
      download_link.setAttribute("href", `${qr_code_canvas.toDataURL()}`);
    }, 300);
  } else {
    setTimeout(() => {
      download_link.setAttribute("href", `${qr_code_img.getAttribute("src")}`);
    }, 300);
  }
}

var url_string = window.location.href; 
var url = new URL(url_string);
var email = url.searchParams.get("email").trim();
   generate({value: email});                                        
</script>



    <?php Includes::custom_include('includes/footer.php', [], true);    ?>