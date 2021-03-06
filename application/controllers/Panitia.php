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
		$this->load->library('upload');
		$this->load->helper('download');
	}

	function index()
	{		
		$data['title'] = 'Home | Panitia';
		$data['pages'] = $this->load->view('pages/panitia/home','',true);

		$data_uts = json_decode($this->curl->simple_get($this->API.'/panitia/format_uts'));
		$data['data_uts'] = $data_uts->data;
		$data_uas = json_decode($this->curl->simple_get($this->API.'/panitia/format_uas'));
		$data['data_uas'] = $data_uas->data;
		
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

	function monitor()
	{
		$data['title'] = 'Monitor | Panitia';
		$data['pages'] = $this->load->view('pages/panitia/monitor','',true);
		
		$this->load->view('pengajuan_soal/panitia/monitor.php', array('main'=>$data));
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

	function upload_form_soal_uts()
	{
		$data['title'] = 'Format Soal UTS | Panitia';
		$data_uts = json_decode($this->curl->simple_get($this->API.'/panitia/format_uts'));
		$data['data_uts'] = $data_uts->data;
		$this->load->view('pengajuan_soal/panitia/upload_form_soal_uts.php', array('main'=>$data));
	}

	function upload_form_soal_uas()
	{
		$data['title'] = 'Format Soal UAS | Panitia';
		$data_uas = json_decode($this->curl->simple_get($this->API.'/panitia/format_uas'));
		$data['data_uas'] = $data_uas->data;
		$this->load->view('pengajuan_soal/panitia/upload_form_soal_uas.php', array('main'=>$data));
	}

	function upload_uts()
	{			
		$file = $this->input->post('oldFileName');
		$config = array(
			'upload_path'=>'uploads/format/',
			'allowed_types'=>'doc|docx|pdf',
			'overwrite'=>'true',
			'max_size'=>2048
		);

		$this->upload->initialize($config);			

		if ($this->upload->do_upload('file1'))
		{
			$data_upload = $this->upload->data();
			$filename = $data_upload['file_name'];

			$this->deleteFile($file);

			$data = array(
				'jenis_ujian' =>  'UTS',				
				'file' =>  $filename				
			);			
	
			$update =  $this->curl->simple_put($this->API.'/panitia/upload_format', $data); 
			echo "<script>alert('Sukses Upload'); window.location.href ='".base_url()."panitia'</script>";			
		} else {			
			echo "<script>alert('Gagal Upload, Harap Coba Lagi !') ; window.location.href ='".base_url()."panitia/upload_form_soal_uts'</script>";
		}						
	}

	function upload_uas()
	{			
		$file = $this->input->post('oldFileName');
		$config = array(
			'upload_path'=>'uploads/format/',
			'allowed_types'=>'doc|docx|pdf',
			'overwrite'=>'true',
			'max_size'=>2048
		);

		$this->upload->initialize($config);			

		if ($this->upload->do_upload('file1'))
		{
			$data_upload = $this->upload->data();
			$filename = $data_upload['file_name'];

			$this->deleteFile($file);

			$data = array(
				'jenis_ujian' =>  'UAS',				
				'file' =>  $filename				
			);			
	
			$update =  $this->curl->simple_put($this->API.'/panitia/upload_format', $data); 
			echo "<script>alert('Sukses Upload'); window.location.href ='".base_url()."panitia'</script>";			
		} else {			
			echo "<script>alert('Gagal Upload, Harap Coba Lagi !') ; window.location.href ='".base_url()."panitia/upload_form_soal_uas'</script>";
		}						
	}

	function deleteFile($file)
	{
		return array_map('unlink', glob(FCPATH."/uploads/format/$file"));
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}