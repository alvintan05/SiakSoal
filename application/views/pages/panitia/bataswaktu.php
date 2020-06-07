<div class="content-header">
  <div class="container-fluid">
        <div class="row callout callout bg-light">
          <div class="col-1" align="right">
            <span class="fa-stack fa-lg">
              <i class="fas fa-square fa-stack-2x" style="color: #ffff"></i>
              <i class="fas fa-clock fa-stack-1x " style="color: #17a2b8"></i>
            </span>
          </div>
          <div class="col-9">
            <div class="text-secondary"><b>Dashboard</b></div>
            <small class="content text-gray">Halaman ini menampilkan daftar soal yang telah di upload dosen. </small>
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
    
          <!-- /.col -->
        </div>
    	<!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-bottom">
              	<div class="card-tools" align="float-sm-right">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <h1 class="card-title "><b>Deadline Pengumpulan Soal</b></h1>
                <br>
                <!-- <h6 class="card-description text-muted">Dosen : Raisa Andriana</h6> -->
                <!-- <p></p> -->
                <!-- <h6 class="card-subtitle mb-2 text-muted">Dosen : Raisa Andriana</h6> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table table-striped">
                  <table class="table m-0">
                    <thead class="thead-dark">
                    <tr>
                      <th>Option</th>
                      <th>Batas Awal</th>
                      <th>Batas Akhir</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>Deadline Pengumpulan Soal</td>
                      <td>
                      <input type="date" id="daterangepicker" class="form-control" placeholder="Batas Awal">
                      </td>
                      <td>
                      <input type="date" id="daterangepicker" class="form-control" placeholder="Batas Akhir">
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



