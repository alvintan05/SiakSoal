<div class="content-header">
  <div class="container-fluid">
        <div class="row callout callout bg-light">
          <div class="col-1" align="right">
            <span class="fa-stack fa-lg">
              <i class="fas fa-square fa-stack-2x" style="color: #ffff"></i>
              <i class="fas fa-tv fa-stack-1x " style="color: #17a2b8"></i>
            </span>
          </div>
          <div class="col-9">
            <div class="text-secondary"><b>Monitor</b></div>
            <small class="content text-gray">Halaman ini untuk me-monitoring pengumpulan soal UTS dan UAS.</small>
          </div>
          <div class="col-2">
            <?php $this->load->view('layouts/breadcrumb')?>
          </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">

    </div>
    <!-- TABLE: LATEST ORDERS --> 
    <div class="card collapsed-card">
              <div class="card-header border-bottom">
              	<div class="card-tools" align="float-sm-right">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
                <h1 class="card-title "><b>Monitor Pengumpulan Soal UTS</b></h1>
                <br>                
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table table-striped">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Dosen</th>
                      <th>Mata Kuliah</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>Rahmat Tuan</td>
                      <td>Data Mining</td>
                      <td>-</td>
                      <td>
                      <div class="bpx-button">
                      <a class="btn" data-toggle="modal" data-target="#detailSoal"> <i class="fa fa-eye"></i></a>
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
          <!-- Modal -->
          <div class="modal fade" id="detailSoal" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
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
                  <th>Kode Mata Kuliah</th>
                  <td><p>DM2020</p></td>
                </tr>
                <tr>
                  <th>Nama Mata Kuliah</th>
                  <td>Data Mining</p></td>
                </tr>
                <tr>
                  <th>Dosen Pengajar</th>
                  <td>Rahmat Tuan</p></td>
                </tr>
                <tr>
                  <th>Kelas</th>
                  <td><p>TI6A</p></td>
                </tr>
                <tr>
                  <th>KBK</th>
                  <td>Hendri Sujagat</p></td>
                </tr>
                <tr>
                  <th>Jenis Ujian</th>
                  <td>Tertulis</p></td>
                </tr>
                <tr>
                  <th>UTS / UAS</th>
                  <td><p>UAS</p></td>
                </tr>   
                <tr>
                  <th>Status Soal</th>
                  <td><p><i class="fa fa-check"></i></p></td>
                </tr>             
                <tr>
                  <th>Tanggal Validasi</th>
                  <td><p>12/12/12</p></td>
                </tr>                
                <tr>
                  <th>File Soal</th>
                  <td><i class="fas fa-file"></i></td>
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
</section>