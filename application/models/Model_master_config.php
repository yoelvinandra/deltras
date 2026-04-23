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
}