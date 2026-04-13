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
	
	public function web($for,$page=0,$query="",$kategori="",$id=0){	

		$data['rows'] = [];

		if($for == "HOME")
		{
			$sql = "select IDNEWS, TITLE,KATEGORI,TGLTERBIT,MUSER.USERNAME,CONCAT('".base_url()."assets/images/news/',IDNEWS,'.png') as GAMBAR
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
		}
		else if($for == "NEWS")
		{
			if($page!=0)$limit = "LIMIT 6 OFFSET ".(($page-1)*6);
			if($query != "")$whereQuery = " AND TNEWS.TITLE like '%$query%' ";
			if($kategori != "")$whereKategori = " AND TNEWS.KATEGORI = '$kategori'";

			$sql = "select IDNEWS, TITLE,KATEGORI,TGLTERBIT,MUSER.USERNAME,CONCAT('".base_url()."assets/images/news/',IDNEWS,'.png') as GAMBAR
				from TNEWS  
				INNER JOIN MUSER on MUSER.USERID = TNEWS.USERENTRY
				WHERE TNEWS.STATUS = 1 $whereQuery $whereKategori
				ORDER BY TGLTERBIT DESC
				$limit";
			$query = $this->db->queryRaw($sql);
			$data['rows'] = $query->result();	

			$sql = "select CEIL(count(*)/6) as JMLDATA
				from TNEWS  
				INNER JOIN MUSER on MUSER.USERID = TNEWS.USERENTRY
				WHERE TNEWS.STATUS = 1 $whereQuery $whereKategori
				ORDER BY TGLTERBIT DESC";
			$query = $this->db->queryRaw($sql)->row();
			$data['count'] = (int)$query->JMLDATA;	
		}
		else if($for == "DETAIL")
		{
			if($id != 0)
			{
				$sql = "select IDNEWS, TITLE,KATEGORI,DETAIL,TGLTERBIT,MUSER.USERNAME,CONCAT('".base_url()."assets/images/news/',IDNEWS,'.png') as GAMBAR
					from TNEWS  
					INNER JOIN MUSER on MUSER.USERID = TNEWS.USERENTRY
					WHERE TNEWS.STATUS = 1  AND TNEWS.IDNEWS = $id
					$limit";
				$query = $this->db->queryRaw($sql);
				$data['rows'] = $query->result();	

				//AFTER DATE -> LEFT
				// $sql = "select IDNEWS, TITLE
				// 	from TNEWS  
				// 	WHERE TNEWS.STATUS = 1  AND TNEWS.IDNEWS != $id AND TGLTERBIT >= '{$data['rows'][0]->TGLTERBIT}'
				// 	ORDER BY TGLTERBIT ASC
				// 	LIMIT 1";
				// $query = $this->db->queryRaw($sql);
				// $data['rowsAfter'] = $query->result();

				//BEFORE DATE -> RIGHT
				$sql = "select IDNEWS, TITLE
					from TNEWS  
					WHERE TNEWS.STATUS = 1  AND TNEWS.IDNEWS != $id AND TGLTERBIT <= '{$data['rows'][0]->TGLTERBIT}'
					ORDER BY TGLTERBIT DESC
					LIMIT 1";
				$query = $this->db->queryRaw($sql);
				$data['rowsBefore'] = $query->result();

				if(count($data['rowsBefore']) == 0)
				{
					$sql = "select IDNEWS, TITLE
						from TNEWS  
						WHERE TNEWS.STATUS = 1 
						ORDER BY TGLTERBIT DESC
						LIMIT 1";
					$query = $this->db->queryRaw($sql);
					$data['rowsBefore'] = $query->result();
				}
			}
		}
		else if($for == "META")
		{
			if($id != 0)
			{
				$sql = "select TITLE,CONCAT('".base_url()."assets/images/news/',IDNEWS,'.png') as GAMBAR,CONCAT('".base_url()."news-detail?i=',IDNEWS) as URL
					from TNEWS  
					WHERE TNEWS.STATUS = 1  AND TNEWS.IDNEWS = $id
					$limit";
				$query = $this->db->queryRaw($sql);
				$data['rows'] = $query->result();	
			}
		}
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