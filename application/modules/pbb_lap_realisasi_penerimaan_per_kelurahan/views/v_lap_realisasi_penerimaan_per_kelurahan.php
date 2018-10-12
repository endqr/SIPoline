        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
						<?php 
							echo $judul;
						?>
					</h1>
                </div>
            </div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="PeriodeAwal">
									Periode Awal : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="PeriodeAwal" name="PeriodeAwal" required="required" class="form-control" placeholder="YYYY-MM-DD">
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="PeriodeAkhir">
									Periode Akhir : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="PeriodeAkhir" name="PeriodeAkhir" required="required" class="form-control" placeholder="YYYY-MM-DD" >
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="KodeKecamatan">
									Kecamatan : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select id="KodeKecamatan" name="KodeKecamatan" required="required" class="form-control">
										<option selected value=''>PILIH KECAMATAN</option>
										<option value='010'>010-BUNGUS TELUK KABUNG</option>
										<option value='020'>020-LUBUK KILANGAN</option>
										<option value='030'>030-LUBUK BEGALUNG</option>
										<option value='040'>040-PADANG SELATAN</option>
										<option value='050'>050-PADANG TIMUR</option>
										<option value='060'>060-PADANG BARAT</option>
										<option value='070'>070-PADANG UTARA</option>
										<option value='080'>080-NANGGALO</option>
										<option value='090'>090-K U R A N J I</option>
										<option value='100'>100-P A U H</option>
										<option value='110'>110-KOTO TANGAH</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="Tahun">
									Jenis Buku : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="hidden" id="Tahun" name="Tahun" required="required" class="form-control" value="<?php echo date('Y');?>">
									<select id="JenisBuku" name="JenisBuku" required="required" class="form-control">
										<option selected value='0'>SEMUA BUKU</option>
										<option value='1'>Buku 1, 2 & 3</option>
										<option value='2'>Buku 4 & 5</option>
									</select>
								</div>
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="col-md-12 col-sm-12 col-xs-12 ">
							<div class="col-md-6 col-sm-6 col-xs-12 ">
								<div class="form-group">
									<button type="submit" class="btn btn-primary col-md-offset-6" id="Simpan" name="Simpan" value="Simpan">Generate</button>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<button type="reset" class="btn btn-success col-md-offset-6">Batal</button>
								</div>
							</div>
						</div>
					</form>
				</div>				
			</div>
			<?php
				if(isset($Laporan)){
					echo "<div class='row' id='LaporanCetak'>
							<div class='col-lg-12'>
								<div class='panel panel-default'>
									<div class='panel-heading'>
										<h1 class='page-header' align='center'>
											$JudulLaporan<br>
											$JenisBuku
										</h1>
									</div>
									<!-- /.panel-heading -->
									<div class='panel-body'>
										<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example'>
											<thead>
												<tr>
													<td rowspan='2' style='text-align: center'>NO</td>
													<td rowspan='2' style='text-align: center'>KD KEL</td>
													<td rowspan='2' style='text-align: center'>NAMA KELURAHAN</td>
													<td colspan='2' style='text-align: center'>POKOK</td>
													<td colspan='4' style='text-align: center'>PERIODE LALU</td>
													<td colspan='4' style='text-align: center'>PERIODE INI</td>
													<td colspan='4' style='text-align: center'>S/D PERIODE INI</td>
													<td rowspan='2' style='text-align: center'>DENDA</td>
													<td rowspan='2' style='text-align: center'>REALISASI</td>
													<td rowspan='2' style='text-align: center'>%</td>
												</tr>
												<tr>
													<td style='text-align: center'>WP</td>
													<td style='text-align: center'>POKOK</td>
													<td style='text-align: center'>WP</td>
													<td style='text-align: center'>POKOK</td>
													<td style='text-align: center'>WP</td>
													<td style='text-align: center'>TUNGGAKAN</td>
													<td style='text-align: center'>WP</td>
													<td style='text-align: center'>POKOK</td>
													<td style='text-align: center'>WP</td>
													<td style='text-align: center'>TUNGGAKAN</td>
													<td style='text-align: center'>WP</td>
													<td style='text-align: center'>POKOK</td>
													<td style='text-align: center'>WP</td>
													<td style='text-align: center'>TUNGGAKAN</td>
												</tr>
											</thead>
											<tbody>";
											$x = 1;
											$z = 1;
											$IsiPdf='';
//												$xHasil = json_decode($Laporan);
												$TOTALTARGET = 0;
												$TOTALWPTARGET = 0;
												$TOTAL_WP_POKOK_PERIODE_LALU=0;
												$TOTAL_PBB_POKOK_PERIODE_LALU=0;
												$TOTAL_WP_TUNGGAKAN_PERIODE_LALU=0;
												$TOTAL_PBB_TUNGGAKAN_PERIODE_LALU=0;
												$TOTAL_WP_POKOK_PERIODE_INI=0;
												$TOTAL_PBB_POKOK_PERIODE_INI=0;
												$TOTAL_WP_TUNGGAKAN_PERIODE_INI=0;
												$TOTAL_PBB_TUNGGAKAN_PERIODE_INI=0;
												$TOTAL_WP_POKOK_PERIODE_AKHIR=0;
												$TOTAL_PBB_POKOK_PERIODE_AKHIR=0;
												$TOTAL_WP_TUNGGAKAN_PERIODE_AKHIR=0;
												$TOTAL_PBB_TUNGGAKAN_PERIODE_AKHIR=0;
												$TOTAL_DENDA_AKHIR=0;
												$TOTAL_REALISASI_AKHIR=0;
												$TOTALPERSEN=0;
												foreach($Laporan as $data){
													$KD_KELURAHAN = $data['KD_KELURAHAN'];
													$NM_KELURAHAN = $data['NM_KELURAHAN'];
													$KD_KECAMATAN = $data['KD_KECAMATAN'];
													$NM_KECAMATAN = $data['NM_KECAMATAN'];
													$TARGET = $data['TARGET'];
													$WPTARGET = $data['WP_TARGET'];
													$WP_POKOK_PERIODE_LALU = $data['WP_POKOK_PERIODE_LALU'];
													$PBB_POKOK_PERIODE_LALU = $data['POKOK_PERIODE_LALU'];
													$WP_TUNGGAKAN_PERIODE_LALU = $data['WP_TUNGGAKAN_PERIODE_LALU'];
													$PBB_TUNGGAKAN_PERIODE_LALU = $data['TUNGGAKAN_PERIODE_LALU'];
													$WP_POKOK_PERIODE_INI = $data['WP_POKOK_PERIODE_INI'];
													$PBB_POKOK_PERIODE_INI = $data['POKOK_PERIODE_INI'];
													$WP_TUNGGAKAN_PERIODE_INI = $data['WP_TUNGGAKAN_PERIODE_INI'];
													$PBB_TUNGGAKAN_PERIODE_INI = $data['TUNGGAKAN_PERIODE_INI'];
													$WP_POKOK_PERIODE_AKHIR = $data['WP_POKOK'];
													$PBB_POKOK_PERIODE_AKHIR = $data['POKOK'];
													$WP_TUNGGAKAN_PERIODE_AKHIR = $data['WP_TUNGGAKAN'];
													$PBB_TUNGGAKAN_PERIODE_AKHIR = $data['TUNGGAKAN'];
													$DENDA_AKHIR = $data['DENDA'];
													$REALISASI_AKHIR = $data['REALISASI'];
													if($TARGET==0){
														$PERSEN=0;
													}else{
														$PERSEN = $REALISASI_AKHIR / $TARGET * 100;
												$TOTALTARGET = $TOTALTARGET + $TARGET;
												$TOTALWPTARGET = $TOTALWPTARGET + $WPTARGET;
												$TOTAL_WP_POKOK_PERIODE_LALU=$TOTAL_WP_POKOK_PERIODE_LALU + $WP_POKOK_PERIODE_LALU;
												$TOTAL_PBB_POKOK_PERIODE_LALU=$TOTAL_PBB_POKOK_PERIODE_LALU + $PBB_POKOK_PERIODE_LALU;
												$TOTAL_WP_TUNGGAKAN_PERIODE_LALU=$TOTAL_WP_TUNGGAKAN_PERIODE_LALU + $WP_TUNGGAKAN_PERIODE_LALU;
												$TOTAL_PBB_TUNGGAKAN_PERIODE_LALU=$TOTAL_PBB_TUNGGAKAN_PERIODE_LALU + $PBB_TUNGGAKAN_PERIODE_LALU;
												$TOTAL_WP_POKOK_PERIODE_INI= $TOTAL_WP_POKOK_PERIODE_INI + $WP_POKOK_PERIODE_INI;
												$TOTAL_PBB_POKOK_PERIODE_INI= $TOTAL_PBB_POKOK_PERIODE_INI + $PBB_POKOK_PERIODE_INI;
												$TOTAL_WP_TUNGGAKAN_PERIODE_INI= $TOTAL_WP_TUNGGAKAN_PERIODE_INI + $WP_TUNGGAKAN_PERIODE_INI;
												$TOTAL_PBB_TUNGGAKAN_PERIODE_INI= $TOTAL_PBB_TUNGGAKAN_PERIODE_INI + $PBB_TUNGGAKAN_PERIODE_INI;
												$TOTAL_WP_POKOK_PERIODE_AKHIR= $TOTAL_WP_POKOK_PERIODE_AKHIR + $WP_POKOK_PERIODE_AKHIR;
												$TOTAL_PBB_POKOK_PERIODE_AKHIR= $TOTAL_PBB_POKOK_PERIODE_AKHIR + $PBB_POKOK_PERIODE_AKHIR;
												$TOTAL_WP_TUNGGAKAN_PERIODE_AKHIR= $TOTAL_WP_TUNGGAKAN_PERIODE_AKHIR + $WP_TUNGGAKAN_PERIODE_AKHIR;
												$TOTAL_PBB_TUNGGAKAN_PERIODE_AKHIR= $TOTAL_PBB_TUNGGAKAN_PERIODE_AKHIR +$PBB_TUNGGAKAN_PERIODE_AKHIR;
												$TOTAL_DENDA_AKHIR= $TOTAL_DENDA_AKHIR + $DENDA_AKHIR;
												$TOTAL_REALISASI_AKHIR= $TOTAL_REALISASI_AKHIR + $REALISASI_AKHIR;
		$IsiPdf = $IsiPdf."[{text: '".$z++."', style: 'tableBody', alignment: 'left'},
			{text: '$KD_KELURAHAN / $NM_KELURAHAN', style: 'tableBody', alignment: 'left'},
			{text: '".number_format($WPTARGET,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($TARGET,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($WP_POKOK_PERIODE_LALU,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($PBB_POKOK_PERIODE_LALU,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($WP_TUNGGAKAN_PERIODE_LALU,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($PBB_TUNGGAKAN_PERIODE_LALU,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($WP_POKOK_PERIODE_INI,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($PBB_POKOK_PERIODE_INI,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($WP_TUNGGAKAN_PERIODE_INI,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($PBB_TUNGGAKAN_PERIODE_INI,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($WP_POKOK_PERIODE_AKHIR,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($PBB_POKOK_PERIODE_AKHIR,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($WP_TUNGGAKAN_PERIODE_AKHIR,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($PBB_TUNGGAKAN_PERIODE_AKHIR,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($DENDA_AKHIR,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($REALISASI_AKHIR,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($PERSEN,0)."', style: 'tableBody', alignment: 'right'}],
			";

													echo "<tr><td>".$x++."</td>";
														echo "<td>$KD_KELURAHAN</td>";
														echo "<td>$NM_KELURAHAN</td>";
														echo "<td align='right'>".number_format($WPTARGET,0)."</td>";
														echo "<td align='right'>".number_format($TARGET,0)."</td>";
														echo "<td align='right'>".number_format($WP_POKOK_PERIODE_LALU,0)."</td>";
														echo "<td align='right'>".number_format($PBB_POKOK_PERIODE_LALU,0)."</td>";
														echo "<td align='right'>".number_format($WP_TUNGGAKAN_PERIODE_LALU,0)."</td>";
														echo "<td align='right'>".number_format($PBB_TUNGGAKAN_PERIODE_LALU,0)."</td>";
														echo "<td align='right'>".number_format($WP_POKOK_PERIODE_INI,0)."</td>";
														echo "<td align='right'>".number_format($PBB_POKOK_PERIODE_INI,0)."</td>";
														echo "<td align='right'>".number_format($WP_TUNGGAKAN_PERIODE_INI,0)."</td>";
														echo "<td align='right'>".number_format($PBB_TUNGGAKAN_PERIODE_INI,0)."</td>";
														echo "<td align='right'>".number_format($WP_POKOK_PERIODE_AKHIR,0)."</td>";
														echo "<td align='right'>".number_format($PBB_POKOK_PERIODE_AKHIR,0)."</td>";
														echo "<td align='right'>".number_format($WP_TUNGGAKAN_PERIODE_AKHIR,0)."</td>";
														echo "<td align='right'>".number_format($PBB_TUNGGAKAN_PERIODE_AKHIR,0)."</td>";
														echo "<td align='right'>".number_format($DENDA_AKHIR,0)."</td>";
														echo "<td align='right'>".number_format($REALISASI_AKHIR,0)."</td>";
														echo "<td align='right'>".number_format($PERSEN,2)."</td>";
													}
											}
												$TOTALPERSEN= $TOTAL_REALISASI_AKHIR / $TOTALTARGET * 100;
											echo "</tbody>
										</table>
									</div>
								<!-- /.panel-body -->
							</div>
							<!-- /.panel -->
						</div>
						<!-- /.col-lg-12 -->
					</div>";
				}
			?>			
			
        </div>
        <!-- /#page-wrapper -->
