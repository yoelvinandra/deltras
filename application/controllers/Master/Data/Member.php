<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['model_master_member']);
	}
	
	public function index(){
		$kodeMenu = $this->input->get('kode');
		// panggil set page di MY_Controller
		$this->setPage($kodeMenu, $config);
	}
	
	public function web() {
		$this->output->set_content_type('application/json');
		$response = $this->model_master_member->web($this->input->get("for"));
		echo json_encode($response);
	}

	public function loginWeb() {
		$email = $this->input->post("EMAIL","");
		$password = $this->input->post("PASSWORD","");
		$response = $this->model_master_member->loginWeb($email,$password);
		if ($response != ""){
			// generate an error... or use the log_message() function to log your error
			die(json_encode(array('errorMsg' => $response)));
		}
		else
		{
			echo json_encode(array('success' => true,'errorMsg' => ''));
		}
	}

	public function getKonfirmasiWeb() {
		$this->output->set_content_type('application/json');
		$id = decryptMember($this->input->post("i"));
	
		if(is_numeric($id))
		{
			$response = $this->model_master_member->getKonfirmasiWeb($id);
			if(empty($response))
			{
				$response['success'] = false;
				$response['errorMsg'] = "Link tidak valid";
			}
			else
			{
				$response->success = true;
			}
		}
		else
		{
			$response['success'] = false;
			$response['errorMsg'] = $id;

		}
		echo json_encode($response);
	}

	public function dataGrid() {
		$this->output->set_content_type('application/json');
		$response = $this->model_master_member->dataGrid($this->setPaginationGrid(), $this->setFilterGrid());
		echo json_encode($response);
	}
		
	public function simpan(){
        // die (json_encode(array('success' => false,'errorMsg' => 'cek swal')));
		$id     	= $this->input->post('IDMEMBER','');
		$namadepan  = $this->input->post('NAMADEPAN','');
		$namabelakang   = $this->input->post('NAMABELAKANG','');
		$status 	= $this->input->post('STATUS') ?? 0;

		$mode = $this->input->post('mode');
		if ($mode=='tambah') {
			$response = $this->model_master_member->cek_valid_email($this->input->post('EMAIL'),$id);
			if($response != ''){
				die(json_encode(array('errorMsg' => $response)));
			}
			$status = 1;
			$edit = false;
		}
		else{
			$response = $this->model_master_member->cek_valid_email($this->input->post('EMAIL'),$id);
			if($response != ''){
				die(json_encode(array('errorMsg' => $response)));
			}
			$edit = true;
		}
		
		$data_values = array (
			'DARI'    	      => $this->input->post('from')??"",
			'TGLLAHIR'    	  => $this->input->post('TGLLAHIR')??"",
			'NIK'    	  	  => $this->input->post('NIK')??"",
			'NAMADEPAN'       => $namadepan,
			'NAMABELAKANG'    => $namabelakang,
			'ALAMAT'       	  => $this->input->post('ALAMAT')??"",
			'TELP'       	  => $this->input->post('TELP')??"",
			'TELPDARURAT'     => $this->input->post('TELPDARURAT')??"",
			'EMAIL'       	  => $this->input->post('EMAIL')??"",
			'INSTAGRAM'       => $this->input->post('INSTAGRAM')??"",
			'TIKTOK'          => $this->input->post('TIKTOK')??"",
			'CATATAN'         => $this->input->post('CATATAN')??"",
			'USERENTRY'       => $this->input->post('from') == "USER"? "-" : $_SESSION[NAMAPROGRAM]['USERID'],
			'TGLENTRY'        => date("Y-m-d h:i:s"),
			'STATUS'          => $status
		);

		if($mode == "tambah"){
			$data_values['KODEUNIK'] = generateKodeUnik();
			$data_values['PASSWORD'] = md5($data_values['KODEUNIK']);
		}

		$response = $this->model_master_member->simpan($id,$data_values,$edit);
	
		if (!is_numeric($response)){
			// generate an error... or use the log_message() function to log your error
			die(json_encode(array('errorMsg' => $response)));
		}
		
		// panggil fungsi untuk log history
		log_history(
			$response,
			'MASTER MEMBER',
			$mode,
			array(
				array(
					'nama'  => 'header',
					'tabel' => 'MMEMBER',
					'kode'  => 'IDMEMBER',
					'id'	=> $response
				),
			),
			$_SESSION[NAMAPROGRAM]['USERID']
		);

		echo json_encode(array('success' => true,'errorMsg' => '','idweb'=>encryptMember($response)));
	}
	
	function hapus(){
		$id = $this->input->post('id');

		$exe = $this->model_master_member->hapus($id);
		if ($exe != '') { die(json_encode(array('errorMsg'=>$exe))); }
		
		echo json_encode(array('success' => true));

		log_history(
			$id,
			'MASTER MEMBER',
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
