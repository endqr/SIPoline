<?php
/**
*
*/
class Admin_autentikasi extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_admin_autentikasi');
	}
	
	public function index(){
		$this->loginform();
	}
	
	public function loginform(){
		$d['judul'] = "Area Login Administrator";
		$d['judulform'] = "Login Administrator";
		$d['main_content'] = "formlogin";
	    $this->load->view('template_login', $d); 
	}
	
	public function proseslogin(){
		//input dari form login
		$username = $this->input->post('username');
		$password = $this->input->post('password'); //enkripsi pake md5
		
		//validasi form
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');
		
		//jalankan validasi form
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('pesan1','Username dan password masih kosong');
			redirect(site_url(),'/admin_autentikasi/loginform');
		}else{
			$this->load->model('m_admin_autentikasi','',TRUE);
			$cekdata=$this->m_admin_autentikasi->ceklogin($username,$password); //ambil data pada model
			
			//cek login
			if($cekdata){
				
				foreach($cekdata as $datalogin){
					#code
					$username = $datalogin['user_id'];
					$id = $datalogin['id'];
					$nip = $datalogin['nip'];
					$nama = $datalogin['nama'];
					$kode_opd = $datalogin['kode_opd'];
					$nama_opd = $datalogin['nama_opd'];
				}
				
				//Buat Log
				$buatLog=$this->m_admin_autentikasi->buatLog($username);
				
				//buat array
				$dlogin=array(
					'username'=>$username,
					'id'=>$id,
					'nip'=>$nip,
					'nama'=>$nama,
					'kode_opd'=>$kode_opd,
					'nama_opd'=>$nama_opd,
					'logged_in'=>TRUE
				);
				
				//buat sesion
				$this->session->set_userdata($dlogin);

	$UserId = $username;
	$Menu = '';
	$sql = "SELECT m.kode_menu, m.nama_menu, m.lvl, m.id_menu FROM tmmenu m, role_akses ra, tmkaryawan k, tmuser u 
			WHERE ra.kode_menu = m.kode_menu AND k.nip = ra.nip AND k.user_id = u.user_id AND m.lvl = '0' AND u.user_id = '$UserId'
			ORDER BY m.id_menu ASC";
	$query = $this->db->query($sql);
	if($query->num_rows()>0){
		foreach($query->result_array() as $data){
			#code
			$KodeMenu = $data['kode_menu'];
			$NamaMenu = $data['nama_menu'];
			$LvlMenu = $data['lvl'];
			$IdMenu = $data['id_menu'];
				$Menu = $Menu. " <li>
                    <a href='#'><i class='fa fa-sitemap fa-fw'></i> $NamaMenu<span class='fa arrow'></span></a> ";
					$sql = "SELECT m.kode_menu, m.nama_menu, m.lvl, m.id_menu FROM tmmenu m, role_akses ra, tmkaryawan k, tmuser u 
							WHERE ra.kode_menu = m.kode_menu AND k.nip = ra.nip AND k.user_id = u.user_id AND m.lvl = '1' AND m.id_menu LIKE CONCAT('$IdMenu','%') AND u.user_id = '$UserId'
							ORDER BY m.id_menu ASC";
					$query1 = $this->db->query($sql);
					if($query1->num_rows()>0){
						$Menu = $Menu. " <ul class='nav nav-second-level'> ";
						foreach($query1->result_array() as $data1){
							$KodeMenu1 = $data1['kode_menu'];
							$NamaMenu1 = $data1['nama_menu'];
							$LvlMenu1 = $data1['lvl'];
							$IdMenu1 = $data1['id_menu'];
                            $Menu = $Menu. " <li>
								<a href='#'>$NamaMenu1 <span class='fa arrow'></span></a> ";
								$sql = "SELECT m.kode_menu, m.nama_menu, m.lvl, m.id_menu FROM tmmenu m, role_akses ra, tmkaryawan k, tmuser u 
										WHERE ra.kode_menu = m.kode_menu AND k.nip = ra.nip AND k.user_id = u.user_id AND m.lvl = '2' AND m.id_menu LIKE CONCAT('$IdMenu1','%') AND u.user_id = '$UserId'
										ORDER BY m.id_menu ASC";
								$query2 = $this->db->query($sql);
								
								if($query->num_rows()>0){
									$Menu = $Menu. " <ul class='nav nav-third-level'> ";
									foreach($query2->result_array() as $data){
									$KodeMenu2 = $data['kode_menu'];
									$NamaMenu2 = $data['nama_menu'];
									$LvlMenu2 = $data['lvl'];
									$IdMenu2 = $data['id_menu'];
									$Link = base_url($KodeMenu2);
                                    
                                        $Menu = $Menu. " <li>
                                            <a href='$Link' onclick='load_masking()'>$NamaMenu2</a>
                                        </li> ";
									}
                                    $Menu = $Menu. " </ul> ";
								}
								
                            $Menu = $Menu. " </li> ";							
						}
						$Menu = $Menu. " </ul> ";
					}
				$Menu = $Menu. " </li> ";
		}
	}
		
$this->session->set_userdata('Menu', $Menu);








				//direct kehalaman dashboard
				redirect(site_url().'/dashboard');
			}else{
				//login gagal direct ke form login dan tampilkan pesan kesalahan
				$this->session->set_flashdata('pesan2','OWWW!!!... username dan password salah!!!');
				redirect(site_url().'/admin_autentikasi/loginform');
			}
		}
	}
	
	public function logout(){
		$dlogin = array(
			'username'=>'',
			'logged_in' => ''
		);
		$this->session->unset_userdata($dlogin); //hapus session
		$this->session->sess_destroy(); //tutup session
		redirect(site_url().'admin_autentikasi');
		
	}
	
	public function getMenu0($UserId){
		$DaftarMenu=$this->m_admin_autentikasi->checkmenu0($UserId);
		if($DaftarMenu){
			return $Menu =array('Level0'=>$DaftarMenu); //array("SUREL","BPHTB","PBB","PAD")
		}
	}
	
	public function getMenu1($UserId, $IdMenu){
		$DaftarMenu=$this->m_admin_autentikasi->checkmenu1($UserId, $IdMenu);
		if($DaftarMenu){
			return $Menu =array('Level1'=>$DaftarMenu); //array("SUREL","BPHTB","PBB","PAD")
		}
	}
	
	public function getMenu2($UserId, $IdMenu1){
		$DaftarMenu=$this->m_admin_autentikasi->checkmenu2($UserId, $IdMenu1);
		if($DaftarMenu){
			return $Menu =array('Level2'=>$DaftarMenu);
		}
	}
}