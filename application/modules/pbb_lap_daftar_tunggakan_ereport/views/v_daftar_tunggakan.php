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
				<div class="col-md-8 col-sm-8 col-xs-12">
					<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="KodeKecamatan">
									Kecamatan : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select id="KdKec" name="KdKec" required="required" class="form-control">
										<option selected value=''>PILIH KECAMATAN</option>
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
										<option selected value=''>PILIH KELURAHAN</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="JenisBuku">
									Jenis Buku : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select id="JenisBuku" name="JenisBuku" required="required" class="form-control">
										<option selected value='0'>SEMUA BUKU</option>
										<option value='1'>BUKU 1, 2 & 3</option>
										<option value='2'>BUKU 4 & 5</option>
									</select>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
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
									</div>
									<!-- /.panel-heading -->
									<div class='panel-body'>
										<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example'>
											<thead>
												<tr>
													<th rowspan='2'>NO</th>
													<th rowspan='2'>NOP</th>
													<th rowspan='2'>NAMA WP</th>
													<th rowspan='2'>ALAMAT WP</th>
													<th rowspan='2'>ALAMAT OP</th>
													<th colspan='11'>TUNGGAKAN</th>
												</tr>
												<tr>
													<th>2018</th>
													<th>2017</th>
													<th>2016</th>
													<th>2015</th>
													<th>2014</th>
													<th>2013</th>
													<th>2012</th>
													<th>2011</th>
													<th>2010</th>
													<th>2009</th>
													<th>2008</th>
												</tr>
											</thead>
											<tbody>";
											$x = 1;
											$Total = 0;
											$TOTAL_PBB_2008 = 0;
											$TOTAL_PBB_2009 = 0;
											$TOTAL_PBB_2010 = 0;
											$TOTAL_PBB_2011 = 0;
											$TOTAL_PBB_2012 = 0;
											$TOTAL_PBB_2013 = 0;
											$TOTAL_PBB_2014 = 0;
											$TOTAL_PBB_2015 = 0;
											$TOTAL_PBB_2016 = 0;
											$TOTAL_PBB_2017 = 0;
											$TOTAL_PBB_2018 = 0;
											$TOTAL_ALL=0;
											$DaftarTunggakan = json_decode($DaftarTunggakan);
											foreach($DaftarTunggakan->data as $data){
												$z = $data->NOP;
												$NOP[$z] = $data->NOP;
												$NM_WP_SPPT[$z] = $data->NM_WP_SPPT;
												$JALAN_OP[$z] = $data->JALAN_OP;
												$BLOK_KAV_NO_OP[$z] = $data->BLOK_KAV_NO_OP;
												$RT_OP[$z] = $data->RT_OP;
												$RW_OP[$z] = $data->RW_OP;
												$KEC_OP[$z] = $data->KEC_OP;
												$KEL_OP[$z] = $data->KEL_OP;
												$JLN_WP_SPPT[$z] = $data->JLN_WP_SPPT;
												$BLOK_KAV_NO_WP_SPPT[$z] = $data->BLOK_KAV_NO_WP_SPPT;
												$RT_WP_SPPT[$z] = $data->RT_WP_SPPT;
												$RW_WP_SPPT[$z] = $data->RW_WP_SPPT;
												$KELURAHAN_WP_SPPT[$z] = $data->KELURAHAN_WP_SPPT;
												$KOTA_WP_SPPT[$z] = $data->KOTA_WP_SPPT;
												$PBB_2008[$z] = $data->PBB_2008;
												$PBB_2009[$z] = $data->PBB_2009;
												$PBB_2010[$z] = $data->PBB_2010;
												$PBB_2011[$z] = $data->PBB_2011;
												$PBB_2012[$z] = $data->PBB_2012;
												$PBB_2013[$z] = $data->PBB_2013;
												$PBB_2014[$z] = $data->PBB_2014;
												$PBB_2015[$z] = $data->PBB_2015;
												$PBB_2016[$z] = $data->PBB_2016;
												$PBB_2017[$z] = $data->PBB_2017;
												$PBB_2018[$z] = $data->PBB_2018;
												if($JenisBuku=='0'){
													$y = '1';
												}elseif($JenisBuku=='1'){
													if($PBB_2018[$z]<2000000){
														$y = '1';
													}else{
														$y= '0';
													}
												}else{
													if($PBB_2018[$z]>2000000){
														$y = '1';
													}else{
														$y= '0';
													}
												}
												
												if($y=='1'){
													$TOTAL_PBB_2008 = $TOTAL_PBB_2008 + $PBB_2008[$z];
													$TOTAL_PBB_2009 = $TOTAL_PBB_2009 + $PBB_2009[$z];
													$TOTAL_PBB_2010 = $TOTAL_PBB_2010 + $PBB_2010[$z];
													$TOTAL_PBB_2011 = $TOTAL_PBB_2011 + $PBB_2011[$z];
													$TOTAL_PBB_2012 = $TOTAL_PBB_2012 + $PBB_2012[$z];
													$TOTAL_PBB_2013 = $TOTAL_PBB_2013 + $PBB_2013[$z];
													$TOTAL_PBB_2014 = $TOTAL_PBB_2014 + $PBB_2014[$z];
													$TOTAL_PBB_2015 = $TOTAL_PBB_2015 + $PBB_2015[$z];
													$TOTAL_PBB_2016 = $TOTAL_PBB_2016 + $PBB_2016[$z];
													$TOTAL_PBB_2017 = $TOTAL_PBB_2017 + $PBB_2017[$z];
													$TOTAL_PBB_2018 = $TOTAL_PBB_2018 + $PBB_2018[$z];
													$TOTAL_ALL = $TOTAL_PBB_2008 + $TOTAL_PBB_2009 + $TOTAL_PBB_2010 + $TOTAL_PBB_2011 + $TOTAL_PBB_2012 + $TOTAL_PBB_2013 + $TOTAL_PBB_2014 + $TOTAL_PBB_2015 + $TOTAL_PBB_2016 + $TOTAL_PBB_2017 + $TOTAL_PBB_2018;
													echo "<tr><td>".$x++."</td>";
														echo "<td>$NOP[$z]</td>";
														echo "<td>$NM_WP_SPPT[$z]</td>";
														echo "<td>$JLN_WP_SPPT[$z] $BLOK_KAV_NO_WP_SPPT[$z] RT $RT_WP_SPPT[$z] RW $RW_WP_SPPT[$z] KELURAHAN $KELURAHAN_WP_SPPT[$z] $KOTA_WP_SPPT[$z]</td>";
														echo "<td>$JALAN_OP[$z] $BLOK_KAV_NO_OP[$z] RT $RT_OP[$z] RW $RW_OP[$z]</td>";
														echo "<td style='text-align: right'>".number_format($PBB_2018[$z],0)."</td>";
														echo "<td style='text-align: right'>".number_format($PBB_2017[$z],0)."</td>";
														echo "<td style='text-align: right'>".number_format($PBB_2016[$z],0)."</td>";
														echo "<td style='text-align: right'>".number_format($PBB_2015[$z],0)."</td>";
														echo "<td style='text-align: right'>".number_format($PBB_2014[$z],0)."</td>";
														echo "<td style='text-align: right'>".number_format($PBB_2013[$z],0)."</td>";
														echo "<td style='text-align: right'>".number_format($PBB_2012[$z],0)."</td>";
														echo "<td style='text-align: right'>".number_format($PBB_2011[$z],0)."</td>";
														echo "<td style='text-align: right'>".number_format($PBB_2010[$z],0)."</td>";
														echo "<td style='text-align: right'>".number_format($PBB_2009[$z],0)."</td>";
														echo "<td style='text-align: right'>".number_format($PBB_2008[$z],0)."</td>";
														echo "</tr>";
												}
											}
											echo "</tbody>
										</table>										
									</div>
								<!-- /.panel-body -->
									<div class='panel-footer'>
									<b>SUMARY : </b><br>
									*) Tahun 2008 : ".number_format($TOTAL_PBB_2008,0)."<br>
									*) Tahun 2009 : ".number_format($TOTAL_PBB_2009,0)."<br>
									*) Tahun 2010 : ".number_format($TOTAL_PBB_2010,0)."<br>
									*) Tahun 2011 : ".number_format($TOTAL_PBB_2011,0)."<br>
									*) Tahun 2012 : ".number_format($TOTAL_PBB_2012,0)."<br>
									*) Tahun 2013 : ".number_format($TOTAL_PBB_2013,0)."<br>
									*) Tahun 2014 : ".number_format($TOTAL_PBB_2014,0)."<br>
									*) Tahun 2015 : ".number_format($TOTAL_PBB_2015,0)."<br>
									*) Tahun 2016 : ".number_format($TOTAL_PBB_2016,0)."<br>
									*) Tahun 2017 : ".number_format($TOTAL_PBB_2017,0)."<br>
									*) Tahun 2018 : ".number_format($TOTAL_PBB_2018,0)."<br>
									*) Grand Total : ".number_format($TOTAL_ALL,0)."
									</div>
									<!-- /.panel-footer -->
							</div>
							<!-- /.panel -->
						</div>
						<!-- /.col-lg-12 -->
					</div>";
				}
