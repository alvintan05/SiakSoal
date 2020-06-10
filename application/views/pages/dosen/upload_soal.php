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
              <a href="<?php echo site_url('dosen/dashboard') ?>"><input class="btn btn-sm btn-warning" type="button" name="kembali" value="Kembali"></a>
            </div>
            
            <h1 class="card-title"><big><b>Upload Soal</b></big></h1>
            <!-- <div class="card-description text-muted subjudul">Datawarehouse &nbsp; TI 4A</div> -->
          </div>
          <div class="card-body">                        
            <form action="<?php echo base_url(). 'dosen/post_upload' ?>" method="post" enctype="multipart/form-data" >
           <!--  <h6 class="card-description text-muted">Mata Kuliah: <?php echo $data_matkul[0]->namamk;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kelas: <?php echo $data_matkul[0]->namaklas;?></h6> -->
              <div class="form-group">
              <?php echo $this->session->flashdata('upload')?> 
                <label for="matkul">Mata Kuliah</label>                
                <input class="form-control" type="text" name="matkul" value="<?php echo $data_matkul[0]->namamk;?>" disabled/>
              </div>
               <div class="form-group">
                <label for="kelas">Kelas</label>
                <input class="form-control" type="text" name="kelas" value="<?php echo $data_matkul[0]->namaklas;?>" disabled/>
              </div>
              <div class="form-row">
                <input type="hidden" value="<?php echo $data_matkul[0]->kodejdwl;?>" name="id">
                <div class="form-group col-md-4">
                  <label for="utsuas">UTS / UAS</label>                  
                  <select id="utsuas" name="utsuas" class="form-control">
                    <option value="none" selected>Pilih...</option>
                    <option value="UTS">UTS</option>
                    <option value="UAS">UAS</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="jenisUjian">Jenis Ujian</label>                  
                  <select id="jenisUjian" name="jenisUjian" class="form-control">
                    <option value="none" selected>Pilih...</option>
                    <option value="Tertulis">Tertulis</option>
                    <option value="Praktikum">Praktikum</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="kbk">KBK</label>                  
                  <select id="kbk" name="kbk" class="form-control">
                    <option value="none" selected>Pilih KBK...</option>
                    <option value="kbkTI">KBK TI</option>
                    <option value="kbkTMD">KBK TMD</option>
                    <option value="kbkTMJ">KBK TMJ</option>
                    <option value="kbkCB">KBK Character Building</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="file1">File Soal Ujian</label>
                <input class="form-control-file" type="file" name="file1" />                
              </div>                         

              <div align="right">
                <br>
                <a href="<?php echo site_url('dosen/dashboard') ?>"><input class="btn btn-danger" type="button" name="kemali" value="Cancel"></a>
                &nbsp;&nbsp;
                <input class="btn btn-success" type="submit" name="submit" value="Upload" />
              </div>
            </form>            
          </div>
        </div>
    </div>
</section>



