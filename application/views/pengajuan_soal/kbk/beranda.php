<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php echo $main['title']; ?></title>
  	<?php $this->load->view('layouts/head/head_kbk') ?>

	<link rel="stylesheet" href="">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">

		<!-- navbar -->
			<?php $this->load->view('layouts/navbar/navbar_kbk')?>
		<!-- END navbar -->
		
		<!-- sidebar -->
			<?php echo $main['sidebar']; ?>
		<!-- END sidebar -->

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




</body>



</html>