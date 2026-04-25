<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_master_club extends MY_Model{

	public function getAll(){
		$data = $this->db->query("select * from MCLUB");
		return $data->result();
	}
	
	public function comboGrid($q){
		
		$sql = "select IDCLUB as VALUE, NAMA as TEXT,CONCAT('".base_url()."assets/images/club/',IDCLUB,'.png') as GAMBAR
				from MCLUB  
				WHERE NAMA like ?
				ORDER BY NAMA";
				
		$query = $this->db->queryRaw($sql, ["%".$q."%"]);	
		$data['rows'] = $query->result();
		return $data;
	}
	
	public function comboGridTransaksi(){	
		$sql = "select IDCLUB as ID,NAMA as NAMA
				from MCLUB  
				ORDER BY NAMA";
		$query = $this->db->query($sql);	
		$data['rows'] = $query->result();
		return $data;
	}

	public function dataGrid(){
		
		$data = [];

		$sql = "select c.USERNAME as USERBUAT, a.*
				from MCLUB a
				left join MUSER c on a.USERENTRY = c.USERID
				ORDER BY a.NAMA";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();

		return $data;
	}
		
	function simpan($id,$data,$edit){
		$this->db->trans_begin();
		
		if($edit){
			$this->db->where("IDCLUB",$id);
			$this->db->updateRaw('MCLUB',$data);
			
		}else{
			$this->db->insertRaw('MCLUB',$data);
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
			$config['upload_path']   = './assets/images/club/';
			$config['allowed_types'] = 'png';
			$config['file_ext_tolower'] = TRUE;
			$config['max_size']      = 300; // KB (opsional)
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
		
		if(checkSudahAdaPertandingan($id) == 1)
		{
		    return 'Data Club Tidak Dapat Dihapus, Club Sudah Ada Player atau Melakukan Fixture'; 
		}
		
		$path = FCPATH . 'assets/images/club/' . $id.'.png';

		if (file_exists($path)) {
			unlink($path); // 🔥 hapus file
		}

		$this->db->where('IDCLUB',$id)
				->delete('MCLUB');
		if ($this->db->trans_status() === FALSE) { 
			$this->trans_rollback();
			return 'Data Club tidak dapat dihapus'; 
		}
		
		$this->db->trans_commit();
		return '';
	}
	
	function cek_valid_nama($nama,$id=""){
		$sql = "select NAMA 
				from MCLUB a
				where UPPER(a.NAMA) = UPPER(?)
				and a.IDCLUB != ?";
		$query = $this->db->query($sql, [$nama,$id])->row();
		if(isset($query)){
			return 'Nama Club sudah ada';
		}else{
			return '';
		}
	}
}
?>