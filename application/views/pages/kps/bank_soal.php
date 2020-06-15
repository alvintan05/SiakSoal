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
                <form action="<? echo base_url(). 'Kps/dashboard' ?>" method="post" >
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Tahun Ajaran</label><br>
                            <select name="tahun" id="">
                            <option selected>Pilih...</option>
                            <option value="t2015">2015</option>
                            <option value="t2016">2016</option>
                            <option value="t2017">2017</option>
                            <option value="t2018">2018</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Semester</label><br>
                            <select name="semester" id="">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- <div class="form-group col-md-4">
                            <label for="">Program Studi</label>
                            <select name="" id="">
                            <option selected>Pilih...</option>
                            <option value="ti">Teknik Informatika</option>
                            <option value="tmd">Teknik Multimedia</option>
                            <option value="tmj">Teknik Multimedia Jaringan</option>
                            <option value="tkj">Teknik Komputer Jaringan</option>
                            </select>
                        </div> -->
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
                    <input type="submit" class="btn btn-primary" name="submit" value="Cari">
                    </div>
                </form>
            </div>
        </div>  
    </div>
</div>