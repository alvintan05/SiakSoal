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
      <!-- Option tahun dan semester -->
      <form action="<?php echo base_url(). 'dosen/dashboard' ?>" method="post">
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
              echo "Data Mata Kuliah Tahun Akademik ".$tahun." Semester ".$semester. " Tidak Ditemukan";
              echo "</br>";
              echo "Harap Coba Lagi!";
              ?>                           
          </div>
        </div>          
      </div>

      <!-- Info boxes -->
        <div class="row" <?php if($isFilterResultNull) echo 'hidden'; ?>>
          <div class="col-12 col-sm-6 col-md-3">            
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Mata Kuliah</span>

                <span class="info-box-number">
                  <?php echo count($data_jadwal) ?>
                </span>
                
              </div>              
            </div>            
          </div>  

           <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3 bg-green">            
              <div class="info-box-content">
                <span class="info-box-text">Jadwal Pengumpulan Soal UTS</span>
                <span class="info-box-number">
                  <?php 
                    if(empty($data_batas[0]->batas_awal) && empty($data_batas[0]->batas_akhir)){
                      echo '-';
                    } else {
                      $batas_awal = date("d F Y", strtotime($data_batas[0]->batas_awal));
                      $batas_akhir = date("d F Y", strtotime($data_batas[0]->batas_akhir));
                      echo $batas_awal . ' - ' . $batas_akhir;
                    }
                  ?>
                </span>                
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
        </div>


    	<!-- TABLE: LATEST ORDERS -->
            <div class="card" <?php if($isFilterResultNull) echo 'hidden'; ?>>
              <div class="card-header">
              	<div class="card-tools" align="float-sm-right">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>

                <h5 class="card-title">
                  <big>
                    <b>
                      <?php 
                        if($tahun != null && $semester != null){
                          echo "Jadwal Mata Kuliah Tahun Akademik ".$tahun." Semester ".$semester;
                        } else {
                          echo "Jadwal Semua Mata Kuliah";
                        }
                       ?>
                    </b>
                  </big>
                </h5>

              </div>              
              <div class="card-body p-2">
                <div class="table table-striped" >
                  <table id="example1" class="display" style="width:100%">
                    <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Mata Kuliah</th>
                      <th>Kelas</th>
                      <th>Ruang</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="show_jadwal">
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
								                <a href='<?php echo site_url('dosen/upload_soal/'.$row->kodejdwl); ?>'
                                <?php if($data_batas[0]->batas_awal <= date('Y-m-d') && $data_batas[0]->batas_akhir >= date('Y-m-d')
                                         || $data_batas[1]->batas_awal <= date('Y-m-d') && $data_batas[1]->batas_akhir >= date('Y-m-d')){
                                    echo 'class="btn btn-info btn-sm"';
                                  }
                                  else {
                                    echo 'class="btn btn-info btn-sm disabled"';
                                  }
                                ?>
                                >Upload</a>
						                  </div>
                            </td>
                          </tr>
                          <?php                         
                        }       
                      ?>                                                              
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
          </div>
      </div>
  </section>

  <div class="content-header">
  <div class="container-fluid">
        
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<script>
  $(document).ready(function() {       
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