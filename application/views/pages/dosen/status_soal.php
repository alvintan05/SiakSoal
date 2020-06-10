<?php   
  $proccess_uts = 0;
  $verified_uts = 0;
  $rejected_uts = 0;
  $proccess_uas = 0;
  $verified_uas = 0;
  $rejected_uas = 0;
  
  foreach($data_status_uts as $row) {
      switch($row->status){
        case "Verified":
          $verified_uts++;
          break;
        case "Processing":
          $proccess_uts++;
          break;
        case "Rejected":
          $rejected_uts++;
          break;
      }
  }

  foreach($data_status_uas as $row) {
    switch($row->status){
      case "Verified":
        $verified_uas++;
        break;
      case "Processing":
        $proccess_uas++;
        break;
      case "Rejected":
        $rejected_uas++;
        break;
    }
}
?>
<div class="content-header">
	<div class="container-fluid">
        <div class="row callout callout bg-light">
          <div class="col-1" align="right">
            <span class="fa-stack fa-lg">
              <i class="fas fa-square fa-stack-2x" style="color: #ffff"></i>
              <i class="fas fa-file fa-stack-1x " style="color: #17a2b8"></i>
            </span>
          </div>
          <div class="col-9">
            <div class="text-secondary"><b>Status Soal</b></div>
            <small class="content text-gray">Halaman ini menampilkan status soal yang telah di upload oleh dosen. </small>
          </div>
          <div class="col-2">
            <?php $this->load->view('layouts/breadcrumb')?>
          </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
 
