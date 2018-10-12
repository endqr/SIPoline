<?php
/**
*   Controller Rekonsiliasi untuk PBB
*   Dibuat Oleh 	: Endang Kurniawan
*   Dibuat Tanggal 	: 2017-09-04
*/

class Pbb_rekon extends CI_Controller{
	function __construct(){
		# code...
		parent::__construct();
		$this->load->model('m_rekon','m');
		$this->load->library('upload');
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
	}
	
	function index() {
		ini_set('max_execution_time', 300); //300 seconds = 5 minutes
		$data['judul'] = "Laporan Realisasi Penerimaan PBB Per Bank";
	    $data['users'] = $this->session->userdata('username'); //Load session
	    $data['main_content'] = 'v_rekon'; 
		if($this->input->post('Generate')){
			$this->uploadXLS();
				
			$PeriodeAwal = $this->input->post('PeriodeAwal');
			$PeriodeAkhir = $this->input->post('PeriodeAkhir');
			$JenisBuku = $this->input->post('JenisBuku');
			$KodeTP = $this->input->post('KodeTP');
			$KodeTP = explode("-",$KodeTP);
			if($Generate = $this->m->getPembayaran($PeriodeAwal, $PeriodeAkhir, $KodeTP[0], $JenisBuku)){
				$data['TransSismiop'] = $Generate;
			}
			if($Generate = $this->m->getTransBank($PeriodeAwal, $PeriodeAkhir, $KodeTP[0], $JenisBuku)){
				$data['TransBank'] = $Generate;
			}
			
			$xTanggalAwal = explode("-",$PeriodeAwal);
			$xTanggalAkhir = explode("-",$PeriodeAkhir);
			$data['xKodeBank'] = 'Bank Nagari';
			$data['xTanggalAwal'] = $xTanggalAwal[2].'-'.$xTanggalAwal[1].'-'.$xTanggalAwal[0];
			$data['xTanggalAkhir'] = $xTanggalAkhir[2].'-'.$xTanggalAkhir[1].'-'.$xTanggalAkhir[0];
			
		}
	    $this->load->view('template', $data);
    }

	function uploadXLS(){
		$KodeTP = $this->input->post('KodeTP');
		$KodeTP = explode("-",$KodeTP);
		
		$fileName = "doc_".time();
		$config['upload_path'] = 'assets/dokumen/';
		$config['file_name'] = $fileName;
		$config['allowed_types'] = 'xls||xlsx||csv';
		
		$this->load->library('upload');
		$this->upload->initialize($config);
		
		if(!$this->upload->do_upload('file')){
				$Pesan = $this->upload->display_errors()."<br>".base_url('assets/dokumen/');
				$this->session->set_flashdata('pesan2',$Pesan);
		}else{			
			$media = $this->upload->data('file');
//			$filename = $media['file_name'];//Nama File
//			$file_dokumen = $fileinfo['file_name']
//			echo $inputFileName = base_url('assets/dokumen/'.$fileName.'.xls');
			$inputFileName = 'assets/dokumen/'.$fileName.'.xls';
			try{
				$inputFileType = IOFactory::identify($inputFileName);
				$objReader = IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);
			}catch(Exception $e){
				die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
			}
			
			$sheet = $objPHPExcel->getSheet(0);
			$highestRow = $sheet->getHighestRow();
			$highestCollumn = $sheet->getHighestColumn();
			
			for($row = 2; $row <= $highestRow; $row++){
				$rowData = $sheet->rangeToArray('A'. $row. ':' . $highestCollumn. $row,
					NULL, 
					TRUE,
					FALSE);
					
				//Sesuaikan sama nama kolom table di database
/*				$data = array(
					"no_bukti"=>$rowData[0][1],
					"tgl_trans"=>$rowData[0][2],
					"jenis_pajak"=>$rowData[0][3],
					"nop"=>$rowData[0][4],
					"tahun"=>$rowData[0][5],
					"npwpd"=>$rowData[0][6],
					"nama"=>$rowData[0][7],
					"nominal"=>$rowData[0][8]
					);
*/				
				//Sesuaikan dengan table
				if(!$rowData[0][1]==NULL){
					$sql = "INSERT INTO bayar_bank(no_bukti, tgl_trans, jenis_pajak, nop, tahun, npwpd, nama, nominal, kode_tp)
						VALUES('".$rowData[0][2]."','".$rowData[0][1]."','".$rowData[0][3]."','".$rowData[0][4]."','".$rowData[0][5].
						"','".$rowData[0][6]."','".$rowData[0][7]."','".$rowData[0][8]."','".$KodeTP[0]."') ON DUPLICATE KEY UPDATE
						tgl_trans = '".$rowData[0][1]."', jenis_pajak = '".$rowData[0][3]."', nop = '".$rowData[0][4]."', 
						tahun = '".$rowData[0][5]."', npwpd = '".$rowData[0][6]."', nama = '".$rowData[0][7]."', nominal = '".$rowData[0][8]."';";
					$query = $this->db->query($sql);
//					$insert = $this->db->insert("bayar_nagari",$data);
					delete_files($media['file_path']);
				}
			}
//			redirect('pbb_rekon/');
		}
	}
}