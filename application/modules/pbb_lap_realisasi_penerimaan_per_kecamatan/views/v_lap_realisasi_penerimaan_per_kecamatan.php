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
					<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action = "<?php echo site_url().'/pbb_lap_realisasi_penerimaan_per_kecamatan/GenerateLaporan';?>" method="POST">
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
										<option selected value='000'>SELURUH KECAMATAN</option>
										<option value='010'>BUNGUS TELUK KABUNG</option>
										<option value='020'>LUBUK KILANGAN</option>
										<option value='030'>LUBUK BEGALUNG</option>
										<option value='040'>PADANG SELATAN</option>
										<option value='050'>PADANG TIMUR</option>
										<option value='060'>PADANG BARAT</option>
										<option value='070'>PADANG UTARA</option>
										<option value='080'>NANGGALO</option>
										<option value='090'>K U R A N J I</option>
										<option value='100'>P A U H</option>
										<option value='110'>KOTO TANGAH</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="KodeKel">
									Kelurahan : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select id="KodeKelurahan" name="KodeKelurahan" required="required" class="form-control">
										<option selected value='00.00.000.000'>SELURUH KELURAHAN</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="PeriodeAwal">
									Buku : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select id="Buku" name="Buku" required="required" class="form-control">
										<option selected value='0'>Seluruh Buku</option>
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
									<div class='panel-body'>
										<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example'>
											<thead>
												<tr>
													<th>NO</th>
													<th>TANGGAL<br>PEMBAYARAN</th>
													<th>POKOK</th>
													<th>TUNGGAKAN</th>
													<th>DENDA</th>
													<th>REALISASI</th>
												</tr>
											</thead>
											<tbody>";
											$x = 1;
												$xHasil = json_decode($Laporan);
												$TOTALPOKOK = 0;
												$TOTALTUNGGAKAN=0;
												$TOTALREALISASI=0;
												$TOTALDENDA=0;
												foreach($xHasil->data as $data){
													$TGL_PEMBAYARAN_SPPT = $data->TGL_PEMBAYARAN_SPPT;
													$POKOK_NAGARI = $data->POKOK_NAGARI;
													$TUNGGAKAN_NAGARI = $data->TUNGGAKAN_NAGARI;
													$DENDA_NAGARI = $data->DENDA_NAGARI;
													$POKOK_BTN = $data->POKOK_BTN;
													$TUNGGAKAN_BTN = $data->TUNGGAKAN_BTN;
													$DENDA_BTN = $data->DENDA_BTN;
													$POKOK_BNI = $data->POKOK_BNI;
													$TUNGGAKAN_BNI = $data->TUNGGAKAN_BNI;
													$DENDA_BNI = $data->DENDA_BNI;
													$POKOK = $data->POKOK;
													$TUNGGAKAN = $data->TUNGGAKAN;
													$REALISASI_NAGARI = $POKOK_NAGARI + $TUNGGAKAN_NAGARI;
													$REALISASI_BNI = $POKOK_BNI + $TUNGGAKAN_BNI;
													$REALISASI_BTN = $POKOK_BTN + $TUNGGAKAN_BTN;
													$REALISASI = $REALISASI_NAGARI + $REALISASI_BNI + $REALISASI_BTN;
													$DENDA = $DENDA_NAGARI + $DENDA_BNI + $DENDA_BTN;
													$TOTALPOKOK = $TOTALPOKOK + $POKOK;
													$TOTALTUNGGAKAN = $TOTALTUNGGAKAN + $TUNGGAKAN;
													$TOTALREALISASI = $TOTALREALISASI + $REALISASI;
													$TOTALDENDA = $TOTALDENDA + $DENDA;
													echo "<tr><td>".$x++."</td>";
														echo "<td>$TGL_PEMBAYARAN_SPPT</td>";
														echo "<td>BANK NAGARI : ".number_format($POKOK_NAGARI,0)."<br>BANK BNI : ".number_format($POKOK_BNI,0)."<br>BANK BTN : ".number_format($POKOK_BTN,0)."<br><b>P O K O K : ".number_format($POKOK,0)."</b></td>";
														echo "<td>BANK NAGARI : ".number_format($TUNGGAKAN_NAGARI,0)."<br>BANK BNI : ".number_format($TUNGGAKAN_BNI,0)."<br>BANK BTN : ".number_format($TUNGGAKAN_BTN,0)."<br><b>TUNGGAKAN : ".number_format($TUNGGAKAN,0)."</b></td>";
														echo "<td>BANK NAGARI : ".number_format($DENDA_NAGARI,0)."<br>BANK BNI : ".number_format($DENDA_BNI,0)."<br>BANK BTN : ".number_format($DENDA_BTN,0)."<br><b>TOTAL DENDA : ".number_format($DENDA,0)."</b></td>";
														echo "<td>BANK NAGARI : ".number_format(($REALISASI_NAGARI),0)."<br>BANK BNI : ".number_format($REALISASI_BNI,0)."<br>BANK BTN : ".number_format($REALISASI_BTN,0)."<br><b>JUMLAH : ".number_format($REALISASI,0)."</b></td>";
														echo "</tr>";
												
											}
											echo "</tbody>
										</table>
										SUMARY :<br>
										TOTAL POKOK : ".number_format($TOTALPOKOK,0)."<br>
										<u>TOTAL TUNGGAKAN : ".number_format($TOTALTUNGGAKAN,0)."</u><br>
										<b>TOTAL REALISASI : ".number_format($TOTALREALISASI,0)."</b><br>
										<b>TOTAL DENDA : ".number_format($TOTALDENDA,0)."</b>
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
$( "#PeriodeAwal" ).datepicker( {dateFormat: "yy-mm-dd"} );
$( "#PeriodeAkhir" ).datepicker( {dateFormat: "yy-mm-dd"} );
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
	
	$( "#KodeKecamatan" ).change(function() {
		var xKodeKecamatan = $("#KodeKecamatan").val();
		xKodeKecamatan = '13.71-'+xKodeKecamatan;
		var xUrl = "<?php echo site_url('/pbb_lap_objek_baru/getKelurahan'); ?>";
		
		$.ajax({
			url:xUrl,
			type:'POST',
			data: 'KodeKecamatan=' + xKodeKecamatan,
			dataType: 'json',
			success: function( json ) {
				  $('#KodeKelurahan')
				  .find('option')
				  .remove()
				  .end()
				  .append("<option selected value='00.00.000.000'>SELURUH KELURAHAN</option>");
			   $.each(json, function(id, name){
				  $('#KodeKelurahan')
				  .append('<option value='+name['id']+'>'+name['name']+'</option>');
			   });
			}
		});
	});
</script>