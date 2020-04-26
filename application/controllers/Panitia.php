<?php 

class Panitia extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['title'] = 'Home | Panitia';
		$data['pages'] = $this->load->view('pages/panitia/home','',true);
		$this->load->view('pengajuan_soal/panitia/dashboard.php', array('main'=>$data));
	}

	function dashboard()
	{
		$data['title'] = 'Dashboard | Panitia';
		$this->load->view('pengajuan_soal/panitia/dashboard.php', array('main'=>$data));
	}
}