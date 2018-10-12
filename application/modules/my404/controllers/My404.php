<?php
/**
* Nama Modul      : Controller 404
* Dibuat Oleh     : Endang Kurniawan
* Dibuat Tanggal  : 2017-07-31
* Selesai Tanggal : -
*/
class My404 extends CI_Controller{
	function __construct(){
		# code...
		parent::__construct();
	}
	
	function index() {
	    $data['judul'] = "Sedang Pembangunan";
		$data['main_content'] = 'v_404';
	    $this->load->view('template', $data); 
    }
}