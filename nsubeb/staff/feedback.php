<?php include 'includes/header.php' ?>
<?php require 'helpers/_feedback.php' ?>

<?php
if (isDefaultPassword($_SESSION['s_staff_id'])) {
    header("Location: index.php");
}

if (!isset($_GET['s_id'])) {
    header("Location: support_feedbacks.php");
}

if (!isAppoved($_GET['s_id'], $_SESSION['s_staff_id'])) {
    header("Location: reply_support.php");
}


?>
<style>
    /* Chat containers */
    .container {
        border: 2px solid #dedede;
        background-color: #f1f1f1;
        border-radius: 5px;
        padding: 10px;
        margin: 10px 0;
    }

    /* Darker chat container */
    .darker {
        border-color: #ccc;
        background-color: #ddd;
    }

    /* Clear floats */
    .container::after {
        content: "";
        clear: both;
        display: table;
    }

    /* Style images */
    .container img {
        float: left;
        max-width: 60px;
        width: 100%;
        margin-right: 20px;
        border-radius: 50%;
    }

    /* Style the right image */
    .container img.right {
        float: right;
        margin-left: 20px;
        margin-right: 0;
    }

    /* Style time text */
    .time-right {
        float: right;
        color: #aaa;
    }

    /* Style time text */
    .time-left {
        float: left;
        color: #999;
    }
</style>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include 'includes/sidebar.php' ?>

        <!-- Page Content  -->
        <div id="content">
            <!-- nav -->
            <?php include 'includes/nav.php' ?>

            <!-- Main -->
            <div class="card " style="margin-top: -20px;">
                <div class="card-body">
                    <div class="clearfix">
                        <h5 class=" float-start"><?php echo getSupportsById($_GET['s_id'], $_SESSION['s_staff_id'])['title'] ?></h5>
                        <div class="float-right">
                            <form action="" method="POST" class="d-flex">
                                <select name="status" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                    <option selected>Feedback Status</option>
                                    <option value="1">Solved</option>
                                    <option value="0">Not Solved</option>
                                </select>
                                <button name="save" type="submit" class="btn btn-info btn-sm">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>

                <div class="card-body messageBody" style="overflow-y: scroll; height: 55vh; margin-top: -30px;">

                    <?php
                    $cur_staff =  $_SESSION['s_staff_id'];
                    $matric = $_GET['matric'];

                    $student_avatar = getStudentByID($matric)['avatar'];
                    $staff_avatar = getStaffByID($cur_staff)['avatar'];
                    ?>

                    <?php while ($message = mysqli_fetch_assoc($messages)) : ?>

                        <?php if ($message['staff_id'] == $cur_staff) : ?>

                            <div class="container darker">
                                <img src="<?php echo $staff_avatar ?>" alt="Avatar" class="right">
                                <p><?php echo $message['message'];  ?></p>
                                <span class="time-left">
                                    <?php echo date("d M, h:i:a", strtotime($message['date_time'])); ?></span>
                            </div>

                        <?php elseif ($message['staff_id'] == $matric) :  ?>

                            <div class="container">
                                <img src="../student/<?php echo $student_avatar ?>" alt="Avatar">
                                <p><?php echo $message['message'];  ?></p>
                                <span class="time-left">
                                    <?php echo date("d M, h:i:a", strtotime($message['date_time'])); ?></span>
                            </div>

                        <?php endif; ?>
                    <?php endwhile; ?>


                </div>

                <?php if (isSolved($_GET['s_id'], $staff_id)) : ?>
                    <div class="alert alert-success">
                        <strong>Issue Solved!</strong> No new messages can be send, issue already been solved
                    </div>
                <?php else :  ?>
                    <div class="card-body">
                        <form id="user_form" class="needs-validation" action="" method="post" novalidate>
                            <div class="form">
                                <div class="input-group mb-3">
                                    <input type="text" id="message" name="message" required class="form-control" placeholder="Type reply" aria-label="" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button id="sendMSG" class="btn btn-outline-secondary" name="send_message" type="submit">Send</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php endif;  ?>
            </div>
        </div>
    </div>
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>

    <script type="text/javascript">
        var messageBody = document.querySelector('.messageBody');
        messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;

        $(document).ready(function() {
            $("#sidebarCollapse").on("click", function() {
                $("#sidebar").toggleClass("active");
            });
        });

        // ajax
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>