<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('dosen');?>" class="brand-link">
      <img src="<?php echo base_url();?>assets/dist/img/logo_pnj1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">  Sistem Pengajuan Soal</span> 
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url();?>assets/dist/img/default_user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo site_url('dosen')?>" class="d-block"><?php echo $this->session->nama; ?></a>          
          <span data-toggle="tooltip" title="Sebagai" class="badge badge-warning">Dosen</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="nav-item <?php echo $this->uri->segment(2) == 'dosen' ? 'active': '' ?>">
            <a href="<?php echo site_url('dosen'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'dosen' ) {echo "active" ;} ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
           <li class="nav-item <?php echo $this->uri->segment(2) == 'dosen/dashboard' ? 'active': '' ?>">
            <a href="<?php echo site_url('dosen/dashboard'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'dosen/dashboard' ) {echo "active" ;} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item <?php echo $this->uri->segment(2) == 'dosen/status_soal_uts' ? 'active': '' ?>">
            <a href="<?php echo site_url('dosen/status_soal_uts'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'dosen/status_soal_uts') {echo "active" ;} ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Status Soal UTS
              </p>
            </a>
          </li>
          <li class="nav-item <?php echo $this->uri->segment(2) == 'dosen/status_soal_uas' ? 'active': '' ?>">
            <a href="<?php echo site_url('dosen/status_soal_uas'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'dosen/status_soal_uas') {echo "active" ;} ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Status Soal UAS
              </p>
            </a>
          </li>       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
