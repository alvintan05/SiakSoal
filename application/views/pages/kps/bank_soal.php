<div class="content-header">
    <div class="container-fluid">

    </div>
</div>
<!-- content header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="content-header border-bottom">
            <h1 class="card-title"><b>Bank Soal</b></h1>

            </div>
            <div class="card-body">
                <form action="<?php echo base_url(). 'Kps/search' ?>" method="get" >
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Tahun Ajaran</label><br>
                            <select name="tahun" id="">
                            <option selected>Pilih...</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Semester</label><br>
                            <select name="semester" id="">
                            <option value="ganjil">Ganjil</option>
                            <option value="genap">Genap</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Program Studi</label>
                            <select name="namaprodi" id="">
                            <option disabled selected>Pilih...</option>
                            <option value="TI">Teknik Informatika</option>
                            <option value="TMD">Teknik Multimedia</option>
                            <option value="TMJ">Teknik Multimedia Jaringan</option>
                            <option value="TKJ">Teknik Komputer Jaringan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Jenis Soal</label><br>
                            <select name="jenissoal" id="">
                            <option disabled selected>Pilih...</option>
                            <option value="UTS">UTS</option>
                            <option value="UAS">UAS</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <!-- <input type="submit" class="btn btn-primary" name="submit" value="Cari"> -->
                    <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>  
    </div>
</div>

<div class="content-header">
    <div class="container-fluid">
        
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->