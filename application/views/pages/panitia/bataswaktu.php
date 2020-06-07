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
                <h1 class="card-title "><b>Deadline Pengumpulan Soal UTS</b></h1>
                <br>
                <!-- <h6 class="card-description text-muted">Dosen : Raisa Andriana</h6> -->
                <!-- <p></p> -->
                <!-- <h6 class="card-subtitle mb-2 text-muted">Dosen : Raisa Andriana</h6> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table table-striped">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Deadline</th>
                      <th>Batas Awal</th>
                      <th>Batas Akhir</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>Pengumpulan Soal UTS</td>
                      <td>
                      <input type="date" id="daterangepicker" class="form-control" placeholder="Batas Awal">
                      </td>
                      <td>
                      <input type="date" id="daterangepicker" class="form-control" placeholder="Batas Akhir">
                      </td>
                      <td>
                      <div class="box-button">
								      <a class="btn" data-toggle="modal" data-target="#editModal"><i class="fa fa-pen"></i></a>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
          </div>
          <div class="card">
              <div class="card-header border-bottom">
              	<div class="card-tools" align="float-sm-right">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <h1 class="card-title "><b>Deadline Pengumpulan Soal UAS</b></h1>
                <br>
                <!-- <h6 class="card-description text-muted">Dosen : Raisa Andriana</h6> -->
                <!-- <p></p> -->
                <!-- <h6 class="card-subtitle mb-2 text-muted">Dosen : Raisa Andriana</h6> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table table-striped">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Deadline</th>
                      <th>Batas Awal</th>
                      <th>Batas Akhir</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>Pengumpulan Soal UAS</td>
                      <td>
                      <input type="date" id="daterangepicker" class="form-control" placeholder="Batas Awal">
                      </td>
                      <td>
                      <input type="date" id="daterangepicker" class="form-control" placeholder="Batas Akhir">
                      </td>
                      <td>
                      <div class="box-button">
								      <a class="btn" data-toggle="modal" data-target="#editModal"><i class="fa fa-pen"></i></a>
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
      <!-- Modal Edit-->
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModalTitle">Edit Batas Waktu</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card">
                    <table class="table table-sm table-hover">
                      <tr>
                        <th>Pengumpulan Soal</th>
                        <td><p>UTS</p></td>
                      </tr>
                      <tr>
                        <th>Batas Awal</th>
                        <td><p><input type="date" id="daterangepicker" class="form-control" placeholder="Batas Awal"></p></td>
                      </tr>
                      <tr>
                        <th>Batas Akhir</th>
                        <td><p><input type="date" id="daterangepicker" class="form-control" placeholder="Batas Akhir"></p></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Update</button>
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                </div>
              </div>
            </div>
          </div>
  </section>



