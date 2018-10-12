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
					<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  enctype="multipart/form-data" method="POST">
					<?php if($this->session->flashdata('pesan1')){?>
						<div class="alert alert-warning" role="alert">
							<button type="button" class="close" data-dismiss="alert">x</button>
							<h4>Peringatan</h4>
							<?php echo $this->session->flashdata('pesan1');?>
						</div>
					<?php }else if($this->session->flashdata('pesan2')){?>
						<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismis="alert">x</button>
							<h4>Perhatian</h4>
							<?php echo $this->session->flashdata('pesan2');?>
						</div>
					<?php };?>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="PeriodeAwal">
									Periode Awal : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="PeriodeAwal" name="PeriodeAwal" required="required" class="form-control" placeholder="YYYY-MM-DD">
								</div>
							</div>
						</div>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="PeriodeAkhir">
									Periode Akhir : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" id="PeriodeAkhir" name="PeriodeAkhir" required="required" class="form-control" placeholder="YYYY-MM-DD" >
								</div>
							</div>
						</div>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="KodeTP">
									Tempat Bayar : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select id="KodeTP" name="KodeTP" required class="form-control" required>
										<option selected disabled value=''>PILIH TEMPAT PEMBAYARAN</option>
										<option value='35-Bank Tabungan Negara'>35/BANK TABUNGAN NEGARA</option>
										<option value='50-Bank Rakyat Indonesia'>50/BANK RAKYAT INDONESIA</option>
										<option value='81-Bank Nagari'>81/BANK NAGARI</option>
										<option value='87-Bank BNI 46'>87/BANK BNI 46</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="KodeTP">
									Jenis Buku : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<select id="JenisBuku" name="JenisBuku" required class="form-control">
										<option selected value='0'>Semua Buku</option>
										<option value='1'>Buku 1, 2 & 3</option>
										<option value='2'>Buku 4 & 5</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-12" for="file">
									File XLS : <span class="required">*</span>
								</label>
								<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="file" accept="xls/*" id="file" name="file" required>
								</div>
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="col-md-12 col-sm-12 col-xs-12 ">
							<div class="col-md-6 col-sm-6 col-xs-12 ">
								<div class="form-group">
									<button type="submit" class="btn btn-primary col-md-offset-6" id="Generate" name='Generate' value='Generate'>Generate</button>
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
				if(isset($TransSismiop)){
					echo "<div class='row' id='LaporanCetak'>
							<div class='col-lg-12'>
								<div class='panel panel-default'>
									<div class='panel-heading'>
										<h1 class='page-header' align='center'>
											REKONSILIASI DATA PBB
										</h1>
									</div>
									<!-- /.panel-heading -->
									<div class='panel-body' id='PrintTable'>
										<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example'>
											<thead>
												<tr>
													<th rowspan='2' style='text-align:center'>NO</th>
													<th rowspan='2' style='text-align:center'>NOP</th>
													<th rowspan='2' style='text-align:center'>TAHUN SPPT</th>
													<th rowspan='2' style='text-align:center'>TANGGAL<br>PEMBAYARAN</th>
													<th rowspan='2' style='text-align:center'>NAMA WP</th>
													<th rowspan='2' style='text-align:center'>POKOK</th>
													<th rowspan='2' style='text-align:center'>TUNGGAKAN</th>
													<th rowspan='2' style='text-align:center'>DENDA</th>
													<th colspan='2' style='text-align:center'>JML BAYAR</th>
													<th rowspan='2' style='text-align:center'>SELISIH</th>
												</tr>
												<tr>
													<th style='text-align:center'>SISMIOP</th>
													<th style='text-align:center'>BANK</th>
												</tr>
											</thead>
											<tbody>";
											$x = 1;
											$z = 1;
											
											$IsiPdf='';
											$TOTALPOKOK=0;
											$TOTALTUNGGAKAN = 0;
											$TOTALDENDA = 0;
											$GRANDTOTAL = 0;
												foreach($TransSismiop as $data){
													$IdxSismiop = $data['NOP'];
													$IdxSismiop = $IdxSismiop.".".$data['THN_PAJAK_SPPT'];
													$NopTahun[$IdxSismiop] = $IdxSismiop;
													$NOP[$IdxSismiop] = $data['NOP'];
													$THN_PAJAK_SPPT[$IdxSismiop] = $data['THN_PAJAK_SPPT'];
													$NM_WP_SPPT[$IdxSismiop] = $data['NM_WP_SPPT'];
													$DENDA_SPPT[$IdxSismiop] = $data['DENDA_SPPT'];
													if($DENDA_SPPT[$IdxSismiop]==0){
														$POKOK[$IdxSismiop] = $data['POKOK'];
														$TUNGGAKAN[$IdxSismiop] = 0;
													}else{
														$TUNGGAKAN[$IdxSismiop] = $data['POKOK'];
														$POKOK[$IdxSismiop] = 0;														
													}
													$PBB_DIBAYAR[$IdxSismiop] = $POKOK[$IdxSismiop] + $TUNGGAKAN[$IdxSismiop] + $DENDA_SPPT[$IdxSismiop];
													$TGL_PEMBAYARAN_SPPT[$IdxSismiop] = $data['TGL_PEMBAYARAN_SPPT'];
													$TOTALPOKOK = $TOTALPOKOK + $POKOK[$IdxSismiop];
													$TOTALTUNGGAKAN = $TOTALTUNGGAKAN + $TUNGGAKAN[$IdxSismiop];
													$TOTALDENDA = $TOTALDENDA + $DENDA_SPPT[$IdxSismiop];
													$GRANDTOTAL = $GRANDTOTAL + $PBB_DIBAYAR[$IdxSismiop];
												}
											$xJmlSismiop = count($NOP);
												
												$TOTALBANK= 0;
												foreach($TransBank as $data){
													$IdxBank = $data['nop'];
													$IdxBank = $IdxBank.".".$data['tahun'];
													$NopTahunBank[$IdxBank] = $IdxBank;
													$NomBank[$IdxBank] = $data['nominal'];
													$NopBank[$IdxBank] = $data['nop'];
													$ThnBank[$IdxBank] = $data['tahun'];
													$TglBank[$IdxBank] = $data['tgl_trans'];
													$NamaBank[$IdxBank] = $data['nama'];
												}
												
												$xJmlBank = count($NopBank);
												foreach($NopTahun as $IDX){
													if(!isset($NomBank[$IDX])){
														$NomBank[$IDX] = 0;
													}
													
													if(!isset($PBB_DIBAYAR[$IDX])){
														$PBB_DIBAYAR[$IDX] = 0;
													}

													$Selisih[$IDX] = $NomBank[$IDX] - $PBB_DIBAYAR[$IDX];
													echo "<tr>";
														echo "<td>".$x++."</td>";
														echo "<td>$NOP[$IDX]</td>";
														echo "<td>$THN_PAJAK_SPPT[$IDX]</td>";
														echo "<td>$TGL_PEMBAYARAN_SPPT[$IDX]</td>";
														echo "<td>$NM_WP_SPPT[$IDX]</td>";
														echo "<td align='right'>".number_format($POKOK[$IDX],0)."</td>";
														echo "<td align='right'>".number_format($TUNGGAKAN[$IDX],0)."</td>";
														echo "<td align='right'>".number_format($DENDA_SPPT[$IDX],0)."</td>";
														echo "<td align='right'>".number_format($PBB_DIBAYAR[$IDX],0)."</td>";
														echo "<td align='right'>".number_format($NomBank[$IDX],0)."</td>";
														echo "<td align='right'>".number_format($Selisih[$IDX],0)."</td>";
														echo "</tr>";
													$TOTALBANK = $TOTALBANK + $NomBank[$IDX];
		$IsiPdf = $IsiPdf."[{text: '".($x-1)."', style: 'tableBody', alignment: 'left'},
			{text: '".$NOP[$IDX]."', style: 'tableBody', alignment: 'left'},
			{text: '".$THN_PAJAK_SPPT[$IDX]."', style: 'tableBody', alignment: 'left'},
			{text: '".$TGL_PEMBAYARAN_SPPT[$IDX]."', style: 'tableBody', alignment: 'left'},
			{text: '".$NM_WP_SPPT[$IDX]."', style: 'tableBody', alignment: 'left'},
			{text: '".number_format($POKOK[$IDX],0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($TUNGGAKAN[$IDX],0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($DENDA_SPPT[$IDX],0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($PBB_DIBAYAR[$IDX],0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($NomBank[$IDX],0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($Selisih[$IDX],0)."', style: 'tableBody', alignment: 'right'}],
			";
													unset($NopTahunBank[$IDX]);
												}
												
												foreach($NopTahunBank as $z){
													echo "<tr>";
														echo "<td>".$x++."</td>";
														echo "<td>$NopBank[$z]</td>";
														echo "<td>$ThnBank[$z]</td>";
														echo "<td>$TglBank[$z]</td>";
														echo "<td>$NamaBank[$z]</td>";
														echo "<td align='right'>".number_format(0,0)."</td>";
														echo "<td align='right'>".number_format(0,0)."</td>";
														echo "<td align='right'>".number_format(0,0)."</td>";
														echo "<td align='right'>".number_format(0,0)."</td>";
														echo "<td align='right'>".number_format($NomBank[$z],0)."</td>";
														echo "<td align='right'>".number_format(-($NomBank[$z]),0)."</td>";
														echo "</tr>";
													$TOTALBANK = $TOTALBANK + $NomBank[$z];
		$IsiPdf = $IsiPdf."[{text: '".($x-1)."', style: 'tableBody', alignment: 'left'},
			{text: '".$NopBank[$z]."', style: 'tableBody', alignment: 'left'},
			{text: '".$ThnBank[$z]."', style: 'tableBody', alignment: 'left'},
			{text: '".$TglBank[$z]."', style: 'tableBody', alignment: 'left'},
			{text: '".$NamaBank[$z]."', style: 'tableBody', alignment: 'left'},
			{text: '".number_format(0,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format(0,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format(0,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format(0,0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format($NomBank[$z],0)."', style: 'tableBody', alignment: 'right'},
			{text: '".number_format(-($NomBank[$z]),0)."', style: 'tableBody', alignment: 'right'}],
			";
												}
											echo "</tbody>
										</table>
										SUMARY :<br>
										<div class='col-lg-2 col-md-2 col-sm-4 col-xs-6' style='text-align:left'>
											TOTAL POKOK : 
										</div>
										<div class='col-lg-2 col-md-2 col-sm-4 col-xs-6' style='text-align:right'>
										".number_format($TOTALPOKOK,0)."
										</div>
										<div class='clearfix'></div>
										<div class='col-lg-2 col-md-2 col-sm-4 col-xs-6' style='text-align:left'>
											TOTAL TUNGGAKAN : 
										</div>
										<div class='col-lg-2 col-md-2 col-sm-4 col-xs-6' style='text-align:right'>
										".number_format($TOTALTUNGGAKAN,0)."
										</div>
										<div class='clearfix'></div>
										<div class='col-lg-2 col-md-2 col-sm-4 col-xs-6' style='text-align:left'>
											TOTAL DENDA : 
										</div>
										<div class='col-lg-2 col-md-2 col-sm-4 col-xs-6' style='text-align:right'>
										".number_format($TOTALDENDA,0)."
										</div>
										<div class='clearfix'></div>
										<div class='col-lg-2 col-md-2 col-sm-4 col-xs-6' style='text-align:left'>
											<b>TOTAL DI SISMIOP (".number_format($xJmlSismiop,0)."): 
										</div>
										<div class='col-lg-2 col-md-2 col-sm-4 col-xs-6' style='text-align:right'>
										".number_format($GRANDTOTAL,0)."
										</div>
										<div class='clearfix'></div>
										<div class='col-lg-2 col-md-2 col-sm-4 col-xs-6' style='text-align:left'>
											TOTAL DI BANK (".number_format($xJmlBank,0)."): 
										</div>
										<div class='col-lg-2 col-md-2 col-sm-4 col-xs-6' style='text-align:right'>
										".number_format($TOTALBANK,0)."</b>
										</div>
										<div class='clearfix'></div>
										<div class='col-lg-2 col-md-2 col-sm-4 col-xs-6' style='text-align:left'>
											<b>SELISIH : 
										</div>
										<div class='col-lg-2 col-md-2 col-sm-4 col-xs-6' style='text-align:right'>
										".number_format(($TOTALBANK - $GRANDTOTAL),0)."</b>
										</div>
										<div class='clearfix'></div>
									</div>
								<!-- /.panel-body -->
							</div>
							<!-- /.panel -->
						</div>
						<!-- /.col-lg-12 -->
					</div>";
				}else{
					$TempatBayar = '';
					$SubJudulLaporan='';
					$IsiPdf='';
					$TOTALPOKOK=0;
					$TOTALPIUTANG=0;
					$TOTALDENDA=0;
					$TOTALALL=0;
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
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			responsive: true,
			dom: 'Bfrtip',
			buttons: [{
				text: 'Cetak Rekap',
				action: function ( e, dt, node, config ) {
					printDiv();
				}
			},{
				text: 'Cetak Lampiran',
				action: function ( e, dt, node, config ) {
					printLampiran();
				}
			}]			
        });
    });

