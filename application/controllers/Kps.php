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

		if ($this->input->get('tahun')) {
			$filter = array(
				'tahun' => $this->input->get('tahun'),
				'semester' => $this->input->get('semester'),
				'jenissoal' => $this->input->get('jenissoal')
			);
			
			$data_soal = json_decode($this->curl->simple_get($this->API.'/kps/search', $filter));
			var_dump($data_soal);
			$data['data_soal'] = $data_soal->data;
			
			// $this->session->set_listsoal('data_soal', $data['data_soal']);

		} else {
			echo "Filter gagal";
		}

		// $data['pages'] = $this->load->view('pages/kps/dashboard','',true);
		// $this->load->view('pengajuan_soal/kps/dashboard.php', array('main'=>$data));
	}

	function get_search(){
		echo "TES";
	}

	function banksoal()
	{
		$data['title'] = 'Dashboard | KPS';

		$data['pages'] = $this->load->view('pages/kps/dashboard','',true);
		$this->load->view('pengajuan_soal/kps/dashboard.php', array('main'=>$data));
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}