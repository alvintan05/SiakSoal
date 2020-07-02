<?php   
  $proccess_uas = 0;
  $verified_uas = 0;
  $rejected_uas = 0;
  
  if(isset($data_status_uas)){
    foreach($data_status_uas as $row) {
      switch($row->status){
        case "Diterima":
          $verified_uas++;
          break;
        case "Proses":
          $proccess_uas++;
          break;
        case "Ditolak":
          $rejected_uas++;
          break;
      }
    }
  }
?>
<div class="content-header">
	<div class="container-fluid">
        <div class="row callout callout bg-light">
          <div class="col-1" align="right">
            <span class="fa-stack fa-lg">
              <i class="fas fa-square fa-stack-2x" style="color: #ffff"></i>
              <i class="fas fa-book fa-stack-1x " style="color: #17a2b8"></i>
            </span>
          </div>
          <div class="col-8">
            <div class="text-secondary"><b>Status Soal UAS</b></div>
            <small class="content text-gray">Halaman ini menampilkan status soal UAS yang telah di upload oleh dosen. </small>
          </div>
          <div class="col-3">
            <?php $this->load->view('layouts/breadcrumb')?>
          </div>          
        </div><!-- /.row -->
        
        <!-- Option tahun dan semester -->
        <form action="<?php echo base_url(). 'dosen/status_soal_uas' ?>" method="post">
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
                echo "Data Status Soal Tahun Akademik ".$tahun." Semester ".$semester. " Tidak Ditemukan";
                echo "</br>";
                echo "Harap Coba Lagi!";
                ?>                           
            </div>
          </div>          
        </div>

        <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3 bg-green">            
              <div class="info-box-content">
                <span class="info-box-text">Jadwal Pengumpulan Soal UAS</span>
                <span class="info-box-number">
                  <?php 
                    if(empty($data_batas[1]->batas_awal) && empty($data_batas[1]->batas_akhir)){
                      echo '-';
                    } else {
                      $batas_awal = date("d F Y", strtotime($data_batas[1]->batas_awal));
                      $batas_akhir = date("d F Y", strtotime($data_batas[1]->batas_akhir));
                      echo $batas_awal . ' - ' . $batas_akhir;
                    }
                  ?>
                </span>                
              </div>              
            </div>            
          </div> 
        
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
 
<!-- Main content -->
<section class="content">
    <div class="container-fluid">       

        <!-- UAS -->            
            <div class="card" <?php if($isFilterResultNull) echo 'hidden'; ?>>
              <div class="card-header border-transparent">
                <div class="card-tools" align="float-sm-right">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
                <h1 class="card-title ">
                  <b>
                    <?php 
                      if(empty($tahun) && empty($semester)){
                        echo "Status Pengumpulan Semua Soal UAS";
                      } else {                        
                        echo "Status Pengumpulan Soal UAS Tahun Akademik ".$tahun." Semester ".$semester;
                      }
                    ?>
                  </b>
                </h1>
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
                        <span class="info-box-text">Proses</span>
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
                        <span class="info-box-text">Diterima</span>
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
                        <span class="info-box-text">Ditolak</span>
                        <span class="info-box-number"><?php echo $rejected_uas; ?></span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                </div>

                <!-- TABLE : UAS -->
                <div class="table table-striped">
                  <table id="example2" class="display" style="width:100%">
                    <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Mata Kuliah</th>
                      <th>File</th>
                      <th>Status</th>
                      <th>Tanggal Upload</th>
                      <th>Aksi</th>
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
                                <?php 
                                  $datedb =  $row->update_at;
                                  $newDate = date("d F Y", strtotime($datedb));
                                  echo $newDate;
                                ?>
                              </td>
                              <td>
                                <div class="box-button">
                                  <a class="btn" data-toggle="modal" data-target="#detailModalUas<?php echo $row->kode_soal;?>"><i class="fa fa-eye"></i></a>
                                  <a <?php if($data_batas[1]->batas_awal <= date('Y-m-d') && $data_batas[1]->batas_akhir >= date('Y-m-d')){
                                    echo 'class="btn"';
                                  }
                                  else {
                                    echo 'class="btn disabled"';
                                  }
                                  ?>
                                  href="<?php echo site_url('dosen/edit_soal/'.$row->kode_soal); ?>" <?php if($row->status == "Diterima" || $row->status == "Ditolak") echo 'hidden';?>>
                                    <i class="fa fa-edit"></i>
                                  </a>                                  
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
            if(isset($data_status_uas)){
              foreach($data_status_uas as $row3) 
              {
                $kode = $row3->matakuliah_kodemk;
                $nama = $row3->namamk;
                $kelas = $row3->namaklas;
                $jenisujian = "UAS";
                $jenissoal = $row3->jenis_soal;
                $kbk = $row3->bagian;              
                $note = $row3->note;
                $create_date =  $row3->create_at;
                $tanggalUpload = date("d F Y", strtotime($create_date));
                $edit_date =  $row3->update_at;
                $tanggalUpdate = date("d F Y", strtotime($edit_date));
                $file = $row3->file;            
          ?>
           <!-- Modal Detail UAS -->
          <div class="modal fade" id="detailModalUas<?php echo $row3->kode_soal;?>" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
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
                        <td><p><?php echo $nama ?></p></td>
                      </tr>
                      <tr>
                        <th>Kelas</th>
                        <td><p><?php echo $kelas ?></p></td>
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
                        <th>KBK</th>
                        <td><p><?php echo $kbk ?></p></td>
                      </tr>
                      <tr>
                        <th>Catatan dari KBK</th>
                        <td><p><?php echo $note ?></p></td>
                      </tr>
                      <tr>
                        <th>Tanggal Upload</th>                        
                        <td><p><?php echo $tanggalUpload ?></p></td>
                      </tr>
                      <tr>
                        <th>Tanggal Update</th>                        
                        <td><p><?php echo $tanggalUpdate ?></p></td>
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
          <?php
            }
          }
          ?>      
      </div>
  </section>

  <div class="content-header">
  <div class="container-fluid">
        
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $("#example2").DataTable({
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