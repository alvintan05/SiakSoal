<div class="content-header">
  <div class="container-fluid">
        <div class="row callout callout bg-light">          
          <div class="col-10">
            <div class="text-secondary"><span class="fa-stack fa-lg">
              <i class="fas fa-square fa-stack-2x" style="color: #ffff"></i>
              <i class="fa fa-search fa-stack-1x " style="color: #17a2b8"></i>
            </span><b>Hasil Pencarian</b></div>
            <!-- <small class="content text-gray"></small> -->
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
                <h4 class="card-title"><big><b>Daftar Soal</b></big></h4>
              </div>
              <div class="card-body p-2">
            <div class="table table-striped" >
            <?php
              if(isset($data_soal)){
            ?>
                <table id="example1" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Mata Kuliah</th>
                            <th>Jenis</th>
                            <th>Semester</th>
                            <th>Dosen</th>
                            <th>Tahun</th>
                            <th>Prodi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($data_soal as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->matakuliah_kodemk; ?></td>
                            <td><?php echo $row->namamk;?></td>
                            <td><?php echo $row->jenis_ujian; ?></td>
                            <td><?php echo $row->semester; ?></td>
                            <td><?php echo $row->dosen_pembuat; ?></td>
                            <td><?php echo $row->tahun_akad; ?></td>
                            <td><?php echo $row->namaprod; ?></td>
                            <td>
                            <div class="box-button">
                              <!-- Detail icon -->
                              <a class="btn" data-toggle="modal" data-target="#detailModalSoal<?php echo $row->kode_soal;?>"> <i class="fa fa-eye"></i></a>
                              <!-- Edit Icon -->
                              <a class="btn" href="<?php echo base_url(). 'index.php/download/'. $row->file;?>" target="_blank">
                                <i class="fa fa-download"></i>
                              </a>
                            </div>
                            </td>
                        </tr>
                    <?php
                      } //foreach
                    ?>
                    </tbody>
                </table>
                <?php
                } elseif (isset($kosong)) {
                ?>
                <p>
                <span style="font-weight:bold; color:blue; font-size:16px;">
                <?php
                        echo $kosong;
                      } else {
                ?>
                <span style="font-weight:bold; font-size:16px;">
                <?php
                        echo "Tidak ada riwayat pencarian";
                      }
                ?>
                </span>
                </p>
            </div>
        </div>
    </div>

    <?php
    if(isset($data_soal)){
    foreach($data_soal as $row) {
    ?>

    <!-- Modal Detail UTS -->
    <div class="modal fade" id="detailModalSoal<?php echo $row->kode_soal;?>" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle" aria-hidden="true">
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
                  <td><p><?php echo $row->matakuliah_kodemk ?></p></td>
                </tr>
                <tr>
                  <th>Tahun Akademik</th>
                  <td><p><?php echo $row->tahun_akad ?></p></td>
                </tr>
                <tr>
                  <th>semester</th>
                  <td><p><?php echo $row->semester ?></p></td>
                </tr>
                <tr>
                  <th>Nama Mata Kuliah</th>
                  <td><p><?php echo $row->namamk ?></p></td>
                </tr>
                <tr>
                  <th>Dosen Pengajar</th>
                  <td><p><?php echo $row->dosen_pembuat ?></p></td>
                </tr>
                <tr>
                  <th>Program Studi</th>
                  <td><p><?php echo $row->namaprod ?></p></td>
                </tr>
                <tr>
                  <th>Kelas</th>
                  <td><p><?php echo $row->namaklas ?></p></td>
                </tr>                      
                <tr>
                  <th>KBK</th>
                  <td><p><?php echo $row->bagian ?></p></td>
                </tr>        
                <tr>
                  <th>Jenis Ujian</th>
                  <td><p><?php echo $row->jenis_soal ?></p></td>
                </tr>
                <tr>
                  <th>UTS / UAS</th>
                  <td><p><?php echo $row->jenis_ujian ?></p></td>
                </tr>                               
                <tr>
                  <th>File Soal</th>
                  <td><i class="fas fa-file"></i> <?php echo $row->file ?></td>
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