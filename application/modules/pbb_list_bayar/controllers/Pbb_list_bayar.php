<?php
/**
* Dibuat Oleh     : Endang Kurniawan
* Dibuat Tanggal  : 2017-07-26
* Selesai Tanggal : -
*/
class Pbb_list_bayar extends CI_Controller{
	function __construct(){
		# code...
		parent::__construct();
		$this->load->model('M_list_bayar','m');
	}
	
	function index() {
		$data['judul'] = "Daftar Pembayaran PBB";
	    $data['users'] = $this->session->userdata('username'); //Load session
		if($Generate = $this->input->post('Generate')){
			$this->GenerateLaporan();
		}else{
			$data['main_content'] = 'v_list_bayar';
			$this->load->view('template', $data);
		}			
	     
    }

	function getKelurahan(){
	$Kec = $this->input->post('KodeKecamatan');
		if($Kel = $this->m->getListKel($Kec)){
			echo json_encode($Kel);
		}
//	$xUrl = 'http://172.20.31.1/sismiop/web_service/get_kelurahan?kd_kec='.$Kec;
//	$json = file_get_contents($xUrl);
//	$obj = json_decode($json);
//	$data = $obj->data;
//	echo json_encode($data);
	}

	function GenerateLaporan() {
		ini_set('max_execution_time', 300); //300 seconds = 5 minutes
		$data['judul'] = "Daftar Pembayaran PBB";
		$PeriodeAwal = $this->input->post('PeriodeAwal');
		$PeriodeAkhir = $this->input->post('PeriodeAkhir');
		$KodeKecamatan = $this->input->post('KodeKecamatan');
		$KodeKelurahan = $this->input->post('KodeKelurahan');
		$cekdata=$this->m->generateReport($PeriodeAwal,$PeriodeAkhir,$KodeKecamatan,$KodeKelurahan); //ambil data pada model
		if($cekdata){
			$xPeriodeAwal = explode("-",$PeriodeAwal);
			$xPeriodeAkhir = explode("-",$PeriodeAkhir);
			$xPeriodeAwal = $xPeriodeAwal[2].'-'.$xPeriodeAwal[1].'-'.$xPeriodeAwal[0];
			$xPeriodeAkhir = $xPeriodeAkhir[2].'-'.$xPeriodeAkhir[1].'-'.$xPeriodeAkhir[0];
			if($KodeKecamatan=='000'){
				$Kecamatan = 'SELURUH KECAMATAN';
			}else{
				$Kecamatan = $this->m->getNamaKec($KodeKecamatan);
				foreach($Kecamatan as $Kec){
					$Kecamatan = $Kec['NM_KECAMATAN'];
					$Kecamatan = 'KECAMATAN : '.$Kecamatan;
					
					if($KodeKelurahan=='000'){
						$Kelurahan = 'SELURUH KELURAHAN';
					}else{
						$Kelurahan = $this->m->getNamaKel($KodeKecamatan, $KodeKelurahan);
						foreach($Kelurahan as $Kel){
							$Kelurahan = $Kel['NM_KELURAHAN'];
							$Kelurahan = 'KELURAHAN : '.$Kelurahan;
						}
					}					
				}
			}
			
			$Laporan = json_encode(array('code'=>'200','msg'=>'Ada Data','Kecamatan'=>$Kecamatan,'PeriodeAwal'=>$xPeriodeAwal,'PeriodeAkhir'=>$xPeriodeAkhir,'data'=>$cekdata));
		}else{
			$Laporan = json_encode(array('code'=>'404','msg'=>'Tidak Ada Data'));
		}
		$data['Laporan'] = $Laporan;
	    $data['main_content'] = 'v_tampil_laporan'; 
		$PeriodeAwal = explode("-",$PeriodeAwal);
		$PeriodeAkhir = explode("-",$PeriodeAkhir);
		$data['JudulLaporan'] = "Daftar Pembayaran PBB<br>Periode : ".$PeriodeAwal[2]."-".$PeriodeAwal[1]."-".$PeriodeAwal[0]." s/d ".$PeriodeAkhir[2]."-".$PeriodeAkhir[1]."-".$PeriodeAkhir[0];
		$data['SubJudulLaporan'] = "Periode : ".$PeriodeAwal[2]."-".$PeriodeAwal[1]."-".$PeriodeAwal[0]." s/d ".$PeriodeAkhir[2]."-".$PeriodeAkhir[1]."-".$PeriodeAkhir[0];
	    $this->load->view('template', $data); 
    }
}