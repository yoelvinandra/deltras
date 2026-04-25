<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['model_master_player']);
	}
	
	public function index(){
		$kodeMenu = $this->input->get('kode');
		// panggil set page di MY_Controller
		$this->setPage($kodeMenu, $config);
	}

	public function comboGrid() {
		$this->output->set_content_type('application/json');
		$response = $this->model_master_player->comboGrid();
		echo json_encode($response);
	}

	public function comboGridPlayer() {
		$this->output->set_content_type('application/json');
		$response = $this->model_master_player->comboGridPlayer();
		echo json_encode($response);
	}
	
	public function web() {
		$this->output->set_content_type('application/json');
		$response = $this->model_master_player->web($this->input->get("for"));
		echo json_encode($response);
	}

	public function dataGrid() {
		$this->output->set_content_type('application/json');
		$response = $this->model_master_player->dataGrid($this->setPaginationGrid(), $this->setFilterGrid());
		echo json_encode($response);
	}
		
	public function simpan(){
        // die (json_encode(array('success' => false,'errorMsg' => 'cek swal')));
		$id     	= $this->input->post('IDPLAYER','');
		$idclub 	= $this->input->post('IDCLUB','');
		$namadepan  = $this->input->post('NAMADEPAN','');
		$namabelakang   = $this->input->post('NAMABELAKANG','');
		$status 	= $this->input->post('STATUS') ?? 0;

		$mode = $this->input->post('mode');
		if ($mode=='tambah') {
            
			$response = $this->model_master_player->cek_valid_nama($namadepan,$namabelakang,$idclub);
			if($response != ''){
				die(json_encode(array('errorMsg' => $response)));
			}
			
			$status = 1;
			$edit = false;
		}
		else{
			//jika edit
			//cek apakah nama sudah digunakan
			$response = $this->model_master_player->cek_valid_nama($namadepan,$namabelakang,$idclub,$id);
			if($response != ''){
				die(json_encode(array('errorMsg' => $response)));
            }
            
			$edit = true;
		}
		
		$data_values = array (
			'IDCLUB'		  => $idclub,
			'GOAL'		  	  => $this->input->post('GOAL')??0,
			'ASSIST'		  => $this->input->post('ASSIST')??0,
			'GKSAVE'		  => $this->input->post('GKSAVE')??0,
			'TGLBERGABUNG'    => $this->input->post('TGLBERGABUNG')??"",
			'NAMADEPAN'       => $namadepan,
			'NAMABELAKANG'    => $namabelakang,
			'POSITION'        => $this->input->post('POSITION')??"",
			'SQUADNUMBER'     => $this->input->post('SQUADNUMBER')??"",
			'DESKRIPSI'       => $this->input->post('DESKRIPSI')??"",
			'ALAMAT'       	  => $this->input->post('ALAMAT')??"",
			'TELP'       	  => $this->input->post('TELP')??"",
			'EMAIL'       	  => $this->input->post('EMAIL')??"",
			'VIDEO'        	  => $this->input->post('VIDEO')??"",
			'FACEBOOK'        => $this->input->post('FACEBOOK')??"",
			'X'         	  => $this->input->post('X')??"",
			'INSTAGRAM'       => $this->input->post('INSTAGRAM')??"",
			'TIKTOK'          => $this->input->post('TIKTOK')??"",
			'CATATAN'         => $this->input->post('CATATAN')??"",
			'USERENTRY'       => $_SESSION[NAMAPROGRAM]['USERID'],
			'TGLENTRY'        => date("Y-m-d h:i:s"),
			'STATUS'          => $status
		);
		$response = $this->model_master_player->simpan($id,$data_values,$edit);
		if (!is_numeric($response)){
			// generate an error... or use the log_message() function to log your error
			die(json_encode(array('errorMsg' => $response)));
		}
		
		// panggil fungsi untuk log history
		log_history(
			$response,
			'MASTER PLAYER',
			$mode,
			array(
				array(
					'nama'  => 'header',
					'tabel' => 'MPLAYER',
					'kode'  => 'IDPLAYER',
					'id'	=> $response
				),
			),
			$_SESSION[NAMAPROGRAM]['USERID']
		);

		echo json_encode(array('success' => true,'errorMsg' => ''));
	}
	
	function hapus(){
		$id = $this->input->post('id');

		$exe = $this->model_master_player->hapus($id);
		if ($exe != '') { die(json_encode(array('errorMsg'=>$exe))); }
		
		echo json_encode(array('success' => true));

		log_history(
			$id,
			'MASTER PLAYER',
			'HAPUS',
			[],
			$_SESSION[NAMAPROGRAM]['USERID']
		);
	}

	function configTeam(){
		$this->output->set_content_type('application/json');
		$search = $this->input->get('search');

		$dataAll = $this->model_master_config->getConfigModul("TEAM");
		$dataResult = [];
		foreach($dataAll as $itemAll)
		{
			$arrData = explode(",",$itemAll->VALUE);
			foreach($arrData as $itemData)
			{
				array_push($dataResult, array(
					'TEXT' => $itemData,
					'VALUE' => $itemData, 
					'HEAD' => $itemAll->CONFIG
				));
			}
		}

		
		$data['rows'] = $dataResult;
		
		echo json_encode($data);
	}
}
