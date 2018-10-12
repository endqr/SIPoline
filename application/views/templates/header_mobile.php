<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Badan Pendapatan Daerah Kota Padang</title>

	<link href="<?php echo base_url('/assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/vendor/metisMenu/metisMenu.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/vendor/datatables-plugins/dataTables.bootstrap.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/vendor/datatables-responsive/dataTables.responsive.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/CSS/buttons.dataTables.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/sb-admin-2.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/vendor/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('/assets/css/jquery-ui.css');?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	
    <!-- jQuery -->
    <script src="<?php echo base_url().'/assets/js/jquery.js';?>"></script>
    <script src="<?php echo base_url().'/assets/js/jquery-ui.js';?>"></script>
    <script src="<?php echo base_url().'/assets/js/bootstrap.min.js';?>"></script>
    <script src="<?php echo base_url().'/assets/js/metisMenu.min.js';?>"></script>
    <script src="<?php echo base_url().'/assets/js/raphael.min.js';?>"></script>
    <script src="<?php echo base_url().'/assets/js/sb-admin-2.js';?>"></script>
    <script src="<?php echo base_url().'/assets/js/jquery.maskedinput.js';?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('/assets/vendor/datatables/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url().'/assets/js/dataTables.buttons.min.js';?>"></script>
    <script src="<?php echo base_url().'/assets/js/jszip.min.js';?>"></script>
    <script src="<?php echo base_url().'/assets/js/pdfmake.min.js';?>"></script>
    <script src="<?php echo base_url().'/assets/js/vfs_fonts.js';?>"></script>
    <script src="<?php echo base_url().'/assets/js/buttons.html5.min.js';?>"></script>
    <script src="<?php echo base_url().'/assets/js/buttons.print.min.js';?>"></script>
    <script src="<?php echo base_url('/assets/vendor/datatables-plugins/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('/assets/vendor/datatables-responsive/dataTables.responsive.js'); ?>"></script>
	<script src="<?php echo base_url('/assets/js/jssor.slider-22.2.16.min.js'); ?>" type="text/javascript"></script>
	<style>
		/* 
		Inspired by http://dribbble.com/shots/890759-Ui-Kit-Metro/attachments/97174
		*/
		*, *:before, *:after {
		  /* Chrome 9-, Safari 5-, iOS 4.2-, Android 3-, Blackberry 7- */
		  -webkit-box-sizing: border-box; 

		  /* Firefox (desktop or Android) 28- */
		  -moz-box-sizing: border-box;

		  /* Firefox 29+, IE 8+, Chrome 10+, Safari 5.1+, Opera 9.5+, iOS 5+, Opera Mini Anything, Blackberry 10+, Android 4+ */
		  box-sizing: border-box;
		}
		html, body{
				height: 100%;
		}
		body {
			background: url(http://habrastorage.org/files/90a/010/3e8/90a0103e8ec749c4843ffdd8697b10e2.jpg);
			text-align: center;
			padding-top: 40px;
		}
		.btn-nav {
			background-color: #fff;
			border: 1px solid #e0e1db;
			-webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
			-moz-box-sizing: border-box;    /* Firefox, other Gecko */
			box-sizing: border-box;         /* Opera/IE 8+ */
		}
		.btn-nav:hover {
			color: #e92d00;
			cursor: pointer;
			-webkit-transition: color 1s; /* For Safari 3.1 to 6.0 */
			transition: color 1s;
		}
		.btn-nav.active {
			color: #e92d00;
			padding: 2px;
			border-top: 6px solid #e92d00;
			border-bottom: 6px solid #e92d00;
			border-left: 0;
			border-right: 0;
			box-sizing:border-box;
			-moz-box-sizing:border-box;
			-webkit-box-sizing:border-box;
			-webkit-transition: border 0.3s ease-out, color 0.3s ease 0.5s;
			-moz-transition: border 0.3s ease-out, color 0.3s ease 0.5s;
			-ms-transition: border 0.3s ease-out, color 0.3s ease 0.5s; /* IE10 is actually unprefixed */
			-o-transition: border 0.3s ease-out, color 0.3s ease 0.5s;
			transition: border 0.3s ease-out, color 0.3s ease 0.5s;
			-webkit-animation: pulsate 1.2s linear infinite;
			animation: pulsate 1.2s linear infinite;
		}
		.btn-nav.active:before {
			content: '';
			position: absolute;
			border-style: solid;
			border-width: 6px 6px 0;
			border-color: #e92d00 transparent;
			display: block;
			width: 0;
			z-index: 1;
			margin-left: -6px;
			top: 0;
			left: 50%;
		}
		.btn-nav .glyphicon {
			padding-top: 16px;
			font-size: 40px;
		}
		.btn-nav.active p {
			margin-bottom: 8px;
		}
		@-webkit-keyframes pulsate {
		 50% { color: #000; }
		}
		@keyframes pulsate {
		 50% { color: #000; }
		}
		@media (max-width: 480px) {
			.btn-group {
				display: block !important;
				float: none !important;
				width: 100% !important;
				max-width: 100% !important;
			}
		}
		@media (max-width: 600px) {
			.btn-nav .glyphicon {
				padding-top: 12px;
				font-size: 26px;
			}
		}	
	</style>
	<script>
		var activeEl = 2;
		$(function() {
			var items = $('.btn-nav');
			$( items[activeEl] ).addClass('active');
			$( ".btn-nav" ).click(function() {
				$( items[activeEl] ).removeClass('active');
				$( this ).addClass('active');
				activeEl = $( ".btn-nav" ).index( this );
			});
		});	
	</script>
</head>
  <body>
    <div id="wrapper">