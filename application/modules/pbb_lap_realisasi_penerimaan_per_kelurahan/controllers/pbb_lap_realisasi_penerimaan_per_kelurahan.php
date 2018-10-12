<?php
/**
*
*/
class Pbb_lap_realisasi_penerimaan_per_kelurahan extends CI_Controller{
	function __construct(){
		# code...
		parent::__construct();
		$this->load->model('m_realisasi_per_kelurahan','m');
	}
	
	function index() {
		$data['judul'] = "Laporan Realisasi Penerimaan PBB Per Kelurahan";
	    $data['users'] = $this->session->userdata('username'); //Load session
	    $data['main_content'] = 'v_lap_realisasi_penerimaan_per_kelurahan'; 
		if($this->input->post('Simpan')){
			$PeriodeAwal = $this->input->post('PeriodeAwal');
			$PeriodeAkhir = $this->input->post('PeriodeAkhir');
			$KodeKec = $this->input->post('KodeKecamatan');
			$JenisBuku = $this->input->post('JenisBuku');
			if($Generate = $this->m->getPembayaran($PeriodeAwal, $PeriodeAkhir, $KodeKec, $JenisBuku)){
				$data['Laporan'] = $Generate;
			}
			$data['JudulLaporan'] = "Laporan Realisasi Penerimaan PBB Per Kelurahan";
			$xPeriodeAwal = explode('-',$PeriodeAwal);
			$xPeriodeAkhir = explode('-',$PeriodeAkhir);
			$data['PeriodeAwal'] = $xPeriodeAwal[2].'-'.$xPeriodeAwal[1].'-'.$xPeriodeAwal[0];
			$data['PeriodeAkhir'] = $xPeriodeAkhir[2].'-'.$xPeriodeAkhir[1].'-'.$xPeriodeAkhir[0];
			if($JenisBuku=='0'){
				$data['JenisBuku'] = "Semua Buku";
			}elseif($JenisBuku=='1'){
				$data['JenisBuku'] = "Buku 1, 2 & 3";
			}else{
				$data['JenisBuku'] = "Buku 4 & 5";
			}
		}
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
		$data['judul'] = "Laporan Realisasi Penerimaan PBB Per Kelurahan";
	    $data['users'] = $this->session->userdata('username'); //Load session
		$PeriodeAwal = $this->input->post('PeriodeAwal');
		$PeriodeAkhir = $this->input->post('PeriodeAkhir');
		$xKodeKecamatan = $this->input->post('KodeKecamatan');
		$xKodeKecamatan = explode("~",$xKodeKecamatan);
		$KodeKecamatan = $xKodeKecamatan[0];
		
		$Tahun = $this->input->post('Tahun');
		$KodeKelurahan = $this->input->post('KodeKelurahan');
		$JenisBuku = $this->input->post('JenisBuku');
		$KodeKelurahan = explode(".",$KodeKelurahan);
		$x = 0;
  		$xUrl = 'http://172.20.31.1/sismiop/web_service_endqr/get_lap_target_vs_realisasi_per_kelurahan_buku?PeriodeAwal='.$PeriodeAwal.
			'&PeriodeAkhir='.$PeriodeAkhir.'&KodeKecamatan='.$KodeKecamatan.'&Tahun='.$Tahun.'&JenisBuku='.$JenisBuku;
		$Laporan = file_get_contents($xUrl);
		$data['Laporan'] = $Laporan;
	    $data['main_content'] = 'v_tampil_laporan'; 
		$PeriodeAwal = explode("-",$PeriodeAwal);
		$PeriodeAkhir = explode("-",$PeriodeAkhir);
		$data['SubJudulLaporan'] = "Periode : ".$PeriodeAwal[2]."-".$PeriodeAwal[1]."-".$PeriodeAwal[0]." s/d ".$PeriodeAkhir[2]."-".$PeriodeAkhir[1]."-".$PeriodeAkhir[0];
		$data['JudulLaporan'] = "Laporan Realisasi Penerimaan PBB Per Kelurahan<br>Periode : ".$PeriodeAwal[2]."-".$PeriodeAwal[1]."-".$PeriodeAwal[0]." s/d ".$PeriodeAkhir[2]."-".$PeriodeAkhir[1]."-".$PeriodeAkhir[0];
		if($JenisBuku=='0'){
		$data['JenisBuku'] = "Buku 1, 2, 3, 4 & 5";
		}elseif($JenisBuku=='1'){
			$data['JenisBuku'] = "Buku 1, 2 & 3";
		}else{
			$data['JenisBuku'] = "Buku 4 dan 5";
		}
		
		$data['NmKec'] = $xKodeKecamatan[1];
	    $this->load->view('template', $data); 
    }
}