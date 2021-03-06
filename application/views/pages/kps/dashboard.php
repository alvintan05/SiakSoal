<div class="content-header">
  <div class="container-fluid">
        <div class="row callout callout bg-light">
          <div class="col-1" align="right">
            <span class="fa-stack fa-lg">
              <i class="fas fa-square fa-stack-2x" style="color: #ffff"></i>
              <i class="fas fa-tachometer-alt fa-stack-1x " style="color: #17a2b8"></i>
            </span>
          </div>
          <div class="col-9">
            <div class="text-secondary"><b>Dashboard</b></div>
            <small class="content text-gray">Silahkan isi data dibawah untuk melihat bank soal. </small>
          </div>
          <div class="col-2">
            <?php $this->load->view('layouts/breadcrumb')?>
          </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- SELECT2 EXAMPLE -->
<div class="content">
    <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
             <h1 class="card-title"><b>Bank Soal</b></h1>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="<?php echo base_url(). 'Kps/search' ?>" method="get" >
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                     <label>Tahun Ajaran</label>
                          <select name="tahun" class="form-control select2bs4" style="width: 100%;" required>
                            <option selected="selected"></option>
                            <?php 
                              foreach($tahun_list as $row){ 
                                ?>        
                                <option value="<?php echo $row->tahun_akad ?>"><?php echo $row->tahun_akad ?></option>
                              <?php 
                              }
                            ?> 
                          </select>
                    </div>
                    <div class="form-group">
                      <label>Program Studi</label>
                      <select name ="namaprodi"class="form-control select2bs4" style="width: 100%;" required>
                        <option selected="selected"></option>
                        <option  value="TI">Teknik Informatika</option>
                        <option  value="TMD">Teknik Multimedia Digital</option>
                        <option  value="TKJ">Teknik Multimedia Jaringan</option>
                        <option  value="TKJ">Teknik Komputerisasi Jaringan</option>
                      </select>
                    </div>
                  </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label>Semester</label>
                          <select name="semester"class="form-control select2bs4" style="width: 100%;" required>
                            <option selected="selected"></option>
                            <option value="ganjil">Ganjil</option>
                            <option value="genap">Genap</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Jenis Soal</label>
                          <select name="jenissoal"class="form-control select2bs4" style="width: 100%;" required>
                            <option selected="selected"></option>
                            <option value="UTS">UTS</option>
                            <option value="UAS">UAS</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"> 
                            <button class="btn btn-primary" type="submit">Cari</button> 
                         </div>
                    </div>
                </div>
            </form>
        </div>
    </div>        
</div>
<!-- /.content-header -->