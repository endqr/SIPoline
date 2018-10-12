<!DOCTYPE html>
<html lang="en" class="loading">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Badan Pendapatan Daerah Kota Padang</title>

	<link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/vendor/datatables/css/dataTables.bootstrap.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/vendor/datatables/css/responsive.bootstrap.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/vendor/datatables-responsive/dataTables.responsive.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/vendor/datatables-responsive/rowGroup.bootstrap.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/CSS/buttons.dataTables.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/CSS/select.dataTables.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/CSS/editor.dataTables.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/sb-admin-2.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/jquery-ui.css');?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/metisMenu.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/raphael.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/sb-admin-2.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.maskedinput.js');?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/vendor/datatables/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/dataTables.buttons.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/dataTables.select.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/dataTables.editor.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jszip.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/pdfmake.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/vfs_fonts.js');?>"></script>
    <script src="<?php echo base_url('assets/js/buttons.html5.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/buttons.print.min.js');?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/js/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/js/responsive.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/datatables/js/dataTables.rowGroup.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jssor.slider-22.2.16.min.js'); ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/endqr.js'); ?>" type="text/javascript"></script>
	<link href="<?php echo base_url('assets/mask/hold_on.css');?>" rel='stylesheet' />
	<script type='text/javascript' src="<?php echo base_url('assets/mask/hold_on.js'); ?>"></script>

	<script type="text/javascript">
		function load_masking () {
			HoldOn.open({
				theme:'sk-cube-grid',
				message:"Loading... "
			});
		}
		
		function close_masking () {
			 HoldOn.close();
		}
		
		function inArray(needle, haystack) {
			var length = haystack.length;
			for(var i = 0; i < length; i++) {
				if(haystack[i] == needle) return true;
			}
			return false;
		}

function onReady(callback) {
    var intervalID = window.setInterval(checkReady, 1000);

    function checkReady() {
        if (document.getElementsByTagName('body')[0] !== undefined) {
            window.clearInterval(intervalID);
            callback.call(this);
        }
    }
}

function show(id, value) {
    document.getElementById(id).style.display = value ? 'block' : 'none';
}

onReady(function () {
    show('page', true);
    show('loading', false);
});	

	</script>

	<style>
		#page {
			display: none;
		}
		#loading {
			display: block;
			position: absolute;
			top: 0;
			left: 0;
			z-index: 100;
			width: 100vw;
			height: 100vh;
			background-color: rgba(192, 192, 192, 0.5);
			background-image: url("<?php echo base_url('assets/mask/loading.gif'); ?>");
			background-repeat: no-repeat;
			background-position: center;
		}	
	</style>
</head>
  <body>
  <div id="loading"></div>
    <div id="wrapper">
		<div id="page">