<?php 

class Kbk extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->view('pengajuan_soal/kbk/beranda.php');
	}
}