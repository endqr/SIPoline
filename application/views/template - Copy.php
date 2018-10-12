<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/navbar'); ?>
	<?php
		if(!$userLogin = $this->session->userdata('username')){
		redirect(site_url().'/admin_autentikasi/loginform');
		}else{
		$Menu = $this -> router -> fetch_module();
		$UserId = $this->session->userdata('username');
		$sql = "SELECT u.user_id, k.nip, k.nama, k.kode_opd, o.nama_opd, ra.kode_menu, m.nama_menu 
				FROM tmuser u,  tmkaryawan k, tmopd o, role_akses ra, tmmenu m
					WHERE u.user_id = k.user_id 
					AND k.kode_opd = o.kd_opd
					AND k.nip = ra.nip
					AND ra.kode_menu = m.kode_menu
					AND u.user_id = '$UserId'
					AND m.kode_menu = '$Menu'";
		$query = $this->db->query($sql);
			if($query->num_rows()<1){
				redirect(site_url().'/admin_autentikasi/loginform');
			}
		}
		
	?>
    <?php $this->load->view($main_content); ?>
<?php $this->load->view('templates/footer'); ?>