<?php
/**
* Nama Model	: M_piu_tahun.php
* Deskripsi		: Untuk Menampilkan Database Daftar Tunggakan
* Dibuat Oleh 	: Endang Kurniawan
* Dibuat Tgl	: 27 Juli 2017
*/

class M_piu_tahun extends CI_Model{
	private $dbOracle;
	public function __construct(){
		parent::__construct();
		$this->dbOracle = $this->load->database('oracle', TRUE);
	}
	
	public function tampilTunggakan($Kecamatan, $Kelurahan, $Tahun){
		$sql = "SELECT
				S.KD_PROPINSI || '.' || S.KD_DATI2 || '.' || S.KD_KECAMATAN || '.' || S.KD_KELURAHAN || '.' || S.KD_BLOK || '.' || 
				S.NO_URUT || '.' ||S.KD_JNS_OP AS NOP,
				S.NM_WP_SPPT AS NM_WP_SPPT,
				S.JLN_WP_SPPT AS JLN_WP_SPPT,
				S.BLOK_KAV_NO_WP_SPPT AS BLOK_KAV_NO_WP_SPPT,
				S.RT_WP_SPPT AS RT_WP_SPPT,
				S.RW_WP_SPPT AS RW_WP_SPPT,
				S.KELURAHAN_WP_SPPT AS KELURAHAN_WP_SPPT,
				S.KOTA_WP_SPPT AS KOTA_WP_SPPT,
				DOP.JALAN_OP AS JALAN_OP,
				DOP.BLOK_KAV_NO_OP AS BLOK_KAV_NO_OP,
				DOP.RT_OP AS RT_OP,
				DOP.RW_OP AS RW_OP,
				S.PBB_YG_HARUS_DIBAYAR_SPPT
			FROM
				SPPT S
			LEFT JOIN DAT_OBJEK_PAJAK DOP ON S.KD_KECAMATAN = DOP.KD_KECAMATAN
			AND S.KD_KELURAHAN = DOP.KD_KELURAHAN
			AND S.KD_BLOK = DOP.KD_BLOK
			AND S.NO_URUT = DOP.NO_URUT
			WHERE
				S.STATUS_PEMBAYARAN_SPPT = '0'
			AND
				S.KD_KECAMATAN = '$Kecamatan'
			AND
				S.KD_PROPINSI||'.'||S.KD_DATI2||'.'||S.KD_KECAMATAN||'.'||S.KD_KELURAHAN = '$Kelurahan'
			AND
				S.THN_PAJAK_SPPT = '$Tahun'";
		$query = $this->dbOracle->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}
	}
}
?>