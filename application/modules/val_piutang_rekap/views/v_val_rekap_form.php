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
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="KodeKec">
									Kecamatan : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select id="KodeKec" name="KodeKec" required="required" class="form-control">
										<option selected value='000'>PILIH KECAMATAN</option>
										<?php
											foreach($daftarKec as $Kec){
												$KodeKec = $Kec['KD_KECAMATAN'];
												$NamaKec = $Kec['NM_KECAMATAN'];
												echo "<option value='$KodeKec'>$KodeKec - $NamaKec</option>";
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="PeriodeAkhir">
									Kelurahan : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select id="KodeKel" name="KodeKel" required="required" class="form-control">
										<option selected value='000'>PILIH KELURAHAN</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="KodeKategori">
									Kategori : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select id="KodeKategori" name="KodeKategori" required="required" class="form-control">
										<option selected value='5'>SELURUH KATEGORI</option>
										<option value='0'>LUNAS</option>
										<option value='1'>OBJEK TIDAK DITEMUKAN</option>
										<option value='2'>NOP GANDA</option>
										<option value='3'>SUBJEK TIDAK DITEMUKAN</option>
										<option value='4'>BELUM LUNAS</option>
									</select>
								</div>
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="col-md-6 col-sm-6 col-xs-12 ">
							<div class="form-group">
								<button type="submit" class="btn btn-primary col-md-offset-6" id="Simpan" name="Simpan" value="simpan">Generate</button>
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
					$Laporan = json_decode($Laporan);
					$KodeRespon = $Laporan->code;
					$xKec = $Laporan->Kec;
					$xKel = $Laporan->Kel;
					$xKategori = $Laporan->Kategori;
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
													<th rowspan='2' style='align:center'>NO</th>
													<th rowspan='2' style='align:center'>NOP</th>
													<th rowspan='2' style='align:center'>NAMA WP</th>
													<th rowspan='2' style='align:center'>ALAMAT OP</th>
													<th colspan='5' style='align:center'>PIUTANG</th>
													<th rowspan='2' style='align:center'>PETUGAS ENTRY</th>
													<th rowspan='2' style='align:center'>PETUGAS PENDATA</th>
												</tr>
												<tr>
													<th style='align:center'>2008</th>
													<th style='align:center'>2009</th>
													<th style='align:center'>2010</th>
													<th style='align:center'>2011</th>
													<th align='right'>2012</th>
												</tr>
											</thead>
											<tbody>";
					if($KodeRespon=='200'){
											$x = 1;
											
											foreach($Laporan->data as $data){
												$NOP = $data->NOP;
												$NM_WP = $data->NM_WP;
												$ALAMAT_OP = $data->ALAMAT_OP;
												$PIUTANG_2008 = $data->PIUTANG_2008;
												$PIUTANG_2009 = $data->PIUTANG_2009;
												$PIUTANG_2010 = $data->PIUTANG_2010;
												$PIUTANG_2011 = $data->PIUTANG_2011;
												$PIUTANG_2012 = $data->PIUTANG_2012;
												$PETUGAS_ENTRY = $data->PETUGAS_ENTRY;
												$PETUGAS_PENDATA = $data->PETUGAS_PENDATA;
												echo "<tr><td>".$x++."</td>";
													echo "<td>$NOP</td>";
													echo "<td>$NM_WP</td>";
													echo "<td>$ALAMAT_OP</td>";
													echo "<td align='right'>".number_format($PIUTANG_2008,0)."</td>";
													echo "<td align='right'>".number_format($PIUTANG_2009,0)."</td>";
													echo "<td align='right'>".number_format($PIUTANG_2010,0)."</td>";
													echo "<td align='right'>".number_format($PIUTANG_2011,0)."</td>";
													echo "<td align='right'>".number_format($PIUTANG_2012,0)."</td>";
													echo "<td>$PETUGAS_ENTRY</td>";
													echo "<td>$PETUGAS_PENDATA</td>";
													echo "</tr>";
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
			title: 'Laporan Hasil Validasi Piutang \n <?php if(isset($xKec)){echo "KECAMATAN : ".$xKec;} ?> \n <?php if(isset($xKel)){echo "KELURAHAN : ".$xKel;} ?> \n <?php if(isset($xKategori)){echo "KATEGORI : ".$xKategori;} ?>'
		},{
			extend: 'excelHtml5',
			customize: function( xlsx ) {
			   var sheet = xlsx.xl.worksheets['sheet1.xml'];
			   $('row c[r^="C"]', sheet).attr( 's', '2' );
			}
		}]			
	});
});
	
	$( "#KodeKec" ).change(function() {
		var xKodeKecamatan = $("#KodeKec").val();
		var xUrl = "<?php echo base_url('/val_piutang_rekap/getKelurahan'); ?>";
		
		$.ajax({
			url:xUrl,
			type:'POST',
			data: 'KodeKec=' + xKodeKecamatan,
			dataType: 'json',
			success: function( json ) {
				  $('#KodeKel')
				  .find('option')
				  .remove()
				  .end()
				  .append("<option selected value=''>SELURUH KELURAHAN</option>");
			   $.each(json, function(id, name){
				  $('#KodeKel')
				  .append('<option value='+name['KD_KELURAHAN']+'>'+name['KD_KELURAHAN']+'-'+name['NM_KELURAHAN']+'</option>');
			   });
			}
		});
	});
</script>