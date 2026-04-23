<?php
class Model_master_config extends CI_Model{
	public $maindb;
	public function __construct()
	{
		$this->maindb = $this->load->database('default',true);	
	}

	public function web($for){
		if($for == "HOME"){
			//BANNERSLIDE
			$sqlConfig = "select VALUE,PREFIX
				from MCONFIG  
				WHERE MODUL = 'HOME' AND CONFIG = 'URLBANNERSLIDE' 
				ORDER BY PREFIX";
			$queryConfig = $this->db->queryRaw($sqlConfig);	
			$data['rows']['BANNER'] = $queryConfig->result();

			//VIDEO BTS
			$sqlConfig = "select VALUE
				from MCONFIG  
				WHERE MODUL = 'HOME' AND CONFIG = 'URLVIDEOBTS' 
				ORDER BY PREFIX";
			$queryConfig = $this->db->queryRaw($sqlConfig);	
			$data['rows']['URLBTS'] = $queryConfig->row();

			//CONTACT DATA
			$sqlConfig = "select CONFIG,VALUE,IFNULL(PREFIX,'') as PREFIX
				from MCONFIG  
				WHERE MODUL = 'HOME' AND CONFIG in ('ALAMAT','TELP','EMAIL','INSTAGRAM','TIKTOK','YOUTUBE')";
			$queryConfig = $this->db->queryRaw($sqlConfig);	
			$data['rows']['CONTACT'] = $queryConfig->result();

			//MEMBER CONTACT DATA
			$sqlConfig = "select CONFIG,VALUE,IFNULL(PREFIX,'') as PREFIX
				from MCONFIG  
				WHERE MODUL = 'HOME' AND CONFIG like '%MEMBER-%'";
			$queryConfig = $this->db->queryRaw($sqlConfig);	
			$data['rows']['MEMBERCONTACT'] = $queryConfig->result();
		}
		return $data;
	}
    
	public function getConfig($modul,$conf){
		return $this->maindb
					->where('MODUL',$modul)
					->where('CONFIG',$conf)
					->get('MCONFIG')->row()->VALUE;
	}
	
	public function getConfigAll($modul,$conf){
		return $this->maindb
					->where('MODUL',$modul)
					->where('CONFIG',$conf)
					->get('MCONFIG')->row();
	}

	public function getConfigModul($modul){
		return $this->maindb
					->where('MODUL',$modul)
					->get('MCONFIG')->result();
	}
	
	public function setConfig($conf,$val){
	    $q = $this->maindb->where('CONFIG',$conf)
						->get('MCONFIG');

	    if ( $q->num_rows() > 0 ){
		    $this->maindb->set('VALUE', $val)
						->where('CONFIG', $conf)
						->update('MCONFIG');
	    } else {
			$data = array(
					'CONFIG'       => $conf,
					'VALUE'        => $val
			);
		    $this->maindb->insert('MCONFIG',$data);
	    }
		return true;
	}
	
	function getAkses($kodemenu){
		if ($_SESSION[NAMAPROGRAM]['USERID'] === 'VISION') {
            return array('TAMBAH' => 1, 'UBAH' => 1, 'HAPUS' => 1, 'OTORISASI' => 1, 'TAMPILGRANDTOTAL' => 1, 'PRINTULANG' => 1, 'BLOKIR' => 1,'INPUTHARGA' => 1,'LIHATHARGA' => 1);
        }
		$query = $this->maindb->from('MUSERAKSES a')
					->join('MMENU b','a.KODEMENU = b.KODEMENU','left')
					->where('b.KODEMENU', $kodemenu)
					->where('b.STATUS', 1)
					->where('a.IDUSER', $_SESSION[NAMAPROGRAM]['IDUSER'])
					->get()->row_array();
		return $query;
	}

	function dataGridBanner(){
		$sql = "select VALUE as URL,CONCAT('".base_url()."assets/images/slider/',PREFIX,'.png') as GAMBAR
			from MCONFIG  
			WHERE MODUL = 'HOME' AND CONFIG = 'URLBANNERSLIDE' 
			ORDER BY PREFIX";
		$query = $this->db->queryRaw($sql);	
		$data['rows'] = $query->result();
		return $data;
	}

	function dataGridTeam(){
		$sql = "select IDPLAYER as ID,CONCAT(NAMADEPAN,' ',NAMABELAKANG) as NAMA, GOAL, ASSIST, GKSAVE, POSITION, SQUADNUMBER, CONCAT('".base_url()."assets/images/player/',IDPLAYER,'.png') as GAMBAR
				from MPLAYER  
				WHERE STATUS = 1
				ORDER BY NAMADEPAN";
		$query = $this->db->queryRaw($sql);	
		$data['base'] = $query->result();

		$data['rows'] = [];

		
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
			for($x = 0 ; $x < count($data['senior_team']) ; $x++)
			{
				$player = $data['senior_team'][$x];
				foreach($dataPlayerConfig as $itemPlayerConfig){
					if($itemPlayerConfig == $player->ID)
					{
						array_push($data['rows'],$player);
					}
				}
			}
		}

		unset($data['senior_team']);

		return $data;
		
	}

	function loadVideoBTS(){
		//VIDEO BTS
		$sqlConfig = "select VALUE
			from MCONFIG  
			WHERE MODUL = 'HOME' AND CONFIG = 'URLVIDEOBTS' 
			ORDER BY PREFIX";
		$queryConfig = $this->db->queryRaw($sqlConfig);	
		$data['rows']['URLBTS'] = $queryConfig->row();
		return $data;
	}
}