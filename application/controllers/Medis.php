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

		$data['user'] = $this->db->get_where('user', [
			'username' => $this->session->userdata('username')
		])->row_array();
		$auth = $data['user'];

		if ($auth['level'] != 'admin') {
			redirect('auth');
		}
    }
	public function index()
	{
		$data['user'] = $this->db->get_where('user', [
            'username' => $this->session->userdata('username')
        ])->row_array();
		// var_dump($data['user']);
		// die;
		$data = array(
					'title' => 'Rekam Medik Pasien Penyakit Menular',
					'isi' => 'medis/index'
		);
		
		//SELECT DATA PASIEN
		$data['rm'] = $this->MedisM->getJoin()->result_array();
		// var_dump($data);
		// die;

		//TAMBAH DATA
		$data['id_unik'] = $this->MedisM->buat_kode();
       
		$this->form_validation->set_rules('id_rm', 'ID', 'required');
        
		//SELECT DATA PASIEN
		$data['pasien']=$this->MedisM->Pasien();
		//select data penyakit
		$data['penyakit']=$this->MedisM->Penyakit();
		$data['user']=$this->MedisM->User();
		if ($this->form_validation->run() == FALSE) {

			$this->load->view('template/v_wrapper', $data, FALSE);
        } else {
            $this->MedisM->add();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                                            Rekam Medis berhasil ditambah!
                                            </div>');
            redirect('medis');
        }

		$this->load->view('template/v_wrapper', $data, FALSE);
	}

	
	
	public function hapus($id)
	{
		$this->MedisM->hapusData($id);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
											Hapus data berhasil!
											</div>');
		redirect('medis');
	}

	public function ubah($id)
    {
        $this->form_validation->set_rules('id_rm', 'ID ', 'required');
     
        $this->form_validation->set_rules('status', 'status', 'required');
		

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', [
				'username' => $this->session->userdata('username')
			])->row_array();
			//select data kecamatan
			
			$data = [
				'title' => 'Data Rekam Medik Pasien Penyakit Menular',
				'rm' => $this->MedisM->getJoinId($id)->row_array()
			];
			// var_dump($data);     
			// die();
			
			$this->load->view('template/v_head', $data,  FALSE);
			$this->load->view('template/v_header', $data,  FALSE);
			$this->load->view('template/v_nav', $data,  FALSE);
			$this->load->view('medis/edit', $data);
			$this->load->view('template/v_footer', $data,  FALSE);
			
        } else {

            $this->MedisM->edit();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                                            Data rekam medis berhasil diupdate!
                                            </div>');
            redirect('Medis');
        }
    }

}
