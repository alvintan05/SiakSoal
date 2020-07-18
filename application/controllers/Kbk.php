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
		$this->load->helper('download');
	}

	function index()
	{		
		$data['title'] = 'Home | KBK';		

		$data_batas = json_decode($this->curl->simple_get($this->API.'/panitia/batas_waktu'));
		$data['data_batas'] = $data_batas->data;
		$this->session->set_userdata('batas_waktu', $data['data_batas']);

		$data_uts = json_decode($this->curl->simple_get($this->API.'/panitia/format_uts'));
		$data['data_uts'] = $data_uts->data;
		$data_uas = json_decode($this->curl->simple_get($this->API.'/panitia/format_uas'));
		$data['data_uas'] = $data_uas->data;

		$this->load->view('pengajuan_soal/kbk/home.php', array('main'=>$data));
	}

	function soal_uts()
	{

		$data['title'] = 'Soal UTS | KBK';
		$id = array('kbk_nip'=>$this->session->nip);

		$data_tahun = json_decode($this->curl->simple_get($this->API.'/dosen/tahun'));
		$data['tahun_list'] = $data_tahun->data;
		$data['data_batas'] = $this->session->userdata('batas_waktu');		

		// ini default value
		$data['isFilterResultNull'] = false;
		$data['isApiResultNull'] = false;
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
				if(empty($daftar_soal_uts->data)){
					$data['isApiResultNull'] = true;
				} else {					
					$data['daftar_soal_uts'] = $daftar_soal_uts->data;
				}
			}              					
		} else {
			$data['notif'] = false;			            
			$daftar_soal_uts = json_decode($this->curl->simple_get($this->API.'/kbk/daftarsoaluts', $id));	
			if(empty($daftar_soal_uts->data)){
				$data['isApiResultNull'] = true;
			} else {					
				$data['daftar_soal_uts'] = $daftar_soal_uts->data;
			}
		}						

		$this->load->view('pengajuan_soal/kbk/soal_uts.php', array('main'=>$data));
	}

	function soal_uas()
	{
		$data['title'] = 'Soal UAS | KBK';
		$id = array('kbk_nip'=>$this->session->nip);

		$data_tahun = json_decode($this->curl->simple_get($this->API.'/dosen/tahun'));
		$data['tahun_list'] = $data_tahun->data;		
		$data['data_batas'] = $this->session->userdata('batas_waktu');

		// ini default value
		$data['isFilterResultNull'] = false;
		$data['isApiResultNull'] = false;
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
				if(empty($daftar_soal_uas->data)){
					$data['isApiResultNull'] = true;
				} else {					
					$data['daftar_soal_uas'] = $daftar_soal_uas->data;
				}
			}              					
		} else {
			$data['notif'] = false;			            
			$daftar_soal_uas = json_decode($this->curl->simple_get($this->API.'/kbk/daftarsoaluas', $id));			
			if(empty($daftar_soal_uas->data)){
				$data['isApiResultNull'] = true;
			} else {					
				$data['daftar_soal_uas'] = $daftar_soal_uas->data;
			}
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

	function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

}