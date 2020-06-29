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
		$this->BASE_URL_FILE="http://localhost/SiakSoal/uploads/soal/";
		$this->load->library('curl');        
		$this->load->helper('url');
		$this->load->helper('download');
	}

	function index()
	{		
		$data['title'] = 'Home | Panitia';
		$data['pages'] = $this->load->view('pages/panitia/home','',true);
		$this->load->view('pengajuan_soal/panitia/home.php', array('main'=>$data));
	}

	// Dashboard UTS
	function dashboard()
	{
		$data['title'] = 'Soal UTS | Panitia';

		$data_tahun = json_decode($this->curl->simple_get($this->API.'/dosen/tahun'));
		$data['tahun_list'] = $data_tahun->data;

		// ini default value
		$data['isFilterResultNull'] = false;
		$data['notif'] = false;
		$data['tahun'] = null;
		$data['semester'] = null;
		$data['prodi'] = null;

		$filter = $this->input->post('filter');		
        $tahun  = $this->input->post('listTahun');
		$semester = $this->input->post('listSemester');
		$prodi = $this->input->post('listProdi');

        if (isset($filter)) {
			if($tahun != 'default' && $semester != 'default' && $prodi != 'default') {
				$data_filter = array(
					'tahun'=>$tahun,
					'semester'=>$semester,
					'prodi' => $prodi
				);			
				$data_soal = json_decode($this->curl->simple_get($this->API.'/panitia/soal_uts_by', $data_filter));
				$data['notif'] = false;	
				$data['tahun'] = $tahun;
				$data['semester'] = $semester;
				$data['prodi'] = $prodi;
				
				// check data jadwal null or not
				if(empty($data_soal->data)){
					$data['isFilterResultNull'] = true;
				} else {					
					$data['data_soal'] = $data_soal->data;
				}			
			} else {
				$data_soal = json_decode($this->curl->simple_get($this->API.'/panitia/soal_uts'));				
				$data['data_soal'] = $data_soal->data;
				$data['notif'] = true;
			}              					
		} else {
			$data['notif'] = false;			
            $data_soal = json_decode($this->curl->simple_get($this->API.'/panitia/soal_uts'));				
			$data['data_soal'] = $data_soal->data;
		}

		$this->load->view('pengajuan_soal/panitia/dashboard.php', array('main'=>$data));
	}

	// Dashboard UAS
	function dashboard2()
	{
		$data['title'] = 'Soal UAS | Panitia';

		$data_tahun = json_decode($this->curl->simple_get($this->API.'/dosen/tahun'));
		$data['tahun_list'] = $data_tahun->data;

		// ini default value
		$data['isFilterResultNull'] = false;
		$data['notif'] = false;
		$data['tahun'] = null;
		$data['semester'] = null;
		$data['prodi'] = null;

		$filter = $this->input->post('filter');		
        $tahun  = $this->input->post('listTahun');
		$semester = $this->input->post('listSemester');
		$prodi = $this->input->post('listProdi');

        if (isset($filter)) {
			if($tahun != 'default' && $semester != 'default' && $prodi != 'default') {
				$data_filter = array(
					'tahun'=>$tahun,
					'semester'=>$semester,
					'prodi' => $prodi
				);			
				$data_soal = json_decode($this->curl->simple_get($this->API.'/panitia/soal_uas_by', $data_filter));
				$data['notif'] = false;	
				$data['tahun'] = $tahun;
				$data['semester'] = $semester;
				$data['prodi'] = $prodi;
				
				// check data jadwal null or not
				if(empty($data_soal->data)){
					$data['isFilterResultNull'] = true;
				} else {					
					$data['data_soal'] = $data_soal->data;
				}			
			} else {
				$data_soal = json_decode($this->curl->simple_get($this->API.'/panitia/soal_uas'));				
				$data['data_soal'] = $data_soal->data;
				$data['notif'] = true;
			}              					
		} else {
			$data['notif'] = false;			
            $data_soal = json_decode($this->curl->simple_get($this->API.'/panitia/soal_uas'));				
			$data['data_soal'] = $data_soal->data;
		}

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