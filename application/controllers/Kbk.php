<?php 

class Kbk extends CI_Controller
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
		if($this->session->isLogin == false || substr($this->session->role, 0, 3) != 'Kbk'){
			redirect('.');
		}
		$data['title'] = 'Home | KBK';
		$data['pages'] = $this->load->view('pages/kbk/home','',true);
		$this->load->view('pengajuan_soal/kbk/home.php', array('main'=>$data));
	}

	function dashboard()
	{
		$data['title'] = 'Dashboard | KBK';
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