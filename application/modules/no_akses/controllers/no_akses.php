<?php
/**
*
*/
class No_akses extends CI_Controller{
	function __construct(){
		# code...
		parent::__construct();
	}
	
	function index() {
	    $data['users'] = $this->session->userdata('username');
	    $data['judul'] = 'Akses Tidak di Berikan...';
	    $data['main_content'] = 'v_no_akses'; //load the login_form.php view to the template.
	    $this->load->view('template', $data); 
    }
}