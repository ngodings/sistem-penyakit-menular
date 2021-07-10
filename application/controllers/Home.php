<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('LaporanM', '', true);
        

    }
	public function index()
	{
		// $data =  [
		// 	'pasien' => $this->LaporanM->getAllPasien()->num_rows(),
		// 	'penyakit' => $this->LaporanM->getAllPenyakit()->num_rows(),
		// 	'rm' => $this->LaporanM->getAllRM()->num_rows(),
			
		// ];
		$data['pasien'] = $this->LaporanM->getAllPasien()->num_rows();
		$data['penyakit'] = $this->LaporanM->getAllPenyakit()->num_rows();
		$data['rm'] = $this->LaporanM->getAllRM()->num_rows();
		// var_dump($data);
		// die;
		$data = array(
					'title' => 'Dashboard',
					'isi' => 'v_home'
		);
		
		$this->load->view('template/v_wrapper', $data, FALSE);
	}
	public function getAllPenyakit($id_kel=null)
    {
       

        $data = [
            	'data_all' => $this->LaporanM->get_count($id_kel),
				'data_aktif' => $this->LaporanM->get_count_status($id_kel, 'Dalam Perawatan'),
				'data_sembuh' => $this->LaporanM->get_count_status($id_kel, 'Sembuh'),
				'data_die' => $this->LaporanM->get_count_status($id_kel, 'Meninggal'),
				'nama_kelurahan' => $this->db->limit(1)->get_where('kelurahan', array('id_kel'=>$id_kel))->row()->nama_kelurahan
        ];
		echo json_encode($data);
    }

}
