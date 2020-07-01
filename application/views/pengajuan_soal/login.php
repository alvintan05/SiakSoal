<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $main['title']; ?></title> 
  <?php $this->load->view('layouts/head') ?>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/pengajuan_soal/styles.css " type="text/css">
</head>
<body class="hold-transition layout-top-nav">
	<div class="wrapper">

		<!-- navbar -->
			<?php $this->load->view('layouts/navbar/navbar_login') ?>
		<!-- END navbar -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- pages -->
			<?php $this->load->view('pages/login') ?>
			<!-- END pages -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->

		<!-- footer -->
		<?php $this->load->view('layouts/footer')?>
		<!-- END footer -->
	</div>
	<!-- ./wrapper -->

	<!-- javascrAAipt -->
	<?php $this->load->view('layouts/javascript')?>
	<!-- END javascript -->

</body>
</html>
