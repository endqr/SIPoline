<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Nama Modul      : Model Rekonsiliasi PBB
* Dibuat Oleh     : Endang Kurniawan
* Dibuat Tanggal  : 2017-09-04
* Selesai Tanggal : -
*/

class M_rekon extends CI_model {
	private $dbOracle;
	public function __construct(){
		parent::__construct();
		$this->dbOracle = $this->load->database('oracle', TRUE);
	}

 function getPembayaran($PeriodeAwal, $PeriodeAkhir, $KodeTP, $JenisBuku){
		$sql = "SELECT PBS.KD_PROPINSI||PBS.KD_DATI2||PBS.KD_KECAMATAN||PBS.KD_KELURAHAN||PBS.KD_BLOK||PBS.NO_URUT||PBS.KD_JNS_OP AS NOP,
			PBS.THN_PAJAK_SPPT, S.NM_WP_SPPT, (PBS.JML_SPPT_YG_DIBAYAR - PBS.DENDA_SPPT) AS POKOK, PBS.DENDA_SPPT AS DENDA_SPPT, PBS.TGL_PEMBAYARAN_SPPT,
				CASE WHEN (PBS.JML_SPPT_YG_DIBAYAR - PBS.DENDA_SPPT) < 2000000 THEN '1' ELSE '2' END AS JENIS_BUKU
			FROM PEMBAYARAN_SPPT PBS 
			LEFT JOIN SPPT S 
			ON PBS.KD_PROPINSI||'.'||PBS.KD_DATI2||'.'||PBS.KD_KECAMATAN||'.'||PBS.KD_KELURAHAN||'.'||PBS.KD_BLOK||'.'||PBS.NO_URUT||'.'||PBS.KD_JNS_OP||'.'||PBS.THN_PAJAK_SPPT = S.KD_PROPINSI||'.'||S.KD_DATI2||'.'||S.KD_KECAMATAN||'.'||S.KD_KELURAHAN||'.'||S.KD_BLOK||'.'||S.NO_URUT||'.'||S.KD_JNS_OP||'.'||S.THN_PAJAK_SPPT
		WHERE PBS.TGL_PEMBAYARAN_SPPT >= TO_DATE('$PeriodeAwal','YYYY-MM-DD')
		AND PBS.TGL_PEMBAYARAN_SPPT <= TO_DATE('$PeriodeAkhir','YYYY-MM-DD') 
		AND PBS.KD_TP = '$KodeTP'";
	$query = $this->dbOracle->query($sql);
	if($query->num_rows()>0){
		return $query->result_array();
	}
 }
 
function getTransBank($PeriodeAwal, $PeriodeAkhir, $KodeTP, $JenisBuku){
		$sql = "SELECT bb.nop, bb.tahun, bb.nominal, bb.tgl_trans, bb.nama 
			FROM bayar_bank bb 
			WHERE bb.tgl_trans >= '$PeriodeAwal' 
			AND bb.tgl_trans <= '$PeriodeAkhir' 
			AND bb.kode_tp = '$KodeTP'";
	$query = $this->db->query($sql);
	if($query->num_rows()>0){
		return $query->result_array();
	}
 }
}