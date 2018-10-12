<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Nama Modul      : Model Proyeksi Pokok terhadap Target per Kelurahan
* Dibuat Oleh     : Endang Kurniawan
* Dibuat Tanggal  : 2017-09-11
* Selesai Tanggal : -
*/

class M_lap_penerimaan_bank extends CI_model {
	private $dbOracle;
	public function __construct(){
		parent::__construct();
		$this->dbOracle = $this->load->database('oracle', TRUE);
	}

 function getPembayaran($PeriodeAwal, $PeriodeAkhir, $JenisBuku, $KodeTP){
	 if($JenisBuku == '0'){
		$BatasBuku = " > 0";
	 }elseif($JenisBuku=='1'){
		 $BatasBuku = " < 2000000";
	 }else{
		 $BatasBuku = " >= 2000000";
	 }
	 
	 $sql = "SELECT PBS.KD_PROPINSI||'.'||PBS.KD_DATI2||'.'||PBS.KD_KECAMATAN||'.'||PBS.KD_KELURAHAN||'.'||
				PBS.KD_BLOK||'.'||PBS.NO_URUT||'.'||PBS.KD_JNS_OP AS NOP, S1.NM_WP_SPPT, PBS.THN_PAJAK_SPPT,
				CASE 
					WHEN S1.TGL_JATUH_TEMPO_SPPT >= PBS.TGL_PEMBAYARAN_SPPT THEN 
						(PBS.JML_SPPT_YG_DIBAYAR - PBS.DENDA_SPPT)
					END AS POKOK,
				CASE 
					WHEN S1.TGL_JATUH_TEMPO_SPPT < PBS.TGL_PEMBAYARAN_SPPT THEN 
						(PBS.JML_SPPT_YG_DIBAYAR - PBS.DENDA_SPPT)
					END AS PIUTANG,
				PBS.DENDA_SPPT, PBS.JML_SPPT_YG_DIBAYAR, PBS.TGL_PEMBAYARAN_SPPT
				FROM PEMBAYARAN_SPPT PBS
				LEFT JOIN SPPT S1
					ON PBS.KD_PROPINSI||PBS.KD_DATI2||PBS.KD_KECAMATAN||PBS.KD_KELURAHAN||PBS.KD_BLOK||PBS.NO_URUT||
					PBS.KD_JNS_OP||PBS.THN_PAJAK_SPPT
					= S1.KD_PROPINSI||S1.KD_DATI2||S1.KD_KECAMATAN||S1.KD_KELURAHAN||S1.KD_BLOK||S1.NO_URUT||
					S1.KD_JNS_OP||S1.THN_PAJAK_SPPT
				WHERE PBS.KD_TP = '$KodeTP'
				AND PBS.TGL_PEMBAYARAN_SPPT >= TO_DATE('$PeriodeAwal','YYYY-MM-DD')
				AND PBS.TGL_PEMBAYARAN_SPPT <= TO_DATE('$PeriodeAkhir','YYYY-MM-DD')
				AND (PBS.JML_SPPT_YG_DIBAYAR - PBS.DENDA_SPPT) $BatasBuku
				ORDER BY PBS.KD_PROPINSI||PBS.KD_DATI2||PBS.KD_KECAMATAN||PBS.KD_KELURAHAN||PBS.KD_BLOK||PBS.NO_URUT||
					PBS.KD_JNS_OP||PBS.THN_PAJAK_SPPT";
	$query = $this->dbOracle->query($sql);
	if($query->num_rows()>0){
		return $query->result_array();
	}
 }
}