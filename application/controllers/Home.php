<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function index($jenisLaporan = "index")
	{
	    if (isset($_SESSION[NAMAPROGRAM]['user']) && $jenisLaporan == "transaksi") {
		    //$text['label'] = saveStokCLS(date("Y-m-d"));
		  
			$this->load->view('header',$text);
			$aMenu = isset($_SESSION[NAMAPROGRAM]['array_menu']) ? json_decode($_SESSION[NAMAPROGRAM]['array_menu']) : array();
		    if($aMenu[0]->kodemenu == "D0001")
		    { 
			    $this->load->view('v_dashboard');
		    }
		    else
		    {
 			    $this->load->view('v_menuawal');
		    }
			$this->load->view('footer');
		} 
		else if(isset($_SESSION[NAMAPROGRAM]['user']) && $jenisLaporan == "laporan"){
		    //$text['label'] = saveStokCLS(date("Y-m-d"));
			$this->load->view('header',$text);
			$this->load->view('v_laporan');
			$this->load->view('footer');
		}
		else {
            $this->load->view('header_web');
			$this->load->view('web/'.$jenisLaporan,$this->input->get());
			$this->load->view('footer_web');
		}
	}
	
}
