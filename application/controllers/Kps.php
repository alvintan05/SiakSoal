<?php 

class Kps extends CI_Controller
{
	var $API ="";
	
	function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/siaksoal-api/api";		
        $this->load->library('curl');        
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('upload');
		$this->load->library('form_validation');
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
		// $s_data['tahun'] = $this->input->post('tahun');
		// $s_data['semester'] = $this->input->post('semester');
		// $s_data['jenissoal'] = $this->input->post('jenissoal');
		$data_soal = json_decode($this->curl->simple_get($this->API.'/kps'));
		$data['data_soal'] = $data_soal->data;
		$data['pages'] = $this->load->view('pages/kps/bank_soal','',true);
		$this->load->view('pengajuan_soal/kps/dashboard.php', array('main'=>$data));
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}