<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_master_player extends MY_Model{

	public function getAll(){
		$data = $this->db->query("select * from MPLAYER");
		return $data->result();
	}
	
	public function comboGrid(){
		
		$sql = "select IDPLAYER as VALUE, CONCAT(NAMADEPAN,' ',NAMABELAKANG) as TEXT,POSITION,SQUADNUMBER,GOAL,ASSIST,GKSAVE
				from MPLAYER  
				ORDER BY NAMADEPAN";
		$query = $this->db->queryRaw($sql);	
		$data['rows'] = $query->result();
		return $data;
	}

	public function comboGridPlayer(){
		
		$sqlConfig = "select VALUE
			from MCONFIG  
			WHERE MODUL = 'TEAM' AND SUBSTRING_INDEX(CONFIG, '-', 1) = 'SENIOR TEAM' ";
		$queryConfig = $this->db->queryRaw($sqlConfig);	
		$dataConfig = $queryConfig->result();

		$in_team = "";
		
		foreach($dataConfig as $itemConfig){
			$dataPosition = explode(",",$itemConfig->VALUE);
			foreach($dataPosition as $itemPosition){
				if($in_team != "")
				{
					$in_team .= ",";
				}
				$in_team .= ("'".$itemPosition."'"); 
			}
		}

		$sql = "select IDPLAYER as VALUE, CONCAT(NAMADEPAN,' ',NAMABELAKANG) as TEXT,POSITION,SQUADNUMBER,GOAL,ASSIST,GKSAVE, CONCAT('".base_url()."assets/images/player/',IDPLAYER,'.png') as GAMBAR
				from MPLAYER  
				where POSITION in ($in_team)
				ORDER BY NAMADEPAN";
			
		$query = $this->db->queryRaw($sql);	
		$data['rows'] = $query->result();
		return $data;
	}
	
	public function web($for){	

		$sql = "select IDPLAYER as ID,CONCAT(NAMADEPAN,' ',NAMABELAKANG) as NAMA, GOAL, ASSIST, GKSAVE, POSITION, SQUADNUMBER, CONCAT('".base_url()."assets/images/player/',IDPLAYER,'.png') as GAMBAR
				from MPLAYER  
				WHERE STATUS = 1
				ORDER BY NAMADEPAN";
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

			$data['senior_team'] = [];
			
			foreach($dataConfig as $itemConfig){
				$dataPosition = explode(",",$itemConfig->VALUE);
				foreach($dataPosition as $itemPosition){
					foreach($data['base'] as $item)
					{
						if($itemPosition == $item->POSITION)
						{
							array_push($data['senior_team'],$item);
						}
					}
				}
			}

			//CEK DATA APA AJA YANG BOLEH MUNCUL
			$sqlConfig = "select VALUE
				from MCONFIG  
				WHERE MODUL = 'TEAM' AND CONFIG = 'IDPLAYER' ";
			$queryConfig = $this->db->queryRaw($sqlConfig);	
			$dataConfig = $queryConfig->result();

			foreach($dataConfig as $itemConfig){
				$dataPlayerConfig = explode(",",$itemConfig->VALUE);
				
				foreach($dataPlayerConfig as $itemPlayerConfig){
					for($x = 0 ; $x < count($data['senior_team']) ; $x++)
					{
					$player = $data['senior_team'][$x];
						if($itemPlayerConfig == $player->ID)
						{
							array_push($data['rows'],$player);
						}
					}
				}
			}

			unset($data['senior_team']);
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
						$player = [];
						foreach($dataPosition as $itemPosition){
							foreach($data['base'] as $item)
							{
								if($itemPosition == $item->POSITION)
								{
									array_push($player,$item);
								}
							}
							unset($itemConfig->VALUE);
							unset($itemConfig->TAB);
						}
						$itemConfig->PLAYER = $player;
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

		$sql = "select c.USERNAME as USERBUAT, a.*,b.NAMA as CLUB, CONCAT(NAMADEPAN,' ',NAMABELAKANG) as NAMA
				from MPLAYER a
				join MCLUB b on a.IDCLUB = b.IDCLUB
				left join MUSER c on a.USERENTRY = c.USERID
				ORDER BY a.NAMADEPAN";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();

		return $data;
	}
		
	function simpan($id,$data,$edit){
		$this->db->trans_begin();
		
		if($edit){
			$this->db->where("IDPLAYER",$id);
			$this->db->updateRaw('MPLAYER',$data);
			
		}else{
			$this->db->insertRaw('MPLAYER',$data);
		}
		
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return 'Gagal menyimpan pada database';
		}
		if (!$edit) {
			//mengambil auto increment
			$id = $this->db->insert_id();
		}

    	$this->load->library('upload');

		//GAMBAR
		if ((!empty($_FILES['GAMBAR']['name']) && $edit) || !$edit) {
			$config['upload_path']   = './assets/images/player/';
			$config['allowed_types'] = 'png';
			$config['file_ext_tolower'] = TRUE;
			$config['max_size']      = 1000; // KB (opsional)
			$config['file_name'] = $id;
    		$config['overwrite']     = TRUE; // 🔥 ini kuncinya

    		$this->upload->initialize($config); // 🔥 PENTING

			if (!$this->upload->do_upload('GAMBAR')) {
				$this->db->trans_rollback();
				return $this->upload->display_errors();
			}
		}
		
		//UNTUK CHECK DATA UPLOAD YANG TERSIMPAN
		//$data = $this->upload->data();
		//GAMBAR

		//SIGN
		if (!empty($_FILES['SIGN']['name'])) {
			$config['upload_path']   = './assets/images/player/';
			$config['allowed_types'] = 'png';
			$config['file_ext_tolower'] = TRUE;
			$config['max_size']      = 1000; // KB (opsional)
			$config['file_name'] = $id."-sign";
    		$config['overwrite']     = TRUE; // 🔥 ini kuncinya

    		$this->upload->initialize($config); // 🔥 PENTING

			if (!$this->upload->do_upload('SIGN')) {
				$this->db->trans_rollback();
				return $this->upload->display_errors();
			}
		}
		//SIGN
		
		$this->db->trans_commit();
		return $id;
	}
	
	function hapus($id){
		$this->db->trans_begin();
		
		$path = FCPATH . 'assets/images/player/' . $id.'.png';

		if (file_exists($path)) {
			unlink($path); // 🔥 hapus file
		}

		$path = FCPATH . 'assets/images/player/' . $id.'-sign.png';

		if (file_exists($path)) {
			unlink($path); // 🔥 hapus file
		}

		$this->db->where('IDPLAYER',$id)
				->delete('MPLAYER');
		if ($this->db->trans_status() === FALSE) { 
			$this->trans_rollback();
			return 'Data Player Tidak Dapat Dihapus'; 
		}
		
		$this->db->trans_commit();
		return '';
	}
	
	function cek_valid_nama($NAMADEPAN,$NAMABELAKANG,$idclub,$id=""){
		$sql = "select * 
				from MPLAYER a
				where UPPER(a.NAMADEPAN) = UPPER(?)
				and UPPER(a.NAMABELAKANG) = UPPER(?)
				and a.IDCLUB = ?
				and a.IDPLAYER != ?";
		$query = $this->db->query($sql, [$NAMADEPAN,$NAMABELAKANG,$idclub,$id])->row();
		if(isset($query)){
			return 'Nama Player Sudah Ada di Club yang sama ';
		}else{
			return '';
		}
	}
}
?>