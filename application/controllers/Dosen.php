<?php 

class Dosen extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->view('pengajuan_soal/dosen/beranda.php');
	}
}