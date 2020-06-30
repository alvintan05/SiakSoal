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
            <h1 class="card-title "><b>Upload Format Soal</b></h1>
            <br>
          </div>
          <form action="<?php echo site_url('#') ?>" method="post" enctype="multipart/form-data" >
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="utsuas">UTS / UAS</label>
                  <select id="utsuas" class="form-control">
                    <option selected>Pilih...</option>
                    <option value="uts">UTS</option>
                    <option value="uas">UAS</option>
                  </select>
                </div>
              </div>   
              <div class="form-group">
                <label for="file1">File Soal Ujian</label>
                <input class="form-control-file" type="file" name="file1" />
              </div>
            </div>
            <div class="card-footer" align="right">
                <a href="<?php echo site_url('kbk/dashboard') ?>"><input class="btn btn-danger" type="button" name="kembali" value="Kembali"></a>
                &nbsp;
                <input class="btn btn-success" type="submit" name="simpan" value="Simpan" />
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



