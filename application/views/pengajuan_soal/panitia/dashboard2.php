<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $main['title']; ?></title>
	<?php $this->load->view('layouts/head') ?>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/pengajuan_soal/styles.css " type="text/css">
	<!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">

		<!-- navbar -->
			<?php $this->load->view('layouts/navbar/navbar_panitia')?>
		<!-- END navbar -->
		
		<!-- sidebar -->
			<?php $this->load->view('layouts/sidebar/sidebar_panitia')?>
		<!-- END sidebar -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- pages -->
			<?php $this->load->view('pages/panitia/dashboard2', $main) ?>
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

	<!-- javascript -->
	<?php $this->load->view('layouts/javascript')?>
	<!-- END javascript -->

	<!-- jQuery -->
	<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- DataTables -->
	<script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url();?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url();?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<!-- AdminLTE App -->
	<!-- <script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script> -->
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
</body>
</html>