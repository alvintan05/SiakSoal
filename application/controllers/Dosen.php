<?php 

class Dosen extends CI_Controller  
{
	var $API ="";
	var $BASE_URL_FILE = "";
	
	function __construct()
	{
		parent::__construct();

		if($this->session->isLogin == false || $this->session->role != 'Dosen'){
			redirect('.');
		}

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
		$data_batas = json_decode($this->curl->simple_get($this->API.'/panitia/batas_waktu'));
		$data['data_batas'] = $data_batas->data;
		$this->session->set_userdata('batas_waktu', $data['data_batas']);

		$this->load->view('pengajuan_soal/dosen/home.php', array('main'=>$data));
	}

	function dashboard()
	{
		$data['title'] = 'Dashboard | Dosen';
		$id = array('nip'=>$this->session->nip);		

		$data_tahun = json_decode($this->curl->simple_get($this->API.'/dosen/tahun'));
		$data['tahun_list'] = $data_tahun->data;
		$data['data_batas'] = $this->session->userdata('batas_waktu');

		// ini default value
		$data['isFilterResultNull'] = false;
		$data['notif'] = false;
		$data['tahun'] = null;
		$data['semester'] = null;

		$filter = $this->input->post('filter');		
        $tahun  = $this->input->post('listTahun');
        $semester = $this->input->post('listSemester');

        if (isset($filter)) {
			if($tahun != 'default' && $semester != 'default') {
				$data_filter = array(
					'nip'=>$this->session->nip,
					'tahun'=>$tahun,
					'semester'=>$semester
				);			
				$data_jadwal = json_decode($this->curl->simple_get($this->API.'/dosen/jadwal_by', $data_filter));
				$data['notif'] = false;	
				$data['tahun'] = $tahun;
				$data['semester'] = $semester;
				
				// check data jadwal null or not
				if(empty($data_jadwal->data)){
					$data['isFilterResultNull'] = true;
				} else {					
					$data['data_jadwal'] = $data_jadwal->data;
				}			
			} else {
				$data_jadwal = json_decode($this->curl->simple_get($this->API.'/dosen', $id));
				$data['notif'] = true;
				$data['data_jadwal'] = $data_jadwal->data;							
			}              					
		} else {
			$data['notif'] = false;			
            $data_jadwal = json_decode($this->curl->simple_get($this->API.'/dosen', $id));
			$data['data_jadwal'] = $data_jadwal->data;						
		}

		$this->load->view('pengajuan_soal/dosen/dashboard.php', array('main'=>$data));
	}

	function upload_soal()
	{
		$batas_waktu = $this->session->userdata('batas_waktu');

		if($batas_waktu[0]->batas_awal <= date('Y-m-d') && $batas_waktu[0]->batas_akhir >= date('Y-m-d')
			|| $batas_waktu[1]->batas_awal <= date('Y-m-d') && $batas_waktu[1]->batas_akhir >= date('Y-m-d'))
		{
			$data['title'] = 'Upload Soal | Dosen';
			$params = array('kode'=>  $this->uri->segment(3));
			$data_matkul = json_decode($this->curl->simple_get($this->API.'/dosen/upload', $params));
			$data['data_matkul'] = $data_matkul->data;
			$this->load->view('pengajuan_soal/dosen/upload_soal.php', array('main'=>$data));
		}
		else
		{
			echo "<script>alert('Tidak dapat mengupload soal karena tidak sesuai jadwal pengumpulan soal') ; window.location.href ='".base_url()."dosen/dashboard'</script>";			
		}
	}

	function edit_soal()
	{
		$batas_waktu = $this->session->userdata('batas_waktu');

		if($batas_waktu[0]->batas_awal <= date('Y-m-d') && $batas_waktu[0]->batas_akhir >= date('Y-m-d')
			|| $batas_waktu[1]->batas_awal <= date('Y-m-d') && $batas_waktu[1]->batas_akhir >= date('Y-m-d')){
			$data['title'] = 'Edit Soal | Dosen';
			$params = array('kode'=>  $this->uri->segment(3));
			$data_matkul = json_decode($this->curl->simple_get($this->API.'/dosen/editupload', $params));
			$data['data_matkul'] = $data_matkul->data;
			$this->load->view('pengajuan_soal/dosen/edit_soal.php', array('main'=>$data));
		}
		else {
			echo "<script>alert('Tidak dapat merubah soal karena tidak sesuai jadwal pengumpulan soal') ; window.location.href ='".base_url()."dosen/status_soal'</script>";			
		}
		
	}

