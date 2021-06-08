<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
		$this->load->helper(array('url','form', 'html'));
        $this->load->model('PasienM', '', TRUE);
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

	

	public function ubah($id)
    {
        $this->form_validation->set_rules('id_pasien', 'ID Pasien', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');
		

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', [
				'username' => $this->session->userdata('username')
			])->row_array();
			//select data kecamatan
			
			$data = [
				'title' => 'Data Pasien Penyakit Menular',
				'pasien' => $this->PasienM->getJoinId($id)->row_array(),
				'hasil' => $this->PasienM->Kecamatan()
			];
			// var_dump($data);     
			// die();
			
			$this->load->view('template/v_head', $data,  FALSE);
			$this->load->view('template/v_header', $data,  FALSE);
			$this->load->view('template/v_nav', $data,  FALSE);
			$this->load->view('pasien/edit', $data);
			$this->load->view('template/v_footer', $data,  FALSE);
			
        } else {

            $this->PasienM->edit();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                                            Data pasien berhasil diupdate!
                                            </div>');
            redirect('Pasien');
        }
    }


	//jumlah
	public function get_count($id_kec=null)
    {
		

		$data = [
			'covid_aktif' => $this->PasienM-> get_count_all($id_kec, 'Dalam Perawatan', 'COVID-19'),
			'covid_sembuh' => $this->PasienM-> get_count_all($id_kec, 'Sembuh', 'COVID-19'),
			'covid_die' => $this->PasienM-> get_count_all($id_kec, 'Meninggal', 'COVID-19'),

			'tbc_aktif' => $this->PasienM-> get_count_all($id_kec, 'Dalam Perawatan', 'TBC'),
			'tbc_sembuh' => $this->PasienM-> get_count_all($id_kec, 'Sembuh', 'TBC'),
			'tbc_die' => $this->PasienM-> get_count_all($id_kec, 'Meninggal', 'TBC'),

			'ims_aktif' => $this->PasienM-> get_count_all($id_kec, 'Dalam Perawatan', 'IMS'),
			'ims_sembuh' => $this->PasienM-> get_count_all($id_kec, 'Sembuh', 'IMS'),
			'ims_die' => $this->PasienM-> get_count_all($id_kec, 'Meninggal', 'IMS'),

			'diare_aktif' => $this->PasienM-> get_count_all($id_kec, 'Dalam Perawatan', 'Diare'),
			'diare_sembuh' => $this->PasienM-> get_count_all($id_kec, 'Sembuh', 'Diare'),
			'diare_die' => $this->PasienM-> get_count_all($id_kec, 'Meninggal', 'Diare'),

			'dbd_aktif' => $this->PasienM-> get_count_all($id_kec, 'Dalam Perawatan', 'DBD'),
			'dbd_sembuh' => $this->PasienM-> get_count_all($id_kec, 'Sembuh', 'DBD'),
			'dbd_die' => $this->PasienM-> get_count_all($id_kec, 'Meninggal', 'DBD'),
			

			
			'nama_kecamatan' => $this->db->limit(1)->get_where('kecamatan', array('id_kec'=>$id_kec))->row()->nama_kecamatan
		];
        echo json_encode($data);
    }

}
