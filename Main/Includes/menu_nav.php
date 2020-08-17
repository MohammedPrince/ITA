<div class="wrapper ">
<!--
  ../assets/img/sidebar-1.jpg
  !-->
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="">

      <div class="logo">
        <a href="#" class="simple-text logo-mini">
         B0K
        </a>
        <a href="#" class="simple-text logo-normal">
        IT.A.M.System
        </a>
      </div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="../assets/img/faces/avatar.jpg" />
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                <?php echo $_SESSION['user_name'] ; ?>
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> MP </span>
                    <span class="sidebar-normal"> My Profile </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> EP </span>
                    <span class="sidebar-normal"> Edit Profile </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> S </span>
                    <span class="sidebar-normal"> Settings </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <ul class="nav">

<li <?php if($page_name == 'Add Users') {?>class="nav-item active "<?php } ?>>
            <a class="nav-link" href="add_user.php">
              <i class="material-icons">portrait</i>
              <p style="color:#fff"> Add Users </p>
            </a>
          </li>

          
<li <?php if($page_name == 'Add Categories') {?>class="nav-item active "<?php } ?>>
            <a class="nav-link" href="add_category.php">
              <i class="material-icons">list</i>
              <p style="color:#fff"> Add Categories </p>
            </a>
          </li>

          <li <?php if($page_name == 'Add Devices') {?>class="nav-item active "<?php } ?>>
            <a class="nav-link" href="add_devices.php">
              <i class="material-icons">devices</i>
              <p style="color:#fff"> Add Devices </p>
            </a>
          </li>

          <li <?php if($page_name == 'Add Companies') {?>class="nav-item active "<?php } ?>>
            <a class="nav-link" href="add_company.php">
              <i class="material-icons">contacts</i>
              <p style="color:#fff"> Add Companies </p>
            </a>
          </li>

          <li <?php if($page_name == 'Add Branch') {?>class="nav-item active "<?php } ?>>
            <a class="nav-link" href="add_branch.php">
              <i class="material-icons">adjust</i>
              <p style="color:#fff">Add Branch</p>
            </a>
          </li>

         <hr class="btn-danger">

         <li <?php if($page_name == 'Incoming New Devices') {?>class="nav-item active "<?php } ?>>
            <a class="nav-link" href="inc_new_devices.php">
              <i class="material-icons">devices_other</i>
              <p style="color:#fff"> New Devices IN</p>
            </a>
          </li>

          <li <?php if($page_name == 'Incoming New Devices List') {?>class="nav-item active "<?php } ?>>
            <a class="nav-link" href="inc_new_devices_list.php">
              <i class="material-icons">assignment</i>
              <p style="color:#fff"> New Devices IN List</p>
            </a>
          </li>
          <li <?php if($page_name == 'New Devices OUT') {?>class="nav-item active "<?php } ?>>
            <a class="nav-link" href="out_new_devices.php?cat=7">
              <i class="material-icons">devices_other</i>
              <p style="color:#fff"> New Devices OUT</p>
            </a>
          </li>

          <li <?php if($page_name == 'New Devices OUT List') {?>class="nav-item active "<?php } ?>>
            <a class="nav-link" href="out_new_devices_list.php">
              <i class="material-icons">assignment</i>
              <p style="color:#fff"> New Devices OUT List</p>
            </a>
          </li>

          <hr class="btn-danger">

          <li <?php if($page_name == 'Maintenance') {?>class="nav-item active "<?php } ?>>
            <a class="nav-link" href="maintain.php">
              <i class="material-icons">important_devices</i>
              <p style="color:#fff"> Maintenance</p>
            </a>
          </li>
          <li <?php if($page_name == 'Maintenance Devices List') {?>class="nav-item active "<?php } ?>>
            <a class="nav-link" href="maintain_list.php">
              <i class="material-icons">perm_device_information</i>
              <p style="color:#fff"> Maintenance Devices List</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="material-icons">logout</i>
              <p style="color:#fff"> Logout </p>
            </a>
          </li>

    
       
        
        </ul>
      </div>
    </div>


     <!-- Start Navbar -->
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
            <a class="navbar-brand" href="<?php echo $link;?>"><?php echo $page_name ;?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
           
            <ul class="navbar-nav">
             
              <li class="nav-item dropdown">
                <a class="nav-link" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="./logout.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->