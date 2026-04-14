<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fixture extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(['model_competition_fixture']);
	}
	
	public function index(){
		$kodeMenu = $this->input->get('kode');
		// panggil set page di MY_Controller
		$this->setPage($kodeMenu, $config);
	}

	public function youtubeAPI() {
		header('Content-Type: application/json');
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET');
		
		$YOUTUBE_API_KEY = 'AIzaSyC5-R1kpDMuam_2RM8qeStsiDbjHImULgw';
		
		$videoId = $this->input->get('videoId');
		
		if (empty($videoId)) {
			http_response_code(400);
			echo json_encode(['error' => 'videoId is required']);
			exit;
		}
		
		$data = $this->getYouTubeData($videoId, $YOUTUBE_API_KEY);
		
		if ($data === null) {
			http_response_code(404);
			echo json_encode(['error' => 'Video not found']);
			exit;
		}
		
		echo json_encode($data);
	}

	// ─────────────────────────────────────────────
	// Fungsi: ambil data pakai YouTube Data API v3
	// ─────────────────────────────────────────────
	function getYouTubeData(string $videoId, string $apiKey): ?array {
		$url = 'https://www.googleapis.com/youtube/v3/videos?part=snippet&id='
			. urlencode($videoId)
			. '&key=' . urlencode($apiKey);
	
		$response = $this->httpGet($url);
	
		if ($response === null) {
			// Fallback ke oEmbed kalau API gagal
			return $this->getYouTubeDataNoAPIKey($videoId);
		}
	
		$json = json_decode($response, true);
	
		if (!empty($json['items'][0]['snippet'])) {
			$snippet = $json['items'][0]['snippet'];
			return [
				'title'       => $snippet['title']                         ?? '',
				'publishedAt' => $snippet['publishedAt']                   ?? '',  // "2025-03-15T10:30:00Z"
				'thumbnail'   => $snippet['thumbnails']['high']['url']     ?? '',
			];
		}
	
		// Items kosong → coba oEmbed
		return getYouTubeDataNoAPIKey($videoId);
	}
	
	// ─────────────────────────────────────────────
	// Fungsi: fallback pakai oEmbed (tanpa API key)
	// ─────────────────────────────────────────────
	function getYouTubeDataNoAPIKey(string $videoId): ?array {
		$oembedUrl = 'https://www.youtube.com/oembed?url='
				. urlencode('https://www.youtube.com/watch?v=' . $videoId)
				. '&format=json';
	
		$response = $this->httpGet($oembedUrl);
	
		if ($response === null) {
			return null;
		}
	
		$json = json_decode($response, true);
	
		if (empty($json['title'])) {
			return null;
		}
	
		return [
			'title'       => $json['title']         ?? '',
			'publishedAt' => '',                          // oEmbed tidak kasih tanggal
			'thumbnail'   => $json['thumbnail_url'] ?? '',
		];
	}
	
	// ─────────────────────────────────────────────
	// Helper: HTTP GET pakai cURL
	// ─────────────────────────────────────────────
	function httpGet(string $url): ?string {
		$ch = curl_init($url);
		curl_setopt_array($ch, [
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_TIMEOUT        => 10,
			CURLOPT_USERAGENT      => 'Mozilla/5.0',
			CURLOPT_SSL_VERIFYPEER => true,
		]);
	
		$response  = curl_exec($ch);
		$httpCode  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$curlError = curl_error($ch);
		curl_close($ch);
	
		if ($curlError || $httpCode < 200 || $httpCode >= 300) {
			error_log('httpGet failed [' . $httpCode . ']: ' . $curlError . ' → ' . $url);
			return null;
		}
	
		return $response;
	}

	public function web() {
		$this->output->set_content_type('application/json');
		$response = $this->model_competition_fixture->web($this->input->get("for"),$this->input->get("s"));
		echo json_encode($response);
	}

	public function comboGrid() {
		$this->output->set_content_type('application/json');
		$response = $this->model_competition_fixture->comboGrid($this->input->get('search'));
		echo json_encode($response);
	}
	
	public function comboGridTransaksi() {
		$this->output->set_content_type('application/json');
		$response = $this->model_competition_fixture->comboGridTransaksi($this->setPaginationGrid());
		echo json_encode($response);
	}

	public function dataGrid() {
		$this->output->set_content_type('application/json');
		$response = $this->model_competition_fixture->dataGrid($this->setPaginationGrid(), $this->setFilterGrid());
		echo json_encode($response);
	}

	public function dataGridDetail(){
		$this->output->set_content_type('application/json');
		$response = $this->model_competition_fixture->dataGridDetail($this->input->get("IDFIXTURE")??0);
		echo json_encode($response);
	}
		
	public function simpan(){
        // die (json_encode(array('success' => false,'errorMsg' => 'cek swal')));
		$id        = $this->input->post('IDFIXTURE','');
		$nama      = $this->input->post('NAMA');
		$status    = $this->input->post('STATUS') ?? 0;
		$a_detail  = json_decode($this->input->post('DETAILFIXTURE'));

		$mode = $this->input->post('mode');
		if ($mode=='tambah') {
            
			$response = $this->model_competition_fixture->cek_valid_nama($nama);
			if($response != ''){
				die(json_encode(array('errorMsg' => $response)));
			}
			
			$status = 1;
			$edit = false;
		}
		else{
			//jika edit
			//cek apakah nama sudah digunakan
			$response = $this->model_competition_fixture->cek_valid_nama($nama,$id);
			if($response != ''){
				die(json_encode(array('errorMsg' => $response)));
            }
            
			$edit = true;
		}
		
		$data_values = array (
			'NAMA'    	      => $nama,
			'SEASONAWAL'      => ($this->input->post('SEASONAWAL')."-01")??"",
			'SEASONAKHIR'     => ($this->input->post('SEASONAKHIR')."-01")??"",
			'CATATAN'         => $this->input->post('CATATAN')??"",
			'USERENTRY'       => $_SESSION[NAMAPROGRAM]['USERID'],
			'TGLENTRY'        => date("Y-m-d h:i:s"),
			'STATUS'          => $status
		);
		$response = $this->model_competition_fixture->simpan($id,$data_values,$a_detail,$edit);
		if (!is_numeric($response)){
			// generate an error... or use the log_message() function to log your error
			die(json_encode(array('errorMsg' => $response)));
		}
		
		// panggil fungsi untuk log history
		log_history(
			$response,
			'COMPETITION FIXTURE',
			$mode,
			array(
				array(
					'nama'  => 'header',
					'tabel' => 'TFIXTURE',
					'kode'  => 'IDFIXTURE',
					'id'	=> $response
				),
				array(
					'nama'  => 'detail',
					'tabel' => 'TFIXTUREDTL',
					'kode'  => 'IDFIXTURE',
					'id'	=> $response
				),
			),
			$_SESSION[NAMAPROGRAM]['USERID']
		);

		echo json_encode(array('success' => true,'errorMsg' => ''));
	}
	
	function hapus(){
		$id = $this->input->post('id');

		$exe = $this->model_competition_fixture->hapus($id);
		if ($exe != '') { die(json_encode(array('errorMsg'=>$exe))); }
		
		echo json_encode(array('success' => true));

		log_history(
			$id,
			'COMPETITION FIXTURE',
			'HAPUS',
			[],
			$_SESSION[NAMAPROGRAM]['USERID']
		);
	}
}
