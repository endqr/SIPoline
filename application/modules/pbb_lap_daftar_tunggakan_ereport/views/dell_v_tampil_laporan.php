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
					echo "<div class='row'>
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
													<th>NO</th>
													<th>NOP</th>
													<th>NAMA WP</th>
													<th>ALAMAT WP</th>
													<th>ALAMAT OP</th>
												</tr>
											</thead>
											<tbody>";
											$x = 1;
											$z = 1;
											$IsiPdf='';
											$Laporan = json_decode($Laporan);
											foreach($Laporan->data as $data){
												$NOP = $data->KD_PROPINSI.'.'.$data->KD_DATI2.'.'.$data->KD_KECAMATAN.'.'.$data->KD_KELURAHAN.'.'.$data->KD_BLOK.'.'.$data->NO_URUT.'.'.$data->KD_JNS_OP;
												$NM_WP_SPPT = $data->NM_WP_SPPT;
												$JALAN_OP = $data->JALAN_OP;
												$BLOK_KAV_NO_OP = $data->BLOK_KAV_NO_OP;
												$RT_OP = $data->RT_OP;
												$RW_OP = $data->RW_OP;
												$NM_KELURAHAN_OP = $data->NM_KELURAHAN_OP;
												$NM_KECAMATAN_OP = $data->NM_KECAMATAN_OP;
												$JLN_WP_SPPT = $data->JLN_WP_SPPT;
												$BLOK_KAV_NO_WP_SPPT = $data->BLOK_KAV_NO_WP_SPPT;
												$RT_WP_SPPT = $data->RT_WP_SPPT;
												$RW_WP_SPPT = $data->RW_WP_SPPT;
												$KELURAHAN_WP_SPPT = $data->KELURAHAN_WP_SPPT;
												$KOTA_WP_SPPT = $data->KOTA_WP_SPPT;
		$IsiPdf = $IsiPdf."[{text: '".$z++."', style: 'tableBody', alignment: 'left'},
			{text: '$NOP', style: 'tableBody', alignment: 'left'},
			{text: '$NM_WP_SPPT', style: 'tableBody', alignment: 'left'},
			{text: '$JLN_WP_SPPT $BLOK_KAV_NO_WP_SPPT RT $RT_WP_SPPT RW $RW_WP_SPPT KELURAHAN $KELURAHAN_WP_SPPT KOTA $KOTA_WP_SPPT', style: 'tableBody', alignment: 'left'},
			{text: '$JALAN_OP $BLOK_KAV_NO_OP RT $RT_OP RW $RW_OP KELURAHAN $NM_KELURAHAN_OP KECAMATAN $NM_KECAMATAN_OP', style: 'tableBody', alignment: 'left'}],
			";
												echo "<tr><td>".$x++."</td>";
													echo "<td>$NOP</td>";
													echo "<td>$NM_WP_SPPT</td>";
													echo "<td>$JLN_WP_SPPT $BLOK_KAV_NO_WP_SPPT RT $RT_WP_SPPT RW $RW_WP_SPPT KELURAHAN $KELURAHAN_WP_SPPT KOTA $KOTA_WP_SPPT</td>";
													echo "<td>$JALAN_OP $BLOK_KAV_NO_OP RT $RT_OP RW $RW_OP KELURAHAN $NM_KELURAHAN_OP KECAMATAN $NM_KECAMATAN_OP</td>";
													echo "</tr>";
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
			text: 'Laporan Objek Baru', 
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
							100, //NOP
							150, //Nama WP
							250, //Alamat WP
							250 //Alamat OP
						],
				headerRows: 1,
				// keepWithHeaderRows: 1,
				body: [
					[
						{text: 'No.', style: 'tableHeader', alignment: 'center'}, 
						{text: 'NOP', style: 'tableHeader', alignment: 'center'}, 
						{text: 'NAMA WAJIB PAJAK', style: 'tableHeader', alignment: 'center'}, 
						{text: 'ALAMAT WAJIB PAJAK', style: 'tableHeader', alignment: 'center'}, 
						{text: 'ALAMAT OBJEK PAJAK', style: 'tableHeader', alignment: 'center'}
					],
					<?php if(isset($IsiPdf)){echo $IsiPdf;} ?>
				]
			}
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