<?php 

class Dosen extends CI_Controller  
{
	var $API ="";
	
	function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/siaksoal-api/api";		
        $this->load->library('curl');        
		$this->load->helper('url');
	}

	function index()
	{
		$data['title'] = 'Home | Dosen';		
		$this->load->view('pengajuan_soal/dosen/home.php', array('main'=>$data));
	}

	function dashboard()
	{
		$data['title'] = 'Dashboard | Dosen';
		$id = array('nip'=>12345);
		$data_jadwal = json_decode($this->curl->simple_get($this->API.'/dosen', $id));		
		$data['data_jadwal'] = $data_jadwal->data;
		$this->load->view('pengajuan_soal/dosen/dashboard.php', array('main'=>$data));
	}

	function upload_soal()
	{
		$data['title'] = 'Upload Soal | Dosen';
		$params = array('kode'=>  $this->uri->segment(3));
		$data_matkul = json_decode($this->curl->simple_get($this->API.'/dosen/upload', $params));
		$data['data_matkul'] = $data_matkul->data;
		$this->load->view('pengajuan_soal/dosen/upload_soal.php', array('main'=>$data));
	}

	function edit_soal()
	{
		$data['title'] = 'Edit Soal | Dosen';
		$this->load->view('pengajuan_soal/dosen/edit_soal.php', array('main'=>$data));
	}

	function status_soal()
	{
		$data['title'] = 'Status Soal | Dosen';
		$id = array('nip'=>12345);
		$data_status_uts = json_decode($this->curl->simple_get($this->API.'/dosen/daftarstatusuts', $id));
		$data_status_uas = json_decode($this->curl->simple_get($this->API.'/dosen/daftarstatusuas', $id));
		$data['data_status_uts'] = $data_status_uts->data;
		$data['data_status_uas'] = $data_status_uas->data;
		$this->load->view('pengajuan_soal/dosen/status_soal.php', array('main'=>$data));
	}


}