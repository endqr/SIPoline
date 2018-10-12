<?php
/**
*
*/
class Pbb_lap_realisasi_tunggakan extends CI_Controller{
	function __construct(){
		# code...
		parent::__construct();
		$this->load->model('m_lap_realisasi_tunggakan');
	}
	
	function index() {
		$data['judul'] = "Laporan Realisasi Tunggakan Per Kecamatan";
	    $data['users'] = $this->session->userdata('username'); //Load session
	    $data['main_content'] = 'v_lap_target_vs_realisasi_per_kecamatan'; 
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
		$data['judul'] = "Laporan Realisasi terhadap Target Per Kecamatan";
	    $data['users'] = $this->session->userdata('username'); //Load session
		$PeriodeAwal = $this->input->post('PeriodeAwal');
		$PeriodeAkhir = $this->input->post('PeriodeAkhir');
		$Tahun = date('Y');
		$cekdata=$this->m_lap_target_vs_realisasi_per_kecamatan->generateReport($PeriodeAwal,$PeriodeAkhir, $Tahun); //ambil data pada model
		if($cekdata){
			$Laporan = json_encode(array('code'=>'200','msg'=>'Ada Data','data'=>$cekdata));
		}else{
			echo "Tidak ada Data";
		}
		$data['Laporan'] = $Laporan;
	    $data['main_content'] = 'v_lap_target_vs_realisasi_per_kecamatan_tampil'; 
		$data['JudulLaporan'] = "Laporan Realisasi terhadap Target Per Kecamatan";
	    $this->load->view('template', $data); 
    }
}