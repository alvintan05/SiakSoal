<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Dashboard</a>
      </li> -->
    </ul>


<!--       <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --> 

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
          <a href="<?php echo site_url('dosen/logout') ?>" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2" aria-hidden="true"></i> Logout
          </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      
     <!--  <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fas fa-th-large"></i></a>
      </li> -->
    </ul>
</nav>
<!-- /.navbar -->
