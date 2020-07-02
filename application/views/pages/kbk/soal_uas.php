<div class="content-header">
  <div class="container-fluid">
        <div class="row callout callout bg-light">
          <div class="col-1" align="right">
            <span class="fa-stack fa-lg">
              <i class="fas fa-square fa-stack-2x" style="color: #ffff"></i>
              <i class="fas fa-book fa-stack-1x " style="color: #17a2b8"></i>
            </span>
          </div>
          <div class="col-9">
            <div class="text-secondary"><b>Soal UAS</b></div>
            <small class="content text-gray">Halaman ini menampilkan daftar soal UAS yang telah di upload dosen. </small>
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

    <!-- Option tahun dan semester -->
    <form action="<?php echo base_url(). 'kbk/soal_uas' ?>" method="post">
        <div class="row">        
          <div class="col-12 col-sm-6 col-md-3">
            <select id="listTahun" name="listTahun" class="form-control">
              <option value="default" selected>Pilih Tahun Akademik</option>
              <?php 
                foreach($tahun_list as $row){ 
                  ?>        
                  <option value="<?php echo $row->tahun_akad ?>"><?php echo $row->tahun_akad ?></option>
                <?php 
                }
              ?>            
            </select>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <select id="listSemester" name="listSemester" class="form-control">
              <option value="default" selected>Pilih Semester</option>
              <option value="ganjil">Ganjil</option>
              <option value="genap">Genap</option>
            </select>
          </div>
          <div class="col-12 col-sm-6 col-md-3">            
            <input class="btn btn-primary" type="submit" name="filter" value="Filter" />            
          </div>        
        </div>
      </form> 

      <br>

      <div class="row" <?php if(!$notif) echo 'hidden'; ?>>
        <div class="col-12 col-sm-6 col-md-6">           
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <!-- <h4><i class="icon fa fa-ban"></i> Alert!</h4> -->
            Parameter untuk melakukan filter tidak lengkap! 
            <br>
            Harap Lengkapi!
          </div>         
        </div>                
      </div>

      <!-- Error Parameter boxes -->
      <div class="row" <?php if(!$isFilterResultNull) echo 'hidden'; ?>>
        <div class="col-12 col-sm-7 col-md-7">
          <div class="alert alert-danger alert-dismissible"> 
            <?php  
              echo "Data Soal UAS Tahun Akademik ".$tahun." Semester ".$semester. " Tidak Ditemukan";
              echo "</br>";
              echo "Harap Coba Lagi!";
              ?>                           
          </div>
        </div>          
      </div>

           <div class="card" <?php if($isFilterResultNull) echo 'hidden'; ?>>
              <div class="card-header">
                <div class="card-tools" align="float-sm-right">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <h4 class="card-title">
                  <big>
                    <b>                      
                      <?php 
                        if($tahun != null && $semester != null){
                          echo "Daftar Soal UAS Tahun Akademik ".$tahun." Semester ".$semester;
                        } else {
                          echo "Daftar Semua Soal UAS";
                        }
                      ?>
                    </b>
                  </big>
                </h4>
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
                        <span class="info-box-text">Total Upload</span>
                        <span class="info-box-number"><?php echo count($daftar_soal_uas); ?></span>
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
                        <span class="info-box-text">Proses</span>
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
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <?php  
                      foreach($daftar_soal_uas as $row) {
                        ?>
                        <tr>
                        <td><?php echo $row->matakuliah_kodemk;?></td>
                        <td><?php echo $row->namamk;?></td>
                        <td><?php echo $row->nama;?></td>
                        <td><?php echo $row->namaklas;?></td>
                        <td>
                          <span class="badge 
                            <?php  
                              switch($row->status){
                                case "Diterima":
                                  echo 'badge-success';
                                  break;
                                case "Proses":
                                  echo 'badge-warning';
                                  break;
                                case "Ditolak":
                                  echo 'badge-danger';
                                  break;
                              }
                            ?>
                            ">                                  
                            <?php echo $row->status ?>
                          </span>
                        </td>
                        <td>
                            <div class="box-button">                        
                                <a class="btn"data-toggle="modal" data-target="#detailModalUas<?php echo $row->kode_soal;?>" ><i class="fa fa-eye"></i></a>
                                <a class="btn" data-toggle="modal" data-target="#verifikasiModalUas<?php echo $row->kode_soal;?>"<?php if($row->status == 'Diterima' || $row->status == 'Ditolak') echo 'hidden' ?>><i class="fa fa-check" style="color: green"></i></a>
                                <a class="btn" data-toggle="modal" data-target="#rejectModalUas<?php echo $row->kode_soal;?>"<?php if($row->status == 'Diterima' || $row->status == 'Ditolak') echo 'hidden' ?>><i class="fas fa-times"style="color: red"></i></a>
                            </div>            
                        </td>
                        </tr>
                        <?php                         
                      }       
                    ?>


                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
          </div>
 
          <?php
            if(isset($daftar_soal_uas)){
              foreach($daftar_soal_uas as $row) 
              {
                $kode = $row->matakuliah_kodemk;
                $kode_soal = $row->kode_soal;
                $nama = $row->namamk;
                $dosen = $row->nama;
                $kelas = $row->namaklas;
                $jenisujian = "UAS";
                $note = $row->note;
                $jenis_soal = $row->jenis_soal;
                $create_date =  $row->create_at;
                $tanggalUpload = date("d F Y", strtotime($create_date));
                $file = $row->file;            
          ?>

           <!-- Modal Detail-->
          <div class="modal fade" id="detailModalUas<?php echo $row->kode_soal;?>" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
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
                        <td><p><?php echo $kode ?></p></td>
                      </tr>
                      <tr>
                        <th>Nama Mata Kuliah</th>
                        <td><p><?php echo $nama;?></p></td>
                      </tr>
                      <tr>
                        <th>Dosen Pengajar</th>
                        <td><p><?php echo $dosen;?></p></td>
                      </tr>
                      <tr>
                        <th>Kelas</th>
                        <td><p><?php echo $kelas ?></p></td>
                      </tr>
                      <tr>
                        <th>Jenis Ujian</th>
                        <td><p><?php echo $jenis_soal ?></p></td>
                      </tr>
                      <tr>
                        <th>UTS / UAS</th>
                        <td><p><?php echo $jenisujian ?></p></td>
                      </tr>
                      <tr <?php if($row->status != 'Ditolak') echo 'hidden' ?>>
                        <th>Note dari KBK</th>
                        <td><p><?php echo $note ?></p></td>
                      </tr>
                      <tr>
                        <th>Tanggal Upload</th>
                        <td><p><?php echo $tanggalUpload ?></p></td>
                      </tr>
                      <tr>
                        <th>File Soal</th>
                        <td><a href="<?php echo base_url(). 'index.php/download/'. $file;?>" target="_blank"><i class="fas fa-file"></i> <?php echo $file ?></a></td>
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
          <div class="modal fade" id="verifikasiModalUas<?php echo $row->kode_soal;?>" tabindex="-1" role="dialog">
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
                  <form action="<?php echo base_url(). 'kbk/verifikasi_soal_uas' ?>" method="post">
                    <input type="hidden" name="kode_soal" value="<?=$kode_soal;?>">
                    <input type="hidden" name="status" value="Diterima">
                  </form>                  
                  <form action="<?php echo base_url(). 'Kbk/verifikasi_soal_uas' ?>" method="post">
                    <input type="hidden" value="<?= $kode_soal;?>" name="kode_soal">
                    <input type="hidden" value="Diterima" name="status">
                    <input type="hidden" value="" name="catatan">
                    <button class="btn btn-success" type="submit" name="Diterima">Yes</button>
                  </form>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

          

          <!-- Modal Reject-->
          <div class="modal fade" id="rejectModalUas<?php echo $row->kode_soal;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="rejectModalUas">Menolak Soal</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <form id="formDitolak" action="<?php echo base_url(). 'Kbk/verifikasi_soal_uas' ?>" method="post">
                    <div class="form-group">
                      <label for="message-text" class="control-label">Message:</label>
                      <textarea class="form-control" id="message-text" name="catatan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="hidden" value="<?= $kode_soal;?>" name="kode_soal">
                    <input type="hidden" value="Ditolak" name="status">
                  <button class="btn btn-danger" type="submit" name="Ditolak">Tolak Soal</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <?php
           }
          }
          ?>
</section>

<div class="content-header">
  <div class="container-fluid">
        
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [[ 1, "asc" ]],
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true 
    });
  });
</script>