<!-- Main content -->
<section class="content">
    <div class="container-fluid">

       <!-- Info boxes STYLE 1-->
       <!--  <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-tasks"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Matkul</span>
                <span class="info-box-number">
                <?php echo count($data_status); ?>
                </span>
              </div> -->
              <!-- /.info-box-content -->
           <!--  </div> -->
            <!-- /.info-box -->
         <!--  </div>
           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-hourglass-half"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Processing</span>
                <span class="info-box-number">
                  <?php echo $proccess; ?>
                </span>
              </div> -->
              <!-- /.info-box-content -->
           <!--  </div> -->
            <!-- /.info-box -->
          <!-- </div>
           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon badge-success elevation-1"><i class="fas fa-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Verified</span>
                <span class="info-box-number">
                  <?php echo $verified; ?>
                </span>
              </div> -->
              <!-- /.info-box-content -->
          <!--   </div> -->
            <!-- /.info-box -->
         <!--  </div>
           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon badge-danger elevation-1"><i class="fas fa-times"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Rejected</span>
                <span class="info-box-number">
                  <?php echo $rejected; ?>
                </span>
              </div> -->
              <!-- /.info-box-content -->
           <!--  </div> -->
            <!-- /.info-box -->
        <!--   </div> -->
          <!-- /.col -->
    <!--     </div>
      </div> -->


    	<!-- UTS -->
            <div class="card collapsed-card">
              <div class="card-header border-transparent">
              	<div class="card-tools" align="float-sm-right">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
                <h1 class="card-title "><b>Status Pengumpulan Soal UTS</b></h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-2">

                <!-- Info boxes -->
                <div class="row">
                  <div class="col-12 col-sm-6 col-md-3">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3 bg-info">
                      <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Total Matkul</span>
                        <span class="info-box-number"><?php echo count($data_status_uts); ?></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>

                  <div class="col-12 col-sm-6 col-md-3">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3 bg-warning">
                      <span class="info-box-icon"><i class="fas fa-hourglass-half"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Processing</span>
                        <span class="info-box-number"><?php echo $proccess_uts; ?></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>

                  <div class="col-12 col-sm-6 col-md-3">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3 bg-success">
                      <span class="info-box-icon"><i class="fas fa-check"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Verified</span>
                        <span class="info-box-number"><?php echo $verified_uts; ?></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>

                  <div class="col-12 col-sm-6 col-md-3">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3 bg-danger">
                      <span class="info-box-icon"><i class="fas fa-times"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Rejected</span>
                        <span class="info-box-number"><?php echo $rejected_uts; ?></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                </div>

                <!-- TABLE : UTS -->
                <div class="table table-striped">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Mata Kuliah</th>
                      <th>File</th>
                      <th>Status</th>
                      <th>Waktu Upload</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php  
                          foreach($data_status_uts as $row) {
                            ?>
                            <tr>
                              <td><?php echo $row->matakuliah_kodemk;?></td>
                              <td><?php echo $row->namamk;?></td>
                              <td><?php echo $row->file;?></td>                                                      
                              <td>
                                <span class="badge 
                                  <?php  
                                    switch($row->status){
                                      case "Verified":
                                        echo 'badge-success';
                                        break;
                                      case "Processing":
                                        echo 'badge-warning';
                                        break;
                                      case "Rejected":
                                        echo 'badge-danger';
                                        break;
                                    }
                                  ?>
                                  ">                                  
                                  <?php echo $row->status ?>
                                </span>
                              </td>
                              <td>
                                <?php 
                                  $datedb =  $row->create_at;
                                  $newDate = date("d F Y", strtotime($datedb));
                                  echo $newDate;
                                ?>
                              </td>
                              <td>
                                <div class="box-button">
                                  <!-- Detail icon -->
                                  <a class="btn" data-toggle="modal" data-target="#detailModalUts<?php echo $row->kode_soal;?>"> <i class="fa fa-eye"></i></a>
                                  <!-- Edit Icon -->
                                  <a class="btn" href="<?php echo site_url('dosen/edit_soal/'.$row->kode_soal);?>" <?php if($row->status == "Verified" || $row->status == "Rejected") echo 'hidden';?>>
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <!-- <a class="btn" data-toggle="modal" data-target="#hapusModal"><i class="fa fa-trash"></i></a>                                   -->
                                </div>
                              </td>
                            </tr>
                            <?php                         
                          }       
                      ?>                                            
                    </tbody>
                  </table>
                </div>
                <!--  /.table-responsive -->
              </div>
              <!-- /.card-body -->
          </div>    


        <!-- UAS -->            
            <div class="card collapsed-card">
              <div class="card-header border-transparent">
                <div class="card-tools" align="float-sm-right">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
                <h1 class="card-title "><b>Status Pengumpulan Soal UAS</b></h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-2">

                <!-- Info boxes -->
                <div class="row">
                  <div class="col-12 col-sm-6 col-md-3">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3 bg-info">
                      <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Total Matkul</span>
                        <span class="info-box-number"><?php echo count($data_status_uas); ?></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>

                  <div class="col-12 col-sm-6 col-md-3">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3 bg-warning">
                      <span class="info-box-icon"><i class="fas fa-hourglass-half"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Processing</span>
                        <span class="info-box-number"><?php echo $proccess_uas; ?></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>

                  <div class="col-12 col-sm-6 col-md-3">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3 bg-success">
                      <span class="info-box-icon"><i class="fas fa-check"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Verified</span>
                        <span class="info-box-number"><?php echo $verified_uas; ?></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>

                  <div class="col-12 col-sm-6 col-md-3">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3 bg-danger">
                      <span class="info-box-icon"><i class="fas fa-times"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Rejected</span>
                        <span class="info-box-number"><?php echo $rejected_uas; ?></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                </div>

                <!-- TABLE : UAS -->
                <div class="table table-striped">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Mata Kuliah</th>
                      <th>File</th>
                      <th>Status</th>
                      <th>Waktu Upload</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php  
                          foreach($data_status_uas as $row) {
                            ?>
                            <tr>
                              <td><?php echo $row->matakuliah_kodemk;?></td>
                              <td><?php echo $row->namamk;?></td>
                              <td><?php echo $row->file;?></td>                                                      
                              <td>
                                <span class="badge 
                                  <?php  
                                    switch($row->status){
                                      case "Verified":
                                        echo 'badge-success';
                                        break;
                                      case "Processing":
                                        echo 'badge-warning';
                                        break;
                                      case "Rejected":
                                        echo 'badge-danger';
                                        break;
                                    }
                                  ?>
                                  ">                                  
                                  <?php echo $row->status ?>
                                </span>
                              </td>
                              <td>
                                <?php 
                                  $datedb =  $row->create_at;
                                  $newDate = date("d F Y", strtotime($datedb));
                                  echo $newDate;
                                ?>
                              </td>
                              <td>
                                <div class="box-button">
                                  <a class="btn" data-toggle="modal" data-target="#detailModalUas<?php echo $row->kode_soal;?>"><i class="fa fa-eye"></i></a>
                                  <a class="btn" href="<?php echo site_url('dosen/edit_soal/'.$row->kode_soal); ?>" <?php if($row->status == "Verified" || $row->status == "Rejected") echo 'hidden';?>>
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <!-- <a class="btn" data-toggle="modal" data-target="#hapusModal"><i class="fa fa-trash"></i></a>                                   -->
                                </div>
                              </td>
                            </tr>
                            <?php                         
                          }       
                      ?>                                                
                    </tbody>
                  </table>
                </div>
                <!--  /.table-responsive -->
              </div>
              <!-- /.card-body -->
          </div>

          <?php          
            foreach($data_status_uts as $row2) 
            {
              $kode = $row2->matakuliah_kodemk;
              $nama = $row->namamk;
              $jenisujian = "UTS";
              $jenissoal = $row2->jenis_soal;              
              $datedb =  $row2->create_at;
              $tanggal = date("d F Y", strtotime($datedb));                                  
              $file = $row2->file;
          ?>
           <!-- Modal Detail UTS -->
          <div class="modal fade" id="detailModalUts<?php echo $row2->kode_soal;?>" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="detailModalTitle">Detail Soal</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card">
                    <table class="table table-sm table-hover">
                      <tr>
                        <th>Kode Matkul</th>
                        <td><p><?php echo $kode ?></p></td>
                      </tr>
                      <tr>
                        <th>Nama Matkul</th>
                        <td><p><?php echo $nama ?></p></td>
                      </tr>                      
                      <tr>
                        <th>Jenis Ujian</th>
                        <td><p><?php echo $jenissoal ?></p></td>
                      </tr>
                      <tr>
                        <th>UTS / UAS</th>
                        <td><p><?php echo $jenisujian ?></p></td>
                      </tr>
                      <tr>
                        <th>Tanggal Upload</th>                        
                        <td><p><?php echo $tanggal ?></p></td>
                      </tr>
                      <tr>
                        <th>File Soal</th>
                        <td><a href="<?php echo site_url('dosen/download/'.$file); ?>" target="_blank"><i class="fas fa-file"></i> <?php echo $file ?></a></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <?php
          }
          ?>

          <?php
            foreach($data_status_uas as $row3) 
            {
              $kode = $row3->matakuliah_kodemk;
              $nama = $row->namamk;
              $jenisujian = "UAS";
              $jenissoal = $row3->jenis_soal;              
              $datedb =  $row3->create_at;
              $tanggal = date("d F Y", strtotime($datedb));                                  
              $file = $row3->file;
          ?>
           <!-- Modal Detail UAS -->
          <div class="modal fade" id="detailModalUas<?php echo $row3->kode_soal;?>" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="detailModalTitle">Detail Soal</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card">
                    <table class="table table-sm table-hover">
                      <tr>
                        <th>Kode Matkul</th>
                        <td><p><?php echo $kode ?></p></td>
                      </tr>
                      <tr>
                        <th>Nama Matkul</th>
                        <td><p><?php echo $nama ?></p></td>
                      </tr>
                      <tr>
                        <th>Jenis Ujian</th>
                        <td><p><?php echo $jenissoal ?></p></td>
                      </tr>
                      <tr>
                        <th>UTS / UAS</th>
                        <td><p><?php echo $jenisujian ?></p></td>
                      </tr>
                      <tr>
                        <th>Tanggal Upload</th>                        
                        <td><p><?php echo $tanggal ?></p></td>
                      </tr>
                      <tr>
                        <th>File Soal</th>
                        <td><a href="<?php echo site_url('dosen/download/'.$file); ?>" target="_blank"><i class="fas fa-file"></i> <?php echo $file ?></a></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <?php
          }
          ?>

          <!-- Modal Hapus-->
          <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="hapusModalLabel">Perhatian</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Apakah Anda yakin ingin menghapus data ?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <a href="" class="btn btn-danger">Hapus</a>
                </div>
              </div>
            </div>
          </div>

      </div>
  </section>