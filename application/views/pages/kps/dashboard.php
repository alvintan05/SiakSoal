<div class="content-header">
    <div class="container-fluid ">
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card-body p-2">
            <div class="table table-striped" >
                <table id="example1" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <td>kode soal</td>
                            <td>mata kuliah</td>
                            <td>file</td>
                            <td>jenis soal</td>
                            <td>semester</td>
                            <td>dosen pembuat</td>
                            <td>tahun akad</td>
                            <td>nama prodi</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  
                        foreach($data_soal as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row->kode_soal; ?></td>
                            <td><?php echo $row->namamk;?></td>
                            <td><?php echo $row->file; ?></td>
                            <td><?php echo $row->jenis_ujian; ?></td>
                            <td><?php echo $row->semester; ?></td>
                            <td><?php echo $row->dosen_pembuat; ?></td>
                            <td><?php echo $row->tahun_akad; ?></td>
                            <td><?php echo $row->namaprod; ?></td>
                        </tr>
                    <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<div class="content-header">
    <div class="container-fluid">
        
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->