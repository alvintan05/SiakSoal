<?php 

class Dosen extends CI_Controller  
{
	var $API ="";
	var $BASE_URL_FILE = "";
	
	function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/siaksoal-api/api";		
		$this->BASE_URL_FILE="http://localhost/SiakSoal/uploads/soal/";
        $this->load->library('curl');        
		$this->load->helper('url');
		$this->load->helper('form');			
		$this->load->library('upload');
		$this->load->helper('download');
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

	function home_setelah_login()
	{
		$data['title'] = 'Home | Dosen';
		$this->load->view('pengajuan_soal/dosen/home_setelah_login.php', array('main'=>$data));
	}

	function post_upload()
	{
		$config = array(
			'upload_path'=>'uploads/soal/',
			'allowed_types'=>'doc|docx|pdf',
			'max_size'=>2048
		);

		$this->upload->initialize($config);
	
		if ($this->upload->do_upload('file1'))
		{
			$data_upload = $this->upload->data();
			$filename = $data_upload['file_name'];
			
			$data = array(
				'jenis_ujian' =>  $this->input->post('utsuas'),
				'jenis_soal' =>  $this->input->post('jenisUjian'),
				'file' =>  $filename,
				'kbk_nip' =>  $this->input->post('kbk'),
				'uts_uas_kodejdwl' => $this->input->post('id')
			);			
	
			$insert =  $this->curl->simple_post($this->API.'/dosen/upload', $data);     
			redirect('dosen/dashboard');
		} else {
			echo "Gagal Upload";
			
		}				
	}

	function download($file = NULL)
	{					
		$filepath = $this->BASE_URL_FILE . $file;
		// echo $filepath;
		redirect($filepath);		
	}

}