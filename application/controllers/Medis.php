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

	function ubah(){
		$data['user'] = $this->db->get_where('user', [
            'username' => $this->session->userdata('username')
        ])->row_array();
		$data['pasien']=$this->MedisM->Pasien();
		//select data penyakit
		$data['penyakit']=$this->MedisM->Penyakit();
		$data['user']=$this->MedisM->User();

		$data['rm'] = $this->MedisM->getJoin()->result_array();
			$id = $this->input->post('id_penyakit');
		   $data = array(
			   'nama_penyakit'  => $this->input->post('nama_penyakit')
		   );
		   $this->PenyakitM->ubah( $data, $id);
		   $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		   redirect('penyakit');
		   
	   }
	
	public function hapus($id)
	{
		$this->MedisM->hapusData($id);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
											Hapus data berhasil!
											</div>');
		redirect('medis');
	}

}
