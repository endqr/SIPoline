<?php
/**
*
*/
class Pbb_lap_belum_bayar extends CI_Controller{
	function __construct(){
		# code...
		parent::__construct();
	}
	
	function index() {
		$data['judul'] = "PBB Yang Belum di Bayar";
	    $data['users'] = $this->session->userdata('username'); //Load session
	    $data['main_content'] = 'v_lap_belum_bayar'; 
	    $this->load->view('template', $data); 
    }

	function GenerateLaporan() {
		$data['judul'] = "PBB Yang Belum di Bayar";
	    $data['users'] = $this->session->userdata('username'); //Load session
		$NOP = $this->input->post('NOP');
 		$xUrl = 'http://172.20.31.1/sismiop/web_service_endqr/getSejarahNOP?nop='.$NOP;
		$Laporan = file_get_contents($xUrl);
		$data['Laporan'] = $Laporan;
	    $data['main_content'] = 'v_lap_belum_bayar'; 
		$data['JudulLaporan'] = "Laporan PBB Yang Belum di Bayar";
	    $this->load->view('template', $data); 
    }
}