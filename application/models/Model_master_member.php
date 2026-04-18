<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_master_member extends MY_Model{

	public function getAll(){
		$data = $this->db->query("select * from MMEMBER");
		return $data->result();
	}
	
	public function comboGrid(){
		
		$sql = "select IDMEMBER as VALUE, CONCAT(NAMADEPAN,' ',NAMABELAKANG) as TEXT
				from MMEMBER  
				ORDER BY NAMADEPAN";
		$query = $this->db->query($sql);	
		$data['rows'] = $query->result();
		return $data;
	}
	
	public function web($for){	

		$sql = "select IDMEMBER as ID,CONCAT(NAMADEPAN,' ',NAMABELAKANG) as NAMA, GOAL, ASSIST, GKSAVE, POSITION, SQUADNUMBER, CONCAT('".base_url()."assets/images/member/',IDMEMBER,'.png') as GAMBAR
				from MMEMBER  
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
				WHERE MODUL = 'TEAM' AND CONFIG = 'IDMEMBER' ";
			$queryConfig = $this->db->queryRaw($sqlConfig);	
			$dataConfig = $queryConfig->result();

			foreach($dataConfig as $itemConfig){
				$dataPlayerConfig = explode(",",$itemConfig->VALUE);
				for($x = 0 ; $x < count($data['senior_team']) ; $x++)
				{
					$player = $data['senior_team'][$x];
					foreach($dataPlayerConfig as $iteMMEMBERConfig){
						if($iteMMEMBERConfig == $player->ID)
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

	public function loginWeb($email,$password){
		$sql = "select * 
				from MMEMBER a
				where UPPER(a.EMAIL) = UPPER('".$email."')";
		$data = $this->db->query($sql)->row();
	
		if(empty($data))
		{
			return "Member tidak ditemukan / belum terdaftar";
		}
		else{
			if(md5($password) != $data->PASSWORD)
			{
				return "Email / Password salah";
			}
			else if($data->STATUS == 0)
			{
				return "Akun Member tidak aktif";
			}
			else if($data->STATUS == -1)
			{
				return "Akun Member belum diaktifkan";
			}
			else
			{
				//SESSION
			}
		}
		
		return "";
	}

	public function getKonfirmasiWeb($id){
		$sql = "select a.NAMADEPAN,a.EMAIL
				from MMEMBER a
				WHERE a.IDMEMBER = $id";
		$data = $this->db->query($sql)->row();
		
		return $data;
	}

	public function dataGrid(){
		
		$data = [];

		$sql = "select c.USERNAME as USERBUAT, a.*,b.NAMA as CLUB, CONCAT(NAMADEPAN,' ',NAMABELAKANG) as NAMA
				from MMEMBER a
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
			$this->db->where("IDMEMBER",$id);
			$this->db->updateRaw('MMEMBER',$data);
			
		}else{
			$this->db->insertRaw('MMEMBER',$data);
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
    
			$config['upload_path']      = './assets/images/member/';
			$config['allowed_types']    = 'png|jpg|jpeg|gif|webp';
			$config['file_ext_tolower'] = TRUE;
			$config['max_size']         = 1000; // KB
			$config['file_name']        = $id.'.png';
			$config['overwrite']        = TRUE;
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('GAMBAR')) {
				$this->db->trans_rollback();
				return $this->upload->display_errors();
			}

			// ── Kompress & konversi ke format asli ──
			$upload_data = $this->upload->data();
			$file_path   = './assets/images/member/' . $upload_data['file_name'];
			$ext         = strtolower($upload_data['file_ext']); // .jpg, .png, dst

			// Buat image resource sesuai format
			switch ($ext) {
				case '.jpg':
				case '.jpeg':
					$img = imagecreatefromjpeg($file_path);
					break;
				case '.png':
					$img = imagecreatefrompng($file_path);
					break;
				case '.gif':
					$img = imagecreatefromgif($file_path);
					break;
				case '.webp':
					$img = imagecreatefromwebp($file_path);
					break;
				default:
					$img = false;
			}

			if ($img) {
				// Resize jika lebih dari 242x294
				$orig_w = imagesx($img);
				$orig_h = imagesy($img);
				$max_w  = 242;
				$max_h  = 294;

				if ($orig_w > $max_w || $orig_h > $max_h) {
					$ratio   = min($max_w / $orig_w, $max_h / $orig_h);
					$new_w   = (int)($orig_w * $ratio);
					$new_h   = (int)($orig_h * $ratio);
					$resized = imagecreatetruecolor($new_w, $new_h);

					// Pertahankan transparansi untuk PNG
					if ($ext === '.png') {
						imagealphablending($resized, false);
						imagesavealpha($resized, true);
						$transparent = imagecolorallocatealpha($resized, 0, 0, 0, 127);
						imagefilledrectangle($resized, 0, 0, $new_w, $new_h, $transparent);
					}

					imagecopyresampled($resized, $img, 0, 0, 0, 0, $new_w, $new_h, $orig_w, $orig_h);
					imagedestroy($img);
					$img = $resized;
				}

				// Simpan dengan kompresi sesuai format
				switch ($ext) {
					case '.jpg':
					case '.jpeg':
						imagejpeg($img, $file_path, 80); // kualitas 80%
						break;
					case '.png':
						imagepng($img, $file_path, 8);   // kompresi 0-9, 8 = tinggi
						break;
					case '.gif':
						imagegif($img, $file_path);
						break;
					case '.webp':
						imagewebp($img, $file_path, 80); // kualitas 80%
						break;
				}

				imagedestroy($img);
			}
		}
		
		$this->db->trans_commit();
		return $id;
	}
	
	function hapus($id){
		$this->db->trans_begin();
		
		$path = FCPATH . 'assets/images/member/' . $id.'.png';

		if (file_exists($path)) {
			unlink($path); // 🔥 hapus file
		}

		$this->db->where('IDMEMBER',$id)
				->delete('MMEMBER');
		if ($this->db->trans_status() === FALSE) { 
			$this->trans_rollback();
			return 'Data Player Tidak Dapat Dihapus'; 
		}
		
		$this->db->trans_commit();
		return '';
	}
	
	function cek_valid_email($email,$id=""){
		$sql = "select * 
				from MMEMBER a
				where UPPER(a.EMAIL) = UPPER(?)
				and a.IDMEMBER != ?";
		$query = $this->db->query($sql, [$email,$id])->row();
		if(isset($query)){
			return 'Email sudah digunakan oleh member lain';
		}else{
			return '';
		}
	}
}
?>