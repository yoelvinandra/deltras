<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_competition_fixture extends MY_Model{

	public function getAll(){
		$data = $this->db->query("select * from TFIXTURE");
		return $data->result();
	}
	
	public function comboGrid($q){
		
		$sql = "select IDFIXTURE as VALUE, NAMA as TEXT, CONCAT('KLASEMEN ',NAMA,' ',IF(SEASONAWAL = SEASONAKHIR, SEASONAKHIR, CONCAT(YEAR(SEASONAWAL), '/', SUBSTR(YEAR(SEASONAKHIR), -2, 2)))) AS FULLNAME
				from TFIXTURE  
				WHERE NAMA like ?
				ORDER BY SEASONAKHIR DESC";
				
		$query = $this->db->query($sql, ["%".$q."%"]);	
		$data['rows'] = $query->result();
		return $data;
	}

	public function comboGridDetail($id,$video){
		
		$sql = "select CONCAT(TFIXTUREDTL.IDFIXTURE,',',CLUB1.IDCLUB,',',CLUB2.IDCLUB,',',TFIXTUREDTL.TGLFIXTURE) as VALUE, CONCAT(CLUB1.NAMA,' vs ',CLUB2.NAMA,' / ', TFIXTUREDTL.TGLFIXTURE) as TEXT, $video as VIDEO
				from TFIXTUREDTL
				INNER JOIN MCLUB CLUB1 ON CLUB1.IDCLUB = TFIXTUREDTL.IDCLUB1
				INNER JOIN MCLUB CLUB2 ON CLUB2.IDCLUB = TFIXTUREDTL.IDCLUB2 
				WHERE IDFIXTURE = $id AND ($video is not null AND $video <> '')
				ORDER BY TGLFIXTURE DESC";
				
		$query = $this->db->queryRaw($sql);	
		$data['rows'] = $query->result();
		return $data;
	}

	public function comboGridSeason(){
		$sql = "select IF(YEAR(SEASONAWAL) = YEAR(SEASONAKHIR), YEAR(SEASONAKHIR), CONCAT(YEAR(SEASONAWAL), '/', SUBSTR(YEAR(SEASONAKHIR), -2, 2))) as SEASON
				from TFIXTURE 
				group by IF(YEAR(SEASONAWAL) = YEAR(SEASONAKHIR), YEAR(SEASONAKHIR), CONCAT(YEAR(SEASONAWAL), '/', SUBSTR(YEAR(SEASONAKHIR), -2, 2)))
				ORDER BY SEASONAKHIR DESC";
		$query = $this->db->queryRaw($sql);	
		$data['rows'] = $query->result();
		return $data;
	}
	
	public function web($for,$season){	

		$data['rows'] = [];

		if($for == "HOME")
		{
			
			$sqlConfig = "select VALUE
				from MCONFIG  
				WHERE MODUL = 'FIXTURE' AND CONFIG = 'COUNTFIXTUREMATCH' ";
			$queryConfig = $this->db->queryRaw($sqlConfig);	
			$countfixturematch = $queryConfig->row()->VALUE;

			$sqlConfig = "select VALUE
				from MCONFIG  
				WHERE MODUL = 'FIXTURE' AND CONFIG = 'COUNTRESULTMATCH' ";
			$queryConfig = $this->db->queryRaw($sqlConfig);	
			$countresultmatch = $queryConfig->row()->VALUE;

			$data['rows']['FIXTURE'] = [];
			$data['rows']['RESULT'] = [];

			$sql = "select TFIXTURE.IDFIXTURE,TFIXTURE.NAMA,
					CONCAT(MONTH(TGLFIXTURE),' ',YEAR(TGLFIXTURE)) as MONTHYEAR,LOKASI,
					CLUB1.NAMA as NAMACLUB1,CLUB2.NAMA as NAMACLUB2,IDCLUB1,IDCLUB2,SKORCLUB1,SKORCLUB2,
					CONCAT('".base_url()."assets/images/club/',IDCLUB1,'.png') as GAMBARCLUB1,
					CONCAT('".base_url()."assets/images/club/',IDCLUB2,'.png') as GAMBARCLUB2,
					DATE(TGLFIXTURE) as TANGGAL, TIME(TGLFIXTURE) as JAM,VIDEO,VIDEOHIGHLIGHT,VIDEOMATCHINTERVIEW,LINKTICKET,LOKASI,TFIXTUREDTL.STATUS
					from TFIXTURE 
					INNER JOIN TFIXTUREDTL ON TFIXTURE.IDFIXTURE = TFIXTUREDTL.IDFIXTURE
					INNER JOIN MCLUB CLUB1 ON CLUB1.IDCLUB = TFIXTUREDTL.IDCLUB1
					INNER JOIN MCLUB CLUB2 ON CLUB2.IDCLUB = TFIXTUREDTL.IDCLUB2
					WHERE TFIXTURE.STATUS = 1 AND TFIXTUREDTL.STATUS > 0 AND TFIXTUREDTL.STATUS < 4 AND DATE(TFIXTUREDTL.TGLFIXTURE) >= '".date("Y-m-d")."'
					ORDER BY TFIXTUREDTL.TGLFIXTURE ASC
					LIMIT $countfixturematch";
			$query = $this->db->queryRaw($sql);	
			$data['rows']['FIXTURE'] = $query->result();

			$sql = "select TFIXTURE.IDFIXTURE,TFIXTURE.NAMA,
					CONCAT(MONTH(TGLFIXTURE),' ',YEAR(TGLFIXTURE)) as MONTHYEAR,LOKASI,
					CLUB1.NAMA as NAMACLUB1,CLUB2.NAMA as NAMACLUB2,IDCLUB1,IDCLUB2,SKORCLUB1,SKORCLUB2,
					CONCAT('".base_url()."assets/images/club/',IDCLUB1,'.png') as GAMBARCLUB1,
					CONCAT('".base_url()."assets/images/club/',IDCLUB2,'.png') as GAMBARCLUB2,
					DATE(TGLFIXTURE) as TANGGAL, TIME(TGLFIXTURE) as JAM,VIDEO,VIDEOHIGHLIGHT,VIDEOMATCHINTERVIEW,LINKTICKET,LOKASI,TFIXTUREDTL.STATUS
					from TFIXTURE 
					INNER JOIN TFIXTUREDTL ON TFIXTURE.IDFIXTURE = TFIXTUREDTL.IDFIXTURE
					INNER JOIN MCLUB CLUB1 ON CLUB1.IDCLUB = TFIXTUREDTL.IDCLUB1
					INNER JOIN MCLUB CLUB2 ON CLUB2.IDCLUB = TFIXTUREDTL.IDCLUB2
					WHERE TFIXTURE.STATUS = 1 AND TFIXTUREDTL.STATUS = 4 AND DATE(TFIXTUREDTL.TGLFIXTURE) < '".date("Y-m-d")."'
					ORDER BY TFIXTUREDTL.TGLFIXTURE DESC
					LIMIT $countresultmatch";
			$query = $this->db->queryRaw($sql);	
			$data['rows']['RESULT'] = $query->result();


			//VIDEO
			$sqlConfig = "select VALUE
				from MCONFIG  
				WHERE MODUL = 'FIXTURE' AND CONFIG = 'IDFIXTURE,CLUB1,CLUB2,TGLFIXTURE_VIDEO' ";
			$queryConfig = $this->db->queryRaw($sqlConfig);	
			$dataVideo = explode(",", $queryConfig->row()->VALUE??"");
			
			if(count($dataVideo) > 0)
			{
				$sql = "select VIDEO
						from TFIXTURE 
						INNER JOIN TFIXTUREDTL ON TFIXTURE.IDFIXTURE = TFIXTUREDTL.IDFIXTURE
						WHERE TFIXTURE.STATUS = 1
						AND TFIXTUREDTL.IDFIXTURE = $dataVideo[0] 
						AND TFIXTUREDTL.IDCLUB1 = $dataVideo[1] 
						AND TFIXTUREDTL.IDCLUB2 = $dataVideo[2] 
						AND TFIXTUREDTL.TGLFIXTURE = '$dataVideo[3]'";
				$query = $this->db->queryRaw($sql);	
				$data['rows']['VIDEO'] = [$query->row()->VIDEO];
			}
			else
			{
				$data['rows']['VIDEO'] = [];
			}
			
			//VIDEO HIGHLIGHT
			$sqlConfig = "select VALUE
				from MCONFIG  
				WHERE MODUL = 'FIXTURE' AND CONFIG = 'IDFIXTURE,CLUB1,CLUB2,TGLFIXTURE_VIDEOHIGHLIGHT' ";
			$queryConfig = $this->db->queryRaw($sqlConfig);	
			$dataVideo = explode(",", $queryConfig->row()->VALUE??"");
			
			if(count($dataVideo) > 0)
			{
				$sql = "select VIDEOHIGHLIGHT
						from TFIXTURE 
						INNER JOIN TFIXTUREDTL ON TFIXTURE.IDFIXTURE = TFIXTUREDTL.IDFIXTURE
						WHERE TFIXTURE.STATUS = 1
						AND TFIXTUREDTL.IDFIXTURE = $dataVideo[0] 
						AND TFIXTUREDTL.IDCLUB1 = $dataVideo[1] 
						AND TFIXTUREDTL.IDCLUB2 = $dataVideo[2] 
						AND TFIXTUREDTL.TGLFIXTURE = '$dataVideo[3]'";
				$query = $this->db->queryRaw($sql);	
				$data['rows']['VIDEOHIGHLIGHT'] = [$query->row()->VIDEOHIGHLIGHT];
			}
			else
			{
				$data['rows']['VIDEOHIGHLIGHT'] = [];
			}

			//VIDEO MATCH INTERVIEW
			$sqlConfig = "select VALUE
				from MCONFIG  
				WHERE MODUL = 'FIXTURE' AND CONFIG = 'IDFIXTURE,CLUB1,CLUB2,TGLFIXTURE_VIDEOMATCHINTERVIEW' ";
			$queryConfig = $this->db->queryRaw($sqlConfig);	
			$dataVideo = explode(",", $queryConfig->row()->VALUE??"");

			if(count($dataVideo) > 0)
			{
				$sql = "select VIDEOMATCHINTERVIEW
						from TFIXTURE 
						INNER JOIN TFIXTUREDTL ON TFIXTURE.IDFIXTURE = TFIXTUREDTL.IDFIXTURE
						WHERE TFIXTURE.STATUS = 1
						AND TFIXTUREDTL.IDFIXTURE = $dataVideo[0] 
						AND TFIXTUREDTL.IDCLUB1 = $dataVideo[1] 
						AND TFIXTUREDTL.IDCLUB2 = $dataVideo[2] 
						AND TFIXTUREDTL.TGLFIXTURE = '$dataVideo[3]'";
				$query = $this->db->queryRaw($sql);	
				$data['rows']['VIDEOMATCHINTERVIEW'] = [$query->row()->VIDEOMATCHINTERVIEW];
			}
			else
			{
				$data['rows']['VIDEOMATCHINTERVIEW'] = [];
			}
			

		}
		else if($for == "KLASEMEN")
		{
			$data['rows']['NAMA'] = "";
			$data['rows']['DATA'] = [];

			$sqlConfig = "select VALUE
				from MCONFIG  
				WHERE MODUL = 'FIXTURE' AND CONFIG like '%TABEL_KLASEMEN%' 
				ORDER BY PREFIX ASC";
			$queryConfig = $this->db->queryRaw($sqlConfig);	

			$index = 0;
			foreach($queryConfig->result() as $dataConfig){
				
				if($index == 0)
				{
					if($dataConfig->VALUE != "")
					{
						$sql = "select CONCAT('KLASEMEN ',NAMA,' ',IF(SEASONAWAL = SEASONAKHIR, SEASONAKHIR, CONCAT(YEAR(SEASONAWAL), '/', SUBSTR(YEAR(SEASONAKHIR), -2, 2)))) AS NAMA
								from TFIXTURE 
								where IDFIXTURE = $dataConfig->VALUE";
						$data['rows']['NAMA'] = $this->db->queryRaw($sql)->row()->NAMA;	
					}
				}
				else
				{
					$detailConfig = explode(",",$dataConfig->VALUE);
					$sql = "select NAMA
							from MCLUB 
							where IDCLUB = $detailConfig[0]";

					$detail = array(
						'NAMA' 		=> $this->db->queryRaw($sql)->row()->NAMA,
						'MENANG' 	=> $detailConfig[1],
						'SERI' 		=> $detailConfig[2],
						'KALAH' 	=> $detailConfig[3],
						'POINT'		=> $detailConfig[4],
					);

					array_push($data['rows']['DATA'],$detail);
				}
				$index++;
			}

		}
		else if($for == "FIXTURE")
		{
			$data['rows']['FIXTURE'] = [];
			$data['rows']['RESULT'] = [];

			$sql = "select TFIXTURE.IDFIXTURE,TFIXTURE.NAMA,
					CONCAT(MONTH(TGLFIXTURE),' ',YEAR(TGLFIXTURE)) as MONTHYEAR,LOKASI,
					CLUB1.NAMA as NAMACLUB1,CLUB2.NAMA as NAMACLUB2,IDCLUB1,IDCLUB2,SKORCLUB1,SKORCLUB2,
					CONCAT('".base_url()."assets/images/club/',IDCLUB1,'.png') as GAMBARCLUB1,
					CONCAT('".base_url()."assets/images/club/',IDCLUB2,'.png') as GAMBARCLUB2,
					DATE(TGLFIXTURE) as TANGGAL, TIME(TGLFIXTURE) as JAM,LINKTICKET,LOKASI,TFIXTUREDTL.STATUS
					from TFIXTURE 
					INNER JOIN TFIXTUREDTL ON TFIXTURE.IDFIXTURE = TFIXTUREDTL.IDFIXTURE
					INNER JOIN MCLUB CLUB1 ON CLUB1.IDCLUB = TFIXTUREDTL.IDCLUB1
					INNER JOIN MCLUB CLUB2 ON CLUB2.IDCLUB = TFIXTUREDTL.IDCLUB2
					WHERE TFIXTURE.STATUS = 1 AND TFIXTUREDTL.STATUS > 0 AND TFIXTUREDTL.STATUS < 4 AND DATE(TFIXTUREDTL.TGLFIXTURE) >= '".date("Y-m-d")."'
					ORDER BY TFIXTUREDTL.TGLFIXTURE ASC";
			$query = $this->db->queryRaw($sql);	
			$data['rows']['FIXTURE'] = $query->result();

			$sql = "select TFIXTURE.IDFIXTURE,TFIXTURE.NAMA,
					CONCAT(MONTH(TGLFIXTURE),' ',YEAR(TGLFIXTURE)) as MONTHYEAR,LOKASI,
					CLUB1.NAMA as NAMACLUB1,CLUB2.NAMA as NAMACLUB2,IDCLUB1,IDCLUB2,SKORCLUB1,SKORCLUB2,
					CONCAT('".base_url()."assets/images/club/',IDCLUB1,'.png') as GAMBARCLUB1,
					CONCAT('".base_url()."assets/images/club/',IDCLUB2,'.png') as GAMBARCLUB2,
					DATE(TGLFIXTURE) as TANGGAL, TIME(TGLFIXTURE) as JAM,LINKTICKET,LOKASI,TFIXTUREDTL.STATUS
					from TFIXTURE 
					INNER JOIN TFIXTUREDTL ON TFIXTURE.IDFIXTURE = TFIXTUREDTL.IDFIXTURE
					INNER JOIN MCLUB CLUB1 ON CLUB1.IDCLUB = TFIXTUREDTL.IDCLUB1
					INNER JOIN MCLUB CLUB2 ON CLUB2.IDCLUB = TFIXTUREDTL.IDCLUB2
					WHERE TFIXTURE.STATUS = 1 AND TFIXTUREDTL.STATUS = 4 AND DATE(TFIXTUREDTL.TGLFIXTURE) < '".date("Y-m-d")."'
					AND IF(YEAR(SEASONAWAL) = YEAR(SEASONAKHIR), YEAR(SEASONAKHIR), CONCAT(YEAR(SEASONAWAL), '/', SUBSTR(YEAR(SEASONAKHIR), -2, 2))) = '$season'
					ORDER BY TFIXTUREDTL.TGLFIXTURE DESC";
			$query = $this->db->queryRaw($sql);	
			$data['rows']['RESULT'] = $query->result();
		}
		return $data;
	}

	public function dataGrid(){
		
		$data = [];

		$sql = "select c.USERNAME as USERBUAT, a.*
				from TFIXTURE a
				left join MUSER c on a.USERENTRY = c.USERID
				ORDER BY a.SEASONAKHIR DESC";
		$query = $this->db->query($sql);
		$data['rows'] = $query->result();

		return $data;
	}

	public function dataGridDetail($id=0){
		
		$data = [];

		$sql = "select c.USERNAME as USERBUAT, a.*,b.NAMA as CLUB1, b1.NAMA as CLUB2
				from TFIXTUREDTL a
				inner join MCLUB b on b.IDCLUB = a.IDCLUB1
				inner join MCLUB b1 on b1.IDCLUB = a.IDCLUB2
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

		
		$this->db->where('IDFIXTURE',$id)
				->delete('TFIXTUREDTL');
				
		// query detail
		foreach ($a_detail as $item) {
            
            $data_values = array (
                'IDFIXTURE'  			=> $id,
                'IDCLUB1'   			=> $item->IDCLUB1,
                'IDCLUB2' 				=> $item->IDCLUB2,
                'SKORCLUB1' 			=> $item->SKORCLUB1,
                'SKORCLUB2' 			=> $item->SKORCLUB2,
                'TGLFIXTURE'			=> $item->TGLFIXTURE,
                'VIDEO'					=> $item->VIDEO,
                'VIDEOHIGHLIGHT'		=> $item->VIDEOHIGHLIGHT,
                'VIDEOMATCHINTERVIEW'	=> $item->VIDEOMATCHINTERVIEW,
                'LINKTICKET'			=> $item->LINKTICKET,
                'LOKASI'				=> $item->LOKASI,
                'LAT'					=> $item->LAT??0,
                'LNG'					=> $item->LNG??0,
                'TGLENTRY'				=> $data['TGLENTRY'],
                'USERENTRY'				=> $data['USERENTRY'],
                'CATATAN'				=> $item->CATATAN,
                'STATUS'				=> $item->STATUS,
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