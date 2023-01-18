<?php require 'helpers/admin_init.php'; ?>
<?php require 'helpers/_contact_us.php'; ?>

<?php
$pageDetails = [
    'title' => "SSS Admin"
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
                        <h1 class="app-page-title mb-0">Contacts</h1>
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

                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell">#</th>
                                        <th class="cell">From</th>
                                        <th class="cell">Email</th>
                                        <th class="cell">Title</th>
                                        <th class="cell">Content</th>
                                        <th class="cell">Date & Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    while ($contact = mysqli_fetch_array($contacts)) : ?>

                                        <tr>
                                            <td class="cell">#<?php echo $contact['id'] ?></td>
                                            <td class="cell"><span class="truncate"><?php echo $contact['fullnname'] ?></td>
                                            <td class="cell"><?php echo $contact['email'] ?></td>
                                            <td class="cell"><?php echo $contact['message_title'] ?></td>

                                            <td class="cell"><?php echo $contact['messaget_content'] ?></td>
                                            <td class="cell"><?php echo $contact['data_time'] ?></td>
                                            
                                        </tr>
                                    <?php endwhile; ?>
                                    <?php mysqli_stmt_close($contact_data_stmt);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <!--//table-responsive-->

                    </div>
                    <!--//app-card-body-->
                </div>

            </div>
            <!--//container-fluid-->
        </div>
    </div>
    <!--//app-content-->


    <?php Includes::custom_include('includes/footer.php', [], true);    ?>