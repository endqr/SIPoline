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
									<div class='panel-body'>
										<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example'>
											<thead>
												<tr>
													<td rowspan='2'>NO</td>
													<td rowspan='2'>KD KEC</td>
													<td rowspan='2'>NAMA KECAMATAN</td>
													<td rowspan='2'>TARGET</td>
													<td colspan='4'>PERIODE INI</td>
													<td colspan='4'>S/D PERIODE INI</td>
													<td rowspan='2'>DENDA</td>
													<td rowspan='2'>REALISASI</td>
												</tr>
												<tr>
													<td>WP</td>
													<td>POKOK</td>
													<td>WP</td>
													<td>TUNGGAKAN</td>
													<td>WP</td>
													<td>POKOK</td>
													<td>WP</td>
													<td>TUNGGAKAN</td>
												</tr>
												<tr>
													<th>1</th>
													<th>2</th>
													<th>3</th>
													<th>4</th>
													<th>5</th>
													<th>6</th>
													<th>7</th>
													<th>8</th>
													<th>9</th>
													<th>10</th>
													<th>11</th>
													<th>12</th>
													<th>13</th>
													<th>14</th>
												</tr>
											</thead>
											<tbody>";
											$x = 1;
											$z = 1;
											$IsiPdf='';
												$xHasil = json_decode($Laporan);
												$TOTALTARGET = 0;
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
												foreach($xHasil->data as $data){
													$KD_KECAMATAN = $data->KD_KECAMATAN;
													$NM_KECAMATAN = $data->NM_KECAMATAN;
													$TARGET = $data->TARGET;
													$WP_POKOK_PERIODE_LALU = $data->WP_POKOK_PERIODE_LALU;
													$PBB_POKOK_PERIODE_LALU = $data->PBB_POKOK_PERIODE_LALU;
													$WP_TUNGGAKAN_PERIODE_LALU = $data->WP_TUNGGAKAN_PERIODE_LALU;
													$PBB_TUNGGAKAN_PERIODE_LALU = $data->PBB_TUNGGAKAN_PERIODE_LALU;
													$WP_POKOK_PERIODE_INI = $data->WP_POKOK_PERIODE_INI;
													$PBB_POKOK_PERIODE_INI = $data->PBB_POKOK_PERIODE_INI;
													$WP_TUNGGAKAN_PERIODE_INI = $data->WP_TUNGGAKAN_PERIODE_INI;
													$PBB_TUNGGAKAN_PERIODE_INI = $data->PBB_TUNGGAKAN_PERIODE_INI;
													$WP_POKOK_PERIODE_AKHIR = $data->WP_POKOK_AKHIR;
													$PBB_POKOK_PERIODE_AKHIR = $data->PBB_POKOK_AKHIR;
													$WP_TUNGGAKAN_PERIODE_AKHIR = $data->WP_TUNGGAKAN_AKHIR;
													$PBB_TUNGGAKAN_PERIODE_AKHIR = $data->PBB_TUNGGAKAN_AKHIR;
													$DENDA_AKHIR = $data->DENDA_AKHIR;
													$REALISASI_AKHIR = $data->REALISASI_AKHIR;
													$PERSEN = $data->PERSEN;
												$TOTALTARGET = $TOTALTARGET + $TARGET;
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
												$TOTALPERSEN= $TOTALPERSEN + $PERSEN;
		$IsiPdf = $IsiPdf."[{text: '".$z++."', style: 'tableBody', alignment: 'left'},
			{text: '$NM_KECAMATAN', style: 'tableBody', alignment: 'left'},
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
														echo "<td>$KD_KECAMATAN</td>";
														echo "<td>$NM_KECAMATAN</td>";
														echo "<td align='right'>".number_format($TARGET,0)."</td>";
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
											}
											echo "</tbody>
										</table>
									</div>
								<!-- /.panel-body -->
							</div>
							<!-- /.panel -->
						</div>
						<!-- /.col-lg-12 -->
					</div>";
				echo "<input type='button' id='Cetak' name='Cetak' value='CETAK'>";
				}
			?>
			
        </div>
        <!-- /#page-wrapper -->
<script>
$('#dataTables-example').DataTable({
    responsive: true
});
	
