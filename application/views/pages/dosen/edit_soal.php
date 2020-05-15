<div class="content-header">
	<div class="container-fluid">
        
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

      <div class="card mb-3">
          <div class="card-header">
            <h1 class="card-title "><b>Edit Soal</b></h1>
            <br>
            <h6 class="card-description text-muted">Matkul: Datawarehouse &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kelas: TI 4A</h6>
          </div>
          <div class="card-body">
            <form action="<?php echo site_url('#') ?>" method="post" enctype="multipart/form-data" >
              <div class="form-group">
                <label for="namaMatkul">Nama Matkul</label>
                <input class="form-control" type="text" name="namaMatkul" placeholder="Nama Mata Kuliah" />
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="utsuas">UTS / UAS</label>
                  <select id="utsuas" class="form-control">
                    <option selected>Pilih...</option>
                    <option value="uts">UTS</option>
                    <option value="uas">UAS</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="jenisUjian">Jenis Ujian</label>
                  <select id="jenisUjian" class="form-control">
                    <option selected>Pilih...</option>
                    <option value="tertulis">Tertulis</option>
                    <option value="praktikum">Praktikum</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="kbk">KBK</label>
                  <select id="kbk" class="form-control">
                    <option selected>Pilih KBK...</option>
                    <option value="kbkTI">KBK TI</option>
                    <option value="kbkTMD">KBK TMD</option>
                    <option value="kbkTMJ">KBK TMJ</option>
                    <option value="kbkCB">KBK Character Building</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" rows="5"></textarea>
              </div>

              <div class="form-group">
                <label for="file1">File Soal Ujian</label>
                <input class="form-control-file" type="file" name="file1" />
              </div>

              <div align="right">
                <br>
                <a href="<?php echo site_url('dosen/status_soal') ?>"><input class="btn btn-danger" type="button" name="kemali" value="Kembali"></a>
                &nbsp;&nbsp;
                <input class="btn btn-success" type="submit" name="simpan" value="Update" />
              </div>
            </form>
          </div>
        </div>
    </div>
</section>



