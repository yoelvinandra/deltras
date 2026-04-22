<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['model_master_config']);
	}
	
	public function index(){
		$kodeMenu = $this->input->get('kode');
		// panggil set page di MY_Controller
		$this->setPage($kodeMenu, $config);
	}

	public function web() {
		$this->output->set_content_type('application/json');
		$response = $this->model_master_config->web($this->input->get("for"));
		echo json_encode($response);
	}
}
