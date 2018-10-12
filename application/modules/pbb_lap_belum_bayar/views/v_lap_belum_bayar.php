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
					<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action = "<?php echo site_url().'/pbb_lap_belum_bayar/GenerateLaporan';?>" method="POST">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="NOP">
									NOP : <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="NOP" name="NOP" required="required" class="form-control">
								</div>
							</div>
						</div>
						<div class="ln_solid"></div>
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
					</form>
				</div>				
			</div>

			<?php
				if(isset($Laporan)){
					$x = 0;
					$Laporan = json_decode($Laporan);
					$Hasil = $Laporan->data;
					if($Hasil){
						foreach($Laporan->data as $data){
							$NOP = $data->NOP;
							$NM_WP_SPPT = $data->NM_WP_SPPT;
							$JLN_WP_SPPT = $data->JLN_WP_SPPT;
							$BLOK_KAV_NO_WP_SPPT = $data->BLOK_KAV_NO_WP_SPPT;
							$RT_WP_SPPT = $data->RT_WP_SPPT;
							$RW_WP_SPPT = $data->RW_WP_SPPT;
							$KELURAHAN_WP_SPPT = $data->KELURAHAN_WP_SPPT;
							$KOTA_WP_SPPT = $data->KOTA_WP_SPPT;
							$JALAN_OP = $data->JALAN_OP;
							$BLOK_KAV_NO_OP = $data->BLOK_KAV_NO_OP;
							$RT_OP = $data->RT_OP;
							$RW_OP = $data->RW_OP;
							$NM_KELURAHAN = $data->NM_KELURAHAN;
							$NM_KECAMATAN = $data->NM_KECAMATAN;
							$THN_PAJAK_SPPT[$x] = $data->THN_PAJAK_SPPT;
							$DENDA_SPPT[$x] = $data->DENDA_SPPT;
							$PBB_YG_HARUS_DIBAYAR_SPPT[$x] = $data->PBB_YG_HARUS_DIBAYAR_SPPT;
							$KETERANGAN[$x] = $data->KETERANGAN;
							$x = $x+1;
						}
					echo "<div class='row' id='LaporanCetak'>
							<div class='col-lg-12'>
								<div class='panel panel-default'>
									<div class='panel-heading'>
										<h1 class='page-header' align='center'>
											$JudulLaporan
										</h1>
									</div>
										<div class='col-md-12 col-sm-12 col-xs-12'>
										&nbsp
										</div>
										<div class='col-md-6 col-sm-12 col-xs-12'>
											<div class='col-md-12 col-sm-12 col-xs-12'>
												<div class='col-md-4 col-sm-4 col-xs-4'>NOP :</div>
												<div class='col-md-8 col-sm-8 col-xs-8'>$NOP</div>
											</div>
											<div class='col-md-12 col-sm-12 col-xs-12'>
												<div class='col-md-4 col-sm-4 col-xs-4'>
													Alamat OP : 
												</div>
												<div class='col-md-8 col-sm-8 col-xs-8'>
													$JALAN_OP $BLOK_KAV_NO_OP RT : $RT_OP RW : $RW_OP 
												</div>
											</div>
											<div class='col-md-12 col-sm-12 col-xs-12'>
												<div class='col-md-4 col-sm-4 col-xs-4'>
													Kelurahan OP : 
												</div>
												<div class='col-md-8 col-sm-8 col-xs-8'>
													$NM_KELURAHAN 
												</div>
											</div>
											<div class='col-md-12 col-sm-12 col-xs-12'>
												<div class='col-md-4 col-sm-4 col-xs-4'>
													Kecamatan OP : 
												</div>
												<div class='col-md-8 col-sm-8 col-xs-8'>
													$NM_KECAMATAN 
												</div>
											</div>
										</div>
										<div class='col-md-6 col-sm-12 col-xs-12'>
											<div class='col-md-12 col-sm-12 col-xs-12'>
												<div class='col-md-4 col-sm-4 col-xs-4'>
													&nbsp 
												</div>
												<div class='col-md-8 col-sm-8 col-xs-8'>
													&nbsp 
												</div>
											</div>
											<div class='col-md-12 col-sm-12 col-xs-12'>
												<div class='col-md-4 col-sm-4 col-xs-4'>
													Nama WP : 
												</div>
												<div class='col-md-8 col-sm-8 col-xs-8'>
													$NM_WP_SPPT 
												</div>
											</div>
											<div class='col-md-12 col-sm-12 col-xs-12'>
												<div class='col-md-4 col-sm-4 col-xs-4'>
													Alamat WP : 
												</div>
												<div class='col-md-8 col-sm-8 col-xs-8'>
													$JLN_WP_SPPT $BLOK_KAV_NO_WP_SPPT RT : $RT_WP_SPPT RW : $RW_WP_SPPT
												</div>
											</div>
											<div class='col-md-12 col-sm-12 col-xs-12'>
												<div class='col-md-4 col-sm-4 col-xs-4'>
													Kelurahan WP : 
												</div>
												<div class='col-md-8 col-sm-8 col-xs-8'>
													$KELURAHAN_WP_SPPT 
												</div>
											</div>
											<div class='col-md-12 col-sm-12 col-xs-12'>
												<div class='col-md-4 col-sm-4 col-xs-4'>
													Kota WP : 
												</div>
												<div class='col-md-8 col-sm-8 col-xs-8'>
													$KOTA_WP_SPPT 
												</div>
											</div>
										</div>
										<div class='col-md-12 col-sm-12 col-xs-12'>
										&nbsp
										</div>
									<!-- /.panel-heading -->
									<div class='panel-body'>
										<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example'>
											<thead>
												<tr>
													<th>NO</th>
													<th>TAHUN PAJAK</th>
													<th>PBB YG HARUS DIBAYAR</th>
													<th>DENDA SPPT</th>
													<th>KETERANGAN</th>
												</tr>
											</thead>
											<tbody>";
											$xNo = 0;
											for($y=0; $y<$x; $y++){
												if($KETERANGAN[$y]=='BELUM LUNAS'){
													echo "<tr><td>".($xNo+1)."</td>";
														echo "<td>$THN_PAJAK_SPPT[$y]</td>";
														echo "<td>".number_format($PBB_YG_HARUS_DIBAYAR_SPPT[$y],0)."</td>";
														echo "<td>".number_format($DENDA_SPPT[$y],0)."</td>";
														echo "<td>$KETERANGAN[$y]</td>";
														echo "</tr>";
													$xNo = $xNo + 1;
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
					}
				}
				echo "<input type='button' id='Cetak' name='Cetak' value='CETAK'>";
			?>
        </div>
        <!-- /#page-wrapper -->
<script>
$("#NOP").mask("13.71.999.999.999.9999.0");
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
			paging: false,
			"searching": false
        });
    });	
	
$( "#Cetak" ).click(function() {
     var printContents = document.getElementById('LaporanCetak').innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print(printContents);
     document.body.innerHTML = originalContents;	
});
</script>