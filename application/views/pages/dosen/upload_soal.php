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
            
            <h1 class="card-title"><big><b>Upload Soal</b></big></h1>
            <!-- <div class="card-description text-muted subjudul">Datawarehouse &nbsp; TI 4A</div> -->
          </div>
          <form action="<?php echo base_url(). 'dosen/post_upload' ?>" method="post" enctype="multipart/form-data" id="formUploadSoal" >
          <div class="card-body">                          
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
                  <select id="utsuas" name="utsuas" class="form-control" required >
                    <option value="" >Pilih...</option>
                    <option value="UTS">UTS</option>
                    <option value="UAS">UAS</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="jenisUjian">Jenis Ujian</label>                  
                  <select id="jenisUjian" name="jenisUjian" class="form-control" required >
                    <option value="" >Pilih...</option>
                    <option value="Tertulis">Tertulis</option>
                    <option value="Praktikum">Praktikum</option>
                    <option value="Praktikum">Proyek</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="kbk">KBK</label>                  
                  <select id="kbk" name="kbk" class="form-control" required >
                    <option value="">Pilih KBK...</option>
                    <option value="kbkRPL">KBK RPL</option>
                    <option value="kbkMultimedia">KBK Multimedia</option>
                    <option value="kbkCB">KBK Character Building dan K3</option>
                    <option value="kbkJE">KBK Jaringan dan Embedded</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="file1">File Soal Ujian</label>
                <input 
                  class="form-control-file" 
                  type="file" 
                  name="file1" 
                  accept=".pdf,.doc,.docx"
                  required 
                  id="fileInput"
                />                
              </div> 
            </div>
            <div class="card-footer" align="right">
              <a href="<?php echo site_url('dosen/dashboard') ?>"><input class="btn btn-danger" type="button" name="kemali" value="Kembali"></a>
                &nbsp;
              <input class="btn btn-success" type="submit" name="submit" value="Upload" />
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
<script>
  $(document).ready( function (){    
  });
</script>