<?php 

class Kps extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['title'] = 'Home | KPS';
		$data['pages'] = $this->load->view('pages/kps/bank_soal','',true);
		$this->load->view('pengajuan_soal/kps/bank_soal.php', array('main'=>$data));
	}

	function dashboard()
	{
		$data['title'] = 'Dashboard | KPS';
		$data['pages'] = $this->load->view('pages/kps/bank_soal','',true);
		$this->load->view('pengajuan_soal/kps/bank_soal.php', array('main'=>$data));
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}