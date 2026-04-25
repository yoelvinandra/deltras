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

	function loadNamaDanVideoFixture(){
		$data['rows'] = [];
		//VIDEO BTS
		$sqlConfig = "select VALUE
			from MCONFIG  
			WHERE MODUL = 'FIXTURE' AND CONFIG = 'TABEL_KLASEMEN_IDFIXTURE'";
		$dataConfig = $this->db->queryRaw($sqlConfig)->row();	
		
		if($dataConfig->VALUE != "")
		{
			$sql = "select IDFIXTURE as ID, CONCAT('KLASEMEN ',NAMA,' ',IF(SEASONAWAL = SEASONAKHIR, SEASONAKHIR, CONCAT(YEAR(SEASONAWAL), '/', SUBSTR(YEAR(SEASONAKHIR), -2, 2)))) AS NAMA
					from TFIXTURE 
					where IDFIXTURE = $dataConfig->VALUE";
			$data['rows']['ID'] = $this->db->queryRaw($sql)->row()->ID;	
			$data['rows']['NAMA'] = $this->db->queryRaw($sql)->row()->NAMA;	
		}

		//VIDEO
		$sqlConfig = "select VALUE
			from MCONFIG  
			WHERE MODUL = 'FIXTURE' AND CONFIG = 'IDFIXTURE,CLUB1,CLUB2,TGLFIXTURE_VIDEO' ";
		$queryConfig = $this->db->queryRaw($sqlConfig);	
		$dataVideo = explode(",", $queryConfig->row()->VALUE??"");
		
		if(count($dataVideo) > 0)
		{
			$sql = "select VIDEO, CONCAT(CLUB1.NAMA,' vs ',CLUB2.NAMA,' / ', TFIXTUREDTL.TGLFIXTURE) as TEXT
					from TFIXTURE 
					INNER JOIN TFIXTUREDTL ON TFIXTURE.IDFIXTURE = TFIXTUREDTL.IDFIXTURE
					INNER JOIN MCLUB CLUB1 ON CLUB1.IDCLUB = TFIXTUREDTL.IDCLUB1
					INNER JOIN MCLUB CLUB2 ON CLUB2.IDCLUB = TFIXTUREDTL.IDCLUB2 
					WHERE TFIXTURE.STATUS = 1
					AND TFIXTUREDTL.IDFIXTURE = $dataVideo[0] 
					AND TFIXTUREDTL.IDCLUB1 = $dataVideo[1] 
					AND TFIXTUREDTL.IDCLUB2 = $dataVideo[2] 
					AND TFIXTUREDTL.TGLFIXTURE = '$dataVideo[3]'";
			$query = $this->db->queryRaw($sql);	
			$data['rows']['VIDEO'] = $query->row()->VIDEO;
			$data['rows']['VIDEOVALUE'] = $queryConfig->row()->VALUE;
			$data['rows']['VIDEOTEXT'] = $query->row()->TEXT;
		}
		
		//VIDEO HIGHLIGHT
		$sqlConfig = "select VALUE
			from MCONFIG  
			WHERE MODUL = 'FIXTURE' AND CONFIG = 'IDFIXTURE,CLUB1,CLUB2,TGLFIXTURE_VIDEOHIGHLIGHT' ";
		$queryConfig = $this->db->queryRaw($sqlConfig);	
		$dataVideo = explode(",", $queryConfig->row()->VALUE??"");
		
		if(count($dataVideo) > 0)
		{
			$sql = "select VIDEOHIGHLIGHT, CONCAT(CLUB1.NAMA,' vs ',CLUB2.NAMA,' / ', TFIXTUREDTL.TGLFIXTURE) as TEXT
					from TFIXTURE 
					INNER JOIN TFIXTUREDTL ON TFIXTURE.IDFIXTURE = TFIXTUREDTL.IDFIXTURE
					INNER JOIN MCLUB CLUB1 ON CLUB1.IDCLUB = TFIXTUREDTL.IDCLUB1
					INNER JOIN MCLUB CLUB2 ON CLUB2.IDCLUB = TFIXTUREDTL.IDCLUB2 
					WHERE TFIXTURE.STATUS = 1
					AND TFIXTUREDTL.IDFIXTURE = $dataVideo[0] 
					AND TFIXTUREDTL.IDCLUB1 = $dataVideo[1] 
					AND TFIXTUREDTL.IDCLUB2 = $dataVideo[2] 
					AND TFIXTUREDTL.TGLFIXTURE = '$dataVideo[3]'";
			$query = $this->db->queryRaw($sql);	
			$data['rows']['VIDEOHIGHLIGHT'] = $query->row()->VIDEOHIGHLIGHT;
			$data['rows']['VIDEOHIGHLIGHTVALUE'] = $queryConfig->row()->VALUE;
			$data['rows']['VIDEOHIGHLIGHTTEXT'] = $query->row()->TEXT;
		}

		//VIDEO MATCH INTERVIEW
		$sqlConfig = "select VALUE
			from MCONFIG  
			WHERE MODUL = 'FIXTURE' AND CONFIG = 'IDFIXTURE,CLUB1,CLUB2,TGLFIXTURE_VIDEOMATCHINTERVIEW' ";
		$queryConfig = $this->db->queryRaw($sqlConfig);	
		$dataVideo = explode(",", $queryConfig->row()->VALUE??"");

		if(count($dataVideo) > 0)
		{
			$sql = "select VIDEOMATCHINTERVIEW, CONCAT(CLUB1.NAMA,' vs ',CLUB2.NAMA,' / ', TFIXTUREDTL.TGLFIXTURE) as TEXT
					from TFIXTURE 
					INNER JOIN TFIXTUREDTL ON TFIXTURE.IDFIXTURE = TFIXTUREDTL.IDFIXTURE
					INNER JOIN MCLUB CLUB1 ON CLUB1.IDCLUB = TFIXTUREDTL.IDCLUB1
					INNER JOIN MCLUB CLUB2 ON CLUB2.IDCLUB = TFIXTUREDTL.IDCLUB2 
					WHERE TFIXTURE.STATUS = 1
					AND TFIXTUREDTL.IDFIXTURE = $dataVideo[0] 
					AND TFIXTUREDTL.IDCLUB1 = $dataVideo[1] 
					AND TFIXTUREDTL.IDCLUB2 = $dataVideo[2] 
					AND TFIXTUREDTL.TGLFIXTURE = '$dataVideo[3]'";
			$query = $this->db->queryRaw($sql);	
			$data['rows']['VIDEOMATCHINTERVIEW'] = $query->row()->VIDEOMATCHINTERVIEW;
			$data['rows']['VIDEOMATCHINTERVIEWVALUE'] = $queryConfig->row()->VALUE;
			$data['rows']['VIDEOMATCHINTERVIEWTEXT'] = $query->row()->TEXT;
		}
		return $data;
	}

	function dataGridKlasemen(){
		$data['rows'] = [];

		$sqlConfig = "select VALUE
			from MCONFIG  
			WHERE MODUL = 'FIXTURE' AND CONFIG like '%TABEL_KLASEMEN_IDCLUB,MENANG,SERI,KALAH,POINT%' 
			ORDER BY PREFIX ASC";
		$queryConfig = $this->db->queryRaw($sqlConfig);	

		foreach($queryConfig->result() as $dataConfig){

			$detailConfig = explode(",",$dataConfig->VALUE);
			$sql = "select NAMA,CONCAT('".base_url()."assets/images/club/',IDCLUB,'.png') as GAMBARCLUB
					from MCLUB 
					where IDCLUB = $detailConfig[0]";

			$detail = array(
				'ID'		=> $detailConfig[0],
				'GAMBAR' 	=> $this->db->queryRaw($sql)->row()->GAMBARCLUB,
				'NAMA' 		=> $this->db->queryRaw($sql)->row()->NAMA,
				'MENANG' 	=> $detailConfig[1],
				'SERI' 		=> $detailConfig[2],
				'KALAH' 	=> $detailConfig[3],
				'POINT'		=> $detailConfig[4],
			);

			array_push($data['rows'],$detail);
			
		}

		return $data;
	}


	function dataGridNews(){
		$sql = "select IDNEWS as ID, TITLE as JUDUL ,KATEGORI,TGLTERBIT as TERBIT,CONCAT('".base_url()."assets/images/news/',IDNEWS,'.png') as GAMBAR
			from TNEWS  
			INNER JOIN MUSER on MUSER.USERID = TNEWS.USERENTRY
			WHERE TNEWS.STATUS = 1
			AND FIND_IN_SET(IDNEWS, (
				SELECT VALUE 
				FROM MCONFIG 
				WHERE MODUL = 'NEWS'
			))
			ORDER BY TGLTERBIT DESC";
		$query = $this->db->queryRaw($sql);
		$data['rows'] = $query->result();	
		return $data;
	}

	function dataGridSponsor(){
		$sql = "select IDSPONSOR as ID, NAMA,WEBSITE, CONCAT('".base_url()."assets/images/sponsor/',IDSPONSOR,'.png') as GAMBAR
				from MSPONSOR  
				WHERE STATUS = 1";
		$query = $this->db->queryRaw($sql);	
		$data['base'] = $query->result();

		$data['rows'] = [];

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
					if($itemSponsor == $item->ID)
					{
						array_push($data['rows'],$item);
					}
				}
			}
		}
		
		unset($data['base']);
		return $data;
	}

	function loadContact(){
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

		return $data;
	}

	function simpanLokasiKontak($data){
		
		$this->db->where("MODUL","HOME");
		$this->db->where("CONFIG","ALAMAT");
		$this->db->updateRaw('MCONFIG',array('VALUE' => $data['ALAMAT'], 'PREFIX' => $data['ALAMATURL']));

		$this->db->where("MODUL","HOME");
		$this->db->where("CONFIG","EMAIL");
		$this->db->updateRaw('MCONFIG',array('VALUE' => $data['EMAIL']));

		$this->db->where("MODUL","HOME");
		$this->db->where("CONFIG","TELP");
		$this->db->updateRaw('MCONFIG',array('VALUE' => $data['TELP']));

		$this->db->where("MODUL","HOME");
		$this->db->where("CONFIG","YOUTUBE");
		$this->db->updateRaw('MCONFIG',array('VALUE' => $data['YOUTUBE']));

		$this->db->where("MODUL","HOME");
		$this->db->where("CONFIG","TIKTOK");
		$this->db->updateRaw('MCONFIG',array('VALUE' => $data['TIKTOK']));

		$this->db->where("MODUL","HOME");
		$this->db->where("CONFIG","INSTAGRAM");
		$this->db->updateRaw('MCONFIG',array('VALUE' => $data['INSTAGRAM']));

		$this->db->where("MODUL","HOME");
		$this->db->where("CONFIG","MEMBER-ALAMAT");
		$this->db->updateRaw('MCONFIG',array('VALUE' => $data['MEMBERALAMAT']));

		$this->db->where("MODUL","HOME");
		$this->db->where("CONFIG","MEMBER-EMAIL");
		$this->db->updateRaw('MCONFIG',array('VALUE' => $data['MEMBEREMAIL']));

		$this->db->where("MODUL","HOME");
		$this->db->where("CONFIG","MEMBER-TELP");
		$this->db->updateRaw('MCONFIG',array('VALUE' => $data['MEMBERTELP']));

		$this->db->where("MODUL","HOME");
		$this->db->where("CONFIG","MEMBER-INSTAGRAM");
		$this->db->updateRaw('MCONFIG',array('VALUE' => $data['MEMBERINSTAGRAM']));

		$this->db->where("MODUL","HOME");
		$this->db->where("CONFIG","MEMBER-X");
		$this->db->updateRaw('MCONFIG',array('VALUE' => $data['MEMBERX']));

		$this->db->where("MODUL","HOME");
		$this->db->where("CONFIG","MEMBER-TIKTOK");
		$this->db->updateRaw('MCONFIG',array('VALUE' => $data['MEMBERTIKTOK']));

		$this->db->where("MODUL","HOME");
		$this->db->where("CONFIG","MEMBER-FACEBOOK");
		$this->db->updateRaw('MCONFIG',array('VALUE' => $data['MEMBERFACEBOOK']));

		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return 'Gagal menyimpan pada database';
		}

		return '';
	}
}