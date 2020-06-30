<div class="content-header">
  <div class="container-fluid">
        <div class="row callout callout bg-light">
          <div class="col-1" align="right">
            <span class="fa-stack fa-lg">
              <i class="fas fa-square fa-stack-2x" style="color: #ffff"></i>
              <i class="fas fa-tachometer-alt fa-stack-1x " style="color: #17a2b8"></i>
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
    <!-- TABLE: LATEST ORDERS UAS-->
           <div class="card">
              <div class="card-header">
                <div class="card-tools" align="float-sm-right">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <h4 class="card-title"><big><b>Daftar Soal UAS</b></big></h4>
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
                        <!-- <span class="info-box-number"><?php echo count($data_status_uts); ?></span> -->
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
                        <!-- <span class="info-box-number"><?php echo $proccess_uts; ?></span> -->
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                </div>

               <div class="table table-striped" >
                  <table id="example1" class="display" style="width:100%">
                    <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Mata Kuliah</th>
                      <th>Dosen</th>
                      <th>Kelas</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>MK001</td>
                      <td>Data Mining</td>
                      <td>Anggi Widayano</td>
                      <td>TI 2A</td>
                      <td>
                        <div class="box-button">
                          <a class="btn"data-toggle="modal" data-target="#detailModal" ><i class="fa fa-eye"></i></a>
                          <a class="btn" data-toggle="modal" data-target="#verifikasiModal"><i class="fa fa-check" style="color: green"></i></a>
                          <a class="btn" data-toggle="modal" data-target="#rejectModal"><i class="fas fa-times"style="color: red"></i></a>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>MK002</td>
                      <td>Datawarehouse</td>
                      <td>Iklima Putri</td>
                      <td>TI 4A</td>
                      <td>
                       <div class="box-button">
                          <a class="btn"data-toggle="modal" data-target="#detailModal" ><i class="fa fa-eye"></i></a>
                          <a class="btn" data-toggle="modal" data-target="#verifikasiModal"><i class="fa fa-check" style="color: green"></i></a>
                          <a class="btn" data-toggle="modal" data-target="#rejectModal"><i class="fas fa-times"style="color: red"></i></a>
                        </div>
                      </td>
                    </tr>
                     <tr>
                      <td>MK003</td>
                      <td>Database 1</td>
                      <td>Elizabet</td>
                      <td>TI 6A</td>
                      <td>
                       <div class="box-button">
                          <a class="btn"data-toggle="modal" data-target="#detailModal" ><i class="fa fa-eye"></i></a>
                          <a class="btn" data-toggle="modal" data-target="#verifikasiModal"><i class="fa fa-check" style="color: green"></i></a>
                          <a class="btn" data-toggle="modal" data-target="#rejectModal"><i class="fas fa-times"style="color: red"></i></a>
                        </div>
                      </td>
                    </tr>
                     <tr>
                      <td>MK004</td>
                      <td>WEB 1</td>
                      <td>Candra Heri</td>
                      <td>TI 2B</td>
                      <td>
                       <div class="box-button">
                          <a class="btn"data-toggle="modal" data-target="#detailModal" ><i class="fa fa-eye"></i></a>
                          <a class="btn" data-toggle="modal" data-target="#verifikasiModal"><i class="fa fa-check" style="color: green"></i></a>
                          <a class="btn" data-toggle="modal" data-target="#rejectModal"><i class="fas fa-times"style="color: red"></i></a>
                        </div>
                      </td>
                    </tr>
                     <tr>
                      <td>MK005</td>
                      <td>Statisika</td>
                      <td>Euis Salsabilla</td>
                      <td>TI 6B</td>
                      <td>
                       <div class="box-button">
                          <a class="btn"data-toggle="modal" data-target="#detailModal" ><i class="fa fa-eye"></i></a>
                          <a class="btn" data-toggle="modal" data-target="#verifikasiModal"><i class="fa fa-check" style="color: green"></i></a>
                          <a class="btn" data-toggle="modal" data-target="#rejectModal"><i class="fas fa-times"style="color: red"></i></a>
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
                        <td><p>MK001</p></td>
                      </tr>
                      <tr>
                        <th>Nama Matkul</th>
                        <td><p>Data Mining</p></td>
                      </tr>
                      <tr>
                        <th>Dosen Pengajar</th>
                        <td><p>Anggi Widayano</p></td>
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
                        <td><a href=""><i class="fas fa-file"></i> Data Mining.pdf </a></td>
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

          <!-- Modal Verifikasi-->
          <div class="modal fade" id="verifikasiModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Verifikasi Soal</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>      
                </div>
                <div class="modal-body">
                  <p>Apakah anda yakin untuk memverifikasi soal?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-success">Yes</button>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

          <!-- Modal Reject-->
          <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="rejectModal">Menolak Soal</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="message-text" class="control-label">Message:</label>
                      <textarea class="form-control" id="message-text"></textarea>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-danger">Send message</button>
                </div>
              </div>
            </div>
          </div>
</section>

<div class="content-header">
  <div class="container-fluid">
        
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

 <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>