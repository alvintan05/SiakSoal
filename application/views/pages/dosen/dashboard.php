<div class="content-header">
	<div class="container-fluid ">
    <div class="row callout callout bg-light">
          <div class="col-1" align="right">
            <span class="fa-stack fa-lg">
              <i class="fas fa-square fa-stack-2x" style="color: #ffff"></i>
              <i class="fa fa-tachometer-alt fa-stack-1x " style="color: #17a2b8"></i>
            </span>
          </div>
          <div class="col-9">
            <div class="text-secondary"><b>Dashboard</b></div>
            <small class="content text-gray">Halaman ini digunakan untuk meng-upload soal UTS dan UAS. </small>
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

      <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Matkul</span>

                <span class="info-box-number">
                  <?php echo count($data_jadwal) ?>
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
              <div class="card-header">
              	<div class="card-tools" align="float-sm-right">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>

                <h5 class="card-title"><big><b>Jadwal Dosen</b></big></h5>
                <div class="card-description text-muted subjudul">
                  Dosen : Raisa Andriana &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
              </div>
              <!-- /.card-header -->

              <div class="card-body p-2">
                <div class="card-tools">
                  <div class="input-group input-group-sm float-right" style="width: 200px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
                <br><p></p>
                <div class="table table-striped">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Mata Kuliah</th>
                      <th>Kelas</th>
                      <th>Ruang</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php  
                        foreach($data_jadwal as $row) {
                          ?>
                          <tr>
                            <td><?php echo $row->matakuliah_kodemk;?></td>
                            <td><?php echo $row->namamk;?></td>
                            <td><?php echo $row->namaklas;?></td>
                            <td><?php echo $row->ruangan_namaruang;?></td>
                            <td>
                              <div class="box-button">
								                <a href='<?php echo site_url('dosen/upload_soal/'.$row->kodejdwl); ?>' class="btn btn-info btn-sm">Upload</a>
						                  </div>
                            </td>
                          </tr>
                          <?php                         
                        }       
                      ?>                                         
                    <!-- <tr>
                      <td>MK001</td>
                      <td>Data Mining</td>
                      <td>T1 2A</td>
                      <td>AA 301</td>
                      <td>
                      	<div class="box-button">
								<a href='<?php echo site_url('dosen/upload_soal'); ?>' class="btn btn-info btn-sm">Upload</a>
						</div>
                      </td>
                    </tr>
                    <tr>
                      <td>MK002</td>
                      <td>Datawarehouse</td>
                      <td>T1 4A</td>
                      <td>AA 302</td>
                      <td>
                      	<div class="box-button">
								<a href='<?php echo site_url('dosen/upload_soal'); ?>' class="btn btn-info btn-sm">Upload</a>
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
      </div>
  </section>



