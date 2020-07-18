<div class="content-header">
	<div class="container-fluid">
        
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="card ">
          <div class="card-header">
            <h1 class="card-title "><b>Upload Format Soal UAS</b></h1>
            <br>
          </div>
          <form action="<?php echo base_url(). 'panitia/upload_uas' ?>" method="post" enctype="multipart/form-data" >
            <div class="card-body">
                <div class="form-group">
                    <label for="oldFile">Format Saat ini</label>
                    <input class="form-control" type="text" name="oldFileName" value="<?php if(empty($data_uas[0]->file)) echo '-'; else echo $data_uas[0]->file;?>" readonly>
                </div>
                <div>
                    <label for="">Terakhir Dirubah</label>
                    <br>
                    <p><?php if(empty($data_uas[0]->upload_time)) echo '-'; else echo date("d F Y", strtotime($data_uas[0]->upload_time));?></p>
                </div>
                <div class="form-group">
                    <label for="file1">Format Soal UAS (.doc .docx .pdf) Max. 2 MB</label>
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
                <input class="btn btn-success" type="submit" name="simpan" value="Upload" />
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



