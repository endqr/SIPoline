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
														<th>NO</th>
														<th>NOP</th>
														<th>TAHUN PAJAK</th>
														<th>NAMA WP</th>
														<th>ALAMAT WP</th>
														<th>ALAMAT OP</th>
														<th>PBB</th>
													</tr>
												</thead>
												<tbody>";
				if(isset($Laporan)){
					$Laporan = json_decode($Laporan);
					if($Laporan->code=='200'){
												$x = 1;
												$z = 1;
												$IsiPdf='';
												
												$PeriodeAwal = $Laporan->PeriodeAwal;
												$PeriodeAkhir = $Laporan->PeriodeAkhir;
												foreach($Laporan->data as $data){
													$NOP = $data->NOP;
													$THN_PAJAK_SPPT = $data->THN_PAJAK_SPPT;
													$NM_WP_SPPT = $data->NM_WP_SPPT;
													$ALAMAT_WP = $data->ALAMAT_WP;
													$ALAMAT_OP = $data->ALAMAT_OP;
													$PBB_YG_HARUS_DIBAYAR_SPPT = $data->PBB_YG_HARUS_DIBAYAR_SPPT;
			$IsiPdf = $IsiPdf."[{text: '".$z++."', style: 'tableBody', alignment: 'left'},
				{text: '$NOP', style: 'tableBody', alignment: 'left'},
				{text: '$THN_PAJAK_SPPT', style: 'tableBody', alignment: 'left'},
				{text: '$NM_WP_SPPT', style: 'tableBody', alignment: 'left'},
				{text: '$ALAMAT_WP', style: 'tableBody', alignment: 'left'},
				{text: '$ALAMAT_OP', style: 'tableBody', alignment: 'left'},
				{text: '$PBB_YG_HARUS_DIBAYAR_SPPT', style: 'tableBody', alignment: 'left'}],
				";
													echo "<tr><td>".$x++."</td>";
														echo "<td>$NOP</td>";
														echo "<td>$THN_PAJAK_SPPT</td>";
														echo "<td>$NM_WP_SPPT</td>";
														echo "<td>$ALAMAT_WP</td>";
														echo "<td>$ALAMAT_OP</td>";
														echo "<td align='right'>".number_format($PBB_YG_HARUS_DIBAYAR_SPPT,0)."</td>";
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
$('#dataTables-example').DataTable({
    responsive: true,
	dom: 'Bfrtip',
	buttons: [{
		extend: 'pdfHtml5',
		download: 'open',
		title: 'Laporan Data Objek Baru \n <?php if(isset($PeriodeAwal)){echo " Periode : ".$PeriodeAwal." s/d ".$PeriodeAkhir;} ?>'
	},{
		extend: 'excelHtml5',
        customize: function( xlsx ) {
           var sheet = xlsx.xl.worksheets['sheet1.xml'];
           $('row c[r^="C"]', sheet).attr( 's', '2' );
        }
	}]
});
</script>