<?php 

class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['title'] = 'Login | Sistem Pengajuan Soal';
		$data['pages'] = $this->load->view('pages/login','',true);
		$this->load->view('pengajuan_soal/login', array('main'=>$data));
	}
}