<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	var $API ="";

	function __construct()
	{
		parent::__construct();
		$this->API="http://localhost/siaksoal-api/api";		
        $this->load->library('curl');        
		$this->load->helper('url');
		$this->load->helper('form');		
	}

	public function index()
	{
		// $data['title'] = 'AdminLTE 3 | Dashboard 2';
		// $data['sidebar'] = $this->load->view('layouts/sidebar','',true);
        // $data['pages'] = $this->load->view('pages/main','',true);
		// $this->load->view('master',array('main'=>$data));		

		if(!$this->check_session())
		{
			$data['title'] = 'Login | Sistem Pengajuan Soal';
			$data['pages'] = $this->load->view('pages/login','',true);
			$this->load->view('pengajuan_soal/login', array('main'=>$data));
		}
	}

	public function check_session()
	{
		$status = $this->session->isLogin;
		$role = $this->session->role;

		if($status)
		{
			if($role == 'Dosen')
			{				
				redirect('dosen');
			} else if(substr($role, 0, 3) == 'KBK')
			{			
				redirect('kbk');
			} else if($role == 'Panitia')
			{				
				redirect('panitia');
			} else if($role == 'kps')
			{			
				redirect('kps');
			}

			return true;
		} else 
		{
			return false;
		}
	}

	public function login()
	{
		if(isset($_POST['login']))
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$login_arr = array(
				'username' => $username,
				'password' => $password
			);
			
			$data_login = json_decode($this->curl->simple_get($this->API.'/login', $login_arr));
			$result = $data_login->data[0];
			$role = $result->bagian;

			if($role == 'Dosen')
			{
				$session = array(
					'isLogin'=> true,					
					'nip'=>$result->nip,
					'nama'=>$result->nama,
					'role'=>$role
				);

				$this->session->set_userdata($session);

				redirect('dosen');
			} else if(substr($role, 0, 3) == 'KBK')
			{
				$session = array(
					'isLogin'=> true,					
					'nip'=>$result->nip,
					'nama'=>$result->nama,
					'role'=>$role
				);

				$this->session->set_userdata($session);

				redirect('kbk');
			} else if($role == 'Panitia')
			{
				$session = array(
					'isLogin'=> true,					
					'nip'=>$result->nip,
					'nama'=>$result->nama,
					'role'=>$role
				);

				$this->session->set_userdata($session);

				redirect('panitia');
			} else if($role == 'KPS')
			{
				$session = array(
					'isLogin'=> true,					
					'nip'=>$result->nip,
					'nama'=>$result->nama,
					'role'=>$role
				);

				$this->session->set_userdata($session);

				redirect('kps');
			} else 
			{
				$this->session->set_flashdata('notif','
				<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  Username atau Password salah!
                </div>
				');
				redirect('.');
			}
			
		}	
	}
}
