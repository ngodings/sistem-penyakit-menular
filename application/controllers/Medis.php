<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medis extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
		$this->load->helper(array('url','form'));
        $this->load->model('MedisM', '', TRUE);
        $this->load->library('form_validation');
    }
	public function index()
	{
		$data['user'] = $this->db->get_where('user', [
            'username' => $this->session->userdata('username')
        ])->row_array();
		$data = array(
					'title' => 'Rekam Medik Pasien Penyakit Menular',
					'isi' => 'medis/index'
		);
		

		//SELECT DATA PASIEN
		$data['rm'] = $this->MedisM->getJoin()->result_array();
		// var_dump($data);
		// die;

		$this->load->view('template/v_wrapper', $data, FALSE);
	}
	public function tambah()
    {
        $data['pasien']=$this->MedisM->Pasien();
		$data['penyakit']=$this->MedisM->Penyakit();
		$data['user']=$this->MedisM->User();

        $data['id_unik'] = $this->MedisM->buat_kode();
        $this->form_validation->set_rules('id_rm', 'ID', 'required');
        $this->form_validation->set_rules('id_pasien', 'Pasien', 'required');
        $this->form_validation->set_rules('tanggal_terinfeksi', 'Tanggal Terinfeksi', 'required');
        $this->form_validation->set_rules('id_penyakit', 'Penyakit', 'required');
     


        if ($this->form_validation->run() == FALSE) {

			$data['user'] = $this->db->get_where('user', [
				'username' => $this->session->userdata('username')
			])->row_array();
			$data = array(
				'title' => 'Rekam Medik Pasien Penyakit Menular',
				'isi' => 'medis/tambah'
			);
	
           
            // $data['pasien'] = $this->MedisM->Pasien()->result_array();
			// $data['penyakit']=$this->MedisM->Penyakit->result_array();
			// $data['user']=$this->MedisM->User->result_array();

			$this->load->view('template/v_wrapper', $data, FALSE);
        } else {

            $this->MedisM->tambah();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                                            Rekam Medis berhasil ditambah!
                                            </div>');
            redirect('medis/tambah');
        }
		$this->load->view('template/v_wrapper', $data, FALSE);
    }

}
