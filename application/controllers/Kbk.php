<?php 

class Kbk extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data['title'] = 'AdminLTE 3 | Dashboard 2';
		$data['sidebar'] = $this->load->view('layouts/sidebar','',true);
        $data['pages'] = $this->load->view('pages/main','',true);
		$this->load->view('pengajuan_soal/kbk/beranda',array('main'=>$data));
	}
}