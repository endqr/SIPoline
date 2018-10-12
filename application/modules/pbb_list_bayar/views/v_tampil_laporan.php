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
													<th style='text-align:center'>NO</th>
													<th style='text-align:center'>NOP</th>
													<th style='text-align:center'>NAMA WP</th>
													<th style='text-align:center'>ALAMAT OP</th>
													<th style='text-align:center'>TAHUN</th>
													<th style='text-align:center'>POKOK</th>
													<th style='text-align:center'>TUNGGAKAN</th>
													<th style='text-align:center'>DENDA</th>
													<th style='text-align:center'>TOTAL</th>
												</tr>
											</thead>
											<tbody>";
				if(isset($Laporan)){
					$Laporan = json_decode($Laporan);
					if($Laporan->code=='200'){
						$xPeriodeAwal = $Laporan->PeriodeAwal;
						$xPeriodeAkhir = $Laporan->PeriodeAkhir;
						$Kecamatan = $Laporan->Kecamatan;
											$x = 1;
											$z = 1;
											$IsiPdf='';
											
											foreach($Laporan->data as $data){
												$NOP = $data->NOP;
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
												$THN_PAJAK_SPPT = $data->THN_PAJAK_SPPT;
												$POKOK = $data->POKOK;
												$TUNGGAKAN = $data->TUNGGAKAN;
												$DENDA_SPPT = $data->DENDA_SPPT;
		$IsiPdf = $IsiPdf."[{text: '".$z++."', style: 'tableBody', alignment: 'left'},
			{text: '$NOP', style: 'tableBody', alignment: 'left'},
			{text: '$NM_WP_SPPT', style: 'tableBody', alignment: 'left'},
			{text: '$JALAN_OP $BLOK_KAV_NO_OP RT $RT_OP RW $RW_OP KELURAHAN $NM_KELURAHAN_OP KECAMATAN $NM_KECAMATAN_OP', style: 'tableBody', alignment: 'left'},
			{text: '$THN_PAJAK_SPPT', style: 'tableBody', alignment: 'center'},
			{text: '$POKOK', style: 'tableBody', alignment: 'right'},
			{text: '$TUNGGAKAN', style: 'tableBody', alignment: 'right'},
			{text: '$DENDA_SPPT', style: 'tableBody', alignment: 'right'}],
			";
												echo "<tr><td>".$x++."</td>";
													echo "<td>$NOP</td>";
													echo "<td>$NM_WP_SPPT</td>";
													echo "<td>$JALAN_OP $BLOK_KAV_NO_OP RT $RT_OP RW $RW_OP KELURAHAN $NM_KELURAHAN_OP KECAMATAN $NM_KECAMATAN_OP</td>";
													echo "<td style='text-align:center'>$THN_PAJAK_SPPT</td>";
													echo "<td style='text-align:right'>".number_format($POKOK,0)."</td>";
													echo "<td style='text-align:right'>".number_format($TUNGGAKAN,0)."</td>";
													echo "<td style='text-align:right'>".number_format($DENDA_SPPT,0)."</td>";
													echo "<td style='text-align:right'>".number_format(($POKOK + $TUNGGAKAN + $DENDA_SPPT),0)."</td>";
													echo "</tr>";
												}
					}
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
			?>
			
        </div>
        <!-- /#page-wrapper -->
<script>
$(document).ready(function() {
	$('#dataTables-example').DataTable({
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        responsive: true,
		dom: 'Bfrtip',
		buttons: [{
			extend: 'pdfHtml5',
			download: 'open',
			orientation: 'landscape',
			title: 'Laporan Pembayaran \n <?php if(isset($xPeriodeAwal)){echo " Periode : ".$xPeriodeAwal." s/d ".$xPeriodeAkhir;} ?> \n <?php if(isset($Kecamatan)){echo $Kecamatan;} ?>'
		},{
			extend: 'excelHtml5',
			customize: function( xlsx ) {
			   var sheet = xlsx.xl.worksheets['sheet1.xml'];
			   $('row c[r^="C"]', sheet).attr( 's', '2' );
			}
		}]			
	});
});
	
</script>