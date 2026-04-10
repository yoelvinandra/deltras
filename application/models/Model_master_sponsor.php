<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_master_sponsor extends MY_Model{

	public function getAll(){
		$data = $this->db->query("select * from MSPONSOR");
		return $data->result();
	}
	
	public function comboGrid($q){
		
		$sql = "select IDSPONSOR as VALUE, NAMA as TEXT
				from MSPONSOR  
				WHERE NAMA like ?
				ORDER BY NAMA";
				
		$query = $this->db->query($sql, ["%".$q."%"]);	
		$data['rows'] = $query->result();
		return $data;
	}

	public function web($for){	

		$sql = "select IDSPONSOR, NAMA, CONCAT('".base_url()."assets/images/sponsor/',IDSPONSOR,'.png') as GAMBAR
				from MSPONSOR  
				WHERE STATUS = 1";
		$query = $this->db->queryRaw($sql);	
		$data['base'] = $query->result();

		$data['rows'] = [];

		if($for == "HOME")
		{
			$sqlConfig = "select VALUE
				from MCONFIG  
				WHERE MODUL = 'SPONSOR' AND CONFIG = 'IDSPONSOR'";
			$queryConfig = $this->db->queryRaw($sqlConfig);	
			$dataConfig = $queryConfig->result();

			foreach($dataConfig as $itemConfig){
				$dataSponsor = explode(",",$itemConfig->VALUE);
				foreach($dataSponsor as $itemSponsor){
					foreach($data['base'] as $item)
					{
						if($itemSponsor == $item->IDSPONSOR)
						{
							array_push($data['rows'],$item);
						}
					}
				}
			}
		}
		unset($data['base']);
		return $data;
	}
	
	public function comboGridTransaksi(){	
		$sql = "select IDSPONSOR as ID,NAMA as NAMA
				from MSPONSOR  
				ORDER BY NAMA";
		$query = $this->db->query($sql);	
		$data['rows'] = $query->result();
		return $data;
	}

	public function dataGrid(){
		
		$data = [];

		$sql = "select c.USERNAME as USERBUAT, a.*
				from MSPONSOR a
				left join MUSER c on a.USERENTRY = c.USERID
				ORDER BY a.NAMA";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();

		return $data;
	}
		
	function simpan($id,$data,$edit){
		$this->db->trans_begin();
		
		if($edit){
			$this->db->where("IDSPONSOR",$id);
			$this->db->updateRaw('MSPONSOR',$data);
			
		}else{
			$this->db->insertRaw('MSPONSOR',$data);
		}
		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return 'Gagal menyimpan pada database';
		}
		if (!$edit) {
			//mengambil auto increment
			$id = $this->db->insert_id();
		}

		//GAMBAR
		if ((!empty($_FILES['GAMBAR']['name']) && $edit) || !$edit) {
			$config['upload_path']   = './assets/images/sponsor/';
			$config['allowed_types'] = 'png';
			$config['file_ext_tolower'] = TRUE;
			$config['max_size']      = 500; // KB (opsional)
			$config['file_name'] = $id;
    		$config['overwrite']     = TRUE; // 🔥 ini kuncinya

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('GAMBAR')) {
				$this->db->trans_rollback();
				return $this->upload->display_errors();
			}
		}
		
		//UNTUK CHECK DATA UPLOAD YANG TERSIMPAN
		//$data = $this->upload->data();
		//GAMBAR
		
		$this->db->trans_commit();
		return $id;
	}
	
	function hapus($id){
		$this->db->trans_begin();
		
		$path = FCPATH . 'assets/images/sponsor/' . $id.'.png';

		if (file_exists($path)) {
			unlink($path); // 🔥 hapus file
		}

		$this->db->where('IDSPONSOR',$id)
				->delete('MSPONSOR');
		if ($this->db->trans_status() === FALSE) { 
			$this->trans_rollback();
			return 'Data Sponsor tidak dapat dihapus'; 
		}
		
		$this->db->trans_commit();
		return '';
	}
	
	function cek_valid_nama($nama,$id=""){
		$sql = "select NAMA 
				from MSPONSOR a
				where UPPER(a.NAMA) = ?
				and a.IDSPONSOR != ?";
		$query = $this->db->query($sql, [$nama,$id])->row();
		if(isset($query)){
			return 'Nama Sponsor sudah ada';
		}else{
			return '';
		}
	}
}
?>