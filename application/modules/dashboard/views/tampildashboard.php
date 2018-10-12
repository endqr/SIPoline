<?php
	$xString = 'http://172.20.31.1/sismiop/web_service_endqr/pembayaran_sppt_tahun_bulan_minggu_hari';
	if($json = file_get_contents($xString)){
		$obj = json_decode($json);
		$i = 0;
		
		foreach($obj->data as $data){
			$uraian[$i] = $data->URAIAN;
			$jml_nop[$i] = $data->JML_NOP;
			$realisasi[$i] = $data->REALISASI;
			$i = $i + 1;
		}
	}
	$xBulan = date('m');
	$xHari = date('d');
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jml_nop[0]; ?></div>
                                    <div>Penerimaan Tahun Ini</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><?php echo "Rp. ".number_format($realisasi[0],0); ?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jml_nop[1]; ?></div>
                                    <div>Penerimaan Bulan Ini</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><?php echo "Rp. ".number_format($realisasi[1],0); ?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jml_nop[2]; ?></div>
                                    <div>Penerimaan Minggu Ini</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><?php echo "Rp. ".number_format($realisasi[2],0); ?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $jml_nop[3]; ?></div>
                                    <div>Penerimaan Hari Ini</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"><?php echo "Rp. ".number_format($realisasi[3],0); ?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div>Realisasi Penerimaan UPPD</div>
                        </div>
						<div class='panel-body'>
							<table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example'>
								<thead>
									<tr>
										<th style='text-align:center'>NO.</th>
										<th style='text-align:center'>UPPD</th>
										<th style='text-align:center'>KECAMATAN</th>
										<th style='text-align:center'>TARGET</th>
										<th style='text-align:center'>POKOK</th>
										<th style='text-align:center'>TUNGGAKAN</th>
										<th style='text-align:center'>DENDA</th>
										<th style='text-align:center'>PERSEN</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$x=1;
									$kode_pokja = array();
									$nama_pokja = array();
									$kd_kecamatan = array();
									$nm_kecamatan = array();
									$target_kecamatan = array();
									$pokok_kecamatan = array();
									$tunggakan_kecamatan = array();
									$denda_kecamatan = array();
									$realisasi_kecamatan = array();
										foreach($targetPokja as $data){
											$y = $data['kd_kecamatan'];
											$kode_pokja[$y] = $data['kode_pokja'];
											$nama_pokja[$y] = $data['nama_pokja'];
											$kd_kecamatan[$y] = $data['kd_kecamatan'];
											$target_kecamatan[$y] = $data['target_kecamatan'];
										}
										
										foreach($RealisasiPokja as $data){
											$y = $data['KD_KECAMATAN'];
											$nm_kecamatan[$y] = $data['NM_KECAMATAN'];
											$pokok_kecamatan[$y] = $data['POKOK'];
											$tunggakan_kecamatan[$y] = $data['TUNGGAKAN'];
											$denda_kecamatan[$y] = $data['DENDA'];
											$realisasi_kecamatan[$y] = $pokok_kecamatan[$y] + $tunggakan_kecamatan[$y];
										}
										
										$Total = 0;
										$TotalTarget = 0;
										$TotalPokok = 0;
										$TotalTunggakan = 0;
										$TotalDenda = 0;
										$TotalRealisasi = 0;
										
										foreach($kd_kecamatan as $data=>$value){
											$y = $value;
											$Persen = $realisasi_kecamatan[$y] / $target_kecamatan[$y] * 100;
											echo "<tr>
												<td>".$x++."</td>
												<td>".str_replace("POKJA","U P P D",$nama_pokja[$y])."</td>
												<td>$kd_kecamatan[$y] / $nm_kecamatan[$y]</td>
												<td style='text-align:right'>".number_format($target_kecamatan[$y],0)."</td>
												<td style='text-align:right'>".number_format($pokok_kecamatan[$y],0)."</td>
												<td style='text-align:right'>".number_format($tunggakan_kecamatan[$y],0)."</td>
												<td style='text-align:right'>".number_format($denda_kecamatan[$y],0)."</td>
												<td style='text-align:right'>".number_format($Persen,2)."</td>
											</tr>";
											$TotalTarget = $TotalTarget + $target_kecamatan[$y];
											$TotalPokok = $TotalPokok + $pokok_kecamatan[$y];
											$TotalTunggakan = $TotalTunggakan + $tunggakan_kecamatan[$y];
											$TotalDenda = $TotalDenda + $denda_kecamatan[$y];
											$TotalRealisasi = $TotalPokok + $TotalTunggakan;
										}
											$TotalPersen = $TotalRealisasi / $TotalTarget * 100;
									?>
								</tbody>
							</table>
						</div>
                        <div class="panel-footer">
                            <span class="pull-left"><u>SUMMARY :</u></span><br>
								<div class="col-lg-3 col-md-3">
									Total Target : 
								</div>
								<div class="col-lg-3 col-md-3">
									<span class="pull-right"><?php echo "Rp. ".number_format($TotalTarget,0); ?></span>
								</div>
								<div class="clearfix"></div>
								<div class="col-lg-3 col-md-3">
									Total Realisasi Pokok : 
								</div>
								<div class="col-lg-3 col-md-3">
									<span class="pull-right"><?php echo "Rp. ".number_format($TotalPokok,0); ?></span>
								</div>
								<div class="clearfix"></div>
								<div class="col-lg-3 col-md-3">
									Total Realisasi Tunggakan : 
								</div>
								<div class="col-lg-3 col-md-3">
									<span class="pull-right"><?php echo "Rp. ".number_format($TotalTunggakan,0); ?></span>
								</div>
								<div class="clearfix"></div>
								<div class="col-lg-3 col-md-3">
									Total Realisasi : 
								</div>
								<div class="col-lg-3 col-md-3">
									<span class="pull-right"><?php echo "Rp. ".number_format(($TotalPokok + $TotalTunggakan),0); ?></span>
								</div>
								<div class="clearfix"></div>
								<div class="col-lg-3 col-md-3">
									Persentase Realisasi : 
								</div>
								<div class="col-lg-3 col-md-3">
									<span class="pull-right"><?php echo number_format($TotalPersen,2)." %"; ?></span>
								</div>
								<div class="clearfix"></div>
								<div class="col-lg-3 col-md-3">
									Total Denda : 
								</div>
								<div class="col-lg-3 col-md-3">
									<span class="pull-right"><?php echo "Rp. ".number_format($TotalDenda,0); ?></span>
								</div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
