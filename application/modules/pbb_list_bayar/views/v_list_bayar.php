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
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="PeriodeAwal">
									Periode Awal : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="PeriodeAwal" name="PeriodeAwal" required="required" class="form-control" placeholder="YYYY-MM-DD">
								</div>
							</div>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="PeriodeAkhir">
									Periode Akhir : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="PeriodeAkhir" name="PeriodeAkhir" required="required" class="form-control" placeholder="YYYY-MM-DD" >
								</div>
							</div>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-12">
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
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="KodeKel">
									Kelurahan : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select id="KodeKelurahan" name="KodeKelurahan" required="required" class="form-control">
										<option selected value='000'>SELURUH KELURAHAN</option>
									</select>
								</div>
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="col-md-6 col-sm-6 col-xs-12 ">
							<div class="form-group">
								<button type="submit" class="btn btn-primary col-md-offset-6" id="Generate" name="Generate" value="Generate">Generate</button>
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
											$Laporan = json_decode($Laporan);
											foreach($Laporan->data as $data){
												$NOP = $data->KD_PROPINSI.'.'.$data->KD_DATI2.'.'.$data->KD_KECAMATAN.'.'.$data->KD_KELURAHAN.'.'.$data->KD_BLOK.'.'.$data->NO_URUT.'.'.$data->KD_JNS_OP;
//												$NOP = $data->NOP;
//												$THN_PAJAK_SPPT = $data->THN_PAJAK_SPPT;
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

    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
	
	$( "#KodeKecamatan" ).change(function() {
		var xKodeKecamatan = $("#KodeKecamatan").val();
//		xKodeKecamatan = '13.71-'+xKodeKecamatan;
		var xUrl = "<?php echo base_url('/pbb_list_bayar/getKelurahan'); ?>";
		
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
				  .append("<option selected value='000'>SELURUH KELURAHAN</option>");
			   $.each(json, function(id, name){
				  $('#KodeKelurahan')
				  .append('<option value='+name['KD_KELURAHAN']+'>'+name['NM_KELURAHAN']+'</option>');
			   });
			}
		});
	});
</script>