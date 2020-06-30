<?php 

class Kbk extends CI_Controller
{
	var $API ="";

	function __construct()
	{
		parent::__construct();

		if($this->session->isLogin == false || substr($this->session->role, 0, 3) != 'KBK'){
			redirect('.');
		}

		$this->API="http://localhost/siaksoal-api/api";		
        $this->load->library('curl');        
		$this->load->helper('url');
	}

	function index()
	{		
		$data['title'] = 'Home | KBK';
		$data['pages'] = $this->load->view('pages/kbk/home','',true);
		$this->load->view('pengajuan_soal/kbk/home.php', array('main'=>$data));
	}

	function dashboard()
	{
		$data['title'] = 'Dashboard | KBK';
		$id = array('kbk_nip'=>$this->session->kbk_nip);
		$Daftarsoaluas = json_decode($this->curl->simple_get($this->API.'kbk/Daftarsoaluas', $id));
		$data['Daftarsoaluas'] = $Daftarsoaluas->data;

		$this->load->view('pengajuan_soal/kbk/dashboard.php', array('main'=>$data));
	}

	function upload_form_soal()
	{
		$data['title'] = 'Format Soal | KBK';
		$this->load->view('pengajuan_soal/kbk/upload_form_soal.php', array('main'=>$data));
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

}