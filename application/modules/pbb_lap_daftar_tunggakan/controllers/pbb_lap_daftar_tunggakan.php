<?php
/**
*
*/
class Pbb_lap_daftar_tunggakan extends CI_Controller{
	function __construct(){
		# code...
		parent::__construct();
	}
	
	function index() {
		$data['judul'] = "Laporan Daftar Tunggakan PBB";
	    $data['users'] = $this->session->userdata('username'); //Load session
	    $data['main_content'] = 'v_lap_daftar_tunggakan'; 
	    $this->load->view('template', $data); 
    }

	function getKelurahan(){
	$Kec = $this->input->post('KodeKecamatan');
	$xUrl = 'http://localhost/sismiop/web_service/get_kelurahan?kd_kec='.$Kec;
	$json = file_get_contents($xUrl);
	$obj = json_decode($json);
	$data = $obj->data;
	echo json_encode($data);
	}
	
	function GenerateLaporan() {
		$data['judul'] = "Laporan Daftar Tunggakan PBB";
	    $data['users'] = $this->session->userdata('username'); //Load session
		if(!$TahunPajak = $this->input->post('TahunPajak')){
			redirect(site_url('/pbb_lap_daftar_tunggakan'));
		};
		
		$KodeKecamatan = $this->input->post('KodeKecamatan');
		$KodeKelurahan = $this->input->post('KodeKelurahan');
		$KodeBuku = $this->input->post('Buku');
		$KodeKelurahan = explode(".",$KodeKelurahan);
 		$xUrl = 'http://172.20.31.1/sismiop/web_service_endqr/getDaftarTunggakan?TahunPajak='.$TahunPajak.
			'&KodeKecamatan='.$KodeKecamatan.'&KodeKelurahan='.$KodeKelurahan[3].'&KodeBuku='.$KodeBuku;
		$Laporan = file_get_contents($xUrl);
		$data['Laporan'] = $Laporan;
	    $data['main_content'] = 'v_lap_daftar_tunggakan'; 
		$data['JudulLaporan'] = "Daftar Tunggakan PBB";
	    $this->load->view('template', $data); 
    }
}