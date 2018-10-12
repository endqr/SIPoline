<?php
/**
*
*/
class Ereport_piu_tahun extends CI_Controller{
	function __construct(){
		# code...
		parent::__construct();
		$this->load->model('M_piu_tahun');
	}
	
	function index() {
		$data['judul'] = "Daftar Tunggakan";
	    $data['users'] = $this->session->userdata('username'); //Load session
	    $data['main_content'] = 'v_form_tunggakan'; 
		$Generate = $this->input->post('Generate');
			if(isset($Generate)){
				$KdKec = $this->input->post('KdKec');
				$KdKel = $this->input->post('KdKel');
				$Tahun = $this->input->post('Tahun');
				$DaftarTunggakan=$this->M_piu_tahun->tampilTunggakan($KdKec, $KdKel, $Tahun);
				if($DaftarTunggakan){
					$data['Tahun'] = $Tahun;
					$data['DaftarTunggakan'] = json_encode(array('code'=>'200','msg'=>'Ada Data','data'=>$DaftarTunggakan));
					$data['JudulLaporan'] = "REKAP PIUTANG PAJAK BUMI DAN BANGUNAN";
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
}