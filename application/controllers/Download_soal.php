<?php 

class Download_soal extends CI_Controller
{
	var $API ="";
	var $BASE_URL_FILE = "";
	
	function __construct()
	{					
		parent::__construct();
		
		$this->BASE_URL_FILE="http://localhost/SiakSoal/uploads/soal/";		
		$this->load->helper('url');
		$this->load->helper('download');
	}

	public function download($fileName = NULL) {   
		if ($fileName) {
			$file = realpath ( "uploads\soal" ) . "\\" . $fileName;
		 	// check file exists    
		 	if (file_exists ( $file )) {
		  		// get file content
		  		$data = file_get_contents ( $file );
		  		//force download
		  		force_download ( $fileName, $data );
			} else {
		  		// Redirect to base url				
				echo "<script>alert('File tidak ditemukan !');  window.close();</script>";
			}
		}
	}

	public function download_format($fileName = NULL) {   
		if ($fileName) {
			$file = realpath ( "uploads". "\\" . "format" ) . "\\" . $fileName;
		 	// check file exists    
		 	if (file_exists ( $file )) {
		  		// get file content
		  		$data = file_get_contents ( $file );
		  		//force download
		  		force_download ( $fileName, $data );
			} else {
		  		// Redirect to base url				
				echo "<script>alert('File tidak ditemukan !');  window.close();</script>";
			}
		}
	}

	public function download_panduan($fileName = NULL) {
		if ($fileName) {
			$file = realpath ( "uploads". "\\" . "panduan" ) . "\\" . $fileName;
		 	// check file exists    
		 	if (file_exists ( $file )) {
		  		// get file content
		  		$data = file_get_contents ( $file );
		  		//force download
		  		force_download ( $fileName, $data );
			} else {
		  		// Redirect to base url				
				echo "<script>alert('File tidak ditemukan !');  window.close();</script>";
			}
		}
	}
}