$( "#Cetak" ).click(function() {
var dd = {
	content: [
		{ 
			text: 'Laporan Realisasi Penerimaan PBB Per Kecamatan', 
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
							100, 
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
						{text: 'NAMA KECAMATAN', style: 'tableHeader', rowSpan: 2, alignment: 'center'}, 
						{text: 'TARGET', style: 'tableHeader', rowSpan: 2, alignment: 'center'}, 
						{text: 'PERIODE LALU', style: 'tableHeader', colSpan: 4, alignment: 'center'}, 
						{}, 
						{}, 
						{}, 
						{text: 'PERIODE INI', style: 'tableHeader', colSpan: 4, alignment: 'center'}, 
						{}, 
						{}, 
						{}, 
						{text: 'PERIODE INI', style: 'tableHeader', colSpan: 4, alignment: 'center'}, 
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
						{}, 
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
					<?php if(isset($IsiPdf)){echo $IsiPdf;} ?>
					[
						{text: '', style: 'tableBody', alignment: 'left'},
						{text: 'TOTAL', style: 'tableBody', alignment: 'left'},
						{text: '<?php echo number_format($TOTALTARGET,0); ?>', style: 'tableBody', alignment: 'right'},
						{text: '<?php echo number_format($TOTAL_WP_POKOK_PERIODE_LALU,0); ?>', style: 'tableBody', alignment: 'right'},
						{text: '<?php echo number_format($TOTAL_PBB_POKOK_PERIODE_LALU ,0); ?>', style: 'tableBody', alignment: 'right'},
						{text: '<?php echo number_format($TOTAL_WP_TUNGGAKAN_PERIODE_LALU,0); ?>', style: 'tableBody', alignment: 'right'},
						{text: '<?php echo number_format($TOTAL_PBB_TUNGGAKAN_PERIODE_LALU,0); ?>', style: 'tableBody', alignment: 'right'},
						{text: '<?php echo number_format($TOTAL_WP_POKOK_PERIODE_INI,0); ?>', style: 'tableBody', alignment: 'right'},
						{text: '<?php echo number_format($TOTAL_PBB_POKOK_PERIODE_INI ,0); ?>', style: 'tableBody', alignment: 'right'},
						{text: '<?php echo number_format($TOTAL_WP_TUNGGAKAN_PERIODE_INI,0); ?>', style: 'tableBody', alignment: 'right'},
						{text: '<?php echo number_format($TOTAL_PBB_TUNGGAKAN_PERIODE_INI,0); ?>', style: 'tableBody', alignment: 'right'},
						{text: '<?php echo number_format($TOTAL_WP_POKOK_PERIODE_AKHIR,0); ?>', style: 'tableBody', alignment: 'right'},
						{text: '<?php echo number_format($TOTAL_PBB_POKOK_PERIODE_AKHIR ,0); ?>', style: 'tableBody', alignment: 'right'},
						{text: '<?php echo number_format($TOTAL_WP_TUNGGAKAN_PERIODE_AKHIR,0); ?>', style: 'tableBody', alignment: 'right'},
						{text: '<?php echo number_format($TOTAL_PBB_TUNGGAKAN_PERIODE_AKHIR,0); ?>', style: 'tableBody', alignment: 'right'},
						{text: '<?php echo number_format($TOTAL_DENDA_AKHIR,0); ?>', style: 'tableBody', alignment: 'right'},
						{text: '<?php echo number_format($TOTAL_REALISASI_AKHIR,0); ?>', style: 'tableBody', alignment: 'right'},
						{text: '<?php echo number_format($TOTALPERSEN,0); ?>', style: 'tableBody', alignment: 'right'}
					],
				]
			}
		},
		{
			text: '\n \n'
		},
		{
			columns:[
				{text: 'KEPALA \n BADAN PENDAPATAN DAERAH \n \n \n ADIB ALFIKRI, SE, M.Si \n NIP. 19730413 199703 1 001', alignment: 'center'},
				{text: 'KEPALA BIDANG\n PENGENDALIAN DAN PELAPORAN PENDAPATAN \n \n \n Drs. MAIHENDRIZON, M.MT \n NIP. 19740511 199501 1 001', alignment: 'center'},
				{text: 'KEPALA SUB BIDANG \n PEMBUKUAN DAN PELAPORAN \n \n \n ARISMAN, SE \n NIP. 19820908 200901 1 003', alignment: 'center'}
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
	pageOrientation: 'landscape',
	footer: function(currentPage, pageCount) {return '   Hal: ' + currentPage.toString() +  ' dari ' + pageCount;}
};	
//pdfMake.createPdf(dd).download('optionalName.pdf');
pdfMake.createPdf(dd).open();
});
</script>