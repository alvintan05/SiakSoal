<?php 

class Panitia extends CI_Controller
{
	var $API ="";
	
	function __construct()
	{					
		parent::__construct();
		
		if($this->session->isLogin == false || $this->session->role != 'Panitia'){
			redirect('.');
		}

		$this->API="http://localhost/siaksoal-api/api";		
		$this->load->library('curl');        
		$this->load->helper('url');
	}

	function index()
	{		
		$data['title'] = 'Home | Panitia';
		$data['pages'] = $this->load->view('pages/panitia/home','',true);
		$this->load->view('pengajuan_soal/panitia/home.php', array('main'=>$data));
	}

	function dashboard()
	{
		$data['title'] = 'Dashboard | Panitia';
		$this->load->view('pengajuan_soal/panitia/dashboard.php', array('main'=>$data));
	}

	function dashboard2()
	{
		$data['title'] = 'Dashboard | Panitia';
		$this->load->view('pengajuan_soal/panitia/dashboard2.php', array('main'=>$data));
	}

	function bataswaktu()
	{
		$data_batas = json_decode($this->curl->simple_get($this->API.'/panitia/batas_waktu'));
		$data['data_batas'] = $data_batas->data;
		$data['title'] = 'Batas Waktu | Panitia';
		$this->load->view('pengajuan_soal/panitia/bataswaktu.php',array('main'=>$data));
	}

	function updateBatas()
	{
		$data = array(
			'jenis' => $this->input->post('jenis'),
			'batas_awal' =>  $this->input->post('batas_awal'),
			'batas_akhir' =>  $this->input->post('batas_akhir')			
		);			

		$update =  $this->curl->simple_put($this->API.'/panitia/update_batas', $data);
		redirect('panitia/bataswaktu');
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}