<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('kbk');?>" class="brand-link">
      <img src="<?php echo base_url();?>assets/dist/img/logo_pnj1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"> Sistem Pengajuan Soal</span> 
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url();?>assets/dist/img/raisa.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo site_url('kbk')?>" class="d-block"><?php echo $this->session->nama; ?></a>
          <span data-toggle="tooltip" title="Sebagai" class="badge badge-warning">KBK</span>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="<?php echo site_url('kbk'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'kbk' ) {echo "active" ;} ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
    
        <!--soal uts-->
         <li class="nav-item">
            <a href="<?php echo site_url('kbk/soal_uts'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'kbk/soal_uts') {echo "active" ;} ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Soal UTS
              </p>
            </a>
          </li>
          <!--soal uas-->
          <li class="nav-item">
            <a href="<?php echo site_url('kbk/soal_uas'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'kbk/soal_uas') {echo "active" ;} ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Soal UAS
              </p>
            </a>
          </li>
         <!-- upload form soal -->
          <li class="nav-item">
            <a href="<?php echo site_url('kbk/upload_form_soal'); ?>" class="nav-link <?php if ($this->uri->uri_string() == 'kbk/upload_form_soal') {echo "active" ;} ?>">
              <i class="nav-icon fas fa-cloud-upload-alt"></i>
              <p>
                Upload Format Soal
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
