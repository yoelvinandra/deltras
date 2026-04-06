<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['model_competition_news']);
	}
	
	public function index(){
		$kodeMenu = $this->input->get('kode');
		// panggil set page di MY_Controller
		$this->setPage($kodeMenu, $config);
	}

	public function comboGrid() {
		$this->output->set_content_type('application/json');
		$response = $this->model_competition_news->comboGrid($this->input->get('search'));
		echo json_encode($response);
	}
	
	public function comboGridTransaksi() {
		$this->output->set_content_type('application/json');
		$response = $this->model_competition_news->comboGridTransaksi($this->setPaginationGrid());
		echo json_encode($response);
	}

	public function dataGrid() {
		$this->output->set_content_type('application/json');
		$response = $this->model_competition_news->dataGrid($this->setPaginationGrid(), $this->setFilterGrid());
		echo json_encode($response);
	}
		
	public function simpan(){
        // die (json_encode(array('success' => false,'errorMsg' => 'cek swal')));
		$id     = $this->input->post('IDNEWS','');
		$title   = $this->input->post('TITLE');
		$status = $this->input->post('STATUS') ?? 0;

		$mode = $this->input->post('mode');
		if ($mode=='tambah') {
            
			$response = $this->model_competition_news->cek_valid_nama($title);
			if($response != ''){
				die(json_encode(array('errorMsg' => $response)));
			}
			
			$status = 1;
			$edit = false;
		}
		else{
			//jika edit
			//cek apakah nama sudah digunakan
			$response = $this->model_competition_news->cek_valid_nama($title,$id);
			if($response != ''){
				die(json_encode(array('errorMsg' => $response)));
            }
            
			$edit = true;
		}
		
		$data_values = array (
			'TITLE'    	      => $title,
			'DETAIL'       	  => $this->input->post('DETAIL')??"",
			'TGLTERBIT'       => $this->input->post('TGLTERBIT')??"",
			'CATATAN'         => $this->input->post('CATATAN')??"",
			'USERENTRY'       => $_SESSION[NAMAPROGRAM]['USERID'],
			'TGLENTRY'        => date("Y-m-d h:i:s"),
			'STATUS'          => $status
		);
		$response = $this->model_competition_news->simpan($id,$data_values,$edit);
		if (!is_numeric($response)){
			// generate an error... or use the log_message() function to log your error
			die(json_encode(array('errorMsg' => $response)));
		}
		
		// panggil fungsi untuk log history
		log_history(
			$response,
			'COMPETITION NEWS',
			$mode,
			array(
				array(
					'nama'  => 'header',
					'tabel' => 'TNEWS',
					'kode'  => 'IDNEWS'
				),
			),
			$_SESSION[NAMAPROGRAM]['USERID']
		);

		echo json_encode(array('success' => true,'errorMsg' => ''));
	}
	
	function hapus(){
		$id = $this->input->post('id');

		$exe = $this->model_competition_news->hapus($id);
		if ($exe != '') { die(json_encode(array('errorMsg'=>$exe))); }
		
		echo json_encode(array('success' => true));

		log_history(
			$id,
			'COMPETITION NEWS',
			'HAPUS',
			[],
			$_SESSION[NAMAPROGRAM]['USERID']
		);
	}
}
