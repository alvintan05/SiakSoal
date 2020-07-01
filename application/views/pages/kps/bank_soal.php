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
            <small class="content text-gray">Halaman ini menampilkan daftar hasil pencarian soal </small>
          </div>
          <div class="col-2">
            <?php $this->load->view('layouts/breadcrumb')?>
          </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- TABLE: LATEST ORDERS UAS-->
           <div class="card">
              <div class="card-header">
                <div class="card-tools" align="float-sm-right">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <h4 class="card-title"><big><b>Daftar Soal</b></big></h4>
              </div>
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

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>