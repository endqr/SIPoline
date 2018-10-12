<?php
/**
* Dibuat Oleh     : Endang Kurniawan
* Dibuat Tanggal  : 2017-08-03
* Selesai Tanggal : -
*/
class Pbb_list_bayar_tahun extends CI_Controller{
	function __construct(){
		# code...
		parent::__construct();
		$this->load->model('M_list_bayar_tahun');
	}
	
	function index() {
		$data['judul'] = "Daftar Pembayaran PBB Per Tahun";
	    $data['users'] = $this->session->userdata('username'); //Load session
		if($Generate = $this->input->post('Generate')){
			$this->GenerateLaporan();
		}else{
			$data['main_content'] = 'v_list_bayar_tahun';
			$this->load->view('template', $data);
		}			
	     
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
		$data['judul'] = "Daftar Pembayaran PBB";
		$PeriodeAwal = $this->input->post('PeriodeAwal');
		$PeriodeAkhir = $this->input->post('PeriodeAkhir');
		$KodeKecamatan = $this->input->post('KodeKecamatan');
		$KodeKelurahan = $this->input->post('KodeKelurahan');
		$Tahun = $this->input->post('Tahun');
		$JenisBuku = $this->input->post('JenisBuku');
		$cekdata=$this->M_list_bayar_tahun->generateReport($PeriodeAwal, $PeriodeAkhir, $KodeKecamatan, $KodeKelurahan, $Tahun, $JenisBuku);
		if($cekdata){
			$Laporan = json_encode(array('code'=>'200','msg'=>'Ada Data','data'=>$cekdata));
			$data['Laporan'] = $Laporan;
		}
	    $data['main_content'] = 'v_tampil_laporan'; 
		$PeriodeAwal = explode("-",$PeriodeAwal);
		$PeriodeAkhir = explode("-",$PeriodeAkhir);
		$data['JudulLaporan'] = "Daftar Wajib Pajak Yang Membayar";
		$data['SubJudulLaporan'] = "Periode : ".$PeriodeAwal[2]."-".$PeriodeAwal[1]."-".$PeriodeAwal[0]." s/d ".$PeriodeAkhir[2]."-".
			$PeriodeAkhir[1]."-".$PeriodeAkhir[0];
		$data['SubSubJudulLaporan'] = "Tahun $Tahun";
	    $this->load->view('template', $data); 
    }
}