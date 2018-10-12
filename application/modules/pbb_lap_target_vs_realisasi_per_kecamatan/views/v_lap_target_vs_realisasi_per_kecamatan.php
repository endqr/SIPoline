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
					<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action = "<?php echo site_url().'/pbb_lap_target_vs_realisasi_per_kecamatan/GenerateLaporan';?>" method="POST">
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
        </div>
        <!-- /#page-wrapper -->
<script>
$( "#PeriodeAwal" ).datepicker( {dateFormat: "yy-mm-dd"} );
$( "#PeriodeAkhir" ).datepicker( {dateFormat: "yy-mm-dd"} );
</script>