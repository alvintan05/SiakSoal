<div class="content-header">
	<div class="container-fluid">
        
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
          <div class="card">
            <div class="card-header">
              <h1 class="card-title text-center" style="width: 23rem;"><big><b>Login</b></big></h1>
            </div>
            <div class="card-body m-3">
              <form action="<?php echo site_url('dosen/home_setelah_login') ?>" method="post" enctype="multipart/form-data" >
                <div class="form-group">
                  <label for="username">Username</label>
                  <input class="form-control" type="text" name="username" />
                </div>
                <div class="form-group">
                  <label for="kelas">Password</label>
                  <input class="form-control" type="password" name="password" id="myInput" />
                  <input type="checkbox" onclick="myFunction()"> Tampilkan Password
                </div>

                <div align="center">
                  <br>
                  <!-- <a href="<?php echo site_url('dosen/dashboard') ?>"><input class="btn btn-danger" type="button" name="kemali" value="Cancel"></a>
                  &nbsp;&nbsp; -->
                  <input class="btn btn-block btn-success btn-lg" type="submit" name="login" value="Login" />
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-4"></div>
      </div>
    </div>
</section>

<script>
  function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>



