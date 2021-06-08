<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('PenyakitM', '', TRUE);
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
		$data = array(
					'title' => 'Data Penyakit Menular',
					'isi' => 'penyakit/index'
		);
		//TAMBAH DATA
		$data['id_unik'] = $this->PenyakitM->buat_kode();
        $this->form_validation->set_rules('nama_penyakit', 'Nama Penyakit', 'required');
		//SELECT DATA
		$data['penyakit'] = $this->PenyakitM->getAll()->result_array();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/v_wrapper', $data, FALSE);
        } else {
            $this->PenyakitM->tambah();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                                             Tambah data berhasil dilakukan!
                                            </div>');
            redirect('penyakit');
        }

		$this->load->view('template/v_wrapper', $data, FALSE);
	}

	function ubah(){
		$data['user'] = $this->db->get_where('user', [
            'username' => $this->session->userdata('username')
        ])->row_array();

		$data['penyakit'] = $this->PenyakitM->getAll()->result_array();
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
		   $this->PenyakitM->hapusDataPenyakit($id);
   
		   $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
											   Hapus data berhasil!
											   </div>');
		   redirect('penyakit');
	   }

}
