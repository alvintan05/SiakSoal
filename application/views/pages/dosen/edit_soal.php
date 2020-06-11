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
            <div class="card-tools" align="float-sm-right">
              <a href="<?php echo site_url('dosen/status_soal') ?>"><input class="btn btn-sm btn-warning" type="button" name="kembali" value="Kembali"></a>
            </div>

            <h1 class="card-title "><big><b>Edit Soal</b></big></h1>
            <!-- <div class="card-description text-muted subjudul">Datawarehouse &nbsp; TI 4A</div> -->
          </div>
          <div class="card-body">
          <form action="<?php echo base_url(). 'dosen/edit_upload' ?>" method="post" enctype="multipart/form-data" >
              <input type="hidden" value="<?php echo $data_matkul[0]->kode_soal;?>" name="id">
              <input type="hidden" value="<?php echo $data_matkul[0]->file;?>" name="oldFileName">
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
                    <option selected>Pilih...</option>
                    <option value="UTS" <?php echo set_select('utsuas', 'UTS', (!empty($jenis_ujian) && $jenis_ujian == "UTS" ? TRUE: FALSE)); ?>>UTS</option>
                    <option value="UAS" <?php echo set_select('utsuas', 'UAS', (!empty($jenis_ujian) && $jenis_ujian == "UAS" ? TRUE: FALSE)); ?>>UAS</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="jenisUjian">Jenis Ujian</label>
                  <select id="jenisUjian" class="form-control" name="jenisUjian">
                    <option selected>Pilih...</option>
                    <option value="Tertulis" <?php echo set_select('jenisUjian', 'Tertulis', (!empty($jenis_soal) && $jenis_soal == "Tertulis" ? TRUE: FALSE)); ?>>Tertulis</option>
                    <option value="Praktikum" <?php echo set_select('jenisUjian', 'Praktikum', (!empty($jenis_soal) && $jenis_soal == "Praktikum" ? TRUE: FALSE)); ?>>Praktikum</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="kbk">KBK</label>
                  <select id="kbk" class="form-control" name="kbk" disabled>
                    <option selected>Pilih KBK...</option>
                    <option value="kbkTI" <?php echo set_select('kbk', 'kbkTI', (!empty($kbk) && $kbk == "Kbk TI" ? TRUE: FALSE)); ?>>KBK TI</option>
                    <option value="kbkTMD" <?php echo set_select('kbk', 'kbkTMD', (!empty($kbk) && $kbk == "Kbk TMD" ? TRUE: FALSE)); ?>>KBK TMD</option>
                    <option value="kbkTMJ" <?php echo set_select('kbk', 'kbkTMJ', (!empty($kbk) && $kbk == "Kbk TMJ" ? TRUE: FALSE)); ?>>KBK TMJ</option>
                    <option value="kbkCB" <?php echo set_select('kbk', 'kbkCB', (!empty($kbk) && $kbk == "Kbk CBD" ? TRUE: FALSE)); ?>>KBK Character Building</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="file1">File Soal Ujian</label>
                <input class="form-control-file" type="file" name="file1" />
              </div>

              <div align="right">
                <br>
                <a href="<?php echo site_url('dosen/status_soal') ?>"><input class="btn btn-danger" type="button" name="kembali" value="Kembali"></a>
                &nbsp;&nbsp;
                <input class="btn btn-success" type="submit" name="update" value="Update" />
              </div>
            </form>
          </div>
        </div>
    </div>
</section>