	function status_soal()
	{
		$data['title'] = 'Status Soal | Dosen';
		$id = array('nip'=>$this->session->nip);

		$data_tahun = json_decode($this->curl->simple_get($this->API.'/dosen/tahun'));
		$data['tahun_list'] = $data_tahun->data;
		$data['data_batas'] = $this->session->userdata('batas_waktu');

		// ini default value
		$data['isUtsResultNull'] = false;
		$data['isUasResultNull'] = false;
		$data['notif'] = false;
		$data['tahun'] = null;
		$data['semester'] = null;

		$filter = $this->input->post('filter');		
        $tahun  = $this->input->post('listTahun');
        $semester = $this->input->post('listSemester');

        if (isset($filter)) {
			if($tahun != 'default' && $semester != 'default') {
				$data_filter = array(
					'nip'=>$this->session->nip,
					'tahun'=>$tahun,
					'semester'=>$semester
				);			
				$data_status_soal = json_decode($this->curl->simple_get($this->API.'/dosen/status_soal_by', $data_filter));
				$data['notif'] = false;	
				$data['tahun'] = $tahun;
				$data['semester'] = $semester;
				
				// check data jadwal null or not											
				if (empty($data_status_soal->data->data_uts) && empty($data_status_soal->data->data_uas)){
					$data['isUtsResultNull'] = true;
					$data['isUasResultNull'] = true;
				} else if (empty($data_status_soal->data->data_uts) || empty($data_status_soal->data->data_uas)){
					if(empty($data_status_soal->data->data_uts)){
						$data['isUtsResultNull'] = true;
						$data['isUasResultNull'] = false;
						$data['data_status_uas'] = $data_status_soal->data->data_uas;					
					}
	
					if(empty($data_status_soal->data->data_uas)){
						$data['isUasResultNull'] = true;
						$data['isUtsResultNull'] = false;
						$data['data_status_uts'] = $data_status_soal->data->data_uts;
					}
				} else if(!empty($data_status_soal->data->data_uts) && !empty($data_status_soal->data->data_uas)) {
					$data['isUtsResultNull'] = false;
					$data['isUasResultNull'] = false;				
					$data['data_status_uts'] = $data_status_soal->data->data_uts;	
					$data['data_status_uas'] = $data_status_soal->data->data_uas;
				}

			} else {				
				$data['notif'] = true;				
				$data_status_soal = json_decode($this->curl->simple_get($this->API.'/dosen/daftar_status_soal', $id));				
				$data['data_status_uts'] = $data_status_soal->data->data_uts;
				$data['data_status_uas'] = $data_status_soal->data->data_uas;						
			}              					
		} else {
			$data['notif'] = false;			
            $data_status_soal = json_decode($this->curl->simple_get($this->API.'/dosen/daftar_status_soal', $id));				
			$data['data_status_uts'] = $data_status_soal->data->data_uts;
			$data['data_status_uas'] = $data_status_soal->data->data_uas;
		}
				
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
			'overwrite'=>'true',
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
			echo "<script>alert('Sukses Upload'); window.location.href ='".base_url()."dosen/dashboard'</script>";			
		} else {			
			echo "<script>alert('Gagal Upload, Harap Coba Lagi !') ; window.location.href ='".base_url()."dosen/upload_soal/".$this->input->post('id')."'</script>";
		}		
	}

	function edit_upload()
	{		
		if($_FILES["file1"]["error"] == 4){
			$data = array(
				'kode' => $this->input->post('id'),
				'jenis_ujian' =>  $this->input->post('utsuas'),
				'jenis_soal' =>  $this->input->post('jenisUjian'),
				'kbk_nip' =>  $this->input->post('kbk')							
			);			
	
			$insert =  $this->curl->simple_put($this->API.'/dosen/editupload', $data);
			redirect('dosen/status_soal');
		} else {
			$file = $this->input->post('oldFileName');
			$config = array(
				'upload_path'=>'uploads/soal/',
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
					'kode' => $this->input->post('id'),
					'jenis_ujian' =>  $this->input->post('utsuas'),
					'jenis_soal' =>  $this->input->post('jenisUjian'),
					'kbk_nip' =>  $this->input->post('kbk'),
					'file' =>  $filename								
				);			
		
				$insert =  $this->curl->simple_put($this->API.'/dosen/editupload', $data);				
				echo "<script>alert('Sukses Mengedit Data'); window.location.href ='".base_url()."dosen/status_soal'</script>";
			} else {				
				echo "<script>alert('Gagal Upload, Harap Coba Lagi !') ; window.location.href ='".base_url()."dosen/edit_soal/".$this->input->post('id')."'</script>";		
			}			
		}		
	}

	function deleteFile($file)
	{
		return array_map('unlink', glob(FCPATH."/uploads/soal/$file"));
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

}