<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_competition_news extends MY_Model{

	public function getAll(){
		$data = $this->db->query("select * from TNEWS");
		return $data->result();
	}
	
	public function comboGrid($q){
		
		$sql = "select IDNEWS as VALUE, TITLE as TEXT
				from TNEWS  
				WHERE TITLE like ?
				ORDER BY TGLTERBIT DESC";
				
		$query = $this->db->query($sql, ["%".$q."%"]);	
		$data['rows'] = $query->result();
		return $data;
	}
	
	public function web($for){	

		$sql = "select IDNEWS, TITLE,KATEGORI,DETAIL,TGLTERBIT,MUSER.USERNAME,, CONCAT('".base_url()."assets/images/news/',IDNEWS,'.png') as GAMBAR
				from TNEWS  
				INNER JOIN MUSER on MUSER.IDUSER = TNEWS.USERENTRY
				WHERE TNEWS.STATUS = 1
				ORDER BY TGLTERBIT DESC";
		$query = $this->db->queryRaw($sql);	
		$data['base'] = $query->result();

		$data['rows'] = [];

		if($for == "HOME")
		{
			$sqlConfig = "select VALUE
				from MCONFIG  
				WHERE MODUL = 'TEAM' AND SUBSTRING_INDEX(CONFIG, '-', 1) = 'SENIOR TEAM' ";
			$queryConfig = $this->db->queryRaw($sqlConfig);	
			$dataConfig = $queryConfig->result();

			foreach($dataConfig as $itemConfig){
				$dataPosition = explode(",",$itemConfig->VALUE);
				foreach($dataPosition as $itemPosition){
					foreach($data['base'] as $item)
					{
						if($itemPosition == $item->POSITION)
						{
							array_push($data['rows'],$item);
						}
					}
				}
			}
		}
		else if($for == "PLAYER")
		{
			$getGroupTab = [];
			$sqlConfig = "select SUBSTRING_INDEX(CONFIG, '-', 1) as TAB, SUBSTRING_INDEX(CONFIG, '-', -1) as HEADER, VALUE
				from MCONFIG  
				WHERE MODUL = 'TEAM' 
                ORDER BY  PREFIX,SUBSTRING_INDEX(CONFIG, '-', 1) , JUMLAHDIGIT";
			$queryConfig = $this->db->queryRaw($sqlConfig);	
			$dataConfig = $queryConfig->result();

			foreach($dataConfig as $itemConfig){
				$ada = false;
				foreach($getGroupTab as $itemGetGroupTab)
				{
					if($itemConfig->TAB == $itemGetGroupTab)
					{
						$ada = true;
					}
				}
				if(!$ada){
					array_push($getGroupTab,$itemConfig->TAB);
				}
			}

			foreach($getGroupTab as $itemGetGroupTab){
				$detail = [];
				foreach($dataConfig as $itemConfig){
					if($itemGetGroupTab == $itemConfig->TAB)
					{
						$dataPosition = explode(",",$itemConfig->VALUE);
						$subHeader = [];
						foreach($dataPosition as $itemPosition){
							$subHeader['SUBHEADER'] = $itemPosition;
							$subHeader["PLAYER"] = [];
							foreach($data['base'] as $item)
							{
								if($itemPosition == $item->POSITION)
								{
									array_push($subHeader["PLAYER"],$item);
								}
							}
							unset($itemConfig->VALUE);
							unset($itemConfig->TAB);
						}
						$itemConfig = (array)$itemConfig; // convert object to array
						$itemConfig = array_merge($itemConfig, $subHeader);
						array_push($detail, $itemConfig);
					}
				}
				
				array_push($data['rows'],array(
					'TAB' => $itemGetGroupTab,
					'DATA' => $detail
				));
			}
		}
		unset($data['base']);
		return $data;
	}

	public function dataGrid(){
		
		$data = [];

		$sql = "select c.USERNAME as USERBUAT, a.*
				from TNEWS a
				left join MUSER c on a.USERENTRY = c.USERID
				ORDER BY a.TGLTERBIT DESC";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();

		return $data;
	}
		
	function simpan($id,$data,$edit){
		$this->db->trans_begin();
		
		if($edit){
			$this->db->where("IDNEWS",$id);
			$this->db->updateRaw('TNEWS',$data);
			
		}else{
			$this->db->insertRaw('TNEWS',$data);
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
			$config['upload_path']   = './assets/images/news/';
			$config['allowed_types'] = 'png';
			$config['file_ext_tolower'] = TRUE;
			$config['max_size']      = 1000; // KB (opsional)
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
		
		$path = FCPATH . 'assets/images/news/' . $id.'.png';

		if (file_exists($path)) {
			unlink($path); // 🔥 hapus file
		}

		$this->db->where('IDNEWS',$id)
				->delete('TNEWS');
		if ($this->db->trans_status() === FALSE) { 
			$this->trans_rollback();
			return 'Data News tidak dapat dihapus'; 
		}
		
		$this->db->trans_commit();
		return '';
	}
	
	function cek_valid_nama($title,$id=""){
		$sql = "select TITLE 
				from TNEWS a
				where UPPER(a.TITLE) = UPPER(?)
				and a.IDNEWS != ?";
		$query = $this->db->query($sql, [$title,$id])->row();
		if(isset($query)){
			return 'Judul News sudah ada';
		}else{
			return '';
		}
	}
}
?>