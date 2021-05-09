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
	public function TBC()
    {
        $data['judul'] = "Data Penyakit Menular";


        $this->load->view('front/tbc', $data);
        
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
			'jumlah_pasien' => $this->PasienM->get_all_corona($id_kec),
			'aktif' => $this->PasienM->get_all_corona_aktif($id_kec),
			'sembuh' => $this->PasienM->get_all_corona_sembuh($id_kec),
			'die' => $this->PasienM->get_all_corona_die($id_kec),
			
			'nama_kecamatan' => $this->db->limit(1)->get_where('kecamatan', array('id_kec'=>$id_kec))->row()->nama_kecamatan
		];
        echo json_encode($data);
    }

	public function corona_kel($id_kel=null)
    {
		// $data =  // jumlah pasien
        // $data_nama=$this->db->limit(1)->get_where('kecamatan', array('id_kec'=>$id_kec))->row()->nama_kecamatan;

		$data = [
			'jumlah_pasien' => $this->PasienM->get_count_kel($id_kel),
			'pr_aktif' => $this->PasienM->covid_kel_pr_aktif($id_kel),
			'lk_aktif' => $this->PasienM->covid_kel_lk_aktif($id_kel),
			'pr_sembuh' => $this->PasienM->covid_kel_pr_sembuh($id_kel),
			'lk_sembuh' => $this->PasienM->covid_kel_lk_sembuh($id_kel),
			'pr_die' => $this->PasienM->covid_kel_pr_die($id_kel),
			'lk_die' => $this->PasienM->covid_kel_lk_die($id_kel),
			'nama_kelurahan' => $this->db->limit(1)->get_where('kelurahan', array('id_kel'=>$id_kel))->row()->nama_kelurahan
		];
        echo json_encode($data);
    }

    public function getCountKecamatan()
    {
		$data = $this->PasienM->Percobaan();
		echo json_encode($data);
    }


	//TBC DAN DETAIL TBC
	public function get_tbc($id_kec=null)
    {
	

		$data = [
			'jumlah_pasien' => $this->PasienM->get_all_tbc($id_kec),
			'aktif' => $this->PasienM->get_all_tbc_aktif($id_kec),
			'sembuh' => $this->PasienM->get_all_tbc_sembuh($id_kec),
			'die' => $this->PasienM->get_all_tbc_die($id_kec),
			
			'nama_kecamatan' => $this->db->limit(1)->get_where('kecamatan', array('id_kec'=>$id_kec))->row()->nama_kecamatan
		];
        echo json_encode($data);
    }
	public function get_detail_tbc($id_kec=null)
    {
        $data['id_kec'] = $id_kec;
        $data['kec'] = $this->db->get_where('kecamatan', array('id_kec'=>$id_kec))->result();
		
        
        $this->load->view('front/detail-tbc', $data);
    }

	public function tbc_kel($id_kel=null)
    {
		// $data =  // jumlah pasien
        // $data_nama=$this->db->limit(1)->get_where('kecamatan', array('id_kec'=>$id_kec))->row()->nama_kecamatan;

		$data = [
			'jumlah_pasien' => $this->PasienM->get_tbc_kel($id_kel),
			'pr_aktif' => $this->PasienM->tbc_kel ($id_kel, 'Dalam Perawatan', 'Perempuan'),
			'lk_aktif' => $this->PasienM->tbc_kel ($id_kel, 'Dalam Perawatan', 'Laki-laki'),
			'pr_sembuh' => $this->PasienM->tbc_kel ($id_kel, 'Sembuh', 'Perempuan'),
			'lk_sembuh' => $this->PasienM->tbc_kel ($id_kel, 'Sembuh', 'Laki-laki'),
			'pr_die' => $this->PasienM->tbc_kel ($id_kel, 'Meninggal', 'Perempuan'),
			'lk_die' => $this->PasienM->tbc_kel ($id_kel, 'Meninggal', 'Laki-laki'),
			'nama_kelurahan' => $this->db->limit(1)->get_where('kelurahan', array('id_kel'=>$id_kel))->row()->nama_kelurahan
		];
        echo json_encode($data);
    }

		//IMS DAN DETAIL IMS
		public function IMS()
    	{
        $data['judul'] = "Data Penyakit Menular";


        $this->load->view('front/ims', $data);
        
    	}
		public function get_ims($id_kec=null)
		{
		
	
			$data = [
				'jumlah_pasien' => $this->PasienM->get_ims($id_kec),
				'aktif' => $this->PasienM->get_all_ims($id_kec, 'Dalam Perawatan'),
				'sembuh' => $this->PasienM->get_all_ims($id_kec, 'Sembuh'),
				'die' => $this->PasienM->get_all_ims($id_kec, 'Meninggal'),
				
				'nama_kecamatan' => $this->db->limit(1)->get_where('kecamatan', array('id_kec'=>$id_kec))->row()->nama_kecamatan
			];
			echo json_encode($data);
		}
		public function get_detail_ims($id_kec=null)
		{
			$data['id_kec'] = $id_kec;
			$data['kec'] = $this->db->get_where('kecamatan', array('id_kec'=>$id_kec))->result();
			
			
			$this->load->view('front/detail-ims', $data);
		}
		public function ims_kel($id_kel=null)
    {
		
		$data = [
			'jumlah_pasien' => $this->PasienM->get_ims_kel($id_kel),
			'pr_aktif' => $this->PasienM->ims_kel ($id_kel, 'Dalam Perawatan', 'Perempuan'),
			'lk_aktif' => $this->PasienM->ims_kel ($id_kel, 'Dalam Perawatan', 'Laki-laki'),
			'pr_sembuh' => $this->PasienM->ims_kel ($id_kel, 'Sembuh', 'Perempuan'),
			'lk_sembuh' => $this->PasienM->ims_kel ($id_kel, 'Sembuh', 'Laki-laki'),
			'pr_die' => $this->PasienM->ims_kel ($id_kel, 'Meninggal', 'Perempuan'),
			'lk_die' => $this->PasienM->ims_kel ($id_kel, 'Meninggal', 'Laki-laki'),
			'nama_kelurahan' => $this->db->limit(1)->get_where('kelurahan', array('id_kel'=>$id_kel))->row()->nama_kelurahan
		];
        echo json_encode($data);
    }

		//Diare DAN DETAIL Diare
		public function Diare()
		{
		$data['judul'] = "Data Penyakit Menular";


		$this->load->view('front/diare', $data);
		
		}

		public function get_diare($id_kec=null)
		{
		
	
			$data = [
				'jumlah_pasien' => $this->PasienM->get_diare($id_kec),
				'aktif' => $this->PasienM->get_all_diare($id_kec, 'Dalam Perawatan'),
				'sembuh' => $this->PasienM->get_all_diare($id_kec, 'Sembuh'),
				'die' => $this->PasienM->get_all_diare($id_kec, 'Meninggal'),
				
				'nama_kecamatan' => $this->db->limit(1)->get_where('kecamatan', array('id_kec'=>$id_kec))->row()->nama_kecamatan
			];
			echo json_encode($data);
		}
		public function get_detail_diare($id_kec=null)
		{
			$data['id_kec'] = $id_kec;
			$data['kec'] = $this->db->get_where('kecamatan', array('id_kec'=>$id_kec))->result();
			
			
			$this->load->view('front/detail-diare', $data);
		}
		public function diare_kel($id_kel=null)
    {
		
		$data = [
			'jumlah_pasien' => $this->PasienM->get_diare_kel($id_kel),
			'pr_aktif' => $this->PasienM->diare_kel ($id_kel, 'Dalam Perawatan', 'Perempuan'),
			'lk_aktif' => $this->PasienM->diare_kel ($id_kel, 'Dalam Perawatan', 'Laki-laki'),
			'pr_sembuh' => $this->PasienM->diare_kel ($id_kel, 'Sembuh', 'Perempuan'),
			'lk_sembuh' => $this->PasienM->diare_kel ($id_kel, 'Sembuh', 'Laki-laki'),
			'pr_die' => $this->PasienM->diare_kel ($id_kel, 'Meninggal', 'Perempuan'),
			'lk_die' => $this->PasienM->diare_kel ($id_kel, 'Meninggal', 'Laki-laki'),
			'nama_kelurahan' => $this->db->limit(1)->get_where('kelurahan', array('id_kel'=>$id_kel))->row()->nama_kelurahan
		];
        echo json_encode($data);
    }


	

}
