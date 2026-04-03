<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_master_user extends MY_Model{

    function getUser($id) {
		return $this->db->where("USERNAME", $id)->get("MUSER")->row();
	} 
	
	function getUserByID($id) {
		return $this->db->where("IDUSER", $id)->get("MUSER")->row();
	}

	function getUserID($id) {
		return $this->db->where("USERID", $id)->get("MUSER")->row();
	}
	
	public function comboGrid()
	{
		
		$sql = "select CONCAT(a.USERID,' | ',a.USERNAME) as VALUE, CONCAT(a.USERID,' - ',a.USERNAME) as TEXT
				from MUSER a ";
		$query = $this->db->query($sql);
		
		$data['rows'] = $query->result();
		return $data;
	}
	
	function getUserFinger($id,$index=1) {
		if($index==1){
			return $this->db->where("IDUSER", $id)->get("MUSER")->row()->FINGERPRINT1;
		}else if($index==2){
			return $this->db->where("IDUSER", $id)->get("MUSER")->row()->FINGERPRINT2;
		}
	}
	
	function getStatusAktif($id){
		return $this->db->where("STATUS", 1)
						->where("USERID", $id)->get("MUSER")->row();
	}
	
	function registerFingerprint($iduser,$regTemp,$index=1){
		if($index == 1){
			$this->db->set('FINGERPRINT1',$regTemp);
		}else{
			$this->db->set('FINGERPRINT2',$regTemp);
		}
		
		$this->db->where('IDUSER',$iduser)
				 ->update('MUSER');
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return 'Menyimpan Data Fingerprint Gagal';
		}
		return '';
	}
	
	function updateLogin($iduser,$status){
		$data = array(
			'LOGIN' => $status
		);
		
		$this->db->where('IDUSER',$iduser)
				 ->update('MUSER',$data);
				 
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return 'Update Status Login Gagal';
		}
		return '';
	}

	function cekPerusahaan($user,$perusahaan){
		$query = $this->db->from('MUSER')
					->where('IDUSER', $user)
					->get()->row();
		return $query;
	}
	
	function getAkses($kodemenu, $iduser = ''){

		if ($iduser == '') {
			$iduser = $_SESSION[NAMAPROGRAM]['IDUSER'];
		}
		
		$query = $this->db->from('MUSERAKSES a')
					->join('MMENU b','a.KODEMENU = b.KODEMENU','inner join')
					->where('b.KODEMENU', $kodemenu)
					->where('b.STATUS', 1)
					->where('a.IDUSER', $iduser)
					->get()->row();
		
		return $query;
	}
	
	public function dataGrid($pagination, $filter){
		if (!isset($pagination['sort'])) {
			$pagination['sort'] = 'USERID';
		}

		$data = [];

		$sql = "select count(*) as ROW
				from MUSER a 
				left join MUSER b on a.USERENTRY = b.USERID
                where a.IDUSER > 0 
						and 1=1 {$filter['sql']}";
		$query = $this->db->query($sql, $filter['param']);

		$data['total'] = $query->row()->ROW;

		$sql = str_replace('count(*) as ROW', "b.USERNAME as USERBUAT,a.*,IF(a.LOGIN = 1, 'YA','TIDAK') as STATUSLOGIN", $sql)." order by {$pagination['sort']} {$pagination['order']} limit {$pagination['offset']}, {$pagination['rows']}";
		$query = $this->db->query($sql, $filter['param']);

		$data['rows'] = $query->result();

		return $data;
	}
	
	public function simpan($id, $edit, $data, $dataMaster, $dataTransaksi,$dataLaporan, $dataLokasi){
		$tr = $this->db->trans_begin();

		if ($edit) {
			$this->db->where("IDUSER",$id);
			$this->db->update('MUSER',$data);
		} else {
			$this->db->insert('MUSER',$data);
		}

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Simpan Data Gagal <br>Kesalahan Pada Header Data Transaksi';
		}
		if ($edit) {
			//hapus detail terlebih dahulu
			$this->db->where("IDUSER",$id)->delete('muserakses');
		} else {
			//mengambil auto increment
			$id = $this->db->insert_id();
		}
	

		$this->db->trans_commit();
		return $id;
	}

	public function insertAkses($id, $i = 0, $data) {
	    
	     foreach ($data as $item) {
			if ($item->KODEMODUL !== NULL) {
			
				$data_values = array (
					'IDUSER'	 => $id,
					'KODEMENU'	 => $item->KODEMODUL,
					'HAKAKSES'	 => $item->HAKAKSES,
					'TAMBAH'	 => $item->TAMBAH,
					'UBAH'		 => $item->UBAH,
					'HAPUS'		 => $item->HAPUS
				);
				$this->db->insert('MUSERAKSES',$data_values);

				if ($this->db->trans_status() === FALSE) {
					$this->db->trans_rollback();
					return 'Simpan Data Gagal <br>Kesalahan Pada Detail Data Transaksi';
				}
			}
		}
		
	}


	public function hapus($id){
		$tr = $this->db->trans_begin();

		$this->db->where("IDUSER",$id)->delete('MUSER');
		$this->db->where("IDUSER",$id)->delete('MUSERAKSES');
		$this->db->where("IDUSER",$id)->delete('muserlokasi');


		if ($this->db->trans_status() === FALSE) { 
			$this->trans_rollback();
			return 'Data User Tidak Dapat Dihapus, Data Sudah Digunakan Pada Transaksi'; 
		}
		
		$this->db->trans_commit();
		return '';
	}

    function cek_valid_userid($userid){
		$sql = "select USERID, USERNAME from MUSER where USERID = ?";
		$query = $this->db->query($sql, $userid)->row();
		if(isset($query)){
			return 'User ID Sudah Digunakan Oleh User '.$query->USERID. ' ('.$query->USERNAME.')';
		}else{
			return '';
		}
    }
    
	public function treeGrid($data){
		$tempSql = ''; //" and a.akses in ('ALL', '{$data['akses']}')";

		return $this->getTree($tempSql,'', $data['jenismenu'], 0, $data['user']);
	}

	private function getTree($tempSql, $parent = '', $namainduk = '', $i = 0, $userID = '') {
		$i++;
		$aData = array();
		
		$sql = "SELECT m.KODEMENU,l.NAMAMENU as NAMAMENUHEADER FROM MMENU m 
				left join MMENU l on l.KODEMENU = m.KODEINDUK
				WHERE m.NAMAMENU = '{$namainduk}'";
		$queryMenu = $this->db->query($sql)->result();
		
		$sqlMenu .= "select a.* from ( ";
		$count = 0;
		
		    
		foreach($queryMenu as $row)
		{
			if($count > 0)
			{
				$sqlMenu .= " union all ";
			}
			
			$parent = $row->KODEMENU;
			$header = $row->NAMAMENUHEADER;
			
			if ($parent <> '') {
				if ($userID <> '') { 
					$sqlMenu .= "select distinct '{$header}'as HEADER , a.KODEMENU as KODEMODUL,a.NAMAMENU as NAMAMODUL, a.URUTAN, a.TIPE, A.ICON,
								   if(isnull(b.HAKAKSES), 0, b.HAKAKSES) as HAKAKSES , 
								   if(isnull(B.TAMBAH), 0, b.TAMBAH) as TAMBAH, 
								   if(isnull(B.UBAH), 0, b.UBAH) as UBAH, 
								   if(isnull(B.HAPUS), 0, b.HAPUS) as HAPUS
							from MMENU a 
							left join MUSERAKSES b on a.KODEMENU = b.KODEMENU and b.iduser = {$userID}
							where a.KODEINDUK = '{$parent}' and a.STATUS=1
								  {$tempSql}
							";
				} else {
					$sqlMenu .= "select distinct '{$header}'as HEADER, a.KODEMENU as KODEMODUL, a.KODEINDUK,a.NAMAMENU as NAMAMODUL, a.URUTAN, a.TIPE, A.ICON,
								   0 as HAKAKSES, 0 as TAMBAH, 0 as UBAH, 0 as HAPUS
							from MMENU a 
							where a.KODEINDUK = '{$parent}' and a.STATUS=1 
								  {$tempSql}
							";
				}
			} else {
				$sqlMenu .= "select '{$header}'as HEADER, a.KODEMENU as KODEMODUL, a.KODEINDUK,a.NAMAMENU as NAMAMODUL, a.URUTAN, a.TIPE, a.ICON,
							   0 as HAKAKSES, 0 as TAMBAH, 0 as UBAH, 0 as HAPUS
						from MMENU a
						where (a.KODEINDUK is null or a.KODEINDUK = '') and a.STATUS=1 
							  {$tempSql}
						";
			}
			
			$count++;
			
		}
		$sqlMenu .=" ) as a ORDER BY a.URUTAN";
		
		$data['rows'] = $this->db->query($sqlMenu)->result();
		
		return $data;
	}
}
?>