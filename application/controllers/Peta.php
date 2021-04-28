<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peta extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('PasienM', '', TRUE);
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

	public function bidang_detail($id_kec=null){
		$data['id_kec'] = $id_kec;
		$data['kec'] = $this->db->get_where('kecamatan', array('id_kec'=>$id_kec))->result();
		
		$this->load->view('front/kecamatan', $data);
	}

	public function nama($id_kec=null)
	{
		
		$data=$this->db->limit(1)->get_where('kecamatan', array('id_kec'=>$id_kec))->row()->nama_kecamatan;
		echo json_encode($data);
	}
}
