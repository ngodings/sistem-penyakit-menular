<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PasienM', '', true);
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = "Selamat Datang ";


        $this->load->view('template/header', $data);
        $this->load->view('front/index', $data);
        $this->load->view('template/footer');
    }

    public function Data()
    {
        $data['judul'] = "Data Penyakit Menular";


        $this->load->view('template/head', $data);
        $this->load->view('front/data', $data);
        $this->load->view('template/footer');
    }

    public function bidang_detail($id_kec=null)
    {
        $data['id_kec'] = $id_kec;
        $data['kec'] = $this->db->get_where('kecamatan', array('id_kec'=>$id_kec))->result();
		
        
        $this->load->view('front/kecamatan', $data);
    }

    public function corona($id_kec=null)
    {
		// $data =  // jumlah pasien
        // $data_nama=$this->db->limit(1)->get_where('kecamatan', array('id_kec'=>$id_kec))->row()->nama_kecamatan;

		$data = [
			'jumlah_pasien' => $this->PasienM->Percobaan($id_kec),
			'nama_kecamatan' => $this->db->limit(1)->get_where('kecamatan', array('id_kec'=>$id_kec))->row()->nama_kecamatan
		];
        echo json_encode($data);
    }

    public function getCountKecamatan()
    {
		$data = $this->PasienM->Percobaan();
		echo json_encode($data);
    }
}
