<div class="content-header">
	<div class="container-fluid ">
    <div class="row callout callout bg-light">
          <div class="col-1" align="right">
            <span class="fa-stack fa-lg">
              <i class="fas fa-square fa-stack-2x" style="color: #ffff"></i>
              <i class="fa fa-tachometer-alt fa-stack-1x " style="color: #17a2b8"></i>
            </span>
          </div>
          <div class="col-9">
            <div class="text-secondary"><b>Dashboard</b></div>
            <small class="content text-gray">Halaman ini digunakan untuk meng-upload soal UTS dan UAS. </small>
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
      <!-- Option tahun dan semester -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <select id="listTahun" name="listTahun" class="form-control">
            <?php 
              foreach($tahun as $row){ 
                ?>        
                <option value="<?php echo $row->tahun_akad ?>"><?php echo $row->tahun_akad ?></option>
              <?php 
              }
             ?>            
          </select>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <select id="listSemester" name="listSemester" class="form-control">
            <option value="ganjil" selected>Ganjil</option>
            <option value="genap">Genap</option>
          </select>
        </div>
      </div>

      <br>

      <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Matkul</span>

                <span class="info-box-number">
                  <?php echo count($data_jadwal) ?>
                </span>
                
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>


    	<!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header">
              	<div class="card-tools" align="float-sm-right">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>

                <h5 class="card-title"><big><b>Jadwal Dosen</b></big></h5>
                <!-- <div class="card-description text-muted subjudul">
                  Dosen : Raisa Andriana &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div> -->
              </div>              
              <div class="card-body p-2">
                <div class="table table-striped" >
                  <table id="example1" class="display" style="width:100%">
                    <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Mata Kuliah</th>
                      <th>Kelas</th>
                      <th>Ruang</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="show_jadwal">
                      <?php  
                        foreach($data_jadwal as $row) {
                          ?>
                          <tr>
                            <td><?php echo $row->matakuliah_kodemk;?></td>
                            <td><?php echo $row->namamk;?></td>
                            <td><?php echo $row->namaklas;?></td>
                            <td><?php echo $row->ruangan_namaruang;?></td>
                            <td>
                              <div class="box-button">
								                <a href='<?php echo site_url('dosen/upload_soal/'.$row->kodejdwl); ?>' class="btn btn-info btn-sm">Upload</a>
						                  </div>
                            </td>
                          </tr>
                          <?php                         
                        }       
                      ?>                                                              
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
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

  // $(document).ready(function() {

  //   var tahun = document.getElementById("listTahun");
  //   var tahunValue = tahun.options[tahun.selectedIndex].value;
  //   var semester = document.getElementById("listSemester");
  //   var semesterValue = semester.options[semester.selectedIndex].value;

  //   function tampil_matkul(){
  //     $.ajax({
  //       url : '<?php echo base_url()?>dosen/filter_jadwal',
  //       data : {tahun: tahun, semester:semester},
  //       async : true,
  //       dataType : 'json',
  //       success : function(data){
  //         var i;
  //         var html = '';
  //         var cell = '';
  //         var cell2 = '';
  //         var count_nilai = data.length;
  //         var count_mhs = <?php echo count($data);?>;		                      

  //         <?php 
	// 				foreach ($data as $key => $value) {
  //         ?>
  //           var row = document.createElement("tr");
  //           cell = document.createElement("td");
  //           var cellText = document.createTextNode("-");
  //           var cellText2 = document.createTextNode("-");
  //           cell2 = document.createElement("td");
  //           cell.appendChild(cellText);
  //           cell2.appendChild(cellText2);

  //           for(i=0;i<count_nilai;i++){
  //             if (<?php echo $value->kodejdwl;?>==data[i].kodejdwl) {
  //               cell = document.createElement("td");
  //               var cellText = document.createTextNode(data[i].total_nilai);
  //               cell2 = document.createElement("td");
  //               var cellText2 = document.createTextNode(data[i].angka_nilai);
  //               cell.appendChild(cellText);
  //               cell2.appendChild(cellText2);
  //             }
  //           }

  //           row.appendChild(cell);
  //           row.appendChild(cell2);

  //           document.getElementById("show_jadwal").appendChild(row);
  //           $("#example1").DataTable({
  //             paging: false,
  //             info: false,
  //             searching: false,
  //             retrieve: true,
  //             ordering: false
  //           });
  //         <?php
  //           }
  //         ?>
  //       }
  //     });
  //   }

  // });
</script>