function printDiv() {
var dd = {
	content: [
		{ 
			text: 'BERITA ACARA REKONSILIASI PBB-P2', 
			style: 'header', 
			alignment: 'center' 
		},
		{
			text: '\n \n'
		},
		{
			text: 'Pada hari ini Rabu tanggal Sebelas bulan Oktober tahun Dua Ribu Tujuh Belas telah diselenggarakan Rekonsiliasi Penerimaan Pajak Bumi dan Bangunan Perkotaan dan Perdesaan  <?php if(isset($xTanggalAwal)){echo "Tanggal ".$xTanggalAwal;} if(isset($xTanggalAkhir)){echo " s/d ".$xTanggalAkhir;} ?> antara Badan Pendapatan Daerah dengan Bank Nagari dengan rincian :',
			alignment: 'justify' 
		},
		{
			text: '\n \n'
		},
		{
			columns:[
				{text: 'Saldo Penerimaan PBB menurut Bapenda :', alignment: 'left'},
				{text: '<?php if(isset($xJmlSismiop)){ echo number_format($xJmlSismiop,0); }?> Wajib Pajak', alignment: 'right'},
				{text: 'Rp. <?php if(isset($GRANDTOTAL)){echo number_format($GRANDTOTAL,0);} ?>', alignment: 'right'}
			]
		},
		{
			columns:[
				{text: 'Saldo Penerimaan PBB menurut Bank Nagari :', alignment: 'left'},
				{text: '<?php if(isset($xJmlBank)){ echo number_format($xJmlBank,0); }?> Wajib Pajak', alignment: 'right'},
				{text: 'Rp. <?php if(isset($TOTALBANK)){echo number_format($TOTALBANK,0);} ?>', alignment: 'right'}
			]
		},
		{
			columns:[
				{text: 'SELISIH', alignment: 'center'},
				{text: 'Rp. <?php if(isset($TOTALBANK)){echo number_format(($GRANDTOTAL -  $TOTALBANK),0);} ?>', alignment: 'right'}
			]
		},
		{
			text: '\n \n'
		},
		{
			text: '\n \n'
		},
		{
			text: 'Menyetujui :'
		},
		{
			text: '\n'
		},
		{
			text: '\n'
		},
		{
			columns:[
				{text: '1. Bapenda ', alignment: 'left'},
				{text: ': ARISMAN, SE, MM', alignment: 'left'},
				{text: '1........................', alignment: 'left'},
				{text: '', alignment: 'left'}
			]
		},
		{
			text: '\n\n'
		},
		{
			columns:[
				{text: '2. Bank Nagari ', alignment: 'left'},
				{text: ': AMATUL HAYYI', alignment: 'left'},
				{text: '', alignment: 'left'},
				{text: '2........................', alignment: 'left'}
			]
		},
		{
			text: '\n \n'
		},
		{
			columns:[
				{text: 'Mengetahui :', alignment: 'center'}
			]
		},
		{
			text: '\n'
		},
		{
			columns:[
				{text: '\nPimpinan Bank Nagari \n Kantor Kas Balai Kota \n \n \n \n \n \n KARMILA', alignment: 'center'},
				{text: 'A.n Kepala Badan Pendapatan Daerah \n Kota Padang \n Kabid Pengendalian dan Pelaporan \n \n \n \n \n \n Drs. MAIHENDRIZON M, MT \n 19740511 199501 1 001 ', alignment: 'center'}
			]
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
//	width: 330,
//	height: 215,
	pageOrientation: 'potrait',
//	pageMargins: [40,60,40,60],
	footer: function(currentPage, pageCount) {return '   Hal: ' + currentPage.toString() +  ' dari ' + pageCount;}
};	
pdfMake.createPdf(dd).open();
}

function printLampiran() {
var dd = {
	content: [
		{ 
			text: 'LAMPIRAN HASIL REKONSILIASI PBB-P2', 
			style: 'header', 
			alignment: 'center' 
		},
		{ 
			text: '<?php if(isset($xTanggalAwal)){echo "PERIODE : ".$xTanggalAwal;} if(isset($xTanggalAkhir)){echo " S/D : ".$xTanggalAkhir;} ?>', 
			style: 'subheader', 
			alignment: 'center' 
		},
		{ 
			text: '<?php if(isset($xKodeBank)){echo "BANK : ".$xKodeBank;} ?>', 
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
							30, //No
							100, //NOP
							40, //TAHUN
							50, //TANGGAL
							150, //NAMA
							60, //POKOK
							60, //TUNGGAKAN
							60, //DENDA
							60, //SISMIOP
							60, //BANK
							60 //SELISIH
						],
				headerRows: 1,
				// keepWithHeaderRows: 1,
				body: [
					[
						{text: 'NO.', style: 'tableHeader', alignment: 'center'}, 
						{text: 'NOP', style: 'tableHeader', alignment: 'center'}, 
						{text: 'TAHUN \n PAJAK', style: 'tableHeader', alignment: 'center'}, 
						{text: 'TANGGAL \n BAYAR', style: 'tableHeader', alignment: 'center'},
						{text: 'NAMA WP', style: 'tableHeader', alignment: 'center'},
						{text: 'POKOK', style: 'tableHeader', alignment: 'center'},
						{text: 'TUNGGAKAN', style: 'tableHeader', alignment: 'center'},
						{text: 'DENDA', style: 'tableHeader', alignment: 'center'},
						{text: 'SISMIOP', style: 'tableHeader', alignment: 'center'},
						{text: 'BANK', style: 'tableHeader', alignment: 'center'},
						{text: 'SELISIH', style: 'tableHeader', alignment: 'center'}
					],
					<?php 
						if(isset($IsiPdf)){
							echo $IsiPdf;
						} 
					?>
					[
						{text: '', style: 'tableBody', alignment: 'left'},
						{text: 'TOTAL :', style: 'tableBody', alignment: 'left'},
						{text: '', style: 'tableBody', alignment: 'left'},
						{text: '', style: 'tableBody', alignment: 'left'},
						{text: '', style: 'tableBody', alignment: 'left'},
						{text: '<?php if(isset($TOTALPOKOK)){echo number_format($TOTALPOKOK,0);}?>', style: 'tableBody', alignment: 'right'},
						{text: '<?php if(isset($TOTALTUNGGAKAN)){echo number_format($TOTALTUNGGAKAN,0);}?>', style: 'tableBody', alignment: 'right'},
						{text: '<?php if(isset($TOTALDENDA)){echo number_format($TOTALDENDA,0);}?>', style: 'tableBody', alignment: 'right'},
						{text: '<?php if(isset($GRANDTOTAL)){echo number_format($GRANDTOTAL,0);}?>', style: 'tableBody', alignment: 'right'},
						{text: '<?php if(isset($TOTALBANK)){echo number_format($TOTALBANK,0);}?>', style: 'tableBody', alignment: 'right'},
						{text: '<?php if(isset($GRANDTOTAL)){echo number_format(($GRANDTOTAL - $TOTALBANK),0);}?>', style: 'tableBody', alignment: 'right'}
					]
				]
			}
		},
		{
			text: '\n\n'
		},
		{
			columns:[
				{text: 'Mengetahui :', alignment: 'center'}
			]
		},
		{
			text: '\n'
		},
		{
			columns:[
				{text: '\nPimpinan Bank Nagari \n Kantor Kas Balai Kota \n \n \n \n \n \n KARMILA', alignment: 'center'},
				{text: 'A.n Kepala Badan Pendapatan Daerah \n Kota Padang \n Kabid Pengendalian dan Pelaporan \n \n \n \n \n \n Drs. MAIHENDRIZON M, MT \n 19740511 199501 1 001 ', alignment: 'center'}
			]
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
//	width: 330,
//	height: 215,
	pageOrientation: 'landscape',
//	pageMargins: [40,60,40,60],
	footer: function(currentPage, pageCount) {return '   Hal: ' + currentPage.toString() +  ' dari ' + pageCount;}
};	
pdfMake.createPdf(dd).open();
}
</script>