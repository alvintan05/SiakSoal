<?php 

class Kbk extends CI_Controller
{
	var $API ="";

	function __construct()
	{
		parent::__construct();

		if($this->session->isLogin == false || substr($this->session->role, 0, 3) != 'KBK'){
			redirect('.');
		}

		$this->API="http://localhost/siaksoal-api/api";		
        $this->load->library('curl');        
		$this->load->helper('url');
	}

	function index()
	{		
		$data['title'] = 'Home | KBK';
		$data['pages'] = $this->load->view('pages/kbk/home','',true);
		$this->load->view('pengajuan_soal/kbk/home.php', array('main'=>$data));
	}

	function soal_uts()
	{

		$data['title'] = 'Soal UTS | KBK';
		$id = array('kbk_nip'=>$this->session->nip);

		$data_tahun = json_decode($this->curl->simple_get($this->API.'/dosen/tahun'));
		$data['tahun_list'] = $data_tahun->data;		

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
					'kbk_nip'=>$this->session->nip,
					'tahun'=>$tahun,
					'semester'=>$semester
				);			
				$daftar_soal_uts = json_decode($this->curl->simple_get($this->API.'/kbk/daftarsoaluts_by', $data_filter));
				$data['notif'] = false;	
				$data['tahun'] = $tahun;
				$data['semester'] = $semester;
				
				// check data jadwal null or not
				if(empty($daftar_soal_uts->data)){
					$data['isFilterResultNull'] = true;
				} else {					
					$data['daftar_soal_uts'] = $daftar_soal_uts->data;
				}			
			} else {				
				$data['notif'] = true;				
				$daftar_soal_uts = json_decode($this->curl->simple_get($this->API.'/kbk/daftarsoaluts', $id));	
				$data['daftar_soal_uts'] = $daftar_soal_uts->data;
			}              					
		} else {
			$data['notif'] = false;			            
			$daftar_soal_uts = json_decode($this->curl->simple_get($this->API.'/kbk/daftarsoaluts', $id));	
			$data['daftar_soal_uts'] = $daftar_soal_uts->data;
		}

		$this->load->view('pengajuan_soal/kbk/soal_uts.php', array('main'=>$data));
	}

	function soal_uas()
	{
		$data['title'] = 'Soal UAS | KBK';
		$id = array('kbk_nip'=>$this->session->nip);

		$data_tahun = json_decode($this->curl->simple_get($this->API.'/dosen/tahun'));
		$data['tahun_list'] = $data_tahun->data;		

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
					'kbk_nip'=>$this->session->nip,
					'tahun'=>$tahun,
					'semester'=>$semester
				);			
				$daftar_soal_uas = json_decode($this->curl->simple_get($this->API.'/kbk/daftarsoaluas_by', $data_filter));
				$data['notif'] = false;	
				$data['tahun'] = $tahun;
				$data['semester'] = $semester;
				
				// check data jadwal null or not
				if(empty($daftar_soal_uas->data)){
					$data['isFilterResultNull'] = true;
				} else {					
					$data['daftar_soal_uas'] = $daftar_soal_uas->data;
				}			
			} else {				
				$data['notif'] = true;				
				$daftar_soal_uas = json_decode($this->curl->simple_get($this->API.'/kbk/daftarsoaluas', $id));
				$data['daftar_soal_uas'] = $daftar_soal_uas->data;
			}              					
		} else {
			$data['notif'] = false;			            
			$daftar_soal_uas = json_decode($this->curl->simple_get($this->API.'/kbk/daftarsoaluas', $id));
			$data['daftar_soal_uas'] = $daftar_soal_uas->data;
		}	

		$this->load->view('pengajuan_soal/kbk/soal_uas.php', array('main'=>$data));

	}

	function verifikasi_soal_uts()
	{
		$data = array(
			'kode' => $this->input->post('kode_soal'),
			'status' =>  $this->input->post('status'),	
			'note' => $this->input->post('catatan')		
		);
		
		$verifikasisoal_uts = json_decode($this->curl->simple_put($this->API.'/kbk/approval', $data));
		$respon = $verifikasisoal_uts->data;

		if($verifikasisoal_uts){
			echo "<script>alert('$respon Mengedit Data'); window.location.href ='".base_url()."kbk/soal_uts'</script>";
		} else {
			echo "<script>alert('$respon Mengedit Data'); window.location.href ='".base_url()."kbk/soal_uts'</script>";
		}

	}

	function verifikasi_soal_uas()
	{
		$data = array(
			'kode' => $this->input->post('kode_soal'),
			'status' =>  $this->input->post('status'),	
			'note' => $this->input->post('catatan')		
		);
		
		$verifikasisoal_uts = json_decode($this->curl->simple_put($this->API.'/kbk/approval', $data));
		$respon = $verifikasisoal_uts->data;

		if($verifikasisoal_uts){
			echo "<script>alert('$respon Mengedit Data'); window.location.href ='".base_url()."kbk/soal_uas'</script>";
		} else {
			echo "<script>alert('$respon Mengedit Data'); window.location.href ='".base_url()."kbk/soal_uas'</script>";
		}



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