<script>
$( "#PeriodeAwal" ).datepicker( {
	dateFormat: "yy-mm-dd",
	changeMonth: true,
    changeYear: true
} );
$( "#PeriodeAkhir" ).datepicker( {
	dateFormat: "yy-mm-dd",
	changeMonth: true,
    changeYear: true
} );

$('#dataTables-example').DataTable({
	"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    responsive: true,
	dom: 'Bfrtip',
	buttons:[
		{
			text: 'Export',
			action: function(e, dt, node, config){
				Cetak();
			}
		}
	]
});
	
function Cetak() {
var dd = {
	content: [
		{ 
			text: 'Laporan Realisasi Penerimaan PBB Per Kelurahan', 
			style: 'header', 
			alignment: 'center' 
		},
		{
			text: '<?php if(isset($SubJudulLaporan)){echo $SubJudulLaporan;}?>',
			alignment: 'center' 
		},
		{
			text: '<?php if(isset($JenisBuku)){echo $JenisBuku;}?>',
			alignment: 'center' 
		},
		{
			text: '\n \n'
		},
		{
			text: 'Kecamatan : <?php if(isset($NM_KECAMATAN)){echo $NM_KECAMATAN;}?>',
			alignment: 'left' 
		},
		{
			text: 'Periode : <?php if(isset($PeriodeAwal)){echo $PeriodeAwal.' s/d '.$PeriodeAkhir;}?>',
			alignment: 'left' 
		},
		{
			style: 'tableExample',
			color: '#444',
			table: {
				widths: [
							15, //No
							80, 
							20, 
							50, 
							20, //WP
							50, //Pokok
							20, //WP
							50, //Tunggakan
							20, //WP
							50, //Pokok
							20, //WP
							50, //Tunggakan
							20, //WP
							50, //Pokok
							20, //WP
							50, //Tunggakan
							50, //Denda
							50, //Realisasi
							20  //Persen
						],
				headerRows: 2,
				// keepWithHeaderRows: 1,
				body: [
					[
						{text: 'No.', style: 'tableHeader', rowSpan: 2, alignment: 'center'}, 
						{text: 'NAMA KELURAHAN', style: 'tableHeader', rowSpan: 2, alignment: 'center'}, 
						{text: 'POKOK', style: 'tableHeader', colSpan: 2, alignment: 'center'}, 
						{}, 
						{text: 'PERIODE LALU', style: 'tableHeader', colSpan: 4, alignment: 'center'}, 
						{}, 
						{}, 
						{}, 
						{text: 'PERIODE INI', style: 'tableHeader', colSpan: 4, alignment: 'center'}, 
						{}, 
						{}, 
						{}, 
						{text: 'S/D PERIODE INI', style: 'tableHeader', colSpan: 4, alignment: 'center'}, 
						{}, 
						{}, 
						{}, 
						{text: 'DENDA', style: 'tableHeader', rowSpan: 2, alignment: 'center'},
						{text: 'REALISASI', style: 'tableHeader', rowSpan: 2, alignment: 'center'},
						{text: '%', style: 'tableHeader', rowSpan: 2, alignment: 'center'}
					],
					[
						{}, 
						{}, 
						{text: 'WP', style: 'tableHeader', alignment: 'center'}, 
						{text: 'POKOK', style: 'tableHeader', alignment: 'center'}, 
						{text: 'WP', style: 'tableHeader', alignment: 'center'}, 
						{text: 'POKOK', style: 'tableHeader', alignment: 'center'}, 
						{text: 'WP', style: 'tableHeader', alignment: 'center'},
						{text: 'TUNGGAKAN', style: 'tableHeader', alignment: 'center'},
						{text: 'WP', style: 'tableHeader', alignment: 'center'},
						{text: 'POKOK', style: 'tableHeader', alignment: 'center'},
						{text: 'WP', style: 'tableHeader', alignment: 'center'},
						{text: 'TUNGGAKAN', style: 'tableHeader', alignment: 'center'},
						{text: 'WP', style: 'tableHeader', alignment: 'center'},
						{text: 'POKOK', style: 'tableHeader', alignment: 'center'},
						{text: 'WP', style: 'tableHeader', alignment: 'center'},
						{text: 'TUNGGAKAN', style: 'tableHeader', alignment: 'center'},
						{}, 
						{}, 
						{}
					],
					<?php 
						if(isset($IsiPdf)){
							echo $IsiPdf;
					echo "[
						{text: '', style: 'tableBody', alignment: 'left'},
						{text: 'TOTAL', style: 'tableBody', alignment: 'left'},
						{text: '".number_format($TOTALWPTARGET,0)."', style: 'tableBody', alignment: 'right'},
						{text: '".number_format($TOTALTARGET,0)."', style: 'tableBody', alignment: 'right'},
						{text: '".number_format($TOTAL_WP_POKOK_PERIODE_LALU,0)."', style: 'tableBody', alignment: 'right'},
						{text: '".number_format($TOTAL_PBB_POKOK_PERIODE_LALU ,0)."', style: 'tableBody', alignment: 'right'},
						{text: '".number_format($TOTAL_WP_TUNGGAKAN_PERIODE_LALU,0)."', style: 'tableBody', alignment: 'right'},
						{text: '".number_format($TOTAL_PBB_TUNGGAKAN_PERIODE_LALU,0)."', style: 'tableBody', alignment: 'right'},
						{text: '".number_format($TOTAL_WP_POKOK_PERIODE_INI,0)."', style: 'tableBody', alignment: 'right'},
						{text: '".number_format($TOTAL_PBB_POKOK_PERIODE_INI ,0)."', style: 'tableBody', alignment: 'right'},
						{text: '".number_format($TOTAL_WP_TUNGGAKAN_PERIODE_INI,0)."', style: 'tableBody', alignment: 'right'},
						{text: '".number_format($TOTAL_PBB_TUNGGAKAN_PERIODE_INI,0)."', style: 'tableBody', alignment: 'right'},
						{text: '".number_format($TOTAL_WP_POKOK_PERIODE_AKHIR,0)."', style: 'tableBody', alignment: 'right'},
						{text: '".number_format($TOTAL_PBB_POKOK_PERIODE_AKHIR ,0)."', style: 'tableBody', alignment: 'right'},
						{text: '".number_format($TOTAL_WP_TUNGGAKAN_PERIODE_AKHIR,0)."', style: 'tableBody', alignment: 'right'},
						{text: '".number_format($TOTAL_PBB_TUNGGAKAN_PERIODE_AKHIR,0)."', style: 'tableBody', alignment: 'right'},
						{text: '".number_format($TOTAL_DENDA_AKHIR,0)."', style: 'tableBody', alignment: 'right'},
						{text: '".number_format($TOTAL_REALISASI_AKHIR,0)."', style: 'tableBody', alignment: 'right'},
						{text: '".number_format($TOTALPERSEN,0)."', style: 'tableBody', alignment: 'right'}
					],";
						} 
					?>					
				]
			}
		},
		{
			text: '\n \n'
		},
		{
			columns:[
				{text: '\n KEPALA \n BADAN PENDAPATAN DAERAH \n \n \n ADIB ALFIKRI, SE, M.Si \n NIP. 19730413 199703 1 001', alignment: 'center'},
				{text: '\n KEPALA BIDANG\n PENGENDALIAN DAN PELAPORAN PENDAPATAN \n \n \n Drs. MAIHENDRIZON, M.MT \n NIP. 19740511 199501 1 001', alignment: 'center'},
				{text: 'PADANG, <?php echo date('d-m-Y'); ?> \n KEPALA SUB BIDANG \n PEMBUKUAN DAN PELAPORAN \n \n \n ARISMAN, SE \n NIP. 19820908 200901 1 003', alignment: 'center'}
			]
		}
	],
	styles: {
		header: {
			fontSize: 18,
			bold: true,
			alignment: 'justify'
		},
		subheader: {
			fontSize: 15,
			bold: true
		},
		tableExample: {
			margin: [0, 5, 0, 15]
		},
		tableHeader: {
			bold: true,
			fontSize: 8,
			color: 'black'
		},
		tableBody: {
			bold: false,
			fontSize: 8,
			color: 'black'
		}
	},
	pageSize: 'FOLIO',
	pageOrientation: 'landscape',
	footer: function(currentPage, pageCount) {return '   Hal: ' + currentPage.toString() +  ' dari ' + pageCount;}
};	
//pdfMake.createPdf(dd).download('optionalName.pdf');
pdfMake.createPdf(dd).open();
};

</script>