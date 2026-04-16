<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model(array("model_master_config", "model_competition_news"));
	}
	
	public function index($jenisLaporan = "index")
	{
		if(isset($_SESSION[NAMAPROGRAM]['user']) && $jenisLaporan == "admin"){
			$this->load->view('header',$text);
			$this->load->view('v_menuawal');
			$this->load->view('footer');
		}
		else if($jenisLaporan == "admin"){
			
			$result = $this->model_master_config->getConfigModul('GLOBAL');

			foreach($result as $itemResult)
			{
				$_SESSION[NAMAPROGRAM][$itemResult->CONFIG] = $itemResult->VALUE;
			}

			$this->load->view('auth/login');
		}
		else {
			$data = $this->input->get();
			if(explode("?",$jenisLaporan)[0] == "news-detail")
			{	
				$data['og'] = $this->model_competition_news->web('META',0,"","",$this->input->get("i"))['rows'][0];
			}
            $this->load->view('header_web');
			$this->load->view('web/'.$jenisLaporan,$data);
			$this->load->view('footer_web');
		}
	}
	
}
