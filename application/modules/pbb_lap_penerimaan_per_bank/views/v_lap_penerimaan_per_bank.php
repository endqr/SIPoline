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
					<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action = "<?php echo site_url().'/pbb_lap_penerimaan_per_bank/GenerateLaporan';?>" method="POST">
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
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="KodeTP">
									Tempat Bayar : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select id="KodeTP" name="KodeTP" required class="form-control">
										<option selected disabled value=''>PILIH TEMPAT PEMBAYARAN</option>
										<option value='35-Bank Tabungan Negara'>BANK TABUNGAN NEGARA</option>
										<option value='50-Bank Rakyat Indonesia'>BANK RAKYAT INDONESIA</option>
										<option value='81-Bank Nagari'>BANK NAGARI</option>
										<option value='87-Bank BNI 46'>BANK BNI 46</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="KodeTP">
									Jenis Buku : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select id="JenisBuku" name="JenisBuku" required class="form-control">
										<option selected disabled value='1, 2, 3, 4 & 5'>Semua Buku</option>
										<option value='1, 2 & 3'>Buku 1, 2 & 3</option>
										<option value='4 & 5'>Buku 4 & 5</option>
									</select>
								</div>
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="col-md-12 col-sm-12 col-xs-12 ">
							<div class="col-md-6 col-sm-6 col-xs-12 ">
								<div class="form-group">
									<button type="submit" class="btn btn-primary col-md-offset-6" id="Simpan">Generate</button>
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
											$JudulLaporan
										</h1>
									</div>
									<!-- /.panel-heading -->
									<div class='panel-body' id='PrintTable'>
										<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example'>
											<thead>
												<tr>
													<th>NO</th>
													<th>NOP</th>
													<th>TANGGAL<br>PEMBAYARAN</th>
													<th>NAMA WP</th>
													<th>TAHUN SPPT</th>
													<th>POKOK</th>
													<th>PIUTANG</th>
													<th>DENDA</th>
													<th>JML BAYAR</th>
												</tr>
											</thead>
											<tbody>";
											$x = 1;
											$z = 1;
											$IsiPdf='';
												$xHasil = json_decode($Laporan);
												$TOTALPOKOK = 0;
												$TOTALPIUTANG=0;
												$TOTALDENDA=0;
												$TOTALALL=0;
												foreach($xHasil->data as $data){
													$NOP = $data->NOP;
													$TGL_PEMBAYARAN_SPPT = $data->TGL_PEMBAYARAN_SPPT;
													$NM_WP_SPPT = $data->NM_WP_SPPT;
													$THN_PAJAK_SPPT = $data->THN_PAJAK_SPPT;
													$POKOK = $data->POKOK;
													$PIUTANG = $data->PIUTANG;
													$DENDA_SPPT = $data->DENDA_SPPT;
													$TOTAL = $POKOK + $PIUTANG + $DENDA_SPPT;
													$TOTALPOKOK = $TOTALPOKOK + $POKOK;
													$TOTALPIUTANG = $TOTALPIUTANG + $PIUTANG;
													$TOTALDENDA = $TOTALDENDA + $DENDA_SPPT;
													$TOTALALL = $TOTALALL + $TOTAL;
		$IsiPdf = $IsiPdf."[{text: '".$z++."', style: 'tableBody', alignment: 'left'},
			{text: '$NOP', style: 'tableBody', alignment: 'left'},
			{text: '$TGL_PEMBAYARAN_SPPT', style: 'tableBody', alignment: 'left'},
			{text: '".preg_replace("/[^A-Za-z0-9 ]/",' ',$NM_WP_SPPT)."', style: 'tableBody', alignment: 'left'},
			{text: '$THN_PAJAK_SPPT', style: 'tableBody', alignment: 'left'},
			{text: '".number_format($POKOK,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($PIUTANG,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($DENDA_SPPT,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($TOTAL,0)."', style: 'tableBody', alignment: 'right'}],";													
													echo "<tr><td>".$x++."</td>";
														echo "<td>$NOP</td>";
														echo "<td>$TGL_PEMBAYARAN_SPPT</td>";
														echo "<td>$NM_WP_SPPT</td>";
														echo "<td>$THN_PAJAK_SPPT</td>";
														echo "<td align='right'>".number_format($POKOK,0)."</td>";
														echo "<td align='right'>".number_format($PIUTANG,0)."</td>";
														echo "<td align='right'>".number_format($DENDA_SPPT,0)."</td>";
														echo "<td align='right'>".number_format($TOTAL,0)."</td>";
														echo "</tr>";
												
											}
											echo "</tbody>
										</table>
										SUMARY :<br>
										TOTAL POKOK : ".number_format($TOTALPOKOK,0)."<br>
										TOTAL PIUTANG : ".number_format($TOTALPIUTANG,0)."<br>
										<u>TOTAL DENDA : ".number_format($TOTALDENDA,0)."</u><br>
										<b>GRAND TOTAL : ".number_format($TOTALALL,0)."</b>
										<br>
									</div>
								<!-- /.panel-body -->
							</div>
							<!-- /.panel -->
						</div>
						<!-- /.col-lg-12 -->
					</div>
			<input type='button' id='Cetak' name='Cetak' value='CETAK' onclick='printDiv()'>";
				}else{
					$TempatBayar = '';
					$SubJudulLaporan='';
					$IsiPdf='';
					$TOTALPOKOK=0;
					$TOTALPIUTANG=0;
					$TOTALDENDA=0;
					$TOTALALL=0;
				}
			?>
        </div>
        <!-- /#page-wrapper -->
