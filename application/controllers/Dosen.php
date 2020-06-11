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
		$this->load->library('form_validation');
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
		$id = array('nip'=>$this->session->nip);
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
		$params = array('kode'=>  $this->uri->segment(3));
		$data_matkul = json_decode($this->curl->simple_get($this->API.'/dosen/editupload', $params));
		$data['data_matkul'] = $data_matkul->data;
		$this->load->view('pengajuan_soal/dosen/edit_soal.php', array('main'=>$data));
	}

	function status_soal()
	{
		$data['title'] = 'Status Soal | Dosen';
		$id = array('nip'=>$this->session->nip);
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
			redirect('dosen/dashboard');
		} else {
			echo "Gagal Upload";			
		}			
		
		// $this->load->library('form_validation');
		// $this->load->helper('file');				

		// $this->form_validation->set_rules('file1','','callback_file_check');

		// if($this->form_validation->run() == true)
		// {
		// 	$config = array(
		// 		'upload_path'=>'uploads/soal/',
		// 		'allowed_types'=>'doc|docx|pdf',
		// 		'max_size'=>2048
		// 	);

		// 	$this->upload->initialize($config);

		//  	if ($this->upload->do_upload('file1'))
		// 	{
		// 		$data_upload = $this->upload->data();
		// 		$filename = $data_upload['file_name'];
				
		// 		$data = array(
		// 			'jenis_ujian' =>  $this->input->post('utsuas'),
		// 			'jenis_soal' =>  $this->input->post('jenisUjian'),
		// 			'file' =>  $filename,
		// 			'kbk_nip' =>  $this->input->post('kbk'),
		// 			'uts_uas_kodejdwl' => $this->input->post('id')
		// 		);			
		
		// 		// $insert =  $this->curl->simple_post($this->API.'/dosen/upload', $data);     
		// 		// redirect('dosen/dashboard');
		// 	} else {
		// 		echo "Gagal Upload";
		// 		$data['error_msg'] = $this->upload->display_errors();
		// 	}				
		// }			
	}

	// function file_check($str)
	// {
	// 	$allowed_mime_type_arr = array('application/pdf', 'application/doc', 'application/docx');
	// 	$mime = get_mime_by_extension($_FILES['file1']['name']);

	// 	if(isset($_FILES['file1']['name']) && $_FILES['file1']['name'] != '')
	// 	{
	// 		if(in_array($mime, $allowed_mime_type_arr))
	// 		{
	// 			return true;
	// 		} else 
	// 		{
	// 			$this->form_validation->set_message('file_check', 'Hanya menerima format file doc/docx/pdf');
	// 			return false;
	// 		}
	// 	} else 
	// 	{
	// 		$this->form_validation->set_message('file_check', 'Pilih file yang ingin di upload.');
	// 		return false;
	// 	}
	// }

	function edit_upload()
	{
		$file = $this->input->post('oldFileName');
		$config = array(
			'upload_path'=>'uploads/soal/',
			'allowed_types'=>'doc|docx|pdf',
			'overwrite'=>'true',
			'max_size'=>2048
		);

		$this->upload->initialize($config);

		$this->deleteFile($file);

		if ($this->upload->do_upload('file1'))
		{
			$data_upload = $this->upload->data();
			$filename = $data_upload['file_name'];
			
			$data = array(
				'kode' => $this->input->post('id'),
				'jenis_ujian' =>  $this->input->post('utsuas'),
				'jenis_soal' =>  $this->input->post('jenisUjian'),
				'file' =>  $filename								
			);			
	
			$insert =  $this->curl->simple_put($this->API.'/dosen/editupload', $data);
			redirect('dosen/status_soal');
		} else {
			echo "Gagal Upload";			
		}			
	}

	private function deleteFile($filename)
	{
		return array_map('unlink', glob(FCPATH."uploads/soal/$filename"));
	}

	function download($file = NULL)
	{					
		$filepath = $this->BASE_URL_FILE . $file;		
		redirect($filepath);		
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

}