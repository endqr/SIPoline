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
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="KodeKecamatan">
									Kecamatan : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select id="KdKec" name="KdKec" required="required" class="form-control">
										<option selected value=''>SELURUH KECAMATAN</option>
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
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="KodeKel">
									Kelurahan : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select id="KdKel" name="KdKel" required="required" class="form-control">
										<option selected value=''>SELURUH KELURAHAN</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="KodeKel">
									Tahun : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="Tahun" name="Tahun" class="form-control" placeholder="YYYY" required>
								</div>
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="col-md-6 col-sm-6 col-xs-12 ">
							<div class="form-group">
								<button type="submit" class="btn btn-primary col-md-offset-6" id="Generate" name="Generate">Generate</button>
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
				if(isset($DaftarTunggakan)){
					echo "<div class='row'>
							<div class='col-lg-12'>
								<div class='panel panel-default'>
									<div class='panel-heading'>
										<h1 class='page-header' align='center'>
											$JudulLaporan
										</h1>
										Tahun Pajak : $Tahun
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
													<th>PIUTANG</th>
												</tr>
											</thead>
											<tbody>";
											$x = 1;
											$Total = 0;
											$DaftarTunggakan = json_decode($DaftarTunggakan);
											foreach($DaftarTunggakan->data as $data){
												$NOP = $data->NOP;
												$NM_WP_SPPT = $data->NM_WP_SPPT;
												$JALAN_OP = $data->JALAN_OP;
												$BLOK_KAV_NO_OP = $data->BLOK_KAV_NO_OP;
												$RT_OP = $data->RT_OP;
												$RW_OP = $data->RW_OP;
												$JLN_WP_SPPT = $data->JLN_WP_SPPT;
												$BLOK_KAV_NO_WP_SPPT = $data->BLOK_KAV_NO_WP_SPPT;
												$RT_WP_SPPT = $data->RT_WP_SPPT;
												$RW_WP_SPPT = $data->RW_WP_SPPT;
												$KELURAHAN_WP_SPPT = $data->KELURAHAN_WP_SPPT;
												$KOTA_WP_SPPT = $data->KOTA_WP_SPPT;
												$PBB_2017 = $data->PBB_YG_HARUS_DIBAYAR_SPPT;
												$Total = $Total + $PBB_2017;
												echo "<tr><td>".$x++."</td>";
													echo "<td>$NOP</td>";
													echo "<td>$NM_WP_SPPT</td>";
													echo "<td>$JLN_WP_SPPT $BLOK_KAV_NO_WP_SPPT RT $RT_WP_SPPT RW $RW_WP_SPPT KELURAHAN $KELURAHAN_WP_SPPT $KOTA_WP_SPPT</td>";
													echo "<td>$JALAN_OP $BLOK_KAV_NO_OP RT $RT_OP RW $RW_OP</td>";
													echo "<td style='text-align: right'>".number_format($PBB_2017,0)."</td>";
													echo "</tr>";
												}
											echo "</tbody>
										</table>										
									</div>
								<!-- /.panel-body -->
									<div class='panel-footer'>
									<b>SUMARY : </b><br>
									*) Grand Total : ".number_format($Total,0)."
									</div>
									<!-- /.panel-footer -->
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
$( "#Tahun" ).datepicker( {
	dateFormat: "yy",
	changeMonth: true,
    changeYear: true
} );
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
	
	$( "#KdKec" ).change(function() {
		var xKodeKecamatan = $("#KdKec").val();
		xKodeKecamatan = '13.71-'+xKodeKecamatan;
		var xUrl = "<?php echo site_url('/Pbb_lap_daftar_tunggakan_ereport/getKelurahan'); ?>";
		
		$.ajax({
			url:xUrl,
			type:'POST',
			data: 'KodeKecamatan=' + xKodeKecamatan,
			dataType: 'json',
			success: function( json ) {
				  $('#KdKel')
				  .find('option')
				  .remove()
				  .end()
				  .append("<option selected value=''>PILIH KELURAHAN</option>");
			   $.each(json, function(id, name){
				  $('#KdKel')
				  .append('<option value='+name['id']+'>'+name['name']+'</option>');
			   });
			}
		});
	});
</script>