<script>
$( "#PeriodeAwal" ).datepicker( {dateFormat: "yy-mm-dd"} );
$( "#PeriodeAkhir" ).datepicker( {dateFormat: "yy-mm-dd"} );
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            responsive: true
        });
    });
		
function printDiv() {
//     var printContents = document.getElementById(divName).innerHTML;
//     var originalContents = document.body.innerHTML;
//     document.body.innerHTML = printContents;
//     window.print(printContents);
//     document.body.innerHTML = originalContents;
var dd = {
	content: [
		{ 
			text: 'Laporan Realisasi Penerimaan PBB P2 \n Pada <?php echo $TempatBayar; ?>', 
			style: 'header', 
			alignment: 'center' 
		},
		{
			text: '<?php if(isset($SubJudulLaporan)){echo $SubJudulLaporan;}?>',
			style: 'subheader',
			alignment: 'center' 
		},
		{
			text: '\n \n'
		},
		{
			style: 'tableExample',
			color: '#444',
			table: {
				widths: [
							15, //No
							95, //nop
							45, //tgl
							95, //nama
							30, //tahun
							40, //pokok
							40, //piutang
							40, //denda
							50 //jml
						],
				headerRows: 1,
				// keepWithHeaderRows: 1,
				body: [
					[
						{text: 'No.', style: 'tableHeader', alignment: 'center'}, 
						{text: 'NOP', style: 'tableHeader', alignment: 'center'}, 
						{text: 'TANGGAL', style: 'tableHeader', alignment: 'center'}, 
						{text: 'NAMA WP', style: 'tableHeader', alignment: 'center'}, 
						{text: 'TAHUN SPPT', style: 'tableHeader', alignment: 'center'}, 
						{text: 'POKOK', style: 'tableHeader', alignment: 'center'}, 
						{text: 'PIUTANG', style: 'tableHeader', alignment: 'center'}, 
						{text: 'DENDA', style: 'tableHeader', alignment: 'center'}, 
						{text: 'JML BAYAR', style: 'tableHeader', alignment: 'center'} 
					],
					<?php if(isset($IsiPdf)){echo $IsiPdf;} ?>
					[
						{text: '', style: 'tableBody', alignment: 'center'}, 
						{text: 'T O T A L', colSpan: 4, style: 'tableBody', alignment: 'center'},
						{}, 
						{}, 
						{}, 
						{text: '<?php echo number_format($TOTALPOKOK,0); ?>', style: 'tableBody', alignment: 'right'}, 
						{text: '<?php echo number_format($TOTALPIUTANG,0); ?>', style: 'tableBody', alignment: 'right'}, 
						{text: '<?php echo number_format($TOTALDENDA,0); ?>', style: 'tableBody', alignment: 'right'}, 
						{text: '<?php echo number_format($TOTALALL,0); ?>', style: 'tableBody', alignment: 'right'} 
					],
				]
			}
		},
		{
			text: '\n'
		},
		{
			text: 'Laporan Penerimaan ini telah diperiksa dan direkonsiliasi dengan data penerimaan PBB P2 pada \n <?php echo $TempatBayar; ?> \n \n'
		},
		{
			columns:[
				{text: '<?php echo $TempatBayar; ?> \n Petugas, \n \n \n \n (                         ) \n', alignment: 'center'},
				{text: '\n Bendahara Penerima\n \n \n \n A N I F A H \n NIP. 19620817 199110 2 001', alignment: 'center'},
				{text: 'Padang, <?php echo date('d-m-Y'); ?> \n Petugas, \n \n \n \n ENDANG KURNIAWAN \n NIP. 19820908 200901 1 003', alignment: 'center'}
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
			fontSize: 9,
			color: 'black'
		},
		tableBody: {
			bold: false,
			fontSize: 8,
			color: 'black'
		}
	},
	pageSize: 'FOLIO',
//	width: 330,
//	height: 215,
	pageOrientation: 'potrait',
//	pageMargins: [40,60,40,60],
	footer: function(currentPage, pageCount) {return '   Hal: ' + currentPage.toString() +  ' dari ' + pageCount;}
};	
//pdfMake.createPdf(dd).download('optionalName.pdf');
pdfMake.createPdf(dd).open();
}
</script>