<?php
/**
* Modul query pada admin_autentikasi
*/

class M_admin_autentikasi extends CI_Model{
	var $tabel = 'tlogin';
	public function __construct(){
		parent::__construct();
	}
	
	//periksa login data pada database
	public function ceklogin($user_id, $pass){
		$sql = "call sp_login('$user_id','$pass')";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}
	}

	public function buatLog($user_id){
		$sql = "INSERT INTO ttlog(user_id) VALUES('$user_id');";
		$query = $this->db->query($sql);
	}

	public function checkmenu0($UserId){
		$sql = "SELECT m.kode_menu, m.nama_menu, m.lvl, m.id_menu FROM tmmenu m, role_akses ra, tmkaryawan k, tmuser u WHERE ra.kode_menu = m.kode_menu AND k.nip = ra.nip AND k.user_id = u.user_id AND m.lvl = '0' AND u.user_id = '$UserId' ORDER BY m.id_menu ASC";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}
	}

	public function checkmenu1($UserId, $IdMenu){
		$sql = "SELECT m.kode_menu, m.nama_menu, m.lvl, m.id_menu FROM tmmenu m, role_akses ra, tmkaryawan k, tmuser u WHERE ra.kode_menu = m.kode_menu AND k.nip = ra.nip AND k.user_id = u.user_id AND m.lvl = '1' AND m.id_menu LIKE CONCAT('$IdMenu','%') AND u.user_id = '$UserId' ORDER BY m.id_menu ASC";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}
	}

	public function checkmenu2($UserId, $IdMenu1){
		$sql = "SELECT m.kode_menu, m.nama_menu, m.lvl, m.id_menu FROM tmmenu m, role_akses ra, tmkaryawan k, tmuser u WHERE ra.kode_menu = m.kode_menu AND k.nip = ra.nip AND k.user_id = u.user_id AND m.lvl = '2' AND m.id_menu LIKE CONCAT('$IdMenu1','%') AND u.user_id = '$UserId' ORDER BY m.id_menu ASC";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}
	}
}
?>