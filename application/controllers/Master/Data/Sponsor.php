<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsor extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['model_master_sponsor']);
	}
	
	public function index(){
		$kodeMenu = $this->input->get('kode');
		// panggil set page di MY_Controller
		$this->setPage($kodeMenu, $config);
	}

	public function comboGrid() {
		$this->output->set_content_type('application/json');
		$response = $this->model_master_sponsor->comboGrid($this->input->get('search'));
		echo json_encode($response);
	}
	
	public function comboGridTransaksi() {
		$this->output->set_content_type('application/json');
		$response = $this->model_master_sponsor->comboGridTransaksi($this->setPaginationGrid());
		echo json_encode($response);
	}

	public function dataGrid() {
		$this->output->set_content_type('application/json');
		$response = $this->model_master_sponsor->dataGrid($this->setPaginationGrid(), $this->setFilterGrid());
		echo json_encode($response);
	}
		
	public function simpan(){
        // die (json_encode(array('success' => false,'errorMsg' => 'cek swal')));
		$id     = $this->input->post('IDSPONSOR','');
		$nama   = $this->input->post('NAMA');
		$status = $this->input->post('STATUS') ?? 0;

		$mode = $this->input->post('mode');
		if ($mode=='tambah') {
            
			$response = $this->model_master_sponsor->cek_valid_nama($nama);
			if($response != ''){
				die(json_encode(array('errorMsg' => $response)));
			}
			
			$status = 1;
			$edit = false;
		}
		else{
			//jika edit
			//cek apakah nama sudah digunakan
			$response = $this->model_master_sponsor->cek_valid_nama($nama,$id);
			if($response != ''){
				die(json_encode(array('errorMsg' => $response)));
            }
            
			$edit = true;
		}
		
		$data_values = array (
			'NAMA'    	      => $this->input->post('NAMA')??"",
			'TGLBERGABUNG'    => $this->input->post('TGLBERGABUNG')??"",
			'DESKRIPSI'       => $this->input->post('DESKRIPSI')??"",
			'ALAMAT'          => $this->input->post('ALAMAT')??"",
			'TELP'            => $this->input->post('TELP')??"",
			'EMAIL'           => $this->input->post('EMAIL')??"",
			'WEBSITE'         => $this->input->post('WEBSITE')??"",
			'CP'         	  => $this->input->post('CP')??"",
			'TELPCP'          => $this->input->post('TELPCP')??"",
			'EMAILCP'         => $this->input->post('EMAILCP')??"",
			'CATATAN'         => $this->input->post('CATATAN')??"",
			'USERENTRY'       => $_SESSION[NAMAPROGRAM]['USERID'],
			'TGLENTRY'        => date("Y-m-d h:i:s"),
			'STATUS'          => $status
		);
		$response = $this->model_master_sponsor->simpan($id,$data_values,$edit);
		if (!is_numeric($response)){
			// generate an error... or use the log_message() function to log your error
			die(json_encode(array('errorMsg' => $response)));
		}
		
		// panggil fungsi untuk log history
		log_history(
			$response,
			'MASTER SPONSOR',
			$mode,
			array(
				array(
					'nama'  => 'header',
					'tabel' => 'MSPONSOR',
					'id'  => 'IDSPONSOR'
				),
			),
			$_SESSION[NAMAPROGRAM]['USERID']
		);

		echo json_encode(array('success' => true,'errorMsg' => ''));
	}
	
	function hapus(){
		$id = $this->input->post('id');

		$exe = $this->model_master_sponsor->hapus($id);
		if ($exe != '') { die(json_encode(array('errorMsg'=>$exe))); }
		
		echo json_encode(array('success' => true));

		log_history(
			$id,
			'MASTER SPONSOR',
			'HAPUS',
			[],
			$_SESSION[NAMAPROGRAM]['USERID']
		);
	}
}
