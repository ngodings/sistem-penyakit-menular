<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImportController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','download'));
		$this->load->library(array('excel','session'));
		$this->load->model('ImportModel');
		$this->load->model('MedisM');
	}

	public function index()
	{
		$data = array(
			'list_data'	=> $this->ImportModel->getData()
		);
		$this->load->view('medis/index',$data);
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
					// $rm= $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$pasien = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$awal = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$penyakit = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$status = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$akhir = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$ket = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$user = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					
					// ambil id_pasien sesuai nama pasien dari excel
					$nama_pasien = $this->ImportModel->get_pasien($pasien);
					if($nama_pasien == NULL){
						$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Nama Pasien pada baris ke-'.$row.' belum terdaftar ');
						redirect($_SERVER['HTTP_REFERER']);
					}	
					// ambil id_penyakit sesuai nama penyakit dari excel
					$nama_penyakit = $this->ImportModel->get_penyakit($penyakit);
					if($nama_penyakit == NULL){
						$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Nama Penyakit pada baris ke-'.$row.' tidak terdaftar');
						redirect($_SERVER['HTTP_REFERER']);
					}

					if($this->ImportModel->query("select id_user from user where id_user = '$user'") == NULL){
						$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> User pada baris ke-'.$row.' tidak terdaftar');
						redirect($_SERVER['HTTP_REFERER']);
					}

					$temp_data = array(
						'id_rm' => $this->MedisM->buat_kode(), //id_rm udah otomatis 
						'id_pasien'	=> $nama_pasien->id_pasien, 
						'tanggal_terinfeksi'	=> $awal,
						'id_penyakit' => $nama_penyakit->id_penyakit, 
						'status'	=> $status,
						'tanggal_sembuh' => $akhir,
						'keterangan'	=> $ket,
						'id_user'	=> $user,

					); 	
					$insert = $this->ImportModel->insert($temp_data);
					var_dump($temp_data);
					
					if(!$insert){
						$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
						redirect($_SERVER['HTTP_REFERER']);
					}
				}
			}

			$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
			redirect($_SERVER['HTTP_REFERER']);
			
			
		}else{
			echo "Tidak ada file yang masuk";
		}
	}

}
