<?php 
  $proccess = 0;
  $verified = 0;
  $rejected = 0;
  foreach($data_status as $row) {
      switch($row->status){
        case "Verified":
          $verified++;
          break;
        case "Processing":
          $proccess++;
          break;
        case "Rejected":
          $rejected++;
          break;
      }
  }
?>
<div class="content-header">
	<div class="container-fluid">
        <div class="row mb-2">
        	<div class="col-sm-6">
            	<h4 class="m-0 text-dark">Status Soal</h4>
          	</div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
 
<!-- Main content -->
<section class="content">
    <div class="container-fluid">

       <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-tasks"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Matkul</span>
                <span class="info-box-number">
                <?php echo count($data_status); ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-hourglass-half"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Processing</span>
                <span class="info-box-number">
                  <?php echo $proccess; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon badge-success elevation-1"><i class="fas fa-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Verified</span>
                <span class="info-box-number">
                  <?php echo $verified; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon badge-danger elevation-1"><i class="fas fa-times"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Rejected</span>
                <span class="info-box-number">
                  <?php echo $rejected; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>


    	<!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
              	<div class="card-tools" align="float-sm-right">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <h1 class="card-title "><b>Status Pengumpulan Soal</b></h1>
                <!-- <br>
                <h6 class="card-description text-muted">Dosen : Raisa Andriana</h6> -->
                <!-- <p></p> -->
                <!-- <h6 class="card-subtitle mb-2 text-muted">Dosen : Raisa Andriana</h6> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
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
                          foreach($data_status as $row) {
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
                                  $newDate = date("d-m-Y", strtotime($datedb));
                                  echo $newDate;
                                ?>
                              </td>
                              <td>
                                <div class="box-button">
                                  <a class="btn" data-toggle="modal" data-target="#detailModal"><i class="fa fa-search"></i></a>
                                  <a class="btn" href="<?php echo site_url('dosen/edit_soal') ?>" ><i class="fa fa-edit"></i></a>
                                  <a class="btn" data-toggle="modal" data-target="#hapusModal"><i class="fa fa-trash"></i></a>                                  
                                </div>
                              </td>
                            </tr>
                            <?php                         
                          }       
                      ?>      
                    <!-- <tr>
                      <td>MK001</td>
                      <td>Data Mining</td>
                      <td><a href="">DataMining.pdf</a></td>
                      <td><span class="badge badge-success">Verivied</span></td>
                      <td>22-06-2020</td>
                      <td>
                      	<div class="box-button">
                          <a class="btn" data-toggle="modal" data-target="#detailModal"><i class="fa fa-search"></i></a>
                          <a class="btn" href="<?php echo site_url('dosen/edit_soal') ?>" ><i class="fa fa-edit"></i></a>
                          <a class="btn" data-toggle="modal" data-target="#hapusModal"><i class="fa fa-trash"></i></a>								        
						            </div>
                      </td>
                    </tr>
                    <tr>
                      <td>MK002</td>
                      <td>Datawarehouse</td>
                      <td><a href="">Datawarehouse.pdf</a></td>
                      <td><span class="badge badge-warning">Processing</span></td>
                      <td>22-06-2020</td>
                      <td>
                        <div class="box-button">
                          <a class="btn" data-toggle="modal" data-target="#detailModal"><i class="fa fa-search"></i></a>
                          <a class="btn" href="<?php echo site_url('dosen/edit_soal') ?>" ><i class="fa fa-edit"></i></a>
                          <a class="btn" data-toggle="modal" data-target="#hapusModal" ><i class="fa fa-trash"></i></a>                      
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>WB002</td>
                      <td>Pemrograman Web 1</td>
                      <td><a href="">PemogramanWeb1.pdf</a></td>
                      <td><span class="badge badge-danger">Rejected</span></td>
                      <td>22-06-2020</td>
                      <td>
                        <div class="box-button">
                          <a class="btn" data-toggle="modal" data-target="#detailModal"><i class="fa fa-search"></i></a>
                          <a class="btn" href="<?php echo site_url('dosen/edit_soal') ?>" ><i class="fa fa-edit"></i></a>
                          <a class="btn" data-toggle="modal" data-target="#hapusModal" ><i class="fa fa-trash"></i></a>
                        </div>
                      </td>
                    </tr> -->
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
          </div>

          <!-- Modal Detail-->
          <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
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
                        <td><p>MK002</p></td>
                      </tr>
                      <tr>
                        <th>Nama Matkul</th>
                        <td><p>Data Warehouse</p></td>
                      </tr>
                      <tr>
                        <th>Dosen Pengajar</th>
                        <td><p>Iklima Putri</p></td>
                      </tr>
                      <tr>
                        <th>Jenis Ujian</th>
                        <td><p>Tertulis</p></td>
                      </tr>
                      <tr>
                        <th>UTS / UAS</th>
                        <td><p>UTS</p></td>
                      </tr>
                      <tr>
                        <th>Tanggal Upload</th>
                        <td><p>Senin, 22 Juni 2020, 07.30 AM</p></td>
                      </tr>
                      <tr>
                        <th>File Soal</th>
                        <td><a href=""><i class="fas fa-file"></i> PemogramanWeb1.pdf </a></td>
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



