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
		$sql = "select VALUE as URL,CONCAT('".base_url()."assets/images/slider/',PREFIX,'.png') as GAMBAR,
		 	'' as ID,
			'' FILE
			from MCONFIG  
			WHERE MODUL = 'HOME' AND CONFIG = 'URLBANNERSLIDE' 
			ORDER BY PREFIX";
		$query = $this->db->queryRaw($sql);	
		$data['rows'] = $query->result();

		$index=1;
		foreach($data['rows'] as $itemRows){
			$itemRows->ID = $index;
			$index++;
		}
		return $data;
	}

	function simpanBanner($data) {
		$a_detail = json_decode($data['DETAILBANNER']);
		if ($a_detail === null) {
			return 'Data banner tidak valid';
		}

		$this->db->trans_begin();
		$this->db->where("MODUL", "HOME");
		$this->db->where("CONFIG", "URLBANNERSLIDE");
		$this->db->delete("MCONFIG");

		$sliderPath = FCPATH . 'assets/images/slider/';

		// ✅ FASE 1: Backup SEMUA file existing ke tmp_ SEBELUM apapun diproses
		// Ini mencegah file lama tertimpa sebelum sempat dipindahkan
		foreach ($a_detail as $item) {
			$existingFile = $sliderPath . $item->ID . '.png';
			$backupFile   = $sliderPath . 'tmp_' . $item->ID . '.png';
			if (file_exists($existingFile)) {
				copy($existingFile, $backupFile);
				unlink($existingFile);
			}
		}

		// ✅ FASE 2: Proses setiap item — tulis file baru atau ambil dari backup
		$id = 1;
		foreach ($a_detail as $item) {
			$fileKey    = 'FILE_' . $item->ID;
			$targetFile = $sliderPath . $id . '.png';
			$backupFile = $sliderPath . 'tmp_' . $item->ID . '.png';

			if (!empty($_POST[$fileKey])) {
				// Ada upload baru — decode base64 dan tulis langsung ke posisi $id
				$base64    = preg_replace('/^data:image\/\w+;base64,/', '', $_POST[$fileKey]);
				$imageData = base64_decode($base64);
				file_put_contents($targetFile, $imageData);

				// Buang backup lama karena sudah diganti
				if (file_exists($backupFile)) {
					unlink($backupFile);
				}
			} else {
				// Tidak ada upload — ambil dari backup (posisi lama sudah aman di tmp_)
				if (file_exists($backupFile)) {
					rename($backupFile, $targetFile);
				}
			}

			$this->db->insertRaw('MCONFIG', [
				'MODUL'  => 'HOME',
				'CONFIG' => 'URLBANNERSLIDE',
				'VALUE'  => $item->URL,
				'PREFIX' => $id,
			]);

			$id++;
		}

		// ✅ FASE 3: Cleanup — hapus sisa tmp_ yang tidak terpakai (jika ada)
		foreach ($a_detail as $item) {
			$backupFile = $sliderPath . 'tmp_' . $item->ID . '.png';
			if (file_exists($backupFile)) {
				unlink($backupFile);
			}
		}

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Gagal menyimpan pada database';
		}

		$this->db->trans_commit();
		return '';
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

	function simpanTeam($data){
		$a_detail  = json_decode($data['DETAILTEAM']);
		$this->db->trans_begin();

		$this->db->where("MODUL","HOME");
		$this->db->where("CONFIG","URLVIDEOBTS");
		$this->db->delete("MCONFIG");

		$this->db->where("MODUL","TEAM");
		$this->db->where("CONFIG","IDPLAYER");
		$this->db->delete("MCONFIG");


		$data_values = array (
			'MODUL'  			=> "HOME",
			'CONFIG'   			=> "URLVIDEOBTS",
			'VALUE' 			=> $data['VIDEOBEHINDTHESCENE'],
		);
			
		$this->db->insertRaw('MCONFIG',$data_values);

		$id = "";

		foreach ($a_detail as $item) {
            if( $id != "")
			{
				$id.=",";
			}
            $id .= $item->ID;
		}

		$data_values = array (
            'MODUL'  			=> "TEAM",
            'CONFIG'   			=> "IDPLAYER",
            'VALUE' 			=> $id,
        );
			
        $this->db->insertRaw('MCONFIG',$data_values);

		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return 'Gagal menyimpan pada database';
		}
		$this->db->trans_commit();
		return '';
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

	function simpanFixture($data){
		$a_detail  = json_decode($data['DETAILFIXTURE']);
		$this->db->trans_begin();

		$this->db->where("MODUL","FIXTURE");
		$this->db->where("CONFIG","IDFIXTURE,CLUB1,CLUB2,TGLFIXTURE_VIDEO");
		$this->db->delete("MCONFIG");

		$this->db->where("MODUL","FIXTURE");
		$this->db->where("CONFIG","IDFIXTURE,CLUB1,CLUB2,TGLFIXTURE_VIDEOHIGHLIGHT");
		$this->db->delete("MCONFIG");

		$this->db->where("MODUL","FIXTURE");
		$this->db->where("CONFIG","IDFIXTURE,CLUB1,CLUB2,TGLFIXTURE_VIDEOMATCHINTERVIEW");
		$this->db->delete("MCONFIG");

		$this->db->where("MODUL","FIXTURE");
		$this->db->where("CONFIG","TABEL_KLASEMEN_IDCLUB,MENANG,SERI,KALAH,POINT");
		$this->db->delete("MCONFIG");

		$data_values = array (
			'MODUL'  			=> "FIXTURE",
			'CONFIG'   			=> "IDFIXTURE,CLUB1,CLUB2,TGLFIXTURE_VIDEO",
			'VALUE' 			=> $data['IDVIDEO'],
		);
			
		$this->db->insertRaw('MCONFIG',$data_values);

		$data_values = array (
			'MODUL'  			=> "FIXTURE",
			'CONFIG'   			=> "IDFIXTURE,CLUB1,CLUB2,TGLFIXTURE_VIDEOHIGHLIGHT",
			'VALUE' 			=> $data['IDVIDEOHIGHLIGHT'],
		);
			
		$this->db->insertRaw('MCONFIG',$data_values);

		$data_values = array (
			'MODUL'  			=> "FIXTURE",
			'CONFIG'   			=> "IDFIXTURE,CLUB1,CLUB2,TGLFIXTURE_VIDEOMATCHINTERVIEW",
			'VALUE' 			=> $data['IDVIDEOMATCHINTERVIEW'],
		);
			
		$this->db->insertRaw('MCONFIG',$data_values);

		$rank = 1;
		foreach ($a_detail as $item) {
			$data_values = array (
				'MODUL'  			=> "FIXTURE",
				'CONFIG'   			=> "TABEL_KLASEMEN_IDCLUB,MENANG,SERI,KALAH,POINT",
				'VALUE' 			=> $item->ID.",".$item->MENANG.",".$item->SERI.",".$item->KALAH.",".$item->POINT,
				'PREFIX'			=> $rank
			);
				
			$this->db->insertRaw('MCONFIG',$data_values);
			$rank++;
		}

		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return 'Gagal menyimpan pada database';
		}
		$this->db->trans_commit();
		return '';
	}


	function dataGridNews(){

		$data['rows'] = [];
		$sqlConfig = "SELECT VALUE 
				FROM MCONFIG 
				WHERE MODUL = 'NEWS' AND CONFIG = 'IDNEWS'";
		$resultConfig = $this->db->query($sqlConfig)->row()->VALUE;
		$dataConfig = explode(",",$resultConfig);
		foreach($dataConfig as $itemConfig)
		{
			$sql = "select IDNEWS as ID, TITLE as JUDUL,KATEGORI,TGLTERBIT,MUSER.USERNAME,CONCAT('".base_url()."assets/images/news/',IDNEWS,'.png') as GAMBAR
				from TNEWS  
				INNER JOIN MUSER on MUSER.USERID = TNEWS.USERENTRY
				WHERE TNEWS.STATUS = 1
				AND IDNEWS = $itemConfig";
			$query = $this->db->queryRaw($sql)->row();
			array_push($data['rows'],$query);
		}
		return $data;
	}

	function simpanNews($data){
		$a_detail  = json_decode($data['DETAILNEWS']);
		$this->db->trans_begin();

		$this->db->where("MODUL","NEWS");
		$this->db->where("CONFIG","IDNEWS");
		$this->db->delete("MCONFIG");

		$id = "";

		foreach ($a_detail as $item) {
            if( $id != "")
			{
				$id.=",";
			}
            $id .= $item->ID;
		}

		$data_values = array (
            'MODUL'  			=> "NEWS",
            'CONFIG'   			=> "IDNEWS",
            'VALUE' 			=> $id,
        );
			
        $this->db->insertRaw('MCONFIG',$data_values);

		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return 'Gagal menyimpan pada database';
		}
		$this->db->trans_commit();
		return '';
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

	function simpanSponsor($data){
		$a_detail  = json_decode($data['DETAILSPONSOR']);
		$this->db->trans_begin();

		$this->db->where("MODUL","SPONSOR");
		$this->db->where("CONFIG","IDSPONSOR");
		$this->db->delete("MCONFIG");

		$id = "";

		foreach ($a_detail as $item) {
            if( $id != "")
			{
				$id.=",";
			}
            $id .= $item->ID;
		}

		$data_values = array (
            'MODUL'  			=> "SPONSOR",
            'CONFIG'   			=> "IDSPONSOR",
            'VALUE' 			=> $id,
        );
			
        $this->db->insertRaw('MCONFIG',$data_values);

		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return 'Gagal menyimpan pada database';
		}
		$this->db->trans_commit();
		return '';
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
		$this->db->trans_begin();
		
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
		$this->db->trans_commit();
		return '';
	}
}