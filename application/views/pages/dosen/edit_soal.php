<?php 
  $jenis_ujian = $data_matkul[0]->jenis_ujian;
  $jenis_soal = $data_matkul[0]->jenis_soal;  
  $kbk = $data_matkul[0]->bagian;
?>
<div class="content-header"> 
	<div class="container-fluid">
        
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
           <!--  <div class="card-tools" align="float-sm-right">
              <a href="<?php echo site_url('dosen/status_soal') ?>"><input class="btn btn-sm btn-warning" type="button" name="kembali" value="Kembali"></a>
            </div> -->

          <h1 class="card-title "><big><b>Edit Soal</b></big></h1>
            <!-- <div class="card-description text-muted subjudul">Datawarehouse &nbsp; TI 4A</div> -->
        </div>
        <form action="<?php echo base_url(). 'dosen/edit_upload' ?>" method="post" enctype="multipart/form-data" >
          <div class="card-body">
            <input type="hidden" value="<?php echo $data_matkul[0]->kode_soal;?>" name="id">            
            <div class="form-group">
              <label for="matkul">Mata Kuliah</label>
              <input class="form-control" type="text" name="matkul" value="<?php echo $data_matkul[0]->namamk;?>" disabled/>
            </div>
            <div class="form-group">
              <label for="kelas">Kelas</label>
              <input class="form-control" type="text" name="kelas" value="<?php echo $data_matkul[0]->namaklas;?>" disabled/>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="utsuas">UTS / UAS</label>
                <select id="utsuas" class="form-control" name="utsuas">                  
                  <option value="UTS" <?php echo set_select('utsuas', 'UTS', (!empty($jenis_ujian) && $jenis_ujian == "UTS" ? TRUE: FALSE)); ?>>UTS</option>
                  <option value="UAS" <?php echo set_select('utsuas', 'UAS', (!empty($jenis_ujian) && $jenis_ujian == "UAS" ? TRUE: FALSE)); ?>>UAS</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="jenisUjian">Jenis Ujian</label>
                <select id="jenisUjian" class="form-control" name="jenisUjian">                  
                  <option value="Tertulis" <?php echo set_select('jenisUjian', 'Tertulis', (!empty($jenis_soal) && $jenis_soal == "Tertulis" ? TRUE: FALSE)); ?>>Tertulis</option>
                  <option value="Praktikum" <?php echo set_select('jenisUjian', 'Praktikum', (!empty($jenis_soal) && $jenis_soal == "Praktikum" ? TRUE: FALSE)); ?>>Praktikum</option>
                  <option value="Proyek" <?php echo set_select('jenisUjian', 'Proyek', (!empty($jenis_soal) && $jenis_soal == "Proyek" ? TRUE: FALSE)); ?>>Proyek</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="kbk">KBK</label>
                <select id="kbk" class="form-control" name="kbk">                  
                  <option value="kbkRPL" <?php echo set_select('kbk', 'kbkRPL', (!empty($kbk) && $kbk == "KBK RPL" ? TRUE: FALSE)); ?>>KBK RPL</option>
                  <option value="kbkMultimedia" <?php echo set_select('kbk', 'kbkMultimedia', (!empty($kbk) && $kbk == "KBK Multimedia" ? TRUE: FALSE)); ?>>KBK Multimedia</option>
                  <option value="kbkCB" <?php echo set_select('kbk', 'kbkCB', (!empty($kbk) && $kbk == "KBK Character Building dan K3" ? TRUE: FALSE)); ?>>KBK Character Building dan K3</option>
                  <option value="kbkJE" <?php echo set_select('kbk', 'kbkJE', (!empty($kbk) && $kbk == "KBK Jaringan dan Embedded" ? TRUE: FALSE)); ?>>KBK Jaringan dan Embedded</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="oldFile">File Soal Ujian</label>
              <input class="form-control" type="text" name="oldFileName" value="<?php echo $data_matkul[0]->file;?>" readonly>              
            </div>
            <div class="form-group">
              <label for="file1">Ganti File Soal Ujian (.doc .docx .pdf)</label>
              <input class="form-control-file" type="file" name="file1" accept=".pdf,.doc,.docx"/>
            </div>
          </div>
          <div class="card-footer" align="right">
            <a href="<?php echo site_url('dosen/status_soal') ?>"><input class="btn btn-danger" type="button" name="kembali" value="Kembali"></a>
                &nbsp;
            <input class="btn btn-success" type="submit" name="update" value="Update" />
          </div>
        </form>
      </div>
    </div>
</section>

<div class="content-header">
  <div class="container-fluid">
        
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->



