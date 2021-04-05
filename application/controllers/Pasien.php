<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
		$this->load->helper(array('url','form'));
        $this->load->model('PasienM', '', TRUE);
        $this->load->library('form_validation');
    }
	public function index()
	{
		
		$data['user'] = $this->db->get_where('user', [
            'username' => $this->session->userdata('username')
        ])->row_array();
		$data = array(
					'title' => 'Data Pasien Penyakit Menular',
					'isi' => 'pasien/index'
		);
		//TAMBAH DATA
		$data['id_unik'] = $this->PasienM->buat_kode();
        $this->form_validation->set_rules('nama', 'Nama Pasien', 'required');
		//SELECT DATA PASIEN
		$data['pasien'] = $this->PasienM->getJoin()->result_array();
		//select data kecamatan
		$data['hasil']=$this->PasienM->Kecamatan();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/v_wrapper', $data, FALSE);
        } else {
            $this->PasienM->tambah();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                                             Tambah data berhasil dilakukan!
                                            </div>');
            redirect('pasien');
        }

		$this->load->view('template/v_wrapper', $data, FALSE);
	}
	
	function get_kelurahan()
    {
        $id_kec=$this->input->post('id_kec');
        $data=$this->PasienM->Kelurahan($id_kec);
        echo json_encode($data);
    }


	public function hapus($id)
	{
		$this->PasienM->hapus($id);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
											Hapus data berhasil!
											</div>');
		redirect('Pasien');
	}

	public function detail($id)
    {
        $data['user'] = $this->db->get_where('user', [
            'username' => $this->session->userdata('username')
        ])->row_array();
		$data = array(
					'title' => 'Data Pasien Penyakit Menular',
					'isi' => 'pasien/index'
		);
        // echo 'selamat datang ' . $data['user']['nama'];
		//select data kecamatan
		//$data['hasil']=$this->PasienM->Kecamatan();
		$data['pasien'] = $this->PasienM->getJoinId($id)->row_array();
		echo json_encode($data);

        //$data['pasien'] = $this->PasienM->getIdPasien($id)->row_array();

        
    }

	public function ubah($id)
    {
        $this->form_validation->set_rules('id_pasien', 'ID Pasien', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');
		

        if ($this->form_validation->run() == false) {
            // $data['user'] = $this->db->get_where('user', [
			// 	'username' => $this->session->userdata('username')
			// ])->row_array();
			$data1 = $this->PasienM->getJoinId($id)->result_array();
			$data = array(
						'title' => 'Data Pasien Penyakit Menular',
						'isi' => 'pasien/edit'
			);
			echo json_encode($data1);
			die;
			
			$this->load->view('template/v_wrapper', $data, $data1, FALSE);
			
        } else {

            $this->PasienM->edit();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                                            Data pasien berhasil diupdate!
                                            </div>');
            redirect('Pasien/edit');
        }
    }

}
