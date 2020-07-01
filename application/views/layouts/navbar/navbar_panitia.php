<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>      
    </ul>   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">     
      <!-- Account Dropdown Menu -->
      <li class="nav-item dropdown user user-menu">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
          <div class="image">
          <img src="<?php echo base_url();?>assets/dist/img/user4-128x128.jpg" class="user-image img-circle elevation-2" alt="User Image">
        </div>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="<?php echo site_url('panitia/logout') ?>" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2" aria-hidden="true"></i> Logout
          </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
</nav>
<!-- /.navbar -->
