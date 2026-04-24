<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends MY_Controller {
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

	

	public function dataGridBanner() {
		$this->output->set_content_type('application/json');
		$response = $this->model_master_config->dataGridBanner($this->setPaginationGrid(), $this->setFilterGrid());
		echo json_encode($response);
	}

	public function dataGridTeam() {
		$this->output->set_content_type('application/json');
		$response = $this->model_master_config->dataGridTeam($this->setPaginationGrid(), $this->setFilterGrid());
		echo json_encode($response);
	}

	public function loadVideoBTS(){
		$this->output->set_content_type('application/json');
		$response = $this->model_master_config->loadVideoBTS($this->setPaginationGrid(), $this->setFilterGrid());
		echo json_encode($response);
	}

	public function loadNamaDanVideoFixture(){
		$this->output->set_content_type('application/json');
		$response = $this->model_master_config->loadNamaDanVideoFixture($this->setPaginationGrid(), $this->setFilterGrid());
		echo json_encode($response);
	}

	public function dataGridKlasemen() {
		$this->output->set_content_type('application/json');
		$response = $this->model_master_config->dataGridKlasemen($this->setPaginationGrid(), $this->setFilterGrid());
		echo json_encode($response);
	}
	
}
