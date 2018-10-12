<?php
/**
* Nama Model	: M_daftar_tunggakan.php
* Deskripsi		: Untuk Menampilkan Database Daftar Tunggakan
* Dibuat Oleh 	: Endang Kurniawan
* Dibuat Tgl	: 02 Mei 2017
*/

class M_daftar_tunggakan extends CI_Model{
	private $dbOracle;
	public function __construct(){
		parent::__construct();
		$this->dbOracle = $this->load->database('oracle', TRUE);
	}
	
	public function tampilTunggakan($Kecamatan, $Kelurahan){
		$Tahun = date('Y');
		$sql = "SELECT
				MAX(S.KD_PROPINSI) || '.' || MAX(S.KD_DATI2) || '.' || MAX(S.KD_KECAMATAN) || '.' || MAX(S.KD_KELURAHAN) || '.' || MAX(S.KD_BLOK) || '.' || 
				MAX(S.NO_URUT) || '.' || MAX(S.KD_JNS_OP) AS NOP,
				MIN(S.NM_WP_SPPT) AS NM_WP_SPPT,
				MIN(S.JLN_WP_SPPT) AS JLN_WP_SPPT,
				MIN(S.BLOK_KAV_NO_WP_SPPT) AS BLOK_KAV_NO_WP_SPPT,
				MIN(S.RT_WP_SPPT) AS RT_WP_SPPT,
				MIN(S.RW_WP_SPPT) AS RW_WP_SPPT,
				MIN(S.KELURAHAN_WP_SPPT) AS KELURAHAN_WP_SPPT,
				MIN(S.KOTA_WP_SPPT) AS KOTA_WP_SPPT,
				MAX(DOP.JALAN_OP) AS JALAN_OP,
				MAX(DOP.BLOK_KAV_NO_OP) AS BLOK_KAV_NO_OP,
				MAX(DOP.RT_OP) AS RT_OP,
				MAX(DOP.RW_OP) AS RW_OP,
				MAX(RKC.NM_KECAMATAN) AS KEC_OP,
				MAX(RKL.NM_KELURAHAN) AS KEL_OP,
				SUM (
					CASE 
						WHEN S.THN_PAJAK_SPPT = '2008'
							THEN S.PBB_YG_HARUS_DIBAYAR_SPPT
						END
				)	AS PBB_2008,
				SUM(
					CASE 
						WHEN S.THN_PAJAK_SPPT = '2009'
							THEN S.PBB_YG_HARUS_DIBAYAR_SPPT
						END
				)	AS PBB_2009,
				SUM(
					CASE 
						WHEN S.THN_PAJAK_SPPT = '2010'
							THEN S.PBB_YG_HARUS_DIBAYAR_SPPT
						END
				)	AS PBB_2010,
				SUM(
					CASE 
						WHEN S.THN_PAJAK_SPPT = '2011'
							THEN S.PBB_YG_HARUS_DIBAYAR_SPPT
						END
				)	AS PBB_2011,
				SUM(
					CASE 
						WHEN S.THN_PAJAK_SPPT = '2012'
							THEN S.PBB_YG_HARUS_DIBAYAR_SPPT
						END
				)	AS PBB_2012,
				SUM(
					CASE 
						WHEN S.THN_PAJAK_SPPT = '2013'
							THEN S.PBB_YG_HARUS_DIBAYAR_SPPT
						END
				)	AS PBB_2013,
				SUM(
					CASE 
						WHEN S.THN_PAJAK_SPPT = '2014'
							THEN S.PBB_YG_HARUS_DIBAYAR_SPPT
						END
				)	AS PBB_2014,
				SUM(
					CASE 
						WHEN S.THN_PAJAK_SPPT = '2015'
							THEN S.PBB_YG_HARUS_DIBAYAR_SPPT
						END
				)	AS PBB_2015,
				SUM(
					CASE 
						WHEN S.THN_PAJAK_SPPT = '2016'
							THEN S.PBB_YG_HARUS_DIBAYAR_SPPT
						END
				)	AS PBB_2016,
				SUM(
					CASE 
						WHEN S.THN_PAJAK_SPPT = '2017'
							THEN S.PBB_YG_HARUS_DIBAYAR_SPPT
						END
				)	AS PBB_2017,
				SUM(
					CASE 
						WHEN S.THN_PAJAK_SPPT = '2018'
							THEN S.PBB_YG_HARUS_DIBAYAR_SPPT
						END
				)	AS PBB_2018,
				SUM(S.PBB_YG_HARUS_DIBAYAR_SPPT) AS PBB_TOTAL
			FROM
				SPPT S
			LEFT JOIN DAT_OBJEK_PAJAK DOP ON S.KD_KECAMATAN = DOP.KD_KECAMATAN
			AND S.KD_KELURAHAN = DOP.KD_KELURAHAN
			AND S.KD_BLOK = DOP.KD_BLOK
			AND S.NO_URUT = DOP.NO_URUT
			LEFT JOIN REF_KECAMATAN RKC
			ON S.KD_KECAMATAN = RKC.KD_KECAMATAN
			LEFT JOIN REF_KELURAHAN RKL
			ON S.KD_KECAMATAN = RKL.KD_KECAMATAN
			AND S.KD_KELURAHAN = RKL.KD_KELURAHAN
			WHERE
				S.STATUS_PEMBAYARAN_SPPT = '0'
			AND
				S.KD_KECAMATAN = '$Kecamatan'
			AND
				S.KD_PROPINSI||'.'||S.KD_DATI2||'.'||S.KD_KECAMATAN||'.'||S.KD_KELURAHAN = '$Kelurahan'
			GROUP BY 	S.KD_PROPINSI || S.KD_DATI2 || S.KD_KECAMATAN || S.KD_KELURAHAN || S.KD_BLOK || S.NO_URUT || S.KD_JNS_OP";
		$query = $this->dbOracle->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}
	}
}
?>