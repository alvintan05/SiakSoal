<?php 

class Kps extends CI_Controller
{
	var $API ="";
	

	function __construct()
	{
		parent::__construct();

		if($this->session->isLogin == false || $this->session->role != 'KPS'){
			redirect('.');
		}
		
		$this->API="http://localhost/siaksoal-api/api";		
        $this->load->library('curl');        
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('upload');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('download');
	}

	function index()
	{		
		$data['title'] = 'Home | KPS';
		$data['pages'] = $this->load->view('pages/kps/home','',true);	
		
		$data_uts = json_decode($this->curl->simple_get($this->API.'/kbk/format_uts'));
		$data['data_uts'] = $data_uts->data;
		$data_uas = json_decode($this->curl->simple_get($this->API.'/kbk/format_uas'));
		$data['data_uas'] = $data_uas->data;

		$this->load->view('pengajuan_soal/kps/home.php', array('main'=>$data));
	}

	function search()
	{
		$data['title'] = 'Bank Soal | KPS';
		$data['data_soal'] = null;
		if ($this->input->get('tahun')) {
			$filter = array(
				'tahun' => $this->input->get('tahun'),
				'semester' => $this->input->get('semester'),
				'jenissoal' => $this->input->get('jenissoal'),
				'namaprodi' => $this->input->get('namaprodi')
			);
			
			$data_soal = json_decode($this->curl->simple_get($this->API.'/kps/search', $filter));
			$data['data_soal'] = $data_soal->data;

			if(isset($data['data_soal'])){
				$this->session->set_userdata('hasil_data_soal', $data['data_soal']);
			}else {
				$data['kosong'] = 'Tidak ada hasil pencarian';
			}
			
		} else {
			echo "Filter gagal";
		}

		$data['pages'] = $this->load->view('pages/kps/dashboard','',true);
		$data_tahun = json_decode($this->curl->simple_get($this->API.'/dosen/tahun'));
		$data['tahun_list'] = $data_tahun->data;
		$this->load->view('pengajuan_soal/kps/dashboard.php', array('main'=>$data));
	}

	function dashboard()
	{
		$data['title'] = 'Dashboard | KPS';
		$data['data_soal'] = $this->session->userdata('hasil_data_soal');
		$data['pages'] = $this->load->view('pages/kps/dashboard','',true);
		$data_tahun = json_decode($this->curl->simple_get($this->API.'/dosen/tahun'));
		$data['tahun_list'] = $data_tahun->data;
		$this->load->view('pengajuan_soal/kps/dashboard.php', array('main'=>$data));
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}