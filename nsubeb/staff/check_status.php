<?php include 'includes/header.php' ?>


<?php
if (isDefaultPassword($_SESSION['s_staff_email'])) {
    header("Location: index.php");
}

$email = $_SESSION['s_staff_email'];


if (isset($_GET['del'])) {
  $del_staffid = $_GET['del'];
  delet_leave($del_staffid);
}

function delet_leave($staff_id)
{
  global $connection;

  $delete_q = "DELETE FROM `leaves` WHERE `id` = ?";

  $delete_stmt = mysqli_prepare($connection, $delete_q);

  mysqli_stmt_bind_param($delete_stmt, 's', $staff_id);

  mysqli_stmt_execute($delete_stmt);

  mysqli_stmt_close($delete_stmt);

  header("Location: check_status.php");
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
                        <h4 class="text-center text-info">Applied Leaves and Statuses</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Leave Title</th>
                                        <th scope="col">Leave Status</th>
                                        <th scope="col">Applied Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

              <?php

                $result = getLeaves($email);
                  while ($res = mysqli_fetch_array($result)) : ?>
                    <tr>
                      <td><?php echo $res['id']; ?></td>
                      <td><?php echo $res['title']; ?></td>                      
                      <td>
                          <?php $status = $res['status']; ?>
                                                    <span class="
                                                        <?php if($status == 'Accepted'){
                                                        echo "text-success";
                                                        }else if ($status == 'In Review'){
                                                        echo "text-warning";
                                                        }else if($status =='Declined'){
                                                        echo "text-danger";
                                                        } ?>

                                                        "><?php echo $status; ?></span>
                      </td>
                    <td><?php echo $res['datetime']; ?></td>
                      <td>
                        <div class="btn-group" role="group">
                          
                          <a href="?del=<?php echo $res['id'];  ?>" type="button" class="btn btn-danger">
                            Delete
                          </a>
                        </div>
                      </td>
                    </tr>

                  <?php endwhile; ?>
                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php' ?>