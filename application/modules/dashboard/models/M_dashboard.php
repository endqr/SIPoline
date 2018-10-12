<?php
/**
* Nama Model	: M_dashboard.php
* Deskripsi		: Untuk Menampilkan Database Dashboard
* Dibuat Oleh 	: Endang Kurniawan
* Dibuat Tgl	: 09 Mei 2017
*/

class M_dashboard extends CI_Model{
	private $dbOracle;
	public function __construct(){
		parent::__construct();
		$this->dbOracle = $this->load->database('oracle', TRUE);
	}
	
	public function tampilDashPAD(){
		$sql = "CALL sp_dash_pad()";

		$query = $this->db->query($sql);
		if($query->num_rows()>0){
		return $query->result_array();
		$query->next_result();
		$query->free_result();
		return $query;
		}
	}
	
	public function getTargetPokja(){
		$Tahun = date('Y');
		$sql = "SELECT '010' as kd_kecamatan, '1996445966' as target_kecamatan, '5340' as wp123, '258455477' as target123, '22' as wp45, '1737990489' as target45, '02' as kode_pokja, 'POKJA 2' as nama_pokja UNION ALL 
			SELECT '020' as kd_kecamatan, '11094043192' as target_kecamatan, '11368' as wp123, '1014618970' as target123, '59' as wp45, '10079424222' as target45, '04' as kode_pokja, 'POKJA 4' as nama_pokja UNION ALL 
			SELECT '030' as kd_kecamatan, '5060821720' as target_kecamatan, '22122' as wp123, '1777949067' as target123, '168' as wp45, '3282872653' as target45, '03' as kode_pokja, 'POKJA 3' as nama_pokja UNION ALL 
			SELECT '040' as kd_kecamatan, '7255339522' as target_kecamatan, '10430' as wp123, '1342148626' as target123, '217' as wp45, '5913190896' as target45, '02' as kode_pokja, 'POKJA 2' as nama_pokja UNION ALL 
			SELECT '050' as kd_kecamatan, '6085377198' as target_kecamatan, '15952' as wp123, '2361034188' as target123, '236' as wp45, '3724343010' as target45, '03' as kode_pokja, 'POKJA 3' as nama_pokja UNION ALL 
			SELECT '060' as kd_kecamatan, '11752732570' as target_kecamatan, '14001' as wp123, '2903043374' as target123, '821' as wp45, '8849689196' as target45, '01' as kode_pokja, 'POKJA 1' as nama_pokja UNION ALL 
			SELECT '070' as kd_kecamatan, '8018855621' as target_kecamatan, '13339' as wp123, '2633565527' as target123, '273' as wp45, '5385290094' as target45, '01' as kode_pokja, 'POKJA 1' as nama_pokja UNION ALL 
			SELECT '080' as kd_kecamatan, '2559704016' as target_kecamatan, '13890' as wp123, '1566919847' as target123, '58' as wp45, '992784169' as target45, '05' as kode_pokja, 'POKJA 5' as nama_pokja UNION ALL 
			SELECT '090' as kd_kecamatan, '3979720715' as target_kecamatan, '32800' as wp123, '2174593283' as target123, '75' as wp45, '1805127432' as target45, '04' as kode_pokja, 'POKJA 4' as nama_pokja UNION ALL 
			SELECT '100' as kd_kecamatan, '4078214652' as target_kecamatan, '15591' as wp123, '1355770951' as target123, '124' as wp45, '2722443701' as target45, '04' as kode_pokja, 'POKJA 4' as nama_pokja UNION ALL 
			SELECT '110' as kd_kecamatan, '16118744828' as target_kecamatan, '54293' as wp123, '5239702324' as target123, '753' as wp45, '10879042504' as target45, '05' as kode_pokja, 'POKJA 5' as nama_pokja";
/*		
		$sql = "SELECT ptk.kd_kecamatan, 
					ptk.target_kecamatan, 
					ptk.kode_pokja, 
					tp.nama_pokja 
					FROM pbb_target_kec ptk
					LEFT JOIN tm_pokja tp 
					ON ptk.kode_pokja = tp.kode_pokja
					WHERE ptk.tahun = '$Tahun'";
*/		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}
	}
	
	public function getRealisasiPokja(){	
		$Tahun = date('Y');
		$sql = "SELECT MAX(PBS.KD_KECAMATAN) AS kd_kecamatan, MAX(RKC.NM_KECAMATAN) AS nm_kecamatan, 
			SUM(
				CASE WHEN PBS.DENDA_SPPT = 0 THEN
					PBS.JML_SPPT_YG_DIBAYAR - PBS.DENDA_SPPT
				END
				) AS POKOK, 
			SUM(
				CASE WHEN PBS.DENDA_SPPT > 0 THEN
					PBS.JML_SPPT_YG_DIBAYAR - PBS.DENDA_SPPT
				END
				) AS TUNGGAKAN, 
			SUM(PBS.DENDA_SPPT) AS DENDA
			FROM PEMBAYARAN_SPPT PBS
			LEFT JOIN REF_KECAMATAN RKC
			ON RKC.KD_KECAMATAN = PBS.KD_KECAMATAN
			WHERE EXTRACT(YEAR FROM PBS.TGL_PEMBAYARAN_SPPT) = '$Tahun'
			GROUP BY PBS.KD_KECAMATAN";
		$query = $this->dbOracle->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}
	}

	public function getRankingPokja(){		
		$sql = "SELECT PBS.KD_PROPINSI||'.'||PBS.KD_DATI2||'.'||PBS.KD_KECAMATAN||'.'||PBS.KD_KELURAHAN||'.'||PBS.KD_BLOK||'.'||PBS.NO_URUT||'.'||PBS.KD_JNS_OP AS NOP,
	S.NM_WP_SPPT, S.JLN_WP_SPPT, S.BLOK_KAV_NO_WP_SPPT, S.RT_WP_SPPT, S.RW_WP_SPPT, S.KELURAHAN_WP_SPPT, S.KOTA_WP_SPPT,
	DOP.JALAN_OP, DOP.BLOK_KAV_NO_OP, DOP.RT_OP, DOP.RW_OP, RKC.NM_KECAMATAN AS NM_KECAMATAN_OP, RKL.NM_KELURAHAN AS NM_KELURAHAN_OP,
	PBS.THN_PAJAK_SPPT, 
	CASE WHEN PBS.DENDA_SPPT = 0 THEN (PBS.JML_SPPT_YG_DIBAYAR - PBS.DENDA_SPPT) END AS POKOK, 
	CASE WHEN PBS.DENDA_SPPT <> 0 THEN (PBS.JML_SPPT_YG_DIBAYAR - PBS.DENDA_SPPT) END AS TUNGGAKAN, 
	PBS.DENDA_SPPT, 
	PBS.KD_TP, TPB.NM_TP
	FROM PEMBAYARAN_SPPT PBS
	LEFT JOIN TEMPAT_PEMBAYARAN TPB
	ON PBS.KD_TP = TPB.KD_TP
	LEFT JOIN SPPT S
	ON S.KD_PROPINSI||'.'||S.KD_DATI2||'.'||S.KD_KECAMATAN||'.'||S.KD_KELURAHAN||'.'||S.KD_BLOK||'.'||S.NO_URUT||'.'||S.KD_JNS_OP = 
		PBS.KD_PROPINSI||'.'||PBS.KD_DATI2||'.'||PBS.KD_KECAMATAN||'.'||PBS.KD_KELURAHAN||'.'||PBS.KD_BLOK||'.'||PBS.NO_URUT||'.'||PBS.KD_JNS_OP
	LEFT JOIN DAT_OBJEK_PAJAK DOP
	ON DOP.KD_PROPINSI||'.'||DOP.KD_DATI2||'.'||DOP.KD_KECAMATAN||'.'||DOP.KD_KELURAHAN||'.'||DOP.KD_BLOK||'.'||DOP.NO_URUT||'.'||DOP.KD_JNS_OP = 
		PBS.KD_PROPINSI||'.'||PBS.KD_DATI2||'.'||PBS.KD_KECAMATAN||'.'||PBS.KD_KELURAHAN||'.'||PBS.KD_BLOK||'.'||PBS.NO_URUT||'.'||PBS.KD_JNS_OP
	LEFT JOIN REF_KECAMATAN RKC
	ON RKC.KD_KECAMATAN = PBS.KD_KECAMATAN
	LEFT JOIN REF_KELURAHAN RKL
	ON RKL.KD_KECAMATAN = PBS.KD_KECAMATAN
	AND RKL.KD_KELURAHAN = PBS.KD_KELURAHAN
	WHERE EXTRACT(YEAR FROM PBS.TGL_PEMBAYARAN_SPPT) >= EXTRACT(YEAR FROM TO_DATE('$PeriodeAwal','YYYY-MM-DD'))
	AND EXTRACT(MONTH FROM PBS.TGL_PEMBAYARAN_SPPT) >= EXTRACT(MONTH FROM TO_DATE('$PeriodeAwal','YYYY-MM-DD'))
	AND EXTRACT(DAY FROM PBS.TGL_PEMBAYARAN_SPPT) >= EXTRACT(DAY FROM TO_DATE('$PeriodeAwal','YYYY-MM-DD'))
	AND EXTRACT(YEAR FROM PBS.TGL_PEMBAYARAN_SPPT) <= EXTRACT(YEAR FROM TO_DATE('$PeriodeAkhir','YYYY-MM-DD'))
	AND EXTRACT(MONTH FROM PBS.TGL_PEMBAYARAN_SPPT) <= EXTRACT(MONTH FROM TO_DATE('$PeriodeAkhir','YYYY-MM-DD'))
	AND EXTRACT(DAY FROM PBS.TGL_PEMBAYARAN_SPPT) <= EXTRACT(DAY FROM TO_DATE('$PeriodeAkhir','YYYY-MM-DD'))
	AND PBS.KD_KECAMATAN = '$KodeKecamatan'
	AND PBS.KD_PROPINSI||'.'||PBS.KD_DATI2||'.'||PBS.KD_KECAMATAN||'.'||PBS.KD_KELURAHAN = '$KodeKelurahan'";
		$query = $this->dbOracle->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}
	}
}
?>