//				echo "<input type='button' id='Cetak' name='Cetak' value='CETAK'>";
			?>
        </div>
        <!-- /#page-wrapper -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true,
		dom: 'Bfrtip',
        buttons: [
			{
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }
        ]
    });
		
	$( "#KdKec" ).change(function() {
		var xKodeKecamatan = $("#KdKec").val();
		xKodeKecamatan = '13.71-'+xKodeKecamatan;
		var xUrl = "<?php echo base_url('Pbb_lap_daftar_tunggakan_ereport/getKelurahan'); ?>";
		
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
	
	$( "#Cetak" ).click(function() {
		var dd = {
			content: [
				{ 
					text: 'Laporan Tunggakan PBB-P2',
					style: 'header', 
					alignment: 'center' 
				},
				{
					text: '\n \n'
				},
				{
					text: 'Kecamatan :<?php if(isset($DaftarTunggakan)){echo $KEC_OP[$z];}?>\nKelurahan :<?php if(isset($DaftarTunggakan)){echo $KEL_OP[$z];}?>',
					style: 'subheader',
					alignment: 'center' 
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
									250, //Alamat OP
									100, //2018
									100, //2017
									100, //2016
									100, //2015
									100, //2014
									100, //2013
									100, //2012
									100, //2011
									100, //2010
									100, //2009
									100 //2008
								],
						headerRows: 1,
						// keepWithHeaderRows: 1,
						body: [
							[
								{text: 'No.', style: 'tableHeader', alignment: 'center'}, 
								{text: 'NOP', style: 'tableHeader', alignment: 'center'}, 
								{text: 'NAMA WAJIB PAJAK', style: 'tableHeader', alignment: 'center'}, 
								{text: 'ALAMAT WAJIB PAJAK', style: 'tableHeader', alignment: 'center'}, 
								{text: 'ALAMAT OBJEK PAJAK', style: 'tableHeader', alignment: 'center'},
								{text: '2018', style: 'tableHeader', alignment: 'center'},
								{text: '2017', style: 'tableHeader', alignment: 'center'},
								{text: '2016', style: 'tableHeader', alignment: 'center'},
								{text: '2015', style: 'tableHeader', alignment: 'center'},
								{text: '2014', style: 'tableHeader', alignment: 'center'},
								{text: '2013', style: 'tableHeader', alignment: 'center'},
								{text: '2012', style: 'tableHeader', alignment: 'center'},
								{text: '2011', style: 'tableHeader', alignment: 'center'},
								{text: '2010', style: 'tableHeader', alignment: 'center'},
								{text: '2009', style: 'tableHeader', alignment: 'center'},
								{text: '2008', style: 'tableHeader', alignment: 'center'}
							],
							<?php 
								if(isset($DaftarTunggakan)){
									$x=0;
									foreach($NOP as $z){
//										echo "[{text: '".$x++."', style: 'tableBody', alignment: 'left'},{text: '$NOP[$z]', style: 'tableBody', alignment: 'left'},{text: '$NM_WP_SPPT[$z]', style: 'tableBody', alignment: 'left'},{text: '$JLN_WP_SPPT[$z] $BLOK_KAV_NO_WP_SPPT[$z] RT $RT_WP_SPPT[$z] RW $RW_WP_SPPT[$z] KELURAHAN $KELURAHAN_WP_SPPT[$z] $KOTA_WP_SPPT[$z]', style: 'tableBody', alignment: 'left'},{text: '$JALAN_OP[$z] $BLOK_KAV_NO_OP[$z] RT $RT_OP[$z] RW $RW_OP[$z]', style: 'tableBody', alignment: 'left'},{text: '".number_format($PBB_2017[$z],0)."', style: 'tableBody', alignment: 'center'},{text: '".number_format($PBB_2016[$z],0)."', style: 'tableBody', alignment: 'center'},{text: '".number_format($PBB_2015[$z],0)."', style: 'tableBody', alignment: 'center'},{text: '".number_format($PBB_2014[$z],0)."', style: 'tableBody', alignment: 'center'},{text: '".number_format($PBB_2013[$z],0)."', style: 'tableBody', alignment: 'center'},{text: '".number_format($PBB_2012[$z],0)."', style: 'tableBody', alignment: 'center'},{text: '".number_format($PBB_2011[$z],0)."', style: 'tableBody', alignment: 'center'},{text: '".number_format($PBB_2010[$z],0)."', style: 'tableBody', alignment: 'center'},{text: '".number_format($PBB_2009[$z],0)."', style: 'tableBody', alignment: 'center'},{text: '".number_format($PBB_2008[$z],0)."', style: 'tableBody', alignment: 'center'}],";
										echo "[{text: '".$x++."', style: 'tableBody', alignment: 'left'},
										{text: '$NOP[$z]', style: 'tableBody', alignment: 'left'},
										{text: '', style: 'tableBody', alignment: 'left'},
										{text: '', style: 'tableBody', alignment: 'left'},
										{text: '', style: 'tableBody', alignment: 'left'},
										{text: '".number_format($PBB_2018[$z],0)."', style: 'tableBody', alignment: 'right'},
										{text: '".number_format($PBB_2017[$z],0)."', style: 'tableBody', alignment: 'right'},
										{text: '".number_format($PBB_2016[$z],0)."', style: 'tableBody', alignment: 'right'},
										{text: '".number_format($PBB_2015[$z],0)."', style: 'tableBody', alignment: 'right'},
										{text: '".number_format($PBB_2014[$z],0)."', style: 'tableBody', alignment: 'right'},
										{text: '".number_format($PBB_2013[$z],0)."', style: 'tableBody', alignment: 'right'},
										{text: '".number_format($PBB_2012[$z],0)."', style: 'tableBody', alignment: 'right'},
										{text: '".number_format($PBB_2011[$z],0)."', style: 'tableBody', alignment: 'right'},
										{text: '".number_format($PBB_2010[$z],0)."', style: 'tableBody', alignment: 'right'},
										{text: '".number_format($PBB_2009[$z],0)."', style: 'tableBody', alignment: 'right'},
										{text: '".number_format($PBB_2008[$z],0)."', style: 'tableBody', alignment: 'right'}],";
									}
								}
							?>
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

});
</script>