<?php
/**
*
*/
class Pbb_lap_penerimaan_per_bank extends CI_Controller{
	function __construct(){
		# code...
		parent::__construct();
	}
	
	function index() {
		$data['judul'] = "Laporan Realisasi Penerimaan PBB Per Bank";
	    $data['users'] = $this->session->userdata('username'); //Load session
	    $data['main_content'] = 'v_lap_penerimaan_per_bank'; 
	    $this->load->view('template', $data); 
    }

	function getKelurahan(){
	$Kec = $this->input->post('KodeKecamatan');
	$xUrl = 'http://http://27.124.92.113/sismiop/web_service/get_kelurahan?kd_kec='.$Kec;
	$json = file_get_contents($xUrl);
	$obj = json_decode($json);
	$data = $obj->data;
	echo json_encode($data);
	}
	
	function GenerateLaporan() {
		$data['judul'] = "Laporan Realisasi Penerimaan PBB Per Bank";
	    $data['users'] = $this->session->userdata('username'); //Load session
		$PeriodeAwal = $this->input->post('PeriodeAwal');
		$PeriodeAkhir = $this->input->post('PeriodeAkhir');
		$JenisBuku = $this->input->post('JenisBuku');
		$KodeTP = $this->input->post('KodeTP');
		$KodeTP = explode("-",$KodeTP);
 		$xUrl = 'http://27.124.92.114/sismiop/web_service_endqr/getRealisasiPenerimaanPBBPerBank?PeriodeAwal='.$PeriodeAwal.
			'&PeriodeAkhir='.$PeriodeAkhir.'&KodeTP='.$KodeTP[0].'&JenisBuku='.$JenisBuku;
		$Laporan = file_get_contents($xUrl);
		$data['Laporan'] = $Laporan;
	    $data['main_content'] = 'v_lap_penerimaan_per_bank'; 
		$PeriodeAwal = explode("-",$PeriodeAwal);
		$PeriodeAkhir = explode("-",$PeriodeAkhir);
		$data['JudulLaporan'] = "Laporan Realisasi Penerimaan PBB Per Bank<br>Periode : ".$PeriodeAwal[2]."-".$PeriodeAwal[1]."-".$PeriodeAwal[0]." s/d ".$PeriodeAkhir[2]."-".$PeriodeAkhir[1]."-".$PeriodeAkhir[0]."<br>Tempat Pembayaran : ".$KodeTP[1];
		$data['SubJudulLaporan'] = "Periode : ".$PeriodeAwal[2]."-".$PeriodeAwal[1]."-".$PeriodeAwal[0]." s/d ".$PeriodeAkhir[2]."-".$PeriodeAkhir[1]."-".$PeriodeAkhir[0];
		$data['TempatBayar'] = $KodeTP[1];
	    $this->load->view('template', $data); 
    }
}