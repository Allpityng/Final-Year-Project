 <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="container-fluid">
         <button type="button" id="sidebarCollapse" class="btn btn-secondary">
             <i class="mdi mdi-menu"></i>
         </button>
         <button class="btn">
             Welcome Back! <strong class="text-info">
                 <?php echo $_SESSION['s_staff_email']  ?>
             </strong>
         </button>

         <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <i class="fas fa-align-justify"></i>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="nav navbar-nav ml-auto">
                 <li class="nav-item">
                     <a class="nav-link" href="../index.php">
                         <i class="mdi mdi-home"></i>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link" href="logout.php">Log Out <i class="mdi mdi-logout"></i>
                     </a>
                 </li>
             </ul>
         </div>
     </div>
 </nav>