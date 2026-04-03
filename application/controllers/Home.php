<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model(array("model_master_config"));
	}
	
	public function index($jenisLaporan = "index")
	{
		if(isset($_SESSION[NAMAPROGRAM]['user'])){
			$this->load->view('header',$text);
			$this->load->view('v_menuawal');
			$this->load->view('footer');
		}
		else if($jenisLaporan == "login"){
			
			$result = $this->model_master_config->getConfigModul('GLOBAL');

			foreach($result as $itemResult)
			{
				$_SESSION[NAMAPROGRAM][$itemResult->CONFIG] = $itemResult->VALUE;
			}

			$this->load->view('auth/login');
		}
		else {
            $this->load->view('header_web');
			$this->load->view('web/'.$jenisLaporan,$this->input->get());
			$this->load->view('footer_web');
		}
	}
	
}
