<?php
/**
* Modul query pada admin_autentikasi
*/

class M_lap_target_vs_realisasi_per_kecamatan extends CI_Model{
	private $dbOracle;
	public function __construct(){
		parent::__construct();
		$this->dbOracle = $this->load->database('oracle', TRUE);
	}
	
	//periksa login data pada database
	public function generateReport($PeriodeAwal, $PeriodeAkhir, $Tahun){
		$sql = "SELECT
				RKC.KD_KECAMATAN,
				RKC.NM_KECAMATAN,
				TG.JML_TARGET AS TARGET,
				T .WP_POKOK_PERIODE_LALU,
				T .POKOK_LALU AS PBB_POKOK_PERIODE_LALU,
				T .WP_TUNGGAKAN_PERIODE_LALU,
				T .TUNGGAKAN_LALU AS PBB_TUNGGAKAN_PERIODE_LALU,
				T .WP_POKOK_PERIODE_INI,
				T .POKOK_INI AS PBB_POKOK_PERIODE_INI,
				T .WP_TUNGGAKAN_PERIODE_INI,
				T .TUNGGAKAN_INI AS PBB_TUNGGAKAN_PERIODE_INI,
				T.WP_POKOK_AKHIR,
				T.PBB_POKOK_AKHIR,
				T.WP_TUNGGAKAN_AKHIR,
				T.PBB_TUNGGAKAN_AKHIR,
				T .DENDA_SPPT AS DENDA_AKHIR,
				(
					T .POKOK_LALU + T .TUNGGAKAN_LALU + T .POKOK_INI + T .TUNGGAKAN_INI
				) AS REALISASI_AKHIR,
				(
					(
						T .POKOK_LALU + T .TUNGGAKAN_LALU + T .POKOK_INI + T .TUNGGAKAN_INI
					) / TG.JML_TARGET * 100
				) AS PERSEN
			FROM
				REF_KECAMATAN RKC
			LEFT JOIN (
				SELECT
					TK.KD_KECAMATAN,
					TK.JML_TARGET
				FROM
					TARGET_KECAMATAN TK
				WHERE
					TK.THN_TARGET = '$Tahun'
			) TG ON RKC.KD_KECAMATAN = TG.KD_KECAMATAN
			LEFT JOIN (
				SELECT
					MAX (PS.KD_KECAMATAN) AS KD_KECAMATAN,
					COUNT (
						CASE
						WHEN PS.TGL_PEMBAYARAN_SPPT < TO_DATE ('$PeriodeAwal', 'YYYY-MM-DD')
						AND PS.THN_PAJAK_SPPT = '$Tahun' THEN
							(
								PS.JML_SPPT_YG_DIBAYAR - PS.DENDA_SPPT
							)
						END
					) AS WP_POKOK_PERIODE_LALU,
					SUM (
						CASE
						WHEN PS.TGL_PEMBAYARAN_SPPT < TO_DATE ('$PeriodeAwal', 'YYYY-MM-DD')
						AND PS.THN_PAJAK_SPPT = '$Tahun' THEN
							(
								PS.JML_SPPT_YG_DIBAYAR - PS.DENDA_SPPT
							)
						END
					) AS POKOK_LALU,
					COUNT (
						CASE
						WHEN PS.TGL_PEMBAYARAN_SPPT < TO_DATE ('$PeriodeAwal', 'YYYY-MM-DD')
						AND PS.THN_PAJAK_SPPT < '$Tahun' THEN
							(
								PS.JML_SPPT_YG_DIBAYAR - PS.DENDA_SPPT
							)
						END
					) AS WP_TUNGGAKAN_PERIODE_LALU,
					SUM (
						CASE
						WHEN PS.TGL_PEMBAYARAN_SPPT < TO_DATE ('$PeriodeAwal', 'YYYY-MM-DD')
						AND PS.THN_PAJAK_SPPT < '$Tahun' THEN
							(
								PS.JML_SPPT_YG_DIBAYAR - PS.DENDA_SPPT
							)
						END
					) AS TUNGGAKAN_LALU,
					COUNT (
						CASE
						WHEN PS.TGL_PEMBAYARAN_SPPT >= TO_DATE ('$PeriodeAwal', 'YYYY-MM-DD')
						AND PS.TGL_PEMBAYARAN_SPPT <= TO_DATE ('$PeriodeAkhir', 'YYYY-MM-DD')
						AND PS.THN_PAJAK_SPPT = '$Tahun' THEN
							(
								PS.JML_SPPT_YG_DIBAYAR - PS.DENDA_SPPT
							)
						END
					) AS WP_POKOK_PERIODE_INI,
					SUM (
						CASE
						WHEN PS.TGL_PEMBAYARAN_SPPT >= TO_DATE ('$PeriodeAwal', 'YYYY-MM-DD')
						AND PS.TGL_PEMBAYARAN_SPPT <= TO_DATE ('$PeriodeAkhir', 'YYYY-MM-DD')
						AND PS.THN_PAJAK_SPPT = '$Tahun' THEN
							(
								PS.JML_SPPT_YG_DIBAYAR - PS.DENDA_SPPT
							)
						END
					) AS POKOK_INI,
					COUNT (
						CASE
						WHEN PS.TGL_PEMBAYARAN_SPPT >= TO_DATE ('$PeriodeAwal', 'YYYY-MM-DD')
						AND PS.TGL_PEMBAYARAN_SPPT <= TO_DATE ('$PeriodeAkhir', 'YYYY-MM-DD')
						AND PS.THN_PAJAK_SPPT < '$Tahun' THEN
							(
								PS.JML_SPPT_YG_DIBAYAR - PS.DENDA_SPPT
							)
						END
					) AS WP_TUNGGAKAN_PERIODE_INI,
					SUM (
						CASE
						WHEN PS.TGL_PEMBAYARAN_SPPT >= TO_DATE ('$PeriodeAwal', 'YYYY-MM-DD')
						AND PS.TGL_PEMBAYARAN_SPPT <= TO_DATE ('$PeriodeAkhir', 'YYYY-MM-DD')
						AND PS.THN_PAJAK_SPPT < '$Tahun' THEN
							(
								PS.JML_SPPT_YG_DIBAYAR - PS.DENDA_SPPT
							)
						END
					) AS TUNGGAKAN_INI,
					COUNT (
						CASE
						WHEN PS.TGL_PEMBAYARAN_SPPT <= TO_DATE ('$PeriodeAkhir', 'YYYY-MM-DD')
						AND PS.THN_PAJAK_SPPT = '$Tahun' THEN
							(
								PS.JML_SPPT_YG_DIBAYAR - PS.DENDA_SPPT
							)
						END
					) AS WP_POKOK_AKHIR,
					SUM (
						CASE
						WHEN PS.TGL_PEMBAYARAN_SPPT <= TO_DATE ('$PeriodeAkhir', 'YYYY-MM-DD')
						AND PS.THN_PAJAK_SPPT = '$Tahun' THEN
							(
								PS.JML_SPPT_YG_DIBAYAR - PS.DENDA_SPPT
							)
						END
					) AS PBB_POKOK_AKHIR,
					COUNT (
						CASE
						WHEN PS.TGL_PEMBAYARAN_SPPT <= TO_DATE ('$PeriodeAkhir', 'YYYY-MM-DD')
						AND PS.THN_PAJAK_SPPT < '$Tahun' THEN
							(
								PS.JML_SPPT_YG_DIBAYAR - PS.DENDA_SPPT
							)
						END
					) AS WP_TUNGGAKAN_AKHIR,
					SUM (
						CASE
						WHEN PS.TGL_PEMBAYARAN_SPPT <= TO_DATE ('$PeriodeAkhir', 'YYYY-MM-DD')
						AND PS.THN_PAJAK_SPPT < '$Tahun' THEN
							(
								PS.JML_SPPT_YG_DIBAYAR - PS.DENDA_SPPT
							)
						END
					) AS PBB_TUNGGAKAN_AKHIR,
					SUM (PS.DENDA_SPPT) AS DENDA_SPPT
				FROM
					PEMBAYARAN_SPPT PS
				WHERE
					EXTRACT (
						YEAR
						FROM
							PS.TGL_PEMBAYARAN_SPPT
					) = $Tahun
				AND PS.TGL_PEMBAYARAN_SPPT <= TO_DATE ('$PeriodeAkhir', 'YYYY-MM-DD')
				GROUP BY
					PS.KD_KECAMATAN
			) T ON RKC.KD_KECAMATAN = T .KD_KECAMATAN
			ORDER BY RKC.KD_KECAMATAN";

		$query = $this->dbOracle->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}
	}
}
?>