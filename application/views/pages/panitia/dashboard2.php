<div class="content-header"> 
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
            <small class="content text-gray">Halaman ini menampilkan daftar soal UAS yang telah  diterima / divalidasi KBK. </small>
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
    <form action="<?php echo base_url(). 'panitia/dashboard2' ?>" method="post">
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
          <select id="listProdi" name="listProdi" class="form-control">
            <option value="default" selected>Pilih Program Studi</option>
            <option value="TI">TI</option>
            <option value="TMD">TMD</option>
            <option value="TMJ">TMJ</option>
            <option value="TKJ">TKJ</option>
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
          Parameter untuk melakukan filter tidak lengkap! 
          <br>
          Harap Lengkapi!
        </div>         
      </div>                
    </div> 

    <!-- Error Parameter boxes -->
    <div class="row" <?php if(!$isFilterResultNull) echo 'hidden'; ?>>
      <div class="col-12 col-sm-12 col-md-12">
        <div class="alert alert-danger alert-dismissible"> 
          <?php  
            echo "Data Soal UAS Tahun Akademik ".$tahun." Semester ".$semester. "  Prodi ".$prodi." Tidak Ditemukan";
            echo "</br>";
            echo "Harap Coba Lagi!";
            ?>                           
        </div>
      </div>          
    </div>    
    <!-- TABLE: LATEST ORDERS -->          
    <div class="card" <?php if($isFilterResultNull) echo 'hidden'; ?>>
      <div class="card-header border-bottom">
        <div class="card-tools" align="float-sm-right">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
        <h1 class="card-title ">
          <b>              
            <?php 
              if($tahun != null && $semester != null && $prodi != null){
                echo "Daftar Soal UAS Tahun Akademik ".$tahun." Semester ".$semester." Program Studi ".$prodi;
              } else {
                echo "Daftar Semua Soal UAS";
              }
            ?>
          </b>
        </h1>
        <br>          
      <div>
      </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-2">
        <div class="table table-striped">
          <table id="example1" class="display" style="width:100%">
            <thead>
            <tr>
              <th>Kode</th>
              <th>Mata Kuliah</th>
              <th>Dosen</th>
              <th>Kelas</th>
              <th>Tanggal Divalidasi</th>               
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              <?php  
                foreach($data_soal as $row) {
                  ?>
                  <tr>
                    <td><?php echo $row->matakuliah_kodemk;?></td>
                    <td><?php echo $row->namamk;?></td>
                    <td><?php echo $row->pengajar;?></td>
                    <td><?php echo $row->namaklas;?></td>   
                    <td>
                      <?php 
                        $datedb =  $row->update_at;
                        $newDate = date("d F Y", strtotime($datedb));
                        echo $newDate;
                      ?>
                    </td>                    
                    <td>
                      <div class="box-button">
                        <!-- Detail icon -->
                        <a class="btn" data-toggle="modal" data-target="#detailModalUts<?php echo $row->kode_soal;?>"> <i class="fa fa-eye"></i></a>
                        <!-- Edit Icon -->
                        <a class="btn" href="<?php echo base_url(). 'index.php/download/'. $row->file;?>" target="_blank">
                          <i class="fa fa-download"></i>
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
        <!-- /.table-responsive -->
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <script>
  $(document).ready(function() {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [[ 4, "desc" ]],
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true  
    });    
  });  
</script>