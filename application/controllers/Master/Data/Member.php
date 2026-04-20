<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['model_master_member']);
	}
	
	public function index(){
		$kodeMenu = $this->input->get('kode');
		// panggil set page di MY_Controller
		$this->setPage($kodeMenu, $config);
	}
	
	public function web() {
		$this->output->set_content_type('application/json');
		$response = $this->model_master_member->web($this->input->get("for"));
		echo json_encode($response);
	}

	public function loginWeb() {
		$email = $this->input->post("EMAIL","");
		$password = $this->input->post("PASSWORD","");
		$response = $this->model_master_member->loginWeb($email,$password);
		if ($response != ""){
			// generate an error... or use the log_message() function to log your error
			die(json_encode(array('errorMsg' => $response)));
		}
		else
		{
			echo json_encode(array('success' => true,'errorMsg' => ''));
		}
	}

	public function getDataWeb() {
		$this->output->set_content_type('application/json');
		$data = $this->model_master_member->getDataWeb($this->input->post("e",""));
		if(empty($data))
		{
			$response['success'] = false;
			$response['errorMsg'] = "Data tidak ditemukan";
		}
		else
		{
			$response['success'] = true;
			$response['rows'] = $data;
		}
		echo json_encode($response);
	}


	public function getKonfirmasiWeb() {
		$this->output->set_content_type('application/json');
		$id = decryptMember($this->input->post("i"));
	
		if(is_numeric($id))
		{
			$response = $this->model_master_member->getKonfirmasiWeb($id);
			if(empty($response))
			{
				$response->success = false;
				$response->errorMsg = "Link tidak valid";
			}
			else
			{
				$response->success = true;
			}
		}
		else
		{
			$response->success = false;
			$response->errorMsg = $id;

		}
		echo json_encode($response);
	}

	public function emailChangePassword(){
		$this->output->set_content_type('application/json');
		$data = $this->model_master_member->getDataWeb($this->input->post("e",""));
		if(empty($data))
		{
			$response['success'] = false;
			$response['errorMsg'] = "Data tidak ditemukan";
		}
		else
		{
			$response['success'] = true;
			$response['idweb'] = $data->IDMEMBER;

			sendEmail(
				$data->EMAIL,
				'Permintaan Ubah Password Akun Deltamania',
				'
				<div style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin:0; padding:0;">
					<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4; padding:20px;">
						<tr>
							<td align="center">
								<table width="500" cellpadding="0" cellspacing="0" style="background:#ffffff; padding:20px; border-radius:8px;">
									<tr>
										<td>
											<h2 style="color:#333;">Ubah Password Akun Deltamania</h2>
											<p>Hi, '.(strtoupper($data->NAMADEPAN)).'</p>
											<p>Kami menerima permintaan untuk mengubah password akun Deltamania-mu.</p>

											<p>Klik tombol di bawah ini untuk melanjutkan proses perubahan password akunmu. 
											<br>Link ini hanya berlaku selama <b>1 jam</b>.</p>
											<br>
											<p><a href="'.base_url().'changepassword?i='.$data->IDMEMBER.'&e=cp". style="padding:10px; background:#BB1111; color:#fff; font-weight:bold; text-decoration:none;">Ubah Password</a></p>
											<br>
											<p>Jika tombol di atas tidak berfungsi, salin dan tempel link berikut ke browser Anda:</p>
											<div style="background:#eee; padding:4px;">'.base_url().'changepassword?i='.$data->IDMEMBER.'&e=cp</div>
											<br>
											<p>Terima kasih.</p>

											<p style="margin-top:20px;">
												Salam,<br>
												<b>Tim Deltamania</b>
											</p>
										</td>
									</tr>
								</table>
								<p style="font-size:12px; color:#888; margin-top:10px;">Email ini dikirim secara otomatis, mohon tidak membalas email ini.</p>
							</td>
						</tr>
					</table>
				</body>'
			);
		}
		echo json_encode($response);
	}

	public function emailResetPassword(){
		$this->output->set_content_type('application/json');
		$data = $this->model_master_member->getDataWeb($this->input->post("e",""));
		if(empty($data))
		{
			$response['success'] = false;
			$response['errorMsg'] = "Data tidak ditemukan";
		}
		else
		{
			$response['success'] = true;
			$response['idweb'] = $data->IDMEMBER;

			sendEmail(
				$data->EMAIL,
				'Permintaan Atur Ulang Password Akun Deltamania',
				'
				<div style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin:0; padding:0;">
					<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4; padding:20px;">
						<tr>
							<td align="center">
								<table width="500" cellpadding="0" cellspacing="0" style="background:#ffffff; padding:20px; border-radius:8px;">
									<tr>
										<td>
											<h2 style="color:#333;">Atur Ulang Password Akun Deltamania</h2>
											<p>Hi, '.(strtoupper($data->NAMADEPAN)).'</p>
											<p>Kami menerima permintaan untuk mengatur ulang password akun Deltamania-mu.</p>

											<p>Klik tombol di bawah ini untuk melanjutkan proses pengaturan ulang password akunmu. 
											<br>Link ini hanya berlaku selama <b>1 jam</b>.</p>
											<br>
											<p><a href="'.base_url().'changepassword?i='.$data->IDMEMBER.'&e=rp". style="padding:10px; background:#BB1111; color:#fff; font-weight:bold; text-decoration:none;">Atur Ulang Password</a></p>
											<br>
											<p>Jika tombol di atas tidak berfungsi, salin dan tempel link berikut ke browser Anda:</p>
											<div style="background:#eee; padding:4px;">'.base_url().'changepassword?i='.$data->IDMEMBER.'&e=rp</div>
											<br>
											<p>Terima kasih.</p>

											<p style="margin-top:20px;">
												Salam,<br>
												<b>Tim Deltamania</b>
											</p>
										</td>
									</tr>
								</table>
								<p style="font-size:12px; color:#888; margin-top:10px;">Email ini dikirim secara otomatis, mohon tidak membalas email ini.</p>
							</td>
						</tr>
					</table>
				</body>'
			);
		}
		echo json_encode($response);
	}

	public function dataGrid() {
		$this->output->set_content_type('application/json');
		$response = $this->model_master_member->dataGrid($this->setPaginationGrid(), $this->setFilterGrid());
		echo json_encode($response);
	}
		
	public function simpan(){
        // die (json_encode(array('success' => false,'errorMsg' => 'cek swal')));
		$id     	= $this->input->post('IDMEMBER','');
		$namadepan  = $this->input->post('NAMADEPAN','');
		$namabelakang   = $this->input->post('NAMABELAKANG','');
		$status 	= $this->input->post('STATUS') ?? 0;

		$mode = $this->input->post('mode');
		if ($mode=='tambah') {
			$response = $this->model_master_member->cek_valid_email($this->input->post('EMAIL'),$id);
			if($response != ''){
				die(json_encode(array('errorMsg' => $response)));
			}
			$status = 1;
			$edit = false;
		}
		else{
			
			if($this->input->post('from') == "USER"){
				$id = decryptMember($id);

				if(!is_numeric($id))
				{
					die(json_encode(array('errorMsg' => $id)));
				}
			}

			$response = $this->model_master_member->cek_valid_email($this->input->post('EMAIL'),$id);
			if($response != ''){
				die(json_encode(array('errorMsg' => $response)));
			}
			$edit = true;
		}
		
		$data_values = array (
			'DARI'    	      => $this->input->post('from')??"",
			'TGLLAHIR'    	  => $this->input->post('TGLLAHIR')??"",
			'NIK'    	  	  => $this->input->post('NIK')??"",
			'NAMADEPAN'       => $namadepan,
			'NAMABELAKANG'    => $namabelakang,
			'ALAMAT'       	  => $this->input->post('ALAMAT')??"",
			'TELP'       	  => $this->input->post('TELP')??"",
			'TELPDARURAT'     => $this->input->post('TELPDARURAT')??"",
			'EMAIL'       	  => $this->input->post('EMAIL')??"",
			'INSTAGRAM'       => $this->input->post('INSTAGRAM')??"",
			'TIKTOK'          => $this->input->post('TIKTOK')??"",
			'CATATAN'         => $this->input->post('CATATAN')??"",
			'USERENTRY'       => $this->input->post('from') == "USER"? "-" : $_SESSION[NAMAPROGRAM]['USERID'],
			'TGLENTRY'        => date("Y-m-d h:i:s"),
			'STATUS'          => $status
		);

		if($mode == "tambah"){
			$data_values['KODEUNIK'] = generateKodeUnik();
			$data_values['PASSWORD'] = md5($data_values['KODEUNIK']);
		}

		$response = $this->model_master_member->simpan($id,$data_values,$edit);
		
	
		if (!is_numeric($response)){
			// generate an error... or use the log_message() function to log your error
			die(json_encode(array('errorMsg' => $response)));
		}

		if($edit){
			if($data_values['DARI'] == 'USER'){
					//SESSION
				$_SESSION[NAMAPROGRAM]['MEMBERNAME']   = $data_values['NAMADEPAN'];
				$_SESSION[NAMAPROGRAM]['EMAIL_MEMBER'] = $data_values['EMAIL'];
			}
		}
		else
		{
			if($data_values['DARI'] == 'USER'){
				
				generateQR($response,$data_values['KODEUNIK']);

				sendEmail(
					$data_values['EMAIL'],
					'Informasi Aktivasi Akun Deltamania',
					'
					<div style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin:0; padding:0;">
						<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f4; padding:20px;">
							<tr>
								<td align="center">
									<table width="500" cellpadding="0" cellspacing="0" style="background:#ffffff; padding:20px; border-radius:8px;">
										<tr>
											<td>
												<h2 style="color:#333;">Informasi Aktivasi Akun Deltamania</h2>
												<p>Hi, '.(strtoupper($data_values['NAMADEPAN'])).'</p>
												<p>Kami ingin menginformasikan bahwa akun member <b>Deltamania</b> Anda telah berhasil diaktifkan.</p>

												<table cellpadding="5" cellspacing="0" style="margin:15px 0;">
													<tr>
														<td><b>Email</b></td>
														<td>: '.$data_values['EMAIL'].'</td>
													</tr>
													<tr>
														<td><b>Password</b></td>
														<td>: <b>'.$data_values['KODEUNIK'].'</b></td>
													</tr>
												</table>

												<p>Silakan gunakan email dan password tersebut untuk login ke akun Anda. Demi keamanan, kami sangat menyarankan untuk segera mengganti password setelah berhasil masuk.</p>

												<p>Jika Anda mengalami kendala saat login atau membutuhkan bantuan lebih lanjut, jangan ragu untuk menghubungi kami.</p>

												<p>Terima kasih.</p>

												<p style="margin-top:20px;">
													Salam,<br>
													<b>Tim Deltamania</b>
												</p>
											</td>
										</tr>
									</table>
									<p style="font-size:12px; color:#888; margin-top:10px;">Email ini dikirim secara otomatis, mohon tidak membalas email ini.</p>
								</td>
							</tr>
						</table>
					</body>'
				);
			}
		}
		
		// panggil fungsi untuk log history
		log_history(
			$response,
			'MASTER MEMBER',
			$mode,
			array(
				array(
					'nama'  => 'header',
					'tabel' => 'MMEMBER',
					'kode'  => 'IDMEMBER',
					'id'	=> $response
				),
			),
			$_SESSION[NAMAPROGRAM]['USERID']??"USER"
		);

		echo json_encode(array('success' => true,'errorMsg' => '','idweb'=>encryptMember($response)));
	}
	
	function hapus(){
		$id = $this->input->post('id');

		$exe = $this->model_master_member->hapus($id);
		if ($exe != '') { die(json_encode(array('errorMsg'=>$exe))); }
		
		echo json_encode(array('success' => true));

		log_history(
			$id,
			'MASTER MEMBER',
			'HAPUS',
			[],
			$_SESSION[NAMAPROGRAM]['USERID']??"USER"
		);
	}

	function configTeam(){
		$this->output->set_content_type('application/json');
		$search = $this->input->get('search');

		$dataAll = $this->model_master_config->getConfigModul("TEAM");
		$dataResult = [];
		foreach($dataAll as $itemAll)
		{
			$arrData = explode(",",$itemAll->VALUE);
			foreach($arrData as $itemData)
			{
				array_push($dataResult, array(
					'TEXT' => $itemData,
					'VALUE' => $itemData, 
					'HEAD' => $itemAll->CONFIG
				));
			}
		}

		
		$data['rows'] = $dataResult;
		
		echo json_encode($data);
	}

	function logout(){
        session_start();
		// $r = $this->model_master_user->updateLogin($_SESSION[NAMAPROGRAM]['IDUSER'],0);

		unset($_SESSION[NAMAPROGRAM]);
		echo json_encode(array(
			'success' => true
		));
    }
}
