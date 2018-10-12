<?php
/**
*
*/
class Pbb_lap_realisasi_penerimaan_per_kecamatan extends CI_Controller{
	function __construct(){
		# code...
		parent::__construct();
	}
	
	function index() {
		$data['judul'] = "Laporan Realisasi Penerimaan PBB Per Kecamatan";
	    $data['users'] = $this->session->userdata('username'); //Load session
	    $data['main_content'] = 'v_lap_realisasi_penerimaan_per_kecamatan'; 
	    $this->load->view('template', $data); 
    }

	function getKelurahan(){
	$Kec = $this->input->post('KodeKecamatan');
	$xUrl = 'http://172.20.31.1/sismiop/web_service/get_kelurahan?kd_kec='.$Kec;
	$json = file_get_contents($xUrl);
	$obj = json_decode($json);
	$data = $obj->data;
	echo json_encode($data);
	}
	
	function GenerateLaporan() {
		$data['judul'] = "Laporan Realisasi Penerimaan PBB Per Kecamatan";
	    $data['users'] = $this->session->userdata('username'); //Load session
		$PeriodeAwal = $this->input->post('PeriodeAwal');
		$PeriodeAkhir = $this->input->post('PeriodeAkhir');
		$KodeKecamatan = $this->input->post('KodeKecamatan');
		$KodeKelurahan = $this->input->post('KodeKelurahan');
		$KodeBuku = $this->input->post('Buku');
		$KodeKelurahan = explode(".",$KodeKelurahan);
		$x = 0;
  		$xUrl = 'http://172.20.31.1/sismiop/web_service_endqr/getRealisasiPenerimaanPBBPerKecamatan?PeriodeAwal='.$PeriodeAwal.
			'&PeriodeAkhir='.$PeriodeAkhir.'&KodeKecamatan='.$KodeKecamatan.'&KodeKelurahan='.$KodeKelurahan[3].'&KodeBuku='.$KodeBuku;
		$Laporan = file_get_contents($xUrl);
		$data['Laporan'] = $Laporan;
	    $data['main_content'] = 'v_lap_realisasi_penerimaan_per_kecamatan'; 
		$PeriodeAwal = explode("-",$PeriodeAwal);
		$PeriodeAkhir = explode("-",$PeriodeAkhir);
		$data['JudulLaporan'] = "Laporan Realisasi Penerimaan PBB Per Kecamatan<br>Periode : ".$PeriodeAwal[2]."-".$PeriodeAwal[1]."-".$PeriodeAwal[0]." s/d ".$PeriodeAkhir[2]."-".$PeriodeAkhir[1]."-".$PeriodeAkhir[0];
	    $this->load->view('template', $data); 
    }
}