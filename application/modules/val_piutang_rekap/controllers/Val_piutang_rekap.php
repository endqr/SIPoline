<?php
/**
*	Nama Controllers 	: Rekap Validasi Piutang
*	Dibuat Oleh		 	: Endang Kurniawan
*	Dibuat Tanggal	 	: 13 Oktober 2017
*/
class Val_piutang_rekap extends CI_Controller{
	function __construct(){
		# code...
		parent::__construct();
		$this->load->model('M_val_rekap','m');
	}
	
	function index() {
		$data['judul'] = "Rekap Validasi Piutang";
	    $data['users'] = $this->session->userdata('username'); //Load session
		$data['daftarKec'] = $this->m->getListKec();
		if($Simpan = $this->input->post('Simpan')){
			if($Laporan = $this->GenerateLaporan()){
				$data['JudulLaporan'] = "Laporan Data PBB";
				$data['Laporan'] = $Laporan;
			}
		}
			$data['main_content'] = 'v_val_rekap_form'; 
		
		$this->load->view('template', $data);
    }

	function getKelurahan(){
	$Kec = $this->input->post('KodeKec');
	$DaftarKel = $this->m->getKel($Kec);
	echo json_encode($DaftarKel);
	}

	function GenerateLaporan() {
		$KodeKec = $this->input->post('KodeKec');
		$KodeKel = $this->input->post('KodeKel');
		$KodeKategori = $this->input->post('KodeKategori');
		if($KodeKategori=='0'){
			$Kategori = 'LUNAS';
		}elseif($KodeKategori=='1'){
			$Kategori = 'OBJEK TIDAK DITEMUKAN';
		}elseif($KodeKategori=='2'){
			$Kategori = 'NOP GANDA';
		}elseif($KodeKategori=='3'){
			$Kategori = 'SUBJEK TIDAK DITEMUKAN';
		}elseif($KodeKategori=='4'){
			$Kategori = 'BELUM LUNAS';
		}else{
			$Kategori = 'SELURUH KATEGORI';
		}
		$Kec = $this->m->getNmKec($KodeKec);
		$Kel = $this->m->getNmKel($KodeKec, $KodeKel);
		$cekdata=$this->m->generateReport($KodeKec, $KodeKel, $KodeKategori);
		if($cekdata){
			return $Laporan = json_encode(array('code'=>'200','msg'=>'Ada Data','Kec'=> $Kec,'Kel'=> $Kel,'Kategori'=> $Kategori,'data'=>$cekdata));
		}else{
			return $Laporan = json_encode(array('code'=>'404','msg'=>'Tidak Ada Data','Kec'=> $Kec,'Kel'=> $Kel,'Kategori'=> $Kategori));
		}
    }
}