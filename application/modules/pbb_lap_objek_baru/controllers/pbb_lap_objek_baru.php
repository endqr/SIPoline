<?php
/**
*
*/
class Pbb_lap_objek_baru extends CI_Controller{
	function __construct(){
		# code...
		parent::__construct();
		$this->load->model('M_lap_objek_baru');
	}
	
	function index() {
		$data['judul'] = "Daftar Objek Baru";
	    $data['users'] = $this->session->userdata('username'); //Load session
		if($Simpan = $this->input->post('Simpan')){
			$data['main_content'] = 'v_tampil_laporan'; 
			if($Laporan = $this->GenerateLaporan()){
				$data['JudulLaporan'] = "Laporan Data PBB";
				$data['Laporan'] = $Laporan;
			}
		}else{
			$data['main_content'] = 'v_lap_objek_baru'; 
		}
		$this->load->view('template', $data);
    }

	function getKelurahan(){
	$Kec = $this->input->post('KodeKecamatan');
	$xUrl = 'http://bapenda.padang.go.id:8080/sismiop/web_service/get_kelurahan?kd_kec='.$Kec;
	$json = file_get_contents($xUrl);
	$obj = json_decode($json);
	$data = $obj->data;
	echo json_encode($data);
	}

	function GenerateLaporan() {
		$PeriodeAwal = $this->input->post('PeriodeAwal');
		$PeriodeAkhir = $this->input->post('PeriodeAkhir');
		$KdJnsPelayanan = $this->input->post('KdJnsPelayanan');
		$cekdata=$this->M_lap_objek_baru->generateReport($PeriodeAwal,$PeriodeAkhir, $KdJnsPelayanan); //ambil data pada model
		$PeriodeAwal = explode("-",$PeriodeAwal);
		$PeriodeAkhir = explode("-",$PeriodeAkhir);
		$xPeriodeAwal = $PeriodeAwal[2]."-".$PeriodeAwal[1]."-".$PeriodeAwal[0];
		$xPeriodeAkhir = $PeriodeAkhir[2]."-".$PeriodeAkhir[1]."-".$PeriodeAkhir[0];
		if($cekdata){
			return $Laporan = json_encode(array('code'=>'200','msg'=>'Ada Data','PeriodeAwal'=> $xPeriodeAwal,'PeriodeAkhir'=> $xPeriodeAkhir,'data'=>$cekdata));
		}else{
			return $Laporan = json_encode(array('code'=>'404','msg'=>'Tidak Ada Data'));
		}
    }
}