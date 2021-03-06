<?php
/**
*	Nama Controllers 	: Rekap Validasi Piutang
*	Dibuat Oleh		 	: Endang Kurniawan
*	Dibuat Tanggal	 	: 13 Oktober 2017
*/

class M_val_rekap extends CI_Model{
	private $dbOracle;
	public function __construct(){
		parent::__construct();
		$this->dbOracle = $this->load->database('oracle', TRUE);
	}
	
	//periksa login data pada database
	public function generateReport($KodeKec, $KodeKel, $Kategori){
		if($Kategori=='5'){
		$sql = "SELECT MAX(HSM.KD_PROPINSI)||'.'||MAX(HSM.KD_DATI2)||'.'||MAX(HSM.KD_KECAMATAN)||'.'||
					MAX(HSM.KD_KELURAHAN)||'.'||MAX(HSM.KD_BLOK)||'.'||MAX(HSM.NO_URUT)||'.'||MAX(HSM.KD_JNS_OP)
					AS NOP, MAX(S1.NM_WP_SPPT) AS NM_WP, MAX(DOP.JALAN_OP)||' '||MAX(DOP.BLOK_KAV_NO_OP)||' RT '||
					MAX(DOP.RT_OP)||' RW '||MAX(DOP.RW_OP) AS ALAMAT_OP, MAX(RKL.NM_KELURAHAN) AS KELURAHAN,
					MAX(RKC.NM_KECAMATAN) AS KECAMATAN,
				SUM( 
					CASE WHEN HSM.THN_PAJAK_SPPT = '2008' THEN HSM.PBB_YG_HARUS_DIBAYAR_SPPT END
				) AS PIUTANG_2008,
				SUM( 
					CASE WHEN HSM.THN_PAJAK_SPPT = '2009' THEN HSM.PBB_YG_HARUS_DIBAYAR_SPPT END
				) AS PIUTANG_2009,
				SUM( 
					CASE WHEN HSM.THN_PAJAK_SPPT = '2010' THEN HSM.PBB_YG_HARUS_DIBAYAR_SPPT END
				) AS PIUTANG_2010,
				SUM( 
					CASE WHEN HSM.THN_PAJAK_SPPT = '2011' THEN HSM.PBB_YG_HARUS_DIBAYAR_SPPT END
				) AS PIUTANG_2011,
				SUM( 
					CASE WHEN HSM.THN_PAJAK_SPPT = '2012' THEN HSM.PBB_YG_HARUS_DIBAYAR_SPPT END
				) AS PIUTANG_2012,
				MAX(HSM.NM_PEGAWAI_PERUBAHAN) AS PETUGAS_ENTRY,
				MAX(HSM.PETUGAS_PENDATA) AS PETUGAS_PENDATA
				FROM HIS_SPPT_MANUAL HSM
				LEFT JOIN DAT_OBJEK_PAJAK DOP
				ON SUBSTR(HSM.KD_PROPINSI,1,2)||SUBSTR(HSM.KD_DATI2,1,2)||SUBSTR(HSM.KD_KECAMATAN,1,3)||
					SUBSTR(HSM.KD_KELURAHAN,1,3)||SUBSTR(HSM.KD_BLOK,1,3)||
					SUBSTR(HSM.NO_URUT,1,4)||SUBSTR(HSM.KD_JNS_OP,1,1) = 
					DOP.KD_PROPINSI||DOP.KD_DATI2||DOP.KD_KECAMATAN||DOP.KD_KELURAHAN||DOP.KD_BLOK||
					DOP.NO_URUT||DOP.KD_JNS_OP
				LEFT JOIN SPPT S1
				ON SUBSTR(HSM.KD_PROPINSI,1,2)||SUBSTR(HSM.KD_DATI2,1,2)||SUBSTR(HSM.KD_KECAMATAN,1,3)||
					SUBSTR(HSM.KD_KELURAHAN,1,3)||SUBSTR(HSM.KD_BLOK,1,3)||
					SUBSTR(HSM.NO_URUT,1,4)||SUBSTR(HSM.KD_JNS_OP,1,1)||HSM.THN_PAJAK_SPPT = 
					S1.KD_PROPINSI||S1.KD_DATI2||S1.KD_KECAMATAN||S1.KD_KELURAHAN||S1.KD_BLOK||
					S1.NO_URUT||S1.KD_JNS_OP||S1.THN_PAJAK_SPPT
				LEFT JOIN REF_KECAMATAN RKC
				ON HSM.KD_KECAMATAN = RKC.KD_KECAMATAN
				LEFT JOIN REF_KELURAHAN RKL
				ON HSM.KD_KECAMATAN = RKL.KD_KECAMATAN
				AND HSM.KD_KELURAHAN = RKL.KD_KELURAHAN
				WHERE HSM.KD_KECAMATAN = '$KodeKec' 
				AND HSM.KD_KELURAHAN = '$KodeKel'
				GROUP BY HSM.KD_PROPINSI, HSM.KD_DATI2, HSM.KD_KECAMATAN, HSM.KD_KELURAHAN, 
					HSM.KD_BLOK, HSM.NO_URUT, HSM.KD_JNS_OP
				ORDER BY HSM.KD_PROPINSI, HSM.KD_DATI2, HSM.KD_KECAMATAN, HSM.KD_KELURAHAN, 
					HSM.KD_BLOK, HSM.NO_URUT, HSM.KD_JNS_OP";
		}else{
		$sql = "SELECT MAX(HSM.KD_PROPINSI)||'.'||MAX(HSM.KD_DATI2)||'.'||MAX(HSM.KD_KECAMATAN)||'.'||
					MAX(HSM.KD_KELURAHAN)||'.'||MAX(HSM.KD_BLOK)||'.'||MAX(HSM.NO_URUT)||'.'||MAX(HSM.KD_JNS_OP)
					AS NOP, MAX(S1.NM_WP_SPPT) AS NM_WP, MAX(DOP.JALAN_OP)||' '||MAX(DOP.BLOK_KAV_NO_OP)||' RT '||
					MAX(DOP.RT_OP)||' RW '||MAX(DOP.RW_OP) AS ALAMAT_OP, MAX(RKL.NM_KELURAHAN) AS KELURAHAN,
					MAX(RKC.NM_KECAMATAN) AS KECAMATAN,
				SUM( 
					CASE WHEN HSM.THN_PAJAK_SPPT = '2008' THEN HSM.PBB_YG_HARUS_DIBAYAR_SPPT END
				) AS PIUTANG_2008,
				SUM( 
					CASE WHEN HSM.THN_PAJAK_SPPT = '2009' THEN HSM.PBB_YG_HARUS_DIBAYAR_SPPT END
				) AS PIUTANG_2009,
				SUM( 
					CASE WHEN HSM.THN_PAJAK_SPPT = '2010' THEN HSM.PBB_YG_HARUS_DIBAYAR_SPPT END
				) AS PIUTANG_2010,
				SUM( 
					CASE WHEN HSM.THN_PAJAK_SPPT = '2011' THEN HSM.PBB_YG_HARUS_DIBAYAR_SPPT END
				) AS PIUTANG_2011,
				SUM( 
					CASE WHEN HSM.THN_PAJAK_SPPT = '2012' THEN HSM.PBB_YG_HARUS_DIBAYAR_SPPT END
				) AS PIUTANG_2012,
				MAX(HSM.NM_PEGAWAI_PERUBAHAN) AS PETUGAS_ENTRY,
				MAX(HSM.PETUGAS_PENDATA) AS PETUGAS_PENDATA
				FROM HIS_SPPT_MANUAL HSM
				LEFT JOIN DAT_OBJEK_PAJAK DOP
				ON SUBSTR(HSM.KD_PROPINSI,1,2)||SUBSTR(HSM.KD_DATI2,1,2)||SUBSTR(HSM.KD_KECAMATAN,1,3)||
					SUBSTR(HSM.KD_KELURAHAN,1,3)||SUBSTR(HSM.KD_BLOK,1,3)||
					SUBSTR(HSM.NO_URUT,1,4)||SUBSTR(HSM.KD_JNS_OP,1,1) = 
					DOP.KD_PROPINSI||DOP.KD_DATI2||DOP.KD_KECAMATAN||DOP.KD_KELURAHAN||DOP.KD_BLOK||
					DOP.NO_URUT||DOP.KD_JNS_OP
				LEFT JOIN SPPT S1
				ON SUBSTR(HSM.KD_PROPINSI,1,2)||SUBSTR(HSM.KD_DATI2,1,2)||SUBSTR(HSM.KD_KECAMATAN,1,3)||
					SUBSTR(HSM.KD_KELURAHAN,1,3)||SUBSTR(HSM.KD_BLOK,1,3)||
					SUBSTR(HSM.NO_URUT,1,4)||SUBSTR(HSM.KD_JNS_OP,1,1)||HSM.THN_PAJAK_SPPT = 
					S1.KD_PROPINSI||S1.KD_DATI2||S1.KD_KECAMATAN||S1.KD_KELURAHAN||S1.KD_BLOK||
					S1.NO_URUT||S1.KD_JNS_OP||S1.THN_PAJAK_SPPT
				LEFT JOIN REF_KECAMATAN RKC
				ON HSM.KD_KECAMATAN = RKC.KD_KECAMATAN
				LEFT JOIN REF_KELURAHAN RKL
				ON HSM.KD_KECAMATAN = RKL.KD_KECAMATAN
				AND HSM.KD_KELURAHAN = RKL.KD_KELURAHAN
				WHERE HSM.KD_KECAMATAN = '$KodeKec' 
				AND HSM.KD_KELURAHAN = '$KodeKel'
				AND HSM.STATUS_PEMBAYARAN_SPPT_AKHIR = '$Kategori'
				GROUP BY HSM.KD_PROPINSI, HSM.KD_DATI2, HSM.KD_KECAMATAN, HSM.KD_KELURAHAN, 
					HSM.KD_BLOK, HSM.NO_URUT, HSM.KD_JNS_OP
				ORDER BY HSM.KD_PROPINSI, HSM.KD_DATI2, HSM.KD_KECAMATAN, HSM.KD_KELURAHAN, 
					HSM.KD_BLOK, HSM.NO_URUT, HSM.KD_JNS_OP";
		}
		$query = $this->dbOracle->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}
	}
	
	public function getListKec(){
		$sql = "SELECT * FROM REF_KECAMATAN RKC ORDER BY RKC.KD_KECAMATAN";
		$query = $this->dbOracle->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}
	}
	
	public function getKel($KodeKec){
		$sql = "SELECT * FROM REF_KELURAHAN RKL WHERE RKL.KD_KECAMATAN = '$KodeKec' ORDER BY RKL.KD_KECAMATAN, RKL.KD_KELURAHAN";
		$query = $this->dbOracle->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}
	}
	
	public function getNmKec($KodeKec){
		$sql = "SELECT * FROM REF_KECAMATAN RKC WHERE RKC.KD_KECAMATAN = '$KodeKec'";
		$query = $this->dbOracle->query($sql);
		if($query->num_rows()>0){
			$DaftarKec = $query->result_array();
			foreach($DaftarKec as $Kec){
				$NamaKec = $Kec['NM_KECAMATAN'];
			}
			return $NamaKec;
		}
	}
	
	public function getNmKel($KodeKec, $KodeKel){
		$sql = "SELECT * FROM REF_KELURAHAN RKL WHERE RKL.KD_KECAMATAN = '$KodeKec' AND RKL.KD_KELURAHAN = '$KodeKel'";
		$query = $this->dbOracle->query($sql);
		if($query->num_rows()>0){
			$DaftarKel = $query->result_array();
			foreach($DaftarKel as $Kel){
				$NamaKel = $Kel['NM_KELURAHAN'];
			}
			return $NamaKel;
		}
	}
}
?>