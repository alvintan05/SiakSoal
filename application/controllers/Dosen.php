<?php 

class Dosen extends CI_Controller  
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['title'] = 'Home | Dosen';
		$this->load->view('pengajuan_soal/dosen/home.php', array('main'=>$data));
	}

	function dashboard()
	{
		$data['title'] = 'Dashboard | Dosen';
		$this->load->view('pengajuan_soal/dosen/dashboard.php', array('main'=>$data));
	}

	function upload_soal()
	{
		$data['title'] = 'Upload Soal | Dosen';
		$this->load->view('pengajuan_soal/dosen/upload_soal.php', array('main'=>$data));
	}

	function status_soal()
	{
		$data['title'] = 'Status Soal | Dosen';
		$this->load->view('pengajuan_soal/dosen/status_soal.php', array('main'=>$data));
	}


}