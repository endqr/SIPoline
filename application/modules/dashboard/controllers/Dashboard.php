<?php
/**
*
*/
class Dashboard extends CI_Controller{
	function __construct(){
		# code...
		parent::__construct();
		$this->load->model('m_dashboard');
	}
	
	function index() {
	    $data['users'] = $this->session->userdata('username');
	    $data['main_content'] = 'tampildashboard'; //load the login_form.php view to the template.
		$DashPAD=$this->m_dashboard->tampilDashPAD();
		if($DashPAD){
			$data['DashPAD'] = json_encode(array('code'=>'200','msg'=>'Ada Data','data'=>$DashPAD));
			$data['JudulDashPAD'] = "GRAFIK REALISASI VS TARGET OPD PENGHASIL";
		}
		
		if($TargetPokja = $this->m_dashboard->getTargetPokja()){
			$data['targetPokja'] = $TargetPokja;
		}
		
		if($RealisasiPokja = $this->m_dashboard->getRealisasiPokja()){
			$data['RealisasiPokja'] = $RealisasiPokja;
		}
	    $this->load->view('template', $data); 
    }
}