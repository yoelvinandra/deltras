<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_competition_fixture extends MY_Model{

	public function getAll(){
		$data = $this->db->query("select * from TFIXTURE");
		return $data->result();
	}
	
	public function comboGrid($q){
		
		$sql = "select IDFIXTURE as VALUE, NAMA as TEXT
				from TFIXTURE  
				WHERE NAMA like ?
				ORDER BY SEASON DESC";
				
		$query = $this->db->query($sql, ["%".$q."%"]);	
		$data['rows'] = $query->result();
		return $data;
	}
	
	public function comboGridTransaksi(){	
		$sql = "select IDFIXTURE as ID,NAMA as NAMA
				from TFIXTURE  
				ORDER BY SEASON DESC";
		$query = $this->db->query($sql);	
		$data['rows'] = $query->result();
		return $data;
	}

	public function dataGrid(){
		
		$data = [];

		$sql = "select c.USERNAME as USERBUAT, a.*
				from TFIXTURE a
				left join MUSER c on a.USERENTRY = c.USERID
				ORDER BY a.SEASON DESC";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();

		return $data;
	}

	public function dataGridDetail($id=0){
		
		$data = [];

		$sql = "select c.USERNAME as USERBUAT, a.*
				from TFIXTUREDTL a
				left join MUSER c on a.USERENTRY = c.USERID
				where a.IDFIXTURE = $id
				ORDER BY a.TGLFIXTURE DESC";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();

		return $data;
	}
		
	function simpan($id,$data,$a_detail,$edit){
		$this->db->trans_begin();
		
		if($edit){
			$this->db->where("IDFIXTURE",$id);
			$this->db->updateRaw('TFIXTURE',$data);
			
		}else{
			$this->db->insertRaw('TFIXTURE',$data);
		}
		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return 'Gagal menyimpan pada database';
		}
		if (!$edit) {
			//mengambil auto increment
			$id = $this->db->insert_id();
		}

		// query detail
		foreach ($a_detail as $item) {
            
            $data_values = array (
                'IDFIXTURE'  		=> $id,
                'IDCLUB1'   		=> $item->idclub1,
                'IDCLUB2' 			=> $item->idclub2,
                'SKORCLUB1' 		=> $item->skorclub1,
                'SKORCLUB2' 		=> $item->skorclub2,
                'TGLFIXTURE'		=> $item->tglfixture,
                'VIDEO'				=> $item->video,
                'VIDEOHIGHLIGHT'	=> $item->videohighlight,
                'LOKASI'			=> $item->lokasi,
                'LAT'				=> $item->lat??0,
                'LNG'				=> $item->lng??0,
                'TGLENTRY'			=> $data['TGLENTRY'],
                'USERENTRY'			=> $data['USERENTRY'],
                'CATATAN'			=> $item->catatan,
                'STATUS'			=> $item->status,
            );
			
            $this->db->insertRaw('TFIXTUREDTL',$data_values);
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return 'Simpan Data Gagal <br>Kesalahan Pada Detail Fixture';
            }
		}
		
		$this->db->trans_commit();
		return $id;
	}
	
	function hapus($id){
		$this->db->trans_begin();

		$this->db->where('IDFIXTURE',$id)
				->delete('TFIXTURE');
		$this->db->where('IDFIXTURE',$id)
				->delete('TFIXTUREDTL');

		if ($this->db->trans_status() === FALSE) { 
			$this->trans_rollback();
			return 'Data Fixture tidak dapat dihapus'; 
		}
		
		$this->db->trans_commit();
		return '';
	}
	
	function cek_valid_nama($nama,$id=""){
		$sql = "select a.NAMA 
				from TFIXTURE a
				where UPPER(a.NAMA) = UPPER(?)
				and a.IDFIXTURE != ?";
		$query = $this->db->query($sql, [$nama,$id])->row();
		if(isset($query)){
			return 'Nama Fixture sudah ada';
		}else{
			return '';
		}
	}
}
?>