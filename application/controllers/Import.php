<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('excel','session'));
	}

	public function index()
	{
		$this->load->model('importM');
		$data = array(
			'list_data'	=> $this->ImportM->import_data()
		);
		$this->load->view('medis/index.php',$data);
	}

	public function import_excel(){
		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();	
				for($row=2; $row<=$highestRow; $row++)
				{
					$id_rm = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$id_pasien = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$nik = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$nama = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$tanggal_lahir = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$jk = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$kecamatan= $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$kelurahan = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$alamat = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$tanggal_terinfeksi = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$penyakit = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$status = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
					$tanggal_sembuh = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
					$keterangan = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
					$user = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
					$temp_data[] = array(
						'id_rm'	=> $id_rm,
						'id_pasien'	=> $id_pasien,
						'nik'	=> $nik,
						'nama'	=> $nama,
						'tanggal_lahir'	=> $tanggal_lahir,
						'jk'	=> $jk,
						'kecamatan'	=> $kecamatan,
						'kelurahan'	=> $kelurahan,
						'alamat'	=> $alamat,
						'tanggal_terinfeksi'	=> $tanggal_terinfeksi,
						'penyakit'	=> $penyakit,
						'status'	=> $status,
						'tanggal_sembuh'	=> $tanggal_sembuh,
						'keterangan'	=> $keterangan,
						'user'	=> $user
					); 	
				}
			}
			$this->load->model('importM');
			$insert = $this->importM->insert($temp_data);
			if($insert){
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			echo "Tidak ada file yang masuk";
		}
	}

}
