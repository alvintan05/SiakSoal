<?php 

class Kbk extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['title'] = 'Home | KBK';
		$data['pages'] = $this->load->view('pages/kbk/home','',true);
		$this->load->view('pengajuan_soal/kbk/home.php', array('main'=>$data));
	}


	function home()
	{
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


}