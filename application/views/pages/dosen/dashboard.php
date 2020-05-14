<div class="content-header">
	<div class="container-fluid">
        <div class="row mb-2">
        	<div class="col-sm-6">
            	<h1 class="m-0 text-dark">Dashboard</h1>
          	</div><!-- /.col --> 
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
                  5
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
                <h1 class="card-title "><b>Jadwal Dosen</b></h1>
                <p><br></p>
                <h6 class="card-description text-muted">Dosen : Raisa Andriana</h6>
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
                      <th>Kelas</th>
                      <th>Ruang</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
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
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
          </div>
      </div>
  </section>



