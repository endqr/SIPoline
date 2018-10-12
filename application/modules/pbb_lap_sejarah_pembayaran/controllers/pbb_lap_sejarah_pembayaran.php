<?php
/**
*
*/
class Pbb_lap_sejarah_pembayaran extends CI_Controller{
	function __construct(){
		# code...
		parent::__construct();
//		$this->load->model('M_lap_sejarah_pembayaran');
	}
	
	function index() {
		$data['judul'] = "Laporan Sejarah Pembayaran Objek Pajak";
	    $data['users'] = $this->session->userdata('username'); //Load session
	    $data['main_content'] = 'v_lap_sejarah_pembayaran'; 
	    $this->load->view('template', $data); 
    }

	function GenerateLaporan() {
		$data['judul'] = "Sejarah Pembayaran Objek Pajak";
	    $data['users'] = $this->session->userdata('username'); //Load session
		$NOP = $this->input->post('NOP');
 		$xUrl = 'http://172.20.31.1/sismiop/web_service_endqr/getSejarahNOP?nop='.$NOP;
		$Laporan = file_get_contents($xUrl);
		$data['Laporan'] = $Laporan;
	    $data['main_content'] = 'v_lap_sejarah_pembayaran'; 
		$data['JudulLaporan'] = "Laporan Sejarah Pembayaran Objek Pajak";
	    $this->load->view('template', $data); 
    }
}