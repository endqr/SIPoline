<?php
/**
*
*/
class Pbb_lap_daftar_tunggakan_ereport extends CI_Controller{
	function __construct(){
		# code...
		parent::__construct();
		$this->load->model('M_daftar_tunggakan');
	}
	
	function index() {
		$data['judul'] = "Daftar Tunggakan";
	    $data['users'] = $this->session->userdata('username'); //Load session
	    $data['main_content'] = 'v_daftar_tunggakan'; 
		$Generate = $this->input->post('Generate');
			if(isset($Generate)){
				$KdKec = $this->input->post('KdKec');
				$KdKel = $this->input->post('KdKel');
				$JenisBuku = $this->input->post('JenisBuku');
				$DaftarTunggakan=$this->M_daftar_tunggakan->tampilTunggakan($KdKec, $KdKel);
				if($DaftarTunggakan){
					$data['DaftarTunggakan'] = json_encode(array('code'=>'200','msg'=>'Ada Data','data'=>$DaftarTunggakan));
					$data['JudulLaporan'] = "REKAP PIUTANG PAJAK BUMI DAN BANGUNAN";
					$data['JenisBuku'] = $JenisBuku;
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
		$data['judul'] = "Laporan Data Objek PBB Baru";
	    $data['users'] = $this->session->userdata('username'); //Load session
		$PeriodeAwal = $this->input->post('PeriodeAwal');
		$PeriodeAkhir = $this->input->post('PeriodeAkhir');
		$cekdata=$this->M_lap_objek_baru->generateReport($PeriodeAwal,$PeriodeAkhir); //ambil data pada model
		if($cekdata){
			$Laporan = json_encode(array('code'=>'200','msg'=>'Ada Data','data'=>$cekdata));
		}else{
			echo "Tidak ada Data";
		}
		$data['Laporan'] = $Laporan;
	    $data['main_content'] = 'v_tampil_laporan'; 
		$PeriodeAwal = explode("-",$PeriodeAwal);
		$PeriodeAkhir = explode("-",$PeriodeAkhir);
		$data['JudulLaporan'] = "Laporan Data Objek PBB Baru<br>Periode : ".$PeriodeAwal[2]."-".$PeriodeAwal[1]."-".$PeriodeAwal[0]." s/d ".$PeriodeAkhir[2]."-".$PeriodeAkhir[1]."-".$PeriodeAkhir[0];
		$data['SubJudulLaporan'] = "Periode : ".$PeriodeAwal[2]."-".$PeriodeAwal[1]."-".$PeriodeAwal[0]." s/d ".$PeriodeAkhir[2]."-".$PeriodeAkhir[1]."-".$PeriodeAkhir[0];
	    $this->load->view('template', $data); 
    }
}