<script>
$('#dataTables-example').DataTable({
    responsive: true,
	paging: false,
	order: [[1, 'asc']],
	rowGroup: {
            startRender: function ( rows, group ) {
                var xTarget1 = rows
                    .data()
                    .pluck(3)
                    .reduce( function (a, b) {
                        return a + b.replace(/[^\d]/g, '')*1;
                    }, 0);
                var xTarget = $.fn.dataTable.render.number(',', '.', 0, '').display( xTarget1 );
				
                var xReal1 = rows
                    .data()
                    .pluck(4)
                    .reduce( function (a, b) {
                        return a + b.replace(/[^\d]/g, '')*1;
                    }, 0);
                var xReal = $.fn.dataTable.render.number(',', '.', 0, '').display( xReal1 );
				
                var xTunggakan1 = rows
                    .data()
                    .pluck(5)
                    .reduce( function (a, b) {
                        return a + b.replace(/[^\d]/g, '')*1;
                    }, 0);
                var xTunggakan = $.fn.dataTable.render.number(',', '.', 0, '').display( xTunggakan1 );
				
                var xDenda = rows
                    .data()
                    .pluck(6)
                    .reduce( function (a, b) {
                        return a + b.replace(/[^\d]/g, '')*1;
                    }, 0);
                xDenda = $.fn.dataTable.render.number(',', '.', 0, '').display( xDenda );
				
				var xPersen = (xReal1 + xTunggakan1) / xTarget1 * 100;
				
//                var xPersen = rows
//                    .data()
//                    .pluck(6)
//                    .reduce( function (a, b) {
//                        return a + b.replace(/[^\d]/g, '')*1;
//                    }, 0) / 100;
                xPersen = $.fn.dataTable.render.number(',', '.', 2, '').display( xPersen );
				
                return $('<tr/>')
                    .append( '<td><b>'+group+'</b></td><td  style=\'text-align:right\'><b>'+xTarget+'</b></td><td  style=\'text-align:right\'><b>'+xReal+'</b></td><td  style=\'text-align:right\'><b>'+xTunggakan+'</b></td><td  style=\'text-align:right\'><b>'+xDenda+'</b></td><td  style=\'text-align:right\'><b>'+xPersen+'</b></td>' );
            },
		dataSrc: 1
	},
	"columnDefs": [
        {
            "targets": [ 0 ],
            "visible": false,
            "searchable": false
        },
        {
            "targets": [ 1 ],
            "visible": false
        }
    ]
});
</script>