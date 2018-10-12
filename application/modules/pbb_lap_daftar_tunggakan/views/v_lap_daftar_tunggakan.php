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
					<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action = "<?php echo site_url().'/pbb_lap_daftar_tunggakan/GenerateLaporan';?>" method="POST">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="TahunPajak">
									Tahun Pajak : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select id="TahunPajak" name="TahunPajak" required="required" class="form-control">
										<option selected value='0'>Seluruh Tunggakan</option>
										<?php
											$TahunIni = date('Y');
											for($x=2008; $x<$TahunIni; $x++){
												echo "<option value='$x'>$x</option>";
											}
										?>
									</select>
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
													<th>POKOK</th>
													<th>DENDA</th>
												</tr>
											</thead>
											<tbody>";
											$x = 1;
												$xHasil = json_decode($Laporan);
												$TOTALPOKOK = 0;
												$TOTALDENDA=0;
												foreach($xHasil->data as $data){
													$NOP[0] = $data->KD_PROPINSI;
													$NOP[1] = $data->KD_DATI2;
													$NOP[2] = $data->KD_KECAMATAN;
													$NOP[3] = $data->KD_KELURAHAN;
													$NOP[4] = $data->KD_BLOK;
													$NOP[5] = $data->NO_URUT;
													$NOP[6] = $data->KD_JNS_OP;
													$NM_WP = $data->NM_WP_SPPT;
													$ALAMAT_WP[0] = $data->JLN_WP_SPPT;
													$ALAMAT_WP[1] = $data->BLOK_KAV_NO_WP_SPPT;
													$ALAMAT_WP[2] = $data->RT_WP_SPPT;
													$ALAMAT_WP[3] = $data->RW_WP_SPPT;
													$ALAMAT_WP[4] = $data->KELURAHAN_WP_SPPT;
													$ALAMAT_WP[5] = $data->KOTA_WP_SPPT;
													
													$ALAMAT_OP[0] = $data->JALAN_OP;
													$ALAMAT_OP[1] = $data->BLOK_KAV_NO_OP;
													$ALAMAT_OP[2] = $data->RT_OP;
													$ALAMAT_OP[3] = $data->RW_OP;
													$ALAMAT_OP[4] = $data->NM_KELURAHAN;
													$ALAMAT_OP[5] = $data->NM_KECAMATAN;
													$POKOK = $data->PBB_YG_HARUS_DIBAYAR_SPPT;
													$DENDA = $data->DENDA;
													echo "<tr><td>".$x++."</td>";
														echo "<td>$NOP[0].$NOP[1].$NOP[2].$NOP[3].$NOP[4].$NOP[5].$NOP[6]</td>";
														echo "<td>$NM_WP</td>";
														echo "<td>$ALAMAT_WP[0] $ALAMAT_WP[1] RT/RW $ALAMAT_WP[2]/$ALAMAT_WP[3] KEL. $ALAMAT_WP[4] KOTA $ALAMAT_WP[5] </td>";
														echo "<td>$ALAMAT_OP[0] $ALAMAT_OP[1] RT/RW $ALAMAT_OP[2]/$ALAMAT_OP[3] KEL. $ALAMAT_OP[4] KEC. $ALAMAT_OP[5] </td>";
														echo "<td>".number_format($POKOK,0)."</td>";
														echo "<td>".number_format($DENDA,0)."</td>";
														echo "</tr>";
												
											}
											echo "</tbody>
										</table>
										SUMARY :<br>
										TOTAL POKOK : ".number_format($TOTALPOKOK,0)."<br>
										<b>TOTAL DENDA : ".number_format($TOTALDENDA,0)."</b>
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
$( "#PeriodeAwal" ).datepicker( {dateFormat: "yy-mm-dd"} );
$( "#PeriodeAkhir" ).datepicker( {dateFormat: "yy-mm-dd"} );
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
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