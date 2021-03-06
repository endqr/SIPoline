<?php
/**
* Modul query pada admin_autentikasi
*/

class M_lap_objek_baru extends CI_Model{
	private $dbOracle;
	public function __construct(){
		parent::__construct();
		$this->dbOracle = $this->load->database('oracle', TRUE);
	}
	
	//periksa login data pada database
	public function generateReport($PeriodeAwal, $PeriodeAkhir, $KdJnsPelayanan){
		$sql = "SELECT S.KD_PROPINSI||'.'||S.KD_DATI2||'.'||S.KD_KECAMATAN||'.'||S.KD_KELURAHAN||'.'||
					S.KD_BLOK||'.'||S.NO_URUT||'.'||S.KD_JNS_OP AS NOP, S.THN_PAJAK_SPPT, S.NM_WP_SPPT,
					S.JLN_WP_SPPT||' '||S.BLOK_KAV_NO_WP_SPPT||' RT '||S.RT_WP_SPPT||' RW '||S.RW_WP_SPPT||
					' KEL. '||S.KELURAHAN_WP_SPPT||', '||S.KOTA_WP_SPPT AS ALAMAT_WP,
					DOP.JALAN_OP||' '||DOP.BLOK_KAV_NO_OP||' RT '||DOP.RT_OP||' RW '||DOP.RW_OP||' KEL. '||
					RKL.NM_KELURAHAN||' KEC. '||RKC.NM_KECAMATAN AS ALAMAT_OP,
					S.PBB_YG_HARUS_DIBAYAR_SPPT
					FROM SPPT S
					LEFT JOIN 
						(SELECT MAX(PD1.KD_PROPINSI_PEMOHON) AS KD_PROPINSI, MAX(PD1.KD_DATI2_PEMOHON) AS KD_DATI2, 
							MAX(PD1.KD_KECAMATAN_PEMOHON) AS KD_KECAMATAN, MAX(PD1.KD_KELURAHAN_PEMOHON) AS KD_KELURAHAN,
							MAX(PD1.KD_BLOK_PEMOHON) AS KD_BLOK, MAX(PD1.NO_URUT_PEMOHON) AS NO_URUT, 
							MAX(PD1.KD_JNS_OP_PEMOHON) AS KD_JNS_OP, MAX(PD1.THN_PAJAK_PERMOHONAN) AS THN_PAJAK, 
							MAX(PD1.KD_JNS_PELAYANAN) AS KD_JNS_PELAYANAN
							FROM PST_DETAIL PD1
								WHERE PD1.KD_JNS_PELAYANAN = '$KdJnsPelayanan'
							GROUP BY PD1.KD_KECAMATAN_PEMOHON, PD1.KD_KELURAHAN_PEMOHON, PD1.KD_BLOK_PEMOHON, 
								PD1.NO_URUT_PEMOHON
						) PD
						ON S.KD_PROPINSI||S.KD_DATI2||S.KD_KECAMATAN||S.KD_KELURAHAN||S.KD_BLOK||S.NO_URUT||S.KD_JNS_OP
						= PD.KD_PROPINSI||PD.KD_DATI2||PD.KD_KECAMATAN||PD.KD_KELURAHAN||PD.KD_BLOK||PD.NO_URUT||
						PD.KD_JNS_OP
					LEFT JOIN REF_JNS_PELAYANAN RJP
						ON PD.KD_JNS_PELAYANAN = RJP.KD_JNS_PELAYANAN
					LEFT JOIN DAT_OBJEK_PAJAK DOP
					ON S.KD_PROPINSI||S.KD_DATI2||S.KD_KECAMATAN||S.KD_KELURAHAN||S.KD_BLOK||S.NO_URUT||S.KD_JNS_OP = 
					DOP.KD_PROPINSI||DOP.KD_DATI2||DOP.KD_KECAMATAN||DOP.KD_KELURAHAN||DOP.KD_BLOK||DOP.NO_URUT||DOP.KD_JNS_OP
					LEFT JOIN REF_KECAMATAN RKC
					ON RKC.KD_KECAMATAN = S.KD_KECAMATAN
					LEFT JOIN REF_KELURAHAN RKL
					ON S.KD_KECAMATAN = RKL.KD_KECAMATAN
					AND S.KD_KELURAHAN = RKL.KD_KELURAHAN
				WHERE S.TGL_TERBIT_SPPT >= TO_DATE('$PeriodeAwal','YYYY-MM-DD')
				AND S.TGL_TERBIT_SPPT <= TO_DATE('$PeriodeAkhir','YYYY-MM-DD')
				ORDER BY S.KD_KECAMATAN, S.KD_KELURAHAN, S.KD_BLOK, S.NO_URUT, S.THN_PAJAK_SPPT";
		$query = $this->dbOracle->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}
